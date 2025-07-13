<?php

class Admin {
    public function index() {
    // Cek apakah user login dan rolenya admin
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
        header('Location: /PalmTrack/auth/login');
        exit;
    }

    require_once 'Models/Laporan_Model.php';
    $model = new Laporan_Model();
    $laporan_pending = $model->getAllLaporanPending();  // Ambil semua laporan pending

    require 'Views/Admin/Index.php';  // Kirim ke view dashboard
}


    public function laporan_verifikasi() {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: /PalmTrack/auth/login');
            exit;
        }

        require_once 'Models/Laporan_Model.php';
        $model = new Laporan_Model();
        $laporan = $model->getAllLaporanPending();

        require './Views/Admin/LaporanVerifikasi.php';
    }

    public function verifikasi($id, $aksi) {
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
        header('Location: /PalmTrack/auth/login');
        exit;
    }

    require_once 'Models/Laporan_Model.php';
    $model = new Laporan_Model();

    if ($aksi === 'terima') {
        $model->setStatusDiterima($id, $_SESSION['user']['id']);
        header('Location: /PalmTrack/admin/laporan_verifikasi');
        exit;
    }

    // Penolakan sekarang lewat method tolak() saja
}

    public function tolak($id) {
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
        header('Location: /PalmTrack/auth/login');
        exit;
    }

    $alasan = $_POST['alasan'] ?? null;
    if (!$alasan) {
        echo "Alasan tidak boleh kosong!";
        return;
    }

    require_once 'Models/Laporan_Model.php';
    $model = new Laporan_Model();
    $model->setStatusDitolak($id, $_SESSION['user']['id'], $alasan);

    header('Location: /PalmTrack/admin/laporan_verifikasi');
    exit;
}
public function alat() {
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
        header('Location: /PalmTrack/auth/login');
        exit;
    }

    require_once 'Models/Alat_Model.php';
    $model = new Alat_Model();
    $alat = $model->getAll();

    require './Views/Admin/Alat/Index.php';
}

public function tambahAlat() {
    require 'Views/Admin/Alat/TambahAlat.php';
}

public function simpanAlat() {
    require_once 'Models/Alat_Model.php';
    $model = new Alat_Model();

    $data = [
        'name' => $_POST['name'],
        'type' => $_POST['type'],
        'plat_number' => $_POST['plat_number'],
        'description' => $_POST['description'],
    ];

    $model->insert($data);
    header('Location: /PalmTrack/admin/alat');
    exit;
}

public function hapusAlat($id) {
    require_once 'Models/Alat_Model.php';
    $model = new Alat_Model();
    $model->delete($id);
    header('Location: /PalmTrack/admin/alat');
    exit;
}
public function editAlat($id) {
    require_once 'Models/Alat_Model.php';
    $model = new Alat_Model();
    $alat = $model->getById($id);

    if (!$alat) {
        echo "Data tidak ditemukan untuk ID $id";
        exit;
    }

    require 'Views/Admin/Alat/EditAlat.php';
}


public function updateAlat($id) {
    require_once 'Models/Alat_Model.php';
    $model = new Alat_Model();

    $data = [
        'name' => $_POST['name'],
        'type' => $_POST['type'],
        'plat_number' => $_POST['plat_number'],
        'description' => $_POST['description'],
    ];

    $model->update($id, $data);
    header('Location: /PalmTrack/admin/alat');
    exit;
}

public function area() {
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
        header('Location: /PalmTrack/auth/login');
        exit;
    }

    require_once 'Models/Area_Model.php';
    $model = new Area_Model();
    $area = $model->getAll();

    require './Views/Admin/Area/Index.php';
}

public function tambahArea() {
    require 'Views/Admin/Area/TambahArea.php';
}

public function simpanArea() {
    require_once 'Models/Area_Model.php';
    $model = new Area_Model();

    $data = [
        'name' => $_POST['name'],
        'size' => $_POST['size'],
        'quantity_of_trees' => $_POST['quantity_of_trees'],
    ];
    $model->insert($data);

    header('Location: /PalmTrack/admin/area');
    exit;
}


