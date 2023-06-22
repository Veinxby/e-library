<?php
include '../Koneksi/koneksi.php';

if(!isset($_GET['nama'])) {
    header('location:index.php');
}
    
$nama = $_GET['nama'];

$sql = "SELECT * FROM daftar_buku WHERE nama_buku = '$nama'";
$query = mysqli_query($koneksi, $sql);
$baris = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>E-Library</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../assets/css/e-library.css">

  </head>
  <body>
  
<div class="page-content">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail</li>
    </ol>
    </nav>
    <div class="heading-section">
        <h4><em>Books</em> Detail</h4>
    </div>

     <!-- modal produk -->
    <div class="row popup">
        <div class="col-lg-12">
        <div class="main-profile ">
            <div class="row">
                <div class="col-lg-4">
                    <img src="<?= '../assets/images/books/' . $baris ['cover'] ?>" alt="" style="border-radius: 23px;">
                </div>
                <div class="col-lg-4 align-self-center">
                    <div class="main-info header-text">
                      <span><?= $baris ['genre'] ?></span>
                      <h4><?= $baris ['nama_buku'] ?></h4>
                      <p>Berkisah tentang kerajaan adapati yang merupakan kerajaan terkuat</p>
                    <div class="main-border-button">
                        <a href="#">Read</a>
                        <a href="#">Download</a>
                    </div>
                </div>
                  </div>
                  <div class="col-lg-4 align-self-center">
                    <ul>
                      <li>Book Downloaded <span>3</span></li>
                      <li>Rating <span><?= $baris ['rate'] ?></span></li>
                      <li>Seen <span><?= $baris ['seen'] ?>k</span></li>
                      <li>Age <span>18+</span></li>
                    </ul>
                  </div>
                </div>
                <h5 class="rate-head">Rate this book</h5>
                <div id="full-stars-example-two">
                    <div class="rating-group">
                        <input disabled checked class="rating__input rating__input--none" name="rating3" id="rating3-none" value="0" type="radio">
                        <label aria-label="1 star" class="rating__label" for="rating3-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                        <input class="rating__input" name="rating3" id="rating3-1" value="1" type="radio">
                        <label aria-label="2 stars" class="rating__label" for="rating3-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                        <input class="rating__input" name="rating3" id="rating3-2" value="2" type="radio">
                        <label aria-label="3 stars" class="rating__label" for="rating3-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                        <input class="rating__input" name="rating3" id="rating3-3" value="3" type="radio">
                        <label aria-label="4 stars" class="rating__label" for="rating3-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                        <input class="rating__input" name="rating3" id="rating3-4" value="4" type="radio">
                        <label aria-label="5 stars" class="rating__label" for="rating3-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                        <input class="rating__input" name="rating3" id="rating3-5" value="5" type="radio">
                    </div>
            </div>
        </div>
    </div>
          <!-- end modal produk --> 
                 
</div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright © 2023 <a href="#">E-Library</a> Company. All rights reserved. 
                    
                    <br>Design: <a href="" target="_blank" title="free CSS templates">ASE56</a></p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>