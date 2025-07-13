<?php
require_once 'Cores/Database.php';

class Pupuk_Model {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAll() {
        return $this->db->execute("SELECT * FROM pupuks ORDER BY id DESC");
    }

    public function getById($id) {
        $result = $this->db->execute("SELECT * FROM pupuks WHERE id = $id");
        return $result[0] ?? null;
    }

    public function insert($data) {
        $sql = "INSERT INTO pupuks (name, description, stock)
                VALUES ('{$data['name']}', '{$data['description']}', {$data['stock']})";
        return $this->db->execute($sql);
    }

    public function update($id, $data) {
        $sql = "UPDATE pupuks SET
                name = '{$data['name']}',
                description = '{$data['description']}',
                stock = {$data['stock']}
                WHERE id = $id";
        return $this->db->execute($sql);
    }

    public function delete($id) {
        return $this->db->execute("DELETE FROM pupuks WHERE id = $id");
    }
}
