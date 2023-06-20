<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php    
    include '../Koneksi/koneksi.php';

    if(isset($_POST['cari'])){
        $keyword = $_POST['keyword'];
        $sql = "SELECT * FROM daftar_buku WHERE id_buku = '$keyword' OR nama_buku like '%$keyword%'";
    }else{
        $sql = "select * from daftar_buku";
    }
    $query = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_all($query, MYSQLI_BOTH);
   
    ?>
    <h1>Tabel Data Perpustakaan</h1>
    <?php 
    if (isset($_GET['pesan'])){
        $pesan = $_GET['pesan'];
        if ($pesan == 'tambah'){
            echo "Data Berhasil Ditambah";
        }elseif ($pesan == 'update'){
            echo "Data Berhasil Diupdate 😂";
        }elseif ($pesan =='hapus'){
            echo "Data Terhapus 😱😱😱";
        }else{
            echo "Data Gagal Diproses";
        }
    } ?>
    <form action="" method="post">
        <label for="cari">Cari</label>
        <input type="text" name="keyword" id="cari" autofocus autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form>
    <br>
<a href="tambah_data.php">::Tambah Data::</a>
    <table border=1>
       <tr>
        <td>ID Buku</td>
        <td>Nama Buku</td>
        <td>Penerbit</td>
        <td>Genre</td>
        <td>Cover</td>
        <td>Seen</td>
        <td>Rate</td>
        <td>Aksi</td>
       </tr>
       <?php
       foreach ($row as $baris) { ?>
       <tr>
        <td><?= $baris['id_buku'] ?></td>
        <td><?= $baris['nama_buku'] ?></td>
        <td><?= $baris['penerbit'] ?></td>
        <td><?= $baris['genre'] ?></td>
        <td><img src="<?= '../assets/images/books/' . $baris ['cover'] ?>" alt="" style="width: 50%" id="id_cover"></td>  
        <td><?= $baris['seen'] ?></td>
        <td><?= $baris['rate'] ?></td>
        <td>
            <button><a href="form-edit.php?id=<?= $baris['id_buku']?>">Edit</a></button>
            <button><a href="hapus.php?id=<?= $baris['id_buku']?>">Delete</a></button>
            <!-- <a href="">Edit</a> -->
            <!-- <a href="">Delete</a> -->
        </td>
       </tr>
       <?php }?>
    </table>
</body>
</html>