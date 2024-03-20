<?php 
	session_start();
	include 'koneksi.php';
	if($_SESSION['status_login'] != true ){
		echo '<script>window.location="login.php"</script>';
	}

	$peserta = mysqli_query($conn, "SELECT * FROM tb_pendaftar
		WHERE id_pendaftar = '".$_GET['id']."'");

	$p = mysqli_fetch_object($peserta);

	$nilai = mysqli_query($conn, "SELECT * FROM tb_nilai
		WHERE id_pendaftar = '".$_GET['id']."'");

	$n = mysqli_fetch_object($nilai);

	$ortu = mysqli_query($conn, "SELECT * FROM tb_ortu
		WHERE id_pendaftar = '".$_GET['id']."'");

	$o = mysqli_fetch_object($ortu);

	$asalsklh = mysqli_query($conn, "SELECT * FROM tb_asal_sekolah
		WHERE id_pendaftar = '".$_GET['id']."'");

	$a = mysqli_fetch_object($asalsklh);
 ?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PSB Online | Administrator</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>

	<!-- bagia header -->
	<header>
		<div class="container">
		<h1><a href="beranda.php">SMKN 7 Yonaprama Banglitafi</a></h1>
		<ul>
			<li><a href="beranda.php">Home</a></li>
			<li class="active"><a href="data-peserta.php">Data Peserta</a></li>
			<li><a href="keluar.php">Logout</a></li>
		</ul>
		</div>
	</header>

	<!-- bagian content -->
	<div class="section">
	<section class="container">
		<h4><b>A. DATA PRIBADI</b></h4>
		<div class="box">
			<table class="table-data" border="0">
				<tr>
					<td>Kode Pendaftaran<td>:	<?php echo $p->id_pendaftar ?></td>
				</tr>
				<tr>
					<td>Tahun Ajaran<td>:	<?php echo $p->th_ajaran ?></td>
				</tr>
				<tr>
					<td>Jurusan<td>:	<?php echo $p->jurusan ?></td>
				</tr>
				<tr>
					<td>NISN<td>:	<?php echo $p->nisn ?></td>
				</tr>
				<tr>
					<td>NIK<td>:	<?php echo $p->nik ?></td>
				</tr>
					<td>Nama Lengkap<td>:	<?php echo $p->nm_peserta ?></td>
				</tr>
				<tr>
					<td>Tempat, Tanggal Lahir<td>:	<?php echo $p->tmp_lahir.', '.$p->tgl_lahir ?></td>
				</tr>
				<tr>
					<td>Jenis Kelamin<td>:	<?php echo $p->jk ?></td>
				</tr>
				<tr>
					<td>Agama<td>:	<?php echo $p->agama ?></td>
				</tr>
				<tr>
					<td>Alamat<td>:	<?php echo $p->alamat_peserta ?></td>
				</tr>
				<tr>
					<td>NoHP<td>:	<?php echo $p->telepon ?></td>
				</tr>
			</table>

		</div>
	</div>
	</section>

	<!-- bagian content -->
	<div class="section">
	<section class="container">
		<h4><b>B. DATA ORTU</b></h4>
		<div class="box">
			<table class="table-data" border="0">
				<tr>
					<td>NIK Ayah<td>:	<?php echo $o->nik_ayah ?></td>
				</tr>
				<tr>
					<td>Nama Ayah<td>:	<?php echo $o->nama_ayah ?></td>
				</tr>
				<tr>
					<td>Pendidikan Ayah<td>:	<?php echo $o->pendidikan_ayah ?></td>
				</tr>
				<tr>
					<td>Pekerjaan Ayah<td>:	<?php echo $o->pekerjaan_ayah ?></td>
				</tr>
				<tr>
					<td>Penghasilan Ayah<td>:	<?php echo $o->penghasilan_ayah ?></td>
				</tr>
					<td>No Telepon Ayah<td>:	<?php echo $o->telepon_ayah ?></td>
				</tr>
				<tr>
					<td>NIK Ibu<td>:	<?php echo $o->nik_ibu ?></td>
				</tr>
				<tr>
					<td>Nama Ibu<td>:	<?php echo $o->nama_ibu ?></td>
				</tr>
				<tr>
					<td>Pendidikan Ibu<td>:	<?php echo $o->pendidikan_ibu ?></td>
				</tr>
				<tr>
					<td>Pekerjaan Ibu<td>:	<?php echo $o->pekerjaan_ibu ?></td>
				</tr>
				<tr>
					<td>Penghasilan Ibu<td>:	<?php echo $o->penghasilan_ibu ?></td>
				</tr>
					<td>No Telepon Ibu<td>:	<?php echo $o->telepon_ibu ?></td>
				</tr>
			</table>
		</div>
	</div>
	</section>

	<!-- bagian content -->
	<div class="section">
	<section class="container">
		<h4><b>C. DATA ASAL SEKOLAH</b></h4>
		<div class="box">
			<table class="table-data" border="0">
				<tr>
					<td>NPSN<td>:	<?php echo $a->npsn ?></td>
				</tr>
				<tr>
					<td>Asal Sekolah<td>:	<?php echo $a->asal_sekolah ?></td>
				</tr>
				<tr>
			</table>
		</div>
	</div>
	</section>


	<!-- bagian content -->
	<div class="section">
	<section class="container">
		<form action="simpan-keterangan.php" method="post">
		<h4><b>D. DATA NILAI</b></h4>
		<div class="box">
			<table class="table-data" border="0">
				<tr>
					<td>Bahasa Indonesia<td>: <?php echo $n->b_indonesia ?></td>
				</tr>
				<tr>
					<td>Bahasa Inggris<td>:	<?php echo $n->b_inggris ?></td>
				</tr>
				<tr>
					<td>Matematika<td>:	<?php echo $n->matematika ?></td>
				</tr>
				<tr>
					<td>Hasil</td>
					<td>:</td>
					<td>
						<select class="input-control" name="keterangan" required>
							<option value="Lulus">LULUS</option>
							<option value="Tidak Lulus">TIDAK LULUS</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Note</td>
					<td>:</td>
					<td>
						<input type="hidden" name="id_daftar" value='<?php echo $n->id_pendaftar?>' class="input-control"><input type="text" name="catatan" class="input-control">
						<button type="button" class="btn" onclick="window.location = 'data-peserta.php'">Back</button> 
						<button type="submit" class="btn btn-primary" name="btn-simpan">Save</button>
					</td>
				</tr>
			</table>
		</div>
	</div>
	</form>	
	</section>
</body>
</html>