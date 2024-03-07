<?php
include_once 'config.php'; // Termasuk file konfigurasi database

class JabatanPegawaiModel {
    private $conn;

    // Konstruktor untuk inisialisasi koneksi database
    public function __construct() {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->conn->connect_error) {
            die("Koneksi database gagal: " . $this->conn->connect_error);
        }
    }

    // Fungsi untuk mengambil data jabatan pegawai dari database
    public function getData() {
        $sql = "SELECT * FROM jabatan_pegawai";
        $result = $this->conn->query($sql);

        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }

    // Fungsi untuk menambah data jabatan pegawai ke database
    public function tambahData($data) {
        $nama_jabatan = $data['nama_jabatan'];
        // Ganti 'nama_field_lain' dengan nama field lain yang ada pada tabel jabatan_pegawai

        $sql = "INSERT INTO jabatan_pegawai (nama_jabatan) VALUES ('$nama_jabatan')";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Fungsi untuk mengedit data jabatan pegawai di database berdasarkan ID
    public function editData($id, $data) {
        $nama_jabatan = $data['nama_jabatan'];
        // Ganti 'nama_field_lain' dengan nama field lain yang ada pada tabel jabatan_pegawai

        $sql = "UPDATE jabatan_pegawai SET nama_jabatan='$nama_jabatan' WHERE id='$id'";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Fungsi untuk menghapus data jabatan pegawai dari database berdasarkan ID
    public function hapusData($id) {
        $sql = "DELETE FROM jabatan_pegawai WHERE id='$id'";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Menutup koneksi database
    public function __destruct() {
        $this->conn->close();
    }
}
?>
