<?php
include_once 'JabatanPegawaiModel.php';

class JabatanPegawaiController {
    public function index() {
        $jabatanPegawaiModel = new JabatanPegawaiModel();
        $dataJabatanPegawai = $jabatanPegawaiModel->getData();
        include 'view/jabatan_pegawai/index.php';
    }

    public function tambah() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama_jabatan = $_POST["nama_jabatan"];

            $jabatanPegawaiModel = new JabatanPegawaiModel();
            $success = $jabatanPegawaiModel->tambahData(["nama_jabatan" => $nama_jabatan]);

            if ($success) {
                header("Location: index.php?controller=jabatan_pegawai&action=index");
                exit;
            } else {
                echo "Gagal menambah data jabatan pegawai.";
            }
        } else {
            include 'view/jabatan_pegawai/tambah.php';
        }
    }

    public function edit() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $nama_jabatan = $_POST["nama_jabatan"];

            $jabatanPegawaiModel = new JabatanPegawaiModel();
            $success = $jabatanPegawaiModel->editData($id, ["nama_jabatan" => $nama_jabatan]);

            if ($success) {
                header("Location: index.php?controller=jabatan_pegawai&action=index");
                exit;
            } else {
                echo "Gagal mengedit data jabatan pegawai.";
            }
        } else {
            echo "ID jabatan pegawai tidak ditemukan.";
        }
    }

    public function hapus() {
        $id = $_GET["id"];
        $jabatanPegawaiModel = new JabatanPegawaiModel();
        $success = $jabatanPegawaiModel->hapusData($id);

        if ($success) {
            header("Location: index.php?controller=jabatan_pegawai&action=index");
            exit;
        } else {
            echo "Gagal menghapus data jabatan pegawai.";
        }
    }
}
?>
