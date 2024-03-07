<?php
include_once 'config.php'; // Termasuk file konfigurasi database

class KontrakModel {
    private $conn;

    // Konstruktor untuk inisialisasi koneksi database
    public function __construct() {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->conn->connect_error) {
            die("Koneksi database gagal: " . $this->conn->connect_error);
        }
    }

    // Fungsi untuk mengambil data kontrak dari database
    public function getData() {
        $sql = "SELECT * FROM kontrak";
        $result = $this->conn->query($sql);

        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }

    // Fungsi untuk menambah data kontrak ke database
    public function tambahData($data) {
        $nama_kontrak = $data['nama_kontrak'];
        // Ganti 'nama_field_lain' dengan nama field lain yang ada pada tabel kontrak

        $sql = "INSERT INTO kontrak (nama_kontrak) VALUES ('$nama_kontrak')";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Fungsi untuk mengedit data kontrak di database berdasarkan ID
    public function editData($id, $data) {
        $nama_kontrak = $data['nama_kontrak'];
        // Ganti 'nama_field_lain' dengan nama field lain yang ada pada tabel kontrak

        $sql = "UPDATE kontrak SET nama_kontrak='$nama_kontrak' WHERE id='$id'";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Fungsi untuk menghapus data kontrak dari database berdasarkan ID
    public function hapusData($id) {
        $sql = "DELETE FROM kontrak WHERE id='$id'";
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
