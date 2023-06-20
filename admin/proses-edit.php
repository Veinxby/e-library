<?php
include '../Koneksi/koneksi.php';

if (!isset($_GET['id'])){
    header('location:index.php');
}

$id = $_POST['id'];
$nama = $_POST['nama'];
$penerbit = $_POST['penerbit'];
$genre= $_POST['genre'];
$seen= $_POST['seen'];
$rate= $_POST['rate'];

$gambarLama = $_POST['cover'];
$gambarBaru = $_FILES['cover']['name'];

//query untuk mengambil nama file gambar dari database
$query = mysqli_query($koneksi, "SELECT * FROM daftar_buku WHERE id_buku = '$id'");
$data = mysqli_fetch_array($query);
$nama_file = $data['cover'];

    unlink('../assets/images/books/' . $nama_file);

    $gambar = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($gambar, '../assets/images/books/' . $gambarBaru);

    
    $sql = "UPDATE daftar_buku SET nama_buku = '$nama', penerbit= '$penerbit', genre= '$genre', cover='$gambarBaru', seen= '$seen', rate= '$rate' WHERE id_buku = '$id'";
    $query_insert = mysqli_query($koneksi, $sql);
    if ($query_insert) {
        header('location: index.php?pesan=update');
    }
    
    $sql_insert = "INSERT INTO daftar_buku VALUES('$gambarBaru')";
    $query_insert = mysqli_query($koneksi, $sql_insert);


