<?php
include_once 'KontrakModel.php';

class KontrakController {
    public function index() {
        $kontrakModel = new KontrakModel();
        $dataKontrak = $kontrakModel->getData();
        include 'view/kontrak/index.php';
    }

    public function tambah() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama_kontrak = $_POST["nama_kontrak"];

            $kontrakModel = new KontrakModel();
            $success = $kontrakModel->tambahData(["nama_kontrak" => $nama_kontrak]);

            if ($success) {
                header("Location: index.php?controller=kontrak&action=index");
                exit;
            } else {
                echo "Gagal menambah data kontrak.";
            }
        } else {
            include 'view/kontrak/tambah.php';
        }
    }

    public function edit() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $nama_kontrak = $_POST["nama_kontrak"];

            $kontrakModel = new KontrakModel();
            $success = $kontrakModel->editData($id, ["nama_kontrak" => $nama_kontrak]);

            if ($success) {
                header("Location: index.php?controller=kontrak&action=index");
                exit;
            } else {
                echo "Gagal mengedit data kontrak.";
            }
        } else {
            echo "ID kontrak tidak ditemukan.";
        }
    }

    public function hapus() {
        $id = $_GET["id"];
        $kontrakModel = new KontrakModel();
        $success = $kontrakModel->hapusData($id);

        if ($success) {
            header("Location: index.php?controller=kontrak&action=index");
            exit;
        } else {
            echo "Gagal menghapus data kontrak.";
        }
    }
}
?>
