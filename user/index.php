<?php
include '../Koneksi/koneksi.php';

        session_start();
        if($_SESSION['status'] != 'login'){
            header("Location:login.php");
        }

        if (isset($_POST['cari'])) {
            $keyword = $_POST['searchKeyword'];
            $sql = "SELECT * FROM daftar_buku WHERE id_buku = '$keyword' OR nama_buku like '%$keyword%'";
        }elseif (isset($_GET['genre'])) {
          $genre = $_GET['genre'];
          $sql = "SELECT * FROM daftar_buku WHERE genre like '%$genre%'";
        }else {
            $sql = "SELECT * FROM daftar_buku";
        }
        $query = mysqli_query($koneksi, $sql);
        $row = mysqli_fetch_all($query, MYSQLI_BOTH);
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
    <link rel="stylesheet" href="../assets/css/owl.css">
    <link rel="stylesheet" href="../assets/css/animate.css">

  </head>

<body>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.php" class="logo">
                        <img src="../assets/images/logo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->

                    <!-- ***** Search End ***** -->
                    <div class="search-input">
                      <form id="search" method="post">
                        <input type="text" placeholder="Search book" id='cari' name="searchKeyword"  />
                        <button type="submit" name="cari" class="btn btn-default">
                          <i class="fa fa-search"></i>
                        </button>
                      </form>
                    </div>
                    <!-- ***** Search End ***** -->

                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="index.php" class="active">Home</a></li>
                        <li class="dropdown">
                          <a class="nav-link  dropdown-toggle" href="#"  data-bs-toggle="dropdown">  Genre  </a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="index.php" name=""> All Genre </a></li>
                              <li><a class="dropdown-item" href="index.php?genre=fantasy" name="genre"> Fantasy </a></li>
                              <li><a class="dropdown-item" href="index.php?genre=legenda"  name="genre"> Legenda </a></li>
                              <li><a class="dropdown-item" href="index.php?genre=romance" name="genre"> Romance </a></li>
                              <li><a class="dropdown-item" href="index.php?genre=horor" name="genre"> Horror </a></li>
                              <li><a class="dropdown-item" href="index.php?genre=mistery" name="genre"> Mistery </a></li>
                              <li><a class="dropdown-item" href="index.php?genre=thriller" name="genre"> Thriller </a></li>
                            </ul>
                        </li>
                        <li><a href="contact.php" >Contact</a></li>
                        <li class="logout"><a href="logout.php">Logout <img src="assets/images/profile-header.jpg" alt=""></a></li>
                    </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

          <!-- ***** Banner Start ***** -->
          <div class="main-banner">
            <div class="row">
              <div class="col-lg-7">
                <div class="header-text">
                  <h6>Welcome To E-Library</h6>
                  <h4><em>Browse</em> Our Popular Books Here</h4>
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Banner End ***** -->
          
          <!-- ***** Most Popular Start ***** -->
          <div class="most-popular">
            <div class="row">
              <div class="col-lg-12">
                <div class="heading-section">
                  <h4><em>Books</em> List</h4>
                </div>
                <div class="row">
                <?php
                      foreach ($row as $baris) { ?>
                  <div class="col-lg-3 col-sm-6">
                    <div class="item" >
                    
                      <img src="<?= '../assets/images/books/' . $baris ['cover'] ?>" alt="" style="
                      @media (max-width:576px){
                      width: 190px; 
                      height: 150px;
                      }">
                      <h4><a href="detail.php?nama=<?= $baris ['nama_buku'] ?>"><?= $baris ['nama_buku'] ?></a><br><span><?= $baris ['genre'] ?></span></h4>
                      <ul>
                        <li><i class="fa fa-star"></i> <?= $baris ['rate'] ?></li>
                        <li><i class="fa fa-eye"></i> <?= $baris ['seen'] ?>k</li>
                      </ul>                      
                    </div>
                    
                  </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Most Popular End ***** -->

        </div>
      </div>
    </div>
  </div>



  <?php 
        if (isset($_GET['pesan'])) {
            $pesan = $_GET['pesan'];
            if ($pesan == 'tambah') {
                echo "Data berhasil ditambah";
            }elseif ($pesan == 'update') {
                echo "Data berhasil diupdate";
            }elseif ($pesan == 'hapus') {
                echo "Data berhasil dihapus";
            }elseif ($pesan == 'Login berhasil'){
                echo '<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content text-bg-dark">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="staticBackdropLabel">Login Berhasil</h1>
                      <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                  </div>
                </div>
              </div>';
            }else {
                echo "Data gagal";
            }
        }
    ?>
  
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

  <script type="text/javascript">
    
    function myFunction() {
      location.replace("contact.php")
    }

    window.onload = function () {
        OpenBootstrapPopup();
    };
    function OpenBootstrapPopup() {
        $("#staticBackdrop").modal('show');
    }
  </script>

  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

  <script src="../assets/js/isotope.min.js"></script>
  <script src="../assets/js/owl-carousel.js"></script>
  <script src="../assets/js/tabs.js"></script>
  <script src="../assets/js/popup.js"></script>
  <script src="../assets/js/custom.js"></script>

  </body>

</html>
