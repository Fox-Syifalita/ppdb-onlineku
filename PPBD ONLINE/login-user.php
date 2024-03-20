<?php 
	session_start();	
	include 'koneksi.php'
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Login | Peserta</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>

	<!-- page login -->
	<div class="page-login">
		
		<!-- box -->
		<div class="boxx box-login">
			
			<!-- box header -->
			<div class="box-header text-center">
			<h4 class="title">Login Peserta</h4>
			</div>

			<!-- box body -->
			<div class="box-body">
				
				<!-- form login -->
				<form action="" method="POST">
					
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" placeholder="Email" class="input-control" required>
					</div>

					<div class="form-group">
						<label>Password</label>
						<input type="password" name="pass" placeholder="Password" class="input-control" required>
						<a>Belum punya akun?<a href="daftar-user.php"> Klik disini</a>
					</div>
					
					<input type="submit" name="submit" value="Login" class="btn">

				</form>

				<?php 

					if(isset($_POST['submit'])){

						$email = mysqli_real_escape_string($conn, $_POST['email']);
						$pass = $_POST['pass'];

						$cek = mysqli_query($conn, "SELECT * FROM akun
							WHERE email = '".$email."' ");
						if (mysqli_num_rows($cek) > 0){

							$d = mysqli_fetch_object($cek);
							if($pass == $d->password){

								$_SESSION['status_login'] 	= true;
								$_SESSION['email'] 			= $d->email;

								echo "<script>window.location='home-user.php'</script>";

						} else {
							echo '<div class="alert alert-error">Password salah</div>';
						}

						} else {
							echo '<div class="alert alert-error">Username tidak ditemukan</div>';
						}
					}
				 ?>

		</div>
		<div class="box-footer text-center">
				<a href="index.php">Halaman Utama</a>
			</div>
	</div>

</body>
</html>