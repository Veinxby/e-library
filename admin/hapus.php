<?php
include '../Koneksi/koneksi.php';

if(!isset($_GET['id'])) {
    header('location:index.php');
}

//ambil id gambar yang akan dihapus
$id = $_GET['id'];

//query untuk mengambil nama file gambar dari database
$query = mysqli_query($koneksi, "SELECT * FROM daftar_buku WHERE id_buku = '$id'");
$data = mysqli_fetch_array($query);
$nama_file = $data['cover'];

//hapus file gambar
unlink("../assets/images/books/" . $nama_file);

//query untuk menghapus data gambar dari database
$sql = "DELETE FROM daftar_buku WHERE id_buku='$id'";
$query = mysqli_query($koneksi, $sql);

if ($query) {
    header ('location:index.php?pesan=hapus');
}
