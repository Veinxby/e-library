<?php
include'../koneksi/koneksi.php';

if (!isset($_GET['id'])){
    header('Location:../index.php');
}

$id = $_GET['id'];

$sql = "SELECT * FROM daftar_buku WHERE id_buku = '$id'";
$query = mysqli_query($koneksi, $sql);
$baris = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Form Tambah Data</h1>
        <form action="proses-edit.php" method="post">
            <table>
            <tr>
                <td>ID Buku</td>
                <td>:</td>
                <td><input type="text" name="id" id="id" value="<?= $baris['id_buku'] ?>"></td>
            </tr>
            <tr>
                <td>Nama Buku</td>
                <td>:</td>
                <td><input type="text" name="nama" id="" value="<?= $baris['nama_buku'] ?>"></td>
            </tr>
            <tr>
                <td>Penerbit</td>
                <td>:</td>
                <td><input type="text" name="penerbit" id="" value="<?= $baris['penerbit'] ?>"></td>
            </tr>
            <tr>
                <td>Genre</td>
                <td>:</td>
                <td><input type="text" name="genre" id="" value="<?= $baris['genre'] ?>"></td>
            </tr>
            <tr>
                <td>Seen</td>
                <td>:</td>
                <td><input type="text" name="seen" id="" value="<?= $baris['seen'] ?>"></td>
            </tr>
            <tr>
                <td>Rate</td>
                <td>:</td>
                <td><input type="text" name="rate" id="" value="<?= $baris['rate'] ?>"></td>
            </tr>
            </table>
            <label for="">Gambar</label>
            <input type="file" name="cover" id="cover" value="<?= $baris['cover'] ?>">
            <tr>
                <br>
            <input type="submit" id="simpan">
        </form>

    
</body>
</html>