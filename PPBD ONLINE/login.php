<!-- <?php 
	// session_start();	
	// include 'koneksi.php'
 ?> -->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Login | Admin</title>
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
				Login Admin
			</div>

			<!-- box body -->
			<div class="box-body">
				
				<!-- form login -->
				<form action="" method="POST">
					
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="user" placeholder="Username" class="input-control">
					</div>

					<div class="form-group">
						<label>Password</label>
						<input type="password" name="pass" placeholder="Password"class="input-control">
					</div>

					<input type="submit" name="submit" value="Login" class="btn">

				</form>

				<?php 
					include 'koneksi.php';
					if(isset($_POST['submit'])){

						$user = mysqli_real_escape_string($conn, $_POST['user']);
						$pass = $_POST['pass'];

						$cek = mysqli_query($conn, "SELECT * FROM tb_petugas 
							WHERE username = '".$user."' ");
						if (mysqli_num_rows($cek) > 0){

							$d = mysqli_fetch_object($cek);
							if($pass == $d->password){
							echo "<script>window.location='beranda.php'</script>";

						} else {
							echo '<div class="alert alert-error">Password salah</div>';
						}

						} else {
							echo '<div class="alert alert-error">Username tidak ditemukan</div>';
						}
					}
				 ?>

			</div>

			<!-- box footer -->
			<div class="box-footer text-center">
				<a href="index.php">Halaman Utama</a>
			</div>

		</div>

	</div>

</body>
</html>