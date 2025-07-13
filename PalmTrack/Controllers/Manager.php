<?php

class Manager {
    public function __construct() {
        // Cek apakah user login dan rolenya manager
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'manager') {
            header('Location: /PalmTrack/auth/login');
            exit;
        }
    }

    public function index() {
    require_once 'Models/Laporan_Model.php';
    require_once 'Models/Area_Model.php';

    $laporanModel = new Laporan_Model();
    $areaModel = new Area_Model();

    // Ambil semua area untuk dropdown
    $list_area = $areaModel->getAll();

    // Ambil parameter filter dari URL (GET)
    $area_id = $_GET['area_id'] ?? 'all';
    $start   = $_GET['tanggal_mulai'] ?? null;
    $end     = $_GET['tanggal_akhir'] ?? null;

    // Ambil data grafik panen hanya untuk laporan yang statusnya "diterima"
    $grafik_data = $laporanModel->getGrafikPanen($area_id, $start, $end);

    require 'Views/Manager/index.php';
}


public function laporan() {
    require_once 'Models/Laporan_Model.php';
    $model = new Laporan_Model();

    $start = $_GET['tanggal_mulai'] ?? null;
    $end   = $_GET['tanggal_akhir'] ?? null;
    $type  = $_GET['type'] ?? null;

    $laporan = $model->getAllLaporanDiterimaFiltered($start, $end, $type);

    require 'Views/Manager/Laporan.php';
}


    public function pupuk() {
        require_once 'Models/Pupuk_Model.php';
        $model = new Pupuk_Model();
        $pupuk = $model->getAll();

        require 'Views/Manager/Pupuk.php';
    }

    public function pestisida() {
        require_once 'Models/Pesticide_Model.php';
        $model = new Pesticide_Model();
        $pestisida = $model->getAll();

        require 'Views/Manager/Pestisida.php';
    }

    public function trxPupuk() {
        require_once 'Models/TrxPupuk_Model.php';
        $model = new TrxPupuk_Model();
        $trx = $model->getAll();

        require 'Views/Manager/TrxPupuk.php';
    }

    public function trxPestisida() {
        require_once 'Models/TrxPestisida_Model.php';
        $model = new TrxPestisida_Model();
        $trx = $model->getAll();

        require 'Views/Manager/TrxPestisida.php';
    }

    public function alat() {
        require_once 'Models/Alat_Model.php';
        $model = new Alat_Model();
        $alat = $model->getAll();

        require 'Views/Manager/Alat.php';
    }

    public function area() {
        require_once 'Models/Area_Model.php';
        $model = new Area_Model();
        $area = $model->getAll();

        require 'Views/Manager/Area.php';
    }
}
