<?php
require_once BASE_PATH . '/Cores/Database.php';

class User_Model {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAll() {
        return $this->db->execute("SELECT * FROM users ORDER BY id DESC");
    }

    public function getById($id) {
        $result = $this->db->execute("SELECT * FROM users WHERE id = $id");
        return $result[0] ?? null;
    }

    public function findByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        $result = $this->db->execute($sql);
        return !empty($result) ? $result[0] : null;
    }

    public function insert($data) {
        $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (name, username, email, password, role) VALUES (
            '{$data['name']}', '{$data['username']}', '{$data['email']}', '$hashedPassword', '{$data['role']}'
        )";
        return $this->db->execute($sql);
    }

    public function update($id, $data) {
        $updatePassword = '';
        if (!empty($data['password'])) {
            $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
            $updatePassword = ", password = '$hashedPassword'";
        }

        $sql = "UPDATE users SET 
            name = '{$data['name']}',
            username = '{$data['username']}',
            email = '{$data['email']}',
            role = '{$data['role']}'
            $updatePassword
            WHERE id = $id";
        return $this->db->execute($sql);
    }

    public function delete($id) {
        return $this->db->execute("DELETE FROM users WHERE id = $id");
    }
}