public function hapusArea($id) {
    require_once 'Models/Area_Model.php';
    $model = new Area_Model();
    $model->delete($id);

    header('Location: /PalmTrack/admin/area');
    exit;
}
public function editArea($id) {
    require_once 'Models/Area_Model.php';
    $model = new Area_Model();
    $area = $model->getById($id);

    require 'Views/Admin/Area/EditArea.php';
}

public function updateArea($id) {
    require_once 'Models/Area_Model.php';
    $model = new Area_Model();
    $data = [
        'name' => $_POST['name'],
        'size' => $_POST['size'],
        'quantity_of_trees' => $_POST['quantity_of_trees'],
    ];
    $model->update($id, $data);

    header('Location: /PalmTrack/admin/area');
    exit;
}
// Pupuk
public function pupuk() {
    
    require_once 'Models/Pupuk_Model.php';
    $model = new Pupuk_Model();
    $pupuk = $model->getAll();
    require 'Views/Admin/Pupuk/Index.php';
}

public function tambahPupuk() {
    require './Views/Admin/Pupuk/TambahstokPupuk.php';
}

public function simpanPupuk() {
    require_once 'Models/Pupuk_Model.php';
    $model = new Pupuk_Model();
    $data = [
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'stock' => $_POST['stock']
    ];
    $model->insert($data);
    header('Location: /PalmTrack/admin/pupuk');
    exit;
}

public function editPupuk($id) {
    require_once 'Models/Pupuk_Model.php';
    $model = new Pupuk_Model();
    $pupuk = $model->getById($id);
    require 'Views/Admin/Pupuk/EditPupuk.php';
}

public function updatePupuk($id) {
    require_once 'Models/Pupuk_Model.php';
    $model = new Pupuk_Model();
    $data = [
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'stock' => $_POST['stock']
    ];
    $model->update($id, $data);
    header('Location: /PalmTrack/admin/pupuk');
    exit;
}

public function hapusPupuk($id) {
    require_once 'Models/Pupuk_Model.php';
    $model = new Pupuk_Model();
    $model->delete($id);
    header('Location: /PalmTrack/admin/pupuk');
    exit;
}
// --------------------- Pestisida -----------------------
public function pestisida() {
    require_once 'Models/Pesticide_Model.php';
    $model = new Pesticide_Model();
    $pestisida = $model->getAll();
    require 'Views/Admin/Pestisida/Index.php';
}

public function tambahPestisida() {
    require 'Views/Admin/Pestisida/TambahPestisida.php';
}

public function simpanPestisida() {
    require_once 'Models/Pesticide_Model.php';
    $model = new Pesticide_Model();
    $data = [
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'stock' => $_POST['stock']
    ];
    $model->insert($data);
    header('Location: /PalmTrack/admin/pestisida');
    exit;
}

public function editPestisida($id) {
    require_once 'Models/Pesticide_Model.php';
    $model = new Pesticide_Model();
    $pestisida = $model->getById($id);
    require 'Views/Admin/Pestisida/EditPestisida.php';
}

public function updatePestisida($id) {
    require_once 'Models/Pesticide_Model.php';
    $model = new Pesticide_Model();
    $data = [
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'stock' => $_POST['stock']
    ];
    $model->update($id, $data);
    header('Location: /PalmTrack/admin/pestisida');
    exit;
}

public function hapusPestisida($id) {
    require_once 'Models/Pesticide_Model.php';
    $model = new Pesticide_Model();
    $model->delete($id);
    header('Location: /PalmTrack/admin/pestisida');
    exit;
}
public function users() {
    require_once 'Models/User_Model.php';
    $model = new User_Model();
    $users = $model->getAll();

    require 'Views/Admin/User/Index.php';
}

public function tambahUser() {
    require 'Views/Admin/User/TambahUser.php';
}

public function simpanUser() {
    require_once 'Models/User_Model.php';
    $model = new User_Model();

    $data = [
        'name' => $_POST['name'],
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'role' => $_POST['role']
    ];
    $model->insert($data);
    header('Location: /PalmTrack/admin/users');
    exit;
}

