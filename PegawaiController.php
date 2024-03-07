<?php
include_once 'PegawaiModel.php';

class PegawaiController {
    public function index() {
        $pegawaiModel = new PegawaiModel();
        $dataPegawai = $pegawaiModel->getData();
        include 'view/pegawai/index.php';
    }

    public function tambah() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = $_POST["nama"];
            $umur = $_POST["umur"];
            $jabatan = $_POST["jabatan"];

            $pegawaiModel = new PegawaiModel();
            $success = $pegawaiModel->tambahData(["nama" => $nama, "umur" => $umur, "jabatan" => $jabatan]);

            if ($success) {
                header("Location: index.php?controller=pegawai&action=index");
                exit;
            } else {
                echo "Gagal menambah data pegawai.";
            }
        } else {
            include 'view/pegawai/tambah.php';
        }
    }

    public function edit() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $nama = $_POST["nama"];
            $umur = $_POST["umur"];
            $jabatan = $_POST["jabatan"];

            $pegawaiModel = new PegawaiModel();
            $success = $pegawaiModel->editData($id, ["nama" => $nama, "umur" => $umur, "jabatan" => $jabatan]);

            if ($success) {
                header("Location: index.php?controller=pegawai&action=index");
                exit;
            } else {
                echo "Gagal mengedit data pegawai.";
            }
        } else {
            echo "ID pegawai tidak ditemukan.";
        }
    }

    public function hapus() {
        $id = $_GET["id"];
        $pegawaiModel = new PegawaiModel();
        $success = $pegawaiModel->hapusData($id);

        if ($success) {
            header("Location: index.php?controller=pegawai&action=index");
            exit;
        } else {
            echo "Gagal menghapus data pegawai.";
        }
    }
}
?>
