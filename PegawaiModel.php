<?php
include_once 'config.php'; // termasuk file konfigurasi database

class PegawaiModel {
    private $conn;

    // Konstruktor untuk inisialisasi koneksi database
    public function __construct() {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->conn->connect_error) {
            die("Koneksi database gagal: " . $this->conn->connect_error);
        }
    }

    // Fungsi untuk mengambil data pegawai dari database
    public function getData() {
        $sql = "SELECT * FROM pegawai";
        $result = $this->conn->query($sql);

        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }

    // Fungsi untuk menambah data pegawai ke database
    public function tambahData($data) {
        $nama = $data['nama'];
        $umur = $data['umur'];
        $jabatan = $data['jabatan'];

        $sql = "INSERT INTO pegawai (nama, umur, jabatan) VALUES ('$nama', '$umur', '$jabatan')";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Fungsi untuk mengedit data pegawai di database berdasarkan ID
    public function editData($id, $data) {
        $nama = $data['nama'];
        $umur = $data['umur'];
        $jabatan = $data['jabatan'];

        $sql = "UPDATE pegawai SET nama='$nama', umur='$umur', jabatan='$jabatan' WHERE id='$id'";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Fungsi untuk menghapus data pegawai dari database berdasarkan ID
    public function hapusData($id) {
        $sql = "DELETE FROM pegawai WHERE id='$id'";
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
