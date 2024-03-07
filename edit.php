<!-- Form untuk mengedit data pegawai -->
<form action="index.php?controller=pegawai&action=edit" method="post">
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
    <label for="nama">Nama:</label><br>
    <input type="text" id="nama" name="nama" value=""><br>
    <label for="umur">Umur:</label><br>
    <input type="text" id="umur" name="umur" value=""><br>
    <label for="jabatan">Jabatan:</label><br>
    <input type="text" id="jabatan" name="jabatan" value=""><br>
    <input type="submit" value="Edit">
</form>
