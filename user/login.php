<?php
session_start();
error_reporting(1);
if($_SESSION['status'] == 'login'){
	header('Location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/login.css">
    <title>Login page</title>
</head>
<body>
	<?php 
			if (isset($_GET['pesan'])) {
				$pesan = $_GET['pesan'];
				if ($pesan == 'register berhasil') {
					echo '<script>
                    alert("Registrasi berhasil");
					</script>';
				}elseif ($pesan == 'pass incorrect') {
					echo '<script>
						alert("Konfirmasi password salah!!")
					</script>';
				}
			}
	?>

<div class="container">
	<div class="text">
		<img src="../assets/images/logo.png" alt="" width="100%">
        <div class="header-text">
        </div>
	</div>
    <div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form action="proses_signup.php" method="POST">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="username" placeholder="Input Username" required="">
					<input type="password" name="password" placeholder="Input Password" required="">
					<input type="password" name="password2" placeholder="Confirm Password" required="">
					<button type="submit">Sign up</button>
					<a href="../admin/index.php">apakah anda admin</a>
				</form>
			</div>

			<div class="login" id=""login>
				<form action="proses_login.php" method="POST">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="text" name="username" placeholder="Input Username" required="">
					<input type="password" name="password" placeholder="Input Password" required=""><span><i id="toggler" class="fa fa-eye"></i></span>
					<button type="submit">Login</button>
					<button type="reset">Batal</button>
				</form>
			</div>
	</div>
</div>
</body>
</html>