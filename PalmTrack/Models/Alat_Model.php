<?php
require_once 'Cores/Database.php';

class Alat_Model {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAll() {
        $sql = "SELECT * FROM tools ORDER BY id DESC";
        return $this->db->execute($sql);
    }

    public function insert($data) {
        $sql = "INSERT INTO tools (name, type, plat_number, description)
                VALUES ('{$data['name']}', '{$data['type']}', '{$data['plat_number']}', '{$data['description']}')";
        return $this->db->execute($sql);
    }

    public function delete($id) {
        $sql = "DELETE FROM tools WHERE id = $id";
        return $this->db->execute($sql);
    }
    public function getById($id) {
    $sql = "SELECT * FROM tools WHERE id = $id";
    $result = $this->db->execute($sql);
    return $result[0] ?? null;
}


public function update($id, $data) {
    $sql = "UPDATE tools SET 
            name = '{$data['name']}',
            type = '{$data['type']}',
            plat_number = '{$data['plat_number']}',
            description = '{$data['description']}'
            WHERE id = $id";
    return $this->db->execute($sql);
}

}
