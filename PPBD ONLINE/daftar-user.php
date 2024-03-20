<?php 
	session_start();	
	include 'koneksi.php';

$alert = '';

if(isset($_SESSION['role'])){
	header("location:index.php");
}

if(isset($_POST['btn-daftar']))
{
 $email = mysqli_real_escape_string($conn,$_POST['email']);
 $password = mysqli_real_escape_string($conn,$_POST['pass']);

 //cek apakah email sudah pernah digunakan
$lihat1 = mysqli_query($conn,"select * from akun where email='$email'");
$lihat2 = mysqli_num_rows($lihat1);
 
if($lihat2 < 1){
    //email belum pernah digunakan
    $insert = mysqli_query($conn,"insert into akun (email,password) values ('$email','$password')");
        
        //eksekusi query
        if($insert){
            echo "<div class='alert alert-success'>Berhasil mendaftar, silakan login.</div>
            <meta http-equiv='refresh' content='2; url= login-user.php'/>  ";
        } else {
            //daftar gagal
            echo "<div class='alert alert-warning'>Gagal mendaftar, silakan coba lagi.</div>
            <meta http-equiv='refresh' content='2'>";
        }

    }
 else
    {
    //jika email sudah pernah digunakan
    $alert = '<strong><font color="red">Email sudah pernah digunakan</font></strong>';
    echo '<meta http-equiv="refresh" content="2">';
    }
 
};




?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Daftar | Peserta</title>
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
				<h4 class="title">Data Account User</h4>
			</div>

			<!-- box body -->
			<div class="box-body">
				
				<!-- form login -->
				<form action="" method="POST">
					
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" placeholder="Email" class="input-control" required autofocus
                        value="<?php isset($_SESSION['email'])  ?  print($_SESSION['email']) : ""; ?>">
					</div>

					<div class="form-group">
						<label>Password</label>
						<input type="password" name="pass" placeholder="Password"class="input-control" required
                        value="<?php isset($_SESSION['password'])  ?  print($_SESSION['password']) : ""; ?>">
						<a>Sudah punya akun?<a href="login-user.php"> Login disini</a>
					</div>

					<?php  
                            if (isset($_SESSION['is_data_student_exist'])) {
                            ?>
                            <button type="submit" name="submit" class="btn btn-primary pull-right">Back <i class="fa fa-arrow-right"></i></button>
                            <?php
                            }else{
                            ?>
								<button type="submit" class="btn btn-primary" name="btn-daftar">Daftar</button>
                            <?php
                            }
                            ?>


				</form>

				
			</div>
			<div class="box-footer text-center">
				<a href="index.php">Halaman Utama</a>
			</div>
		</div>
	</div>

</body>
</html>