<?php
include '../Koneksi/koneksi.php';

$username = strtolower(stripcslashes($_POST['username']));
$password = mysqli_real_escape_string($koneksi, $_POST['password']);
$password2 = mysqli_real_escape_string($koneksi, $_POST['password2']);

// Cek konfirmasi password
if ($password !== $password2) {
    header('location:login.php?pesan=pass incorrect');
    return false;
}else{
    // enkripsi password
    echo 'pw gagal';
}


// tambahan data baru ke database
$query_insert = mysqli_query($koneksi, "INSERT INTO user VALUES('$username', '$password')");

if ($query_insert){
    header('location:login.php?pesan=register berhasil');
}else{
    header('location:login.php?pesan=register gagal');
}
