<?php

include '../Koneksi/koneksi.php';

    $id = htmlspecialchars($_POST['id']);
    $nama = htmlspecialchars($_POST['nama']);
    $penerbit = htmlspecialchars($_POST['penerbit']);
    $genre = htmlspecialchars($_POST['genre']);
    $seen = htmlspecialchars($_POST['seen']);
    $rate = htmlspecialchars($_POST['rate']);

    $upload_dir = '../assets/images/books/';
    $cover = $_FILES['cover']['name'];   
    $upload_file = $upload_dir.basename($_FILES['cover']['name']);
    $imageType = strtolower(pathinfo($upload_file,PATHINFO_EXTENSION));
    $check = $_FILES['cover']['size'];
    $upload_ok = 0;

    if ($check !== false) {
        $upload_ok = 1;
        if ($imageType == 'jpg' || $imageType == 'png' || $imageType == 'gif') {
            $upload_ok = 1;
        }else{
            echo '<script>alert("pls ganti format img")</script>';
            
        }
    }else{
        echo '<script>alert("The photo size 0s")</script>';
        $upload_ok = 0;
    }


    if ($upload_ok == 0) {
        echo '<script>alert("sorry file tidak ada")</script>';
    }else{
        move_uploaded_file($_FILES['cover']['tmp_name'], $upload_file);

        $sql = "SELECT * FROM daftar_buku WHERE id_buku='$id'";
        $query = mysqli_query($koneksi, $sql);
        $baris = mysqli_fetch_array($query);
        $row = mysqli_num_rows($query);
            if ($row > 0) {
                header("Location:index.php?pesan=Id $baris[id_buku] sudah ada");
            }else{
                $sql_insert = "INSERT INTO daftar_buku VALUES('$id', '$nama','$penerbit', '$genre', '$cover', '$seen', '$rate')";
                $query_insert = mysqli_query($koneksi,$sql_insert);

                if ($query_insert){
                
                    header('location:index.php?pesan=tambah');
                }else{
                    echo "Data gagal disimpan";
                    header('location:tambah_data.php');
                }
            }
    }