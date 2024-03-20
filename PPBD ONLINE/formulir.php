<?php 
	session_start();
	include 'koneksi.php';?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PSB Online | Peserta</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>

	<!-- bagian header -->
	<header>
		<div class="container">
		<h1>SMKN 7 Yonaprama Banglitafi</h1>
		<ul>
			<li><a href="home-user.php">Home</a></li>
			<li class="active"><a href="formulir.php">Pendaftaran</a></li>
			<li><a href="keluar-user.php">Logout</a></li>
		</ul>
		</div>
	</header>

	<!-- label -->
    <section class="label">
        <div class="container">
            <p>Home / Pendaftaran</p>
        </div>
    </section>

    <!-- content -->
    <section class="box-formulir">
    <?php
		include 'koneksi.php';
		$e = mysqli_query($conn, "SELECT * FROM akun WHERE email = '".$_SESSION['email']."' ");
		$email = mysqli_fetch_object($e);
		if ($email->id_pendaftar != NULL){?>
				<form action='cetak-bukti.php' method="post">
					<div class="box" align='center'>
					<input type="hidden" name="id_daftar" class="input-control" value="<?php echo $email->id_pendaftar;?>" readonly>
					<h3>Thanks <?php echo $_SESSION['email'] ?> ^-^</h3> <br>
					<p>Anda Sudah Melakukan Pendaftaran</p></br>
				</form>
				<button type="submit" class="btn btn-primary" name="btn-cetak-bukti-daftar">Cetak Bukti Pendaftaran</button> 
			<?php
			echo "";
		} else {}?>


	<?php
		$e = mysqli_query($conn, "SELECT * FROM akun WHERE email = '".$_SESSION['email']."' ");
		$email = mysqli_fetch_object($e);
		if ($email->id_pendaftar != NULL){?>
				<form action='pengumuman.php' method="post">
					<div align='center'>
					<input type="hidden" name="id_daftar" class="input-control" value="<?php echo $email->id_pendaftar;?>" readonly>
				</form>
				<button type="submit" class="btn btn-primary" name="btn-hasil">Lihat Hasil Pengumuman</button>
			<?php
			echo "";
		} else {?>
	</section>

	<div class="section">
		<h2 align="center"><b>Formulir Penerimaan Siswa Baru</b></h2>
		<div class="container">
	</div>
	</div>


	<!-- bagian box formulir -->
	<section class="box-formulir">
		<div class="box">
				<h4>Hello <?php echo $_SESSION['email'] ?> ^-^ Harap isikan formulir dengan benar, karena data tidak bisa ubah ketika sudah mendaftar</h4>
		</div>
	
		<?php
		include 'koneksi.php';
		$getMaxId = mysqli_query($conn, "SELECT MAX(RIGHT(id_pendaftar, 5)) AS id FROM tb_pendaftar");
		$d = mysqli_fetch_object($getMaxId);
		$getIdAkun = mysqli_query($conn, "SELECT Id as idakun From akun WHERE email='".$_SESSION['email']."'");
		$e = mysqli_fetch_object($getIdAkun);
		$generateId = 'P'.date('Y').sprintf("%05s", $d->id+$e->idakun);
		?>
	</section>
	
		<section class="box-formulir">
		<form action="berhasil.php" method="post">
			<div class="box">
				<table border="0" class="table-form">
					<tr>
						<td>Tahun Ajaran</td>
						<td>:</td>
						<td>
							<input type="hidden" name="id_daftar" class="input-control" value="<?php echo $generateId;?>" readonly>
							<input type="text" name="th_ajaran" class="input-control" value="2022/2023" readonly>
						</td>
					</tr>
					<tr>
						<td>Jurusan</td>
						<td>:</td>
						<td>
							<select class="input-control" name="jurusan" required>
								<option value="">--Pilih--</option>
								<option value="Teknik Kendaraan Ringan">Teknik Kendaraan Ringan</option>
								<option value="Teknik Pemesinan">Teknik Pemesinan</option>
								<option value="Teknik Komputer Jaringan">Teknik Komputer Jaringan</option>
								<option value="Multimedia">Multimedia</option>
							</select>
						</td>
					</tr>
				</table>
			</div>

			<h3>Data Pribadi</h3>
			<div class="box">
				<table border="0" class="table-form">
					<tr>
						<td>NISN</td>
						<td>:</td>
						<td>
							<input type="text" name="nisn" class="input-control" required>
						</td>
					</tr>
					<tr>
						<td>NIK</td>
						<td>:</td>
						<td>
							<input type="number" name="nik" class="input-control" required>
						</td>
					</tr>
					<tr>
						<td>Nama Lengkap</td>
						<td>:</td>
						<td>
							<input type="text" name="nm" class="input-control" required>
						</td>
					</tr>
					<tr>
						<td>Tempat Lahir</td>
						<td>:</td>
						<td>
							<input type="text" name="tmp_lahir" class="input-control "required>
						</td>
					</tr>
					<tr>
						<td>Tanggal Lahir</td>
						<td>:</td>
						<td>
							<input type="date" name="tgl_lahir" class="input-control" required>
						</td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td>
							<select class="input-control" name="jk" required>
								<option value="Laki-Laki">Laki-Laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Agama</td>
						<td>:</td>
						<td>
							<select class="input-control" name="agama">
								<option value="">--Pilih--</option>
								<option value="Islam">Islam</option>
								<option value="Kristen">Kristen</option>
								<option value="Hindu">Hindu</option>
								<option value="Buddha">Buddha</option>
								<option value="Katolik">Katolik</option>
								<option value="Khonghucu">Khonghucu</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Alamat Lengkap</td>
						<td>:</td>
						<td>
							<textarea class="input-control" name="alamat" required></textarea>
						</td>
					</tr>
					<tr>
						<td>NoHP</td>
						<td>:</td>
						<td>
							<input type="number" name="telp" class="input-control" required>
						</td>
					</tr>
				</table>
			</div>

		<!-- DATA AYAH -->

		<h3>Data Orang Tua</h3>
			<div class="box">
				<table border="0" class="table-form">
					<tr>
						<td>NIK Ayah</td>
						<td>:</td>
						<td>
							<input type="number" name="nik_ayah" class="input-control" required>
						</td>
					</tr>
					<tr>
						<td>Nama Ayah</td>
						<td>:</td>
						<td>
							<input type="text" name="nama_ayah" class="input-control "required>
						</td>
					</tr>
					<tr>
						<td>Pendidikan Ayah</td>
						<td>:</td>
						<td>
							<select class="input-control" name="pendidikan_ayah">
								<option value="">--Pilih--</option>
								<option value="SD">SD</option>
								<option value="SMP">SMP</option>
								<option value="SMA/SMK Sederajat">SMA/SMK Sederajat</option>
								<option value="S1 Sederajat">S1 Sederajat</option>
								<option value="S2">S2</option>
								<option value="S3">S3</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Pekerjaan Ayah</td>
						<td>:</td>
						<td>
							<select class="input-control" name="pekerjaan_ayah">
								<option value="Tidak Bekerja">Tidak Bekerja</option>
								<option value="PNS">PNS</option>
								<option value="Wiraswasta">Wiraswasta</option>
								<option value="Pegawai Swasta">Pegawai Swasta</option>
								<option value="Pekerja Harian Lepas">Pekerja Harian Lepas</option>
								<option value="TNI/Polri">TNI/Polri</option>
								<option value="Dokter">Dokter</option>
								<option value="Petani">Petani</option>
								<option value="Peternak">Peternak</option>
								<option value="Buruh">Buruh</option>
								<option value="Pensiun">Pensiun</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Penghasilan Ayah</td>
						<td>:</td>
						<td>
							<select class="input-control" name="penghasilan_ayah">
								<option value="< Rp 500.000">< Rp 500.000</option>
                                <option value="Rp 500.000 - Rp 1.500.000">Rp 500.000 - Rp 1.500.000</option>
                                <option value="Rp 1.500.000 - Rp 3.500.000">Rp 1.500.000 - Rp 3.500.000</option>
                                <option value="Rp 3.500.000 - Rp 5.000.000">Rp 3.500.000 - Rp 5.000.000</option>
                                <option value="Rp 5.000.000 - Rp 10.000.000">Rp 5.000.000 - Rp 10.000.000</option>
                                <option value="Rp 10.000.000 - Rp 20.000.000">Rp 10.000.000 - Rp 20.000.000</option>
                                <option value="> Rp 20.000.000">> Rp 20.000.000</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>No Telepon Ayah</td>
						<td>:</td>
						<td>
							<input type="number" name="telepon_ayah" class="input-control "required>
						</td>
					</tr>
				</table>
			</div>

		<!-- DATA IBU -->
			<div class="box">
				<table border="0" class="table-form">
					<tr>
						<td>NIK Ibu</td>
						<td>:</td>
						<td>
							<input type="number" name="nik_ibu" class="input-control" required>
						</td>
					</tr>
					<tr>
						<td>Nama Ibu</td>
						<td>:</td>
						<td>
							<input type="text" name="nama_ibu" class="input-control "required>
						</td>
					</tr>
					<tr>
						<td>Pendidikan Ibu</td>
						<td>:</td>
						<td>
							<select class="input-control" name="pendidikan_ibu">
								<option value="">--Pilih--</option>
								<option value="SD">SD</option>
								<option value="SMP">SMP</option>
								<option value="SMA/SMK Sederajat">SMA/SMK Sederajat</option>
								<option value="S1 Sederajat">S1 Sederajat</option>
								<option value="S2">S2</option>
								<option value="S3">S3</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Pekerjaan Ibu</td>
						<td>:</td>
						<td>
							<select class="input-control" name="pekerjaan_ibu">
								<option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
								<option value="PNS">PNS</option>
								<option value="Wiraswasta">Wiraswasta</option>
								<option value="Pegawai Swasta">Pegawai Swasta</option>
								<option value="Buruh">Buruh</option>
								<option value="TNI/Polri">TNI/Polri</option>
								<option value="Pensiun">Pensiun</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Penghasilan Ibu</td>
						<td>:</td>
						<td>
							<select class="input-control" name="penghasilan_ibu">
								<option value="< Rp 500.000">< Rp 500.000</option>
                                <option value="Rp 500.000 - Rp 1.500.000">Rp 500.000 - Rp 1.500.000</option>
                                <option value="Rp 1.500.000 - Rp 3.500.000">Rp 1.500.000 - Rp 3.500.000</option>
                                <option value="Rp 3.500.000 - Rp 5.000.000">Rp 3.500.000 - Rp 5.000.000</option>
                                <option value="Rp 5.000.000 - Rp 10.000.000">Rp 5.000.000 - Rp 10.000.000</option>
                                <option value="Rp 10.000.000 - Rp 20.000.000">Rp 10.000.000 - Rp 20.000.000</option>
                                <option value="> Rp 20.000.000">> Rp 20.000.000</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>No Telepon Ibu</td>
						<td>:</td>
						<td>
							<input type="number" name="telepon_ibu" class="input-control "required>
						</td>
					</tr>
				</table>
			</div>

		<h3>Data Sekolah Asal</h3>
			<div class="box">
				<table border="0" class="table-form">
					<tr>
						<td>NPSN</td>
						<td>:</td>
						<td>
							<input type="text" name="npsn" class="input-control" required>
						</td>
					</tr>
					<tr>
						<td>Asal Sekolah</td>
						<td>:</td>
						<td>
							<input type="text" name="sklh_asal" class="input-control "required>
						</td>
					</tr>
				</table>
			</div>

		<!-- bagian box formulir -->
		<h3>Nilai Rapot</h3>
		<?php
		include 'koneksi.php';
		$getMaxNilai = mysqli_query($conn, "SELECT MAX(RIGHT(id_nilai, 3)) AS idn FROM tb_nilai");
		$e = mysqli_fetch_object($getMaxNilai);
		$generateIdN = 'N'.date('Y').sprintf("%03s", $e->idn+1);
		?>
		<div class="box">
				<table border="0" class="table-form">
					<tr>
						<td>Bahasa Indonesia</td>
						<td>:</td>
						<td>
							<input type="hidden" name="id_n" value="<?php echo $generateIdN;?>" class="input-control" required>
							<input type="number" name="b_indonesia" class="input-control" required>
						</td>
					</tr>
					<tr>
						<td>Bahasa Inggris</td>
						<td>:</td>
						<td>
							<input type="number" name="b_inggris" class="input-control" required>
						</td>
					</tr>
					<tr>
						<td>Matematika</td>
						<td>:</td>
						<td>
							<input type="number" name="matematika" class="input-control" required>
						</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td>
					
							<button type="submit" class="btn btn-primary" name="btn-daftar">Daftar Sekarang</button>
						</td>
					</tr>
 			</div>
			 <?php
		};
			?>
			</form>
	</section>
</body>
</html>