public function editUser($id) {
    require_once 'Models/User_Model.php';
    $model = new User_Model();
    $user = $model->getById($id);

    require 'Views/Admin/User/EditUser.php';
}

public function updateUser($id) {
    require_once 'Models/User_Model.php';
    $model = new User_Model();
    $data = [
        'name' => $_POST['name'],
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'password' => $_POST['password'], // optional
        'role' => $_POST['role']
    ];
    $model->update($id, $data);
    header('Location: /PalmTrack/admin/users');
    exit;
}

public function hapusUser($id) {
    require_once 'Models/User_Model.php';
    $model = new User_Model();
    $model->delete($id);
    header('Location: /PalmTrack/admin/users');
    exit;
}
// Di dalam Controllers/Admin.php, tambahkan method berikut:

// === TRANSAKSI PUPUK ===
public function trxPupuk() {
    require_once 'Models/TrxPupuk_Model.php';
    $model = new TrxPupuk_Model();
    $trx = $model->getAll();
    require 'Views/Admin/TrxPupuk/index.php';
}

public function tambahTrxPupuk() {
    require_once 'Models/Pupuk_Model.php';
    $pupukModel = new Pupuk_Model();
    $pupuk = $pupukModel->getAll();
    require 'Views/Admin/TrxPupuk/TambahPembelian.php';
}

public function simpanTrxPupuk() {
    require_once 'Models/TrxPupuk_Model.php';
    $model = new TrxPupuk_Model();
    $model->insert($_POST);
    header('Location: /PalmTrack/admin/trxPupuk');
    exit;
}

public function editTrxPupuk($id) {
    require_once 'Models/TrxPupuk_Model.php';
    require_once 'Models/Pupuk_Model.php';
    $model = new TrxPupuk_Model();
    $trx = $model->getById($id);
    $pupukModel = new Pupuk_Model();
    $pupuk = $pupukModel->getAll();
    require 'Views/Admin/TrxPupuk/Edit.php';
}

public function updateTrxPupuk($id) {
    require_once 'Models/TrxPupuk_Model.php';
    $model = new TrxPupuk_Model();
    $model->update($id, $_POST);
    header('Location: /PalmTrack/admin/trxPupuk');
    exit;
}

public function hapusTrxPupuk($id) {
    require_once 'Models/TrxPupuk_Model.php';
    $model = new TrxPupuk_Model();
    $model->delete($id);
    header('Location: /PalmTrack/admin/trxPupuk');
    exit;
}

// === TRANSAKSI PESTISIDA ===
public function trxPestisida() {
    require_once 'Models/TrxPestisida_Model.php';
    $model = new TrxPestisida_Model();
    $trx = $model->getAll();
    require 'Views/Admin/TrxPestisida/index.php';
}

public function tambahTrxPestisida() {
    require_once 'Models/Pesticide_Model.php';
    $model = new Pesticide_Model();
    $pestisida = $model->getAll();
    require 'Views/Admin/TrxPestisida/TambahPembelian.php';
}

public function simpanTrxPestisida() {
    require_once 'Models/TrxPestisida_Model.php';
    $model = new TrxPestisida_Model();
    $model->insert($_POST);
    header('Location: /PalmTrack/admin/trxPestisida');
    exit;
}

public function editTrxPestisida($id) {
    require_once 'Models/TrxPestisida_Model.php';
    require_once 'Models/Pesticide_Model.php';
    $model = new TrxPestisida_Model();
    $trx = $model->getById($id);
    $pestisidaModel = new Pesticide_Model();
    $pestisida = $pestisidaModel->getAll();
    require 'Views/Admin/TrxPestisida/Edit.php';
}

public function updateTrxPestisida($id) {
    require_once 'Models/TrxPestisida_Model.php';
    $model = new TrxPestisida_Model();
    $model->update($id, $_POST);
    header('Location: /PalmTrack/admin/trxPestisida');
    exit;
}

public function hapusTrxPestisida($id) {
    require_once 'Models/TrxPestisida_Model.php';
    $model = new TrxPestisida_Model();
    $model->delete($id);
    header('Location: /PalmTrack/admin/trxPestisida');
    exit;
}



}