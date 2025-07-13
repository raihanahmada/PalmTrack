<?php
require_once 'Cores/Database.php';

class Area_Model {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAll() {
        return $this->db->execute("SELECT * FROM areas ORDER BY id DESC");
    }

    public function insert($data) {
    $sql = "INSERT INTO areas (name, size, quantity_of_trees) 
            VALUES ('{$data['name']}', '{$data['size']}', {$data['quantity_of_trees']})";
    return $this->db->execute($sql);
}


    public function delete($id) {
        return $this->db->execute("DELETE FROM areas WHERE id = $id");
    }
    public function getById($id) {
    $sql = "SELECT * FROM areas WHERE id = $id";
    $result = $this->db->execute($sql);
    return $result[0] ?? null;
}

public function update($id, $data) {
    $sql = "UPDATE areas SET 
            name = '{$data['name']}',
            size = '{$data['size']}',
            quantity_of_trees = {$data['quantity_of_trees']}
            WHERE id = $id";
    return $this->db->execute($sql);
}

}
