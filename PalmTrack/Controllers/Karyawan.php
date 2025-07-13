<?php

class Karyawan {
public function index() {
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'employee') {
        header('Location: /PalmTrack/auth/login');
        exit;
    }

    $user_id = $_SESSION['user']['id'];
    $nama_karyawan = $_SESSION['user']['name'];

    require_once 'Models/Laporan_Model.php';
    $model = new Laporan_Model();

    // Ambil 5 laporan terakhir dari user
    $laporan_terakhir = $model->getLaporanByUser($user_id, 5);

    // Kelompokkan berdasarkan tipe
    $laporan_grouped = [
        'panen' => [],
        'pupuk' => [],
        'nyemprot' => []
    ];

    foreach ($laporan_terakhir as $lap) {
        if (isset($laporan_grouped[$lap['type']])) {
            $laporan_grouped[$lap['type']][] = $lap;
        }
    }

    // ✅ Hapus baris debugging di bawah ini
    // echo "<h3>DEBUG - User ID: $user_id</h3>";
    // echo "<pre>"; print_r($laporan_terakhir); echo "</pre>";
    // exit;

    // ✅ Kirim ke view
    require 'Views/Karyawan/index.php';
}



public function laporan($aksi = null) {
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'employee') {
        header('Location: /PalmTrack/auth/login');
        exit;
    }

    if ($aksi === 'create') {
        require_once 'Models/Alat_Model.php';          // ← Tambah ini
    $alatModel = new Alat_Model();                 // ← Tambah ini
    $tools = $alatModel->getAll();                 // ← Tambah ini

    require 'Views/Karyawan/Laporan/Create.php'; 
    } elseif ($aksi === 'history') {
    require_once 'Models/Laporan_Model.php';
    $model = new Laporan_Model();
    $allLaporan = $model->getLaporanByUser($_SESSION['user']['id']);

    // Kelompokkan berdasarkan type
    $laporan = [
        'panen' => [],
        'pupuk' => [],
        'nyemprot' => [],
        'pupuk&nyemprot' => []
    ];

    foreach ($allLaporan as $lapor) {
        $laporan[$lapor['type']][] = $lapor;
    }

    require 'Views/Karyawan/Laporan/History.php';
}
 else {
        echo "Halaman laporan tidak ditemukan.";
    }
}

public function simpanLaporan() {
    require_once 'Models/Laporan_Model.php';
    $model = new Laporan_Model();

    $data = [
        'employee_id'     => $_SESSION['user']['id'],  // Gunakan employee_id sesuai field
        'tanggal'         => $_POST['tanggal'],
        'area_id'         => $_POST['area_id'],
        'jenis'           => $_POST['jenis'],
        'berat'           => $_POST['berat'],
        'pupuk_id'        => $_POST['pupuk_id'] ?? null,
        'qty_pupuk'       => $_POST['qty_pupuk'] ?? null,
        'pestisida_id'    => $_POST['pestisida_id'] ?? null,
        'qty_pestisida'   => $_POST['qty_pestisida'] ?? null,
        'catatan'         => $_POST['catatan'] ?? null,
        'status'          => 'pending'
    ];

    // Simpan laporan ke table reports
    $laporan_id = $model->insert($data);

    // Simpan alat (jika ada)
    if (!empty($_POST['tool_id'])) {
        require_once 'Models/ReportTool_Model.php';
        $toolModel = new ReportTool_Model();
        $toolModel->insertTools($laporan_id, $_POST['tool_id']);
    }

    // Redirect ke history
    header('Location: /PalmTrack/karyawan/laporan/history');
    exit;
}


    
}
