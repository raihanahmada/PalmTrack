<?php

class Karyawan {
    public function index() {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'employee') {
            header('Location: /PalmTrack/auth/login');
            exit;
        }

        $user_id = $_SESSION['user']['id'];
        $nama_karyawan = $_SESSION['user']['name'];

        require_once 'Models/Laporan_Model.php';
        $model = new Laporan_Model();

        // Ambil 5 laporan terakhir dari user
        $laporan_terakhir = $model->getLaporanByUser($user_id, 5);

        // Kelompokkan berdasarkan tipe
        $laporan_grouped = [
            'panen' => [],
            'pupuk' => [],
            'nyemprot' => []
        ];

        foreach ($laporan_terakhir as $lap) {
            if (isset($laporan_grouped[$lap['type']])) {
                $laporan_grouped[$lap['type']][] = $lap;
            }
        }

        require 'Views/Karyawan/index.php';
    }

    public function laporan($aksi = null) {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'employee') {
            header('Location: /PalmTrack/auth/login');
            exit;
        }

        if ($aksi === 'create') {
            require_once 'Models/Alat_Model.php';
            $alatModel = new Alat_Model();
            $tools = $alatModel->getAll();

            require 'Views/Karyawan/Laporan/Create.php';
        } elseif ($aksi === 'history') {
            require_once 'Models/Laporan_Model.php';
            $model = new Laporan_Model();

            // Ambil filter dari GET (jika ada)
            $tanggal_mulai = $_GET['tanggal_mulai'] ?? null;
            $tanggal_akhir = $_GET['tanggal_akhir'] ?? null;
            $status = $_GET['status'] ?? null;
            $jenis = $_GET['jenis'] ?? null;

            // Panggil model dengan filter
            $laporan = $model->getLaporanByUserFiltered($_SESSION['user']['id'], $tanggal_mulai, $tanggal_akhir, $status, $jenis);

            require 'Views/Karyawan/Laporan/History.php';
        } else {
            echo "Halaman laporan tidak ditemukan.";
        }
    }

    public function simpanLaporan() {
        require_once 'Models/Laporan_Model.php';
        $model = new Laporan_Model();

        $data = [
            'employee_id'     => $_SESSION['user']['id'],
            'tanggal'         => $_POST['tanggal'],
            'area_id'         => $_POST['area_id'],
            'jenis'           => $_POST['jenis'],
            'berat'           => $_POST['berat'],
            'pupuk_id'        => $_POST['pupuk_id'] ?? null,
            'qty_pupuk'       => $_POST['qty_pupuk'] ?? null,
            'pestisida_id'    => $_POST['pestisida_id'] ?? null,
            'qty_pestisida'   => $_POST['qty_pestisida'] ?? null,
            'catatan'         => $_POST['catatan'] ?? null,
            'status'          => 'pending'
        ];

        $laporan_id = $model->insert($data);

        if (!empty($_POST['tool_id'])) {
            require_once 'Models/ReportTool_Model.php';
            $toolModel = new ReportTool_Model();
            $toolModel->insertTools($laporan_id, $_POST['tool_id']);
        }

        header('Location: /PalmTrack/karyawan/laporan/history');
        exit;
    }
}
