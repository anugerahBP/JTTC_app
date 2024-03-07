<?php
$id = $_GET["id"];
$pegawaiModel = new PegawaiModel();
$success = $pegawaiModel->hapusData($id);

if ($success) {
    // Redirect ke halaman index setelah berhasil menghapus data
    header("Location: index.php?controller=pegawai&action=index");
    exit;
} else {
    echo "Gagal menghapus data pegawai.";
}
?>
