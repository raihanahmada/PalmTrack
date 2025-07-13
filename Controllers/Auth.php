<?php
require_once 'Models/User_Model.php';

class Auth {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $model = new User_Model();
            $user = $model->findByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user'] = $user;

                // Redirect sesuai role
                if ($user['role'] === 'admin') {
                    header('Location: /PalmTrack/admin/index');
                } elseif ($user['role'] === 'employee') {
                    header('Location: /PalmTrack/karyawan/index');
                } elseif ($user['role'] === 'manager') {
                    header('Location: /PalmTrack/manager/index');
                } else {
                    echo "Role tidak dikenali!";
                }
                exit;
            } else {
                $error = "Email atau password salah!";
                require 'Views/login.php'; // <= sesuai struktur kamu
            }
        } else {
            require 'Views/login.php'; // <= sesuai struktur kamu
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /PalmTrack/auth/login');
        exit;
    }
}
