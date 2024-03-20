<?php 
	session_start();	
	include 'koneksi.php';

	    $redirect = "";

	if (isset($_SESSION['is_data_student_exist'])) {
		$redirect = "<script> window.location='daftar_syarat.php'; </script>";
	}else{
		$redirect = "<script> window.location='daftar-siswa-baru.php'; </script>";
	}


	//check if button next is clicked
	if(isset($_POST['submit'])){



		//set all name attr and value to created variable
		foreach ($_POST as $key => $val) {
			${$key} = $val;
			$_SESSION[''.$key.''] = $val;
		}

        $query  =   "SELECT email FROM akun WHERE email='$email'";

        $exac   = mysqli_query($conn, $query);

        if ($exac) {
            $email_count = mysqli_num_rows($exac);
            if ($email_count > 0) {
                echo '<script>alert("Email sudah digunakan, silahkan gunakan email lain..")</script>';
            }else{
                $cost = 10;
                $hash = password_hash($password,PASSWORD_BCRYPT,["cost" => $cost]);

                $_SESSION['password'] = $hash;

                //check if session is not empty, then redirect to daftar_data_orangtua.php
                if (!empty($_SESSION)) {
                    echo $redirect;
                    print_r($_SESSION);
                }
            }
        }else{
            echo mysqli_error($conn);
        }   
	   
    }
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
					</div>

					<?php  
                            if (isset($_SESSION['is_data_student_exist'])) {
                            ?>
                            <button type="submit" name="submit" class="btn btn-primary pull-right">Back <i class="fa fa-arrow-right"></i></button>
                            <?php
                            }else{
                            ?>
								<button type="submit" name="submit" class="btn btn-primary pull-right">Next <i class="fa fa-arrow-right"></i></button>
                            <?php
                            }
                            ?>


				</form>

				
			</div>

			<!-- box footer -->
			<div class="box-footer text-center">
				<a href="index.php">Halaman Utama</a>
			</div>

		</div>

	</div>

</body>
</html>