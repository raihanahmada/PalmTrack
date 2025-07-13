<?php
require_once 'Cores/Database.php';

class Pesticide_Model {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAll() {
        return $this->db->execute("SELECT * FROM pesticides ORDER BY id DESC");
    }

    public function getById($id) {
        $result = $this->db->execute("SELECT * FROM pesticides WHERE id = $id");
        return $result[0] ?? null;
    }

    public function insert($data) {
        $sql = "INSERT INTO pesticides (name, description, stock) 
                VALUES ('{$data['name']}', '{$data['description']}', {$data['stock']})";
        return $this->db->execute($sql);
    }

    public function update($id, $data) {
        $sql = "UPDATE pesticides SET 
                name = '{$data['name']}', 
                description = '{$data['description']}', 
                stock = {$data['stock']} 
                WHERE id = $id";
        return $this->db->execute($sql);
    }

    public function delete($id) {
        return $this->db->execute("DELETE FROM pesticides WHERE id = $id");
    }
}
