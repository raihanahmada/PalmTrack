<?php
require_once 'Cores/Database.php';

class TrxPestisida_Model {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAll() {
        $sql = "SELECT tp.*, ps.name AS pesticide_name 
                FROM trx_pesticide tp
                JOIN pesticides ps ON tp.pesticide_id = ps.id
                ORDER BY tp.created_at DESC";
        return $this->db->execute($sql);
    }

    public function getById($id) {
        $sql = "SELECT * FROM trx_pesticide WHERE id = $id";
        $result = $this->db->execute($sql);
        return $result[0] ?? null;
    }

    public function insert($data) {
        $pesticide_id = (int)$data['pestisida_id'];
        $tanggal      = $data['Tanggal'];
        $jumlah       = (int)$data['jumlahpembelian'];
        $harga        = (float)$data['Harga'];
        $penjual      = addslashes($data['Namapenjual']);

        $sql = "INSERT INTO trx_pesticide (pesticide_id, Tanggal, jumlahpembelian, Harga, Namapenjual)
                VALUES ($pesticide_id, '$tanggal', $jumlah, $harga, '$penjual')";

        $this->db->execute($sql);
    }

    public function update($id, $data) {
        $pesticide_id = (int)$data['pestisida_id'];
        $tanggal      = $data['Tanggal'];
        $jumlah       = (int)$data['jumlahpembelian'];
        $harga        = (float)$data['Harga'];
        $penjual      = addslashes($data['Namapenjual']);

        $sql = "UPDATE trx_pesticide 
                SET pesticide_id = $pesticide_id,
                    Tanggal = '$tanggal',
                    jumlahpembelian = $jumlah,
                    Harga = $harga,
                    Namapenjual = '$penjual'
                WHERE id = $id";

        $this->db->execute($sql);
    }

    public function delete($id) {
        $sql = "DELETE FROM trx_pesticide WHERE id = $id";
        $this->db->execute($sql);
    }
}
