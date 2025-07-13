<?php
require_once 'Cores/Database.php';

class TrxPupuk_Model {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAll() {
    $sql = "SELECT t.id, t.Tanggal, t.jumlahpembelian, t.Harga, t.Namapenjual, p.name AS pupuk_name
            FROM trx_pupuk t
            JOIN pupuks p ON t.pupuk_id = p.id
            ORDER BY t.Tanggal DESC";
    return $this->db->execute($sql);
}


    public function getById($id) {
        $sql = "SELECT * FROM trx_pupuk WHERE id = $id";
        $result = $this->db->execute($sql);
        return $result[0] ?? null;
    }

    public function insert($data) {
        $pupuk_id  = (int)$data['pupuk_id'];
        $tanggal   = $data['Tanggal'];
        $jumlah    = (int)$data['jumlahpembelian'];
        $harga     = (float)$data['Harga'];
        $penjual   = addslashes($data['Namapenjual']);

        $sql = "INSERT INTO trx_pupuk (pupuk_id, Tanggal, jumlahpembelian, Harga, Namapenjual)
                VALUES ($pupuk_id, '$tanggal', $jumlah, $harga, '$penjual')";

        $this->db->execute($sql);
    }

    public function update($id, $data) {
        $pupuk_id  = (int)$data['pupuk_id'];
        $tanggal   = $data['Tanggal'];
        $jumlah    = (int)$data['jumlahpembelian'];
        $harga     = (float)$data['Harga'];
        $penjual   = addslashes($data['Namapenjual']);

        $sql = "UPDATE trx_pupuk 
                SET pupuk_id = $pupuk_id,
                    Tanggal = '$tanggal',
                    jumlahpembelian = $jumlah,
                    Harga = $harga,
                    Namapenjual = '$penjual'
                WHERE id = $id";

        $this->db->execute($sql);
    }

    public function delete($id) {
        $sql = "DELETE FROM trx_pupuk WHERE id = $id";
        $this->db->execute($sql);
    }
}
