<?php
require_once 'Cores/Database.php';

class Laporan_Model {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllLaporanPending() {
    $sql = "SELECT r.*, 
                   u.name AS employee_name, 
                   a.name AS area_name,
                   p.name AS pupuk_name, 
                   ps.name AS pesticide_name
            FROM reports r
            JOIN users u ON r.employee_id = u.id
            JOIN areas a ON r.area_id = a.id
            LEFT JOIN pupuks p ON r.pupuk_id = p.id
            LEFT JOIN pesticides ps ON r.pesticide_id = ps.id
            WHERE r.status = 'pending'
            ORDER BY r.datetime DESC";

    $result = $this->db->execute($sql);
    
    // DEBUGGING
    if ($result === null) {
        echo "<pre>Query Error:\n$sql\n</pre>";
    }

    return $result;
}


    public function getLaporanById($id) {
        $sql = "SELECT * FROM reports WHERE id = $id";
        $result = $this->db->execute($sql);
        return $result[0] ?? null;
    }

    public function setStatusDiterima($id, $id_admin) {
        $lap = $this->getLaporanById($id);

        $sql = "UPDATE reports 
                SET status = 'diterima', verified_by = $id_admin 
                WHERE id = $id";
        $this->db->execute($sql);

        if ($lap) {
            if ($lap['type'] === 'pupuk' && $lap['pupuk_id']) {
                $this->keluarStokPupuk($lap['pupuk_id'], $lap['quantity_of_pupuk']);
            }

            if ($lap['type'] === 'nyemprot' && $lap['pesticide_id']) {
                $this->keluarStokPesticide($lap['pesticide_id'], $lap['quantity_of_pesticide']);
            }

            if ($lap['type'] === 'pupuk&nyemprot') {
                if ($lap['pupuk_id']) {
                    $this->keluarStokPupuk($lap['pupuk_id'], $lap['quantity_of_pupuk']);
                }
                if ($lap['pesticide_id']) {
                    $this->keluarStokPesticide($lap['pesticide_id'], $lap['quantity_of_pesticide']);
                }
            }
        }
    }

    public function setStatusDitolak($id, $id_admin, $alasan) {
    $sql = "UPDATE reports 
            SET status = 'ditolak', verified_by = $id_admin, rejection_reason = '$alasan'
            WHERE id = $id";
    $this->db->execute($sql);
}


    private function keluarStokPupuk($pupuk_id, $jumlah) {
        $sql = "INSERT INTO trx_pupuk (pupuk_id, quantity, type) 
                VALUES ($pupuk_id, $jumlah, 'keluar stock')";
        $this->db->execute($sql);
    }

    private function keluarStokPesticide($pesticide_id, $jumlah) {
        $sql = "INSERT INTO trx_pesticide (pesticide_id, quantity, type) 
                VALUES ($pesticide_id, $jumlah, 'keluar stock')";
        $this->db->execute($sql);
    }
public function insert($data) {
    $employee_id     = (int)$data['employee_id'];
    $area_id         = (int)$data['area_id'];
    $type            = $data['jenis'];
    $weight          = isset($data['berat']) ? (float)$data['berat'] : 0;
    $pupuk_id        = !empty($data['pupuk_id']) ? (int)$data['pupuk_id'] : "NULL";
    $qty_pupuk       = !empty($data['qty_pupuk']) ? (int)$data['qty_pupuk'] : "NULL";
    $pestisida_id    = !empty($data['pestisida_id']) ? (int)$data['pestisida_id'] : "NULL";
    $qty_pestisida   = !empty($data['qty_pestisida']) ? (int)$data['qty_pestisida'] : "NULL";
    $notes           = !empty($data['catatan']) ? "'" . addslashes($data['catatan']) . "'" : "NULL";
    $datetime        = $data['tanggal'];
    $status          = $data['status'];

    $sql = "INSERT INTO reports (
                employee_id, area_id, type, weight, pupuk_id, quantity_of_pupuk, 
                pesticide_id, quantity_of_pesticide, notes, datetime, status
            ) VALUES (
                $employee_id, $area_id, '$type', $weight, $pupuk_id, $qty_pupuk, 
                $pestisida_id, $qty_pestisida, $notes, '$datetime', '$status'
            )";

    return $this->db->insertAndGetId($sql);
}
public function getLaporanByUser($user_id, $limit = 10) {
    $sql = "SELECT r.*, 
                   a.name AS area_name,
                   p.name AS pupuk_name,
                   ps.name AS pesticide_name,
                   GROUP_CONCAT(t.name SEPARATOR ', ') AS tools
            FROM reports r
            JOIN areas a ON r.area_id = a.id
            LEFT JOIN pupuks p ON r.pupuk_id = p.id
            LEFT JOIN pesticides ps ON r.pesticide_id = ps.id
            LEFT JOIN report_tools rt ON r.id = rt.report_id
            LEFT JOIN tools t ON rt.tool_id = t.id
            WHERE r.employee_id = $user_id
            GROUP BY r.id
            ORDER BY r.datetime DESC
            LIMIT $limit";

    return $this->db->execute($sql);
}

public function getAllLaporanDiterima() {
    $sql = "SELECT r.*, 
                   a.name AS area_name,
                   p.name AS pupuk_name,
                   ps.name AS pesticide_name,
                   GROUP_CONCAT(t.name SEPARATOR ', ') AS tools
            FROM reports r
            JOIN areas a ON r.area_id = a.id
            LEFT JOIN pupuks p ON r.pupuk_id = p.id
            LEFT JOIN pesticides ps ON r.pesticide_id = ps.id
            LEFT JOIN report_tools rt ON r.id = rt.report_id
            LEFT JOIN tools t ON rt.tool_id = t.id
            WHERE r.status = 'diterima'
            GROUP BY r.id
            ORDER BY r.datetime DESC";

    return $this->db->execute($sql);
}

public function getGrafikPanen($area_id = 'all', $start = null, $end = null) {
    $where = "WHERE status = 'diterima' AND type = 'panen'";

    if ($area_id !== 'all') {
        $where .= " AND area_id = " . (int)$area_id;
    }

    if ($start && $end) {
        $where .= " AND DATE(datetime) BETWEEN '$start' AND '$end'";
    }

    $sql = "SELECT DATE(datetime) as tanggal, SUM(weight) as total_berat 
            FROM reports
            $where
            GROUP BY DATE(datetime)
            ORDER BY tanggal ASC";

    $results = $this->db->execute($sql);

    $labels = [];
    $values = [];

    foreach ($results as $row) {
        $labels[] = date('d M', strtotime($row['tanggal']));
        $values[] = (float)$row['total_berat'];
    }

    return ['labels' => $labels, 'values' => $values];
}
public function getAllLaporanDiterimaFiltered($start = null, $end = null, $type = null) {
    $sql = "SELECT r.*, 
                   u.name AS employee_name, 
                   a.name AS area_name,
                   p.name AS pupuk_name, 
                   ps.name AS pesticide_name,
                   GROUP_CONCAT(t.name SEPARATOR ', ') AS tools
            FROM reports r
            JOIN users u ON r.employee_id = u.id
            JOIN areas a ON r.area_id = a.id
            LEFT JOIN pupuks p ON r.pupuk_id = p.id
            LEFT JOIN pesticides ps ON r.pesticide_id = ps.id
            LEFT JOIN report_tools rt ON r.id = rt.report_id
            LEFT JOIN tools t ON rt.tool_id = t.id
            WHERE r.status = 'diterima'";

    if ($start && $end) {
        $sql .= " AND r.datetime BETWEEN '$start' AND '$end'";
    }

    if ($type && in_array($type, ['panen', 'pupuk', 'nyemprot', 'pupuk&nyemprot'])) {
        $sql .= " AND r.type = '$type'";
    }

    $sql .= " GROUP BY r.id ORDER BY r.datetime DESC";

    return $this->db->execute($sql);
}


}
