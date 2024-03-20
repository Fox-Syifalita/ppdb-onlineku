<?php 
	session_start();
	include 'koneksi.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Penerimaan Siswa Baru</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>

	<!-- bagian box formulir -->
	<section class="box-formulir">
	<?php
	include 'koneksi.php';
	$insert = mysqli_query($conn, "INSERT INTO tb_pendaftar VALUES (
			'".$_POST['id_daftar']."',
			'".date('Y-m-d')."',
			'".$_POST['th_ajaran']."',
			'".$_POST['jurusan']."',
			'".$_POST['nm']."',
			'".$_POST['tmp_lahir']."',
			'".$_POST['tgl_lahir']."',
			'".$_POST['jk']."',
			'".$_POST['agama']."',
			'".$_POST['alamat']."',
			'".$_POST['nisn']."',
			'".$_POST['nik']."',
			'".$_POST['telp']."')");

	$insert = mysqli_query($conn, "INSERT INTO tb_asal_sekolah VALUES (
			'".$_POST['id_daftar']."',
			'".$_POST['npsn']."',
			'".$_POST['sklh_asal']."')");
	$insert = mysqli_query($conn, "INSERT INTO tb_nilai VALUES (
			'".$_POST['b_indonesia']."',
			'".$_POST['b_inggris']."',
			'".$_POST['matematika']."',
			'".$_POST['id_n']."',
			'".$_POST['id_daftar']."',
			'','',1)");
	$insert = mysqli_query($conn, "UPDATE akun SET id_pendaftar='".$_POST['id_daftar']."' WHERE email='".$_SESSION['email']."'");
	$insert = mysqli_query($conn,"INSERT INTO tb_ortu VALUES (
			'".$_POST['id_daftar']."',
			'".$_POST['nik_ayah']."',
			'".$_POST['nama_ayah']."',
			'".$_POST['pendidikan_ayah']."',
			'".$_POST['pekerjaan_ayah']."',
			'".$_POST['telepon_ayah']."',
			'".$_POST['penghasilan_ayah']."',
			'".$_POST['nik_ibu']."',
			'".$_POST['nama_ibu']."',
			'".$_POST['pendidikan_ibu']."',
			'".$_POST['pekerjaan_ibu']."',
			'".$_POST['telepon_ibu']."',
			'".$_POST['penghasilan_ibu']."')");
 ?>
	<form action="cetak-bukti.php" method="post">	
	<h2>Pendaftaran Berhasil</h2>
	<div class="container">
		<button type="button" class="btn" onclick="window.location = 'formulir.php'">Back</button> 
	</div>
	<div class="box">
		
		<h4>Kode pendaftaran Anda adalah <?php echo $_POST['id_daftar'];?></h4>
		<input type="hidden" name="id_daftar" class="input-control" value="<?php echo $_POST['id_daftar'];?>" readonly>
		<button type="submit" class="btn btn-primary" name="btn-cetak">Cetak Bukti Daftar</button>
	</div>
	</form>
	</section>

</body>
</html>