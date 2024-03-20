<?php 
	include 'koneksi.php';

	$peserta = mysqli_query($conn, "SELECT * FROM tb_pendaftar 
		WHERE id_pendaftar = '".$_POST['id_daftar']."' ");

	$p = mysqli_fetch_object($peserta);

	$ortu = mysqli_query($conn, "SELECT * FROM tb_ortu
		WHERE id_pendaftar = '".$_POST['id_daftar']."' ");

	$o = mysqli_fetch_object($ortu);

	$asalsklh = mysqli_query($conn, "SELECT * FROM tb_asal_sekolah 
		WHERE id_pendaftar = '".$_POST['id_daftar']."' ");

	$a = mysqli_fetch_object($asalsklh);

	$nilai = mysqli_query($conn, "SELECT * FROM tb_nilai 
		WHERE id_pendaftar = '".$_POST['id_daftar']."' ");

	$n = mysqli_fetch_object($nilai);
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Penerimaan Siswa Baru</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
	<script>
		window.print();
	</script>
</head>
<body>

	<div class="section">
	<div class="container">
	<h2>Bukti Pendaftaran</h2>
	<h3>Data Pribadi</h3>
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

	<h3>Data Orang Tua</h3>
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

	<h3>Data Asal Sekolah</h3>
	<table class="table-data" border="0">
		<tr>
			<td>NPSN<td>:	<?php echo $a->npsn ?></td>
		</tr>
		<tr>
			<td>Asal Sekolah<td>:	<?php echo $a->asal_sekolah ?></td>
		</tr>
		<tr>
	</table>

	<h3>Data Nilai Rapot</h3>
	<table class="table-data" border="0">
		<tr>
			<td>Bahasa Indonesia<td>:	<?php echo $n->b_indonesia ?></td>
		</tr>
		<tr>
			<td>Bahasa Inggris<td>:	<?php echo $n->b_inggris ?></td>
		</tr>
		<tr>
			<td>Matematika<td>:	<?php echo $n->matematika ?></td>
		</tr>
	</table>

	</div>
	</div>
</body>
</html>