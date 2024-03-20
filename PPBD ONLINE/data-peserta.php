<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PSB Online | Administrator</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
	<div class="container">
		<h4>Data Peserta</h4>
		<div class="box">
			<form action="" method="post">
				<a href="cetak-peserta.php" target="_blank" class="btn-cetak">Print</a>
				<div class="input-group">
					<input type="text" name="cari" placeholder="Masukkan data disini">
					<button input type="submit" name="btn-cari"><i class="fa fa-search"></i></button>
				</div>
			</form>
			<table class="table" border="1" align='center'>
				<thead>
					<tr>
						<th>No</th>
						<th>ID Pendaftaran</th>
						<th>Nama</th>
						<th width="160px">Jurusan</th>
						<th>B. Indo</th>
						<th>B. Ing</th>
						<th>MTK</th>
						<th>Hasil</th>
						<th width="200px">Note</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
						include 'koneksi.php';
						$no = 1;
						if(isset($_POST['btn-cari']))
						{
						$value = $_POST['cari'];
						$list_peserta = mysqli_query($conn, "SELECT p.id_pendaftar,p.nm_peserta,p.jurusan,n.b_indonesia,n.b_inggris,n.matematika,n.keterangan,n.catatan FROM tb_nilai AS n
						JOIN tb_pendaftar AS p ON(n.id_pendaftar = p.id_pendaftar)
						WHERE p.id_pendaftar LIKE '%$value%' or p.nm_peserta LIKE '%$value%' or p.jurusan LIKE '%$value%'
						or n.b_indonesia LIKE '%$value%' or n.b_inggris LIKE '%$value%' or n.matematika LIKE '%$value%'
						or n.keterangan LIKE '%$value%' or n.catatan LIKE '%$value%'");
						}else{
						$list_peserta = mysqli_query($conn, "SELECT p.id_pendaftar,p.nm_peserta,p.jurusan,n.b_indonesia,n.b_inggris,n.matematika,n.keterangan,n.catatan FROM tb_nilai AS n
						JOIN tb_pendaftar AS p ON(n.id_pendaftar = p.id_pendaftar);");}
						while($row = mysqli_fetch_array($list_peserta)) {
					 ?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $row['id_pendaftar'] ?></td>
						<td><?php echo $row['nm_peserta'] ?></td>
						<td><?php echo $row['jurusan'] ?></td>
						<td><?php echo $row['b_indonesia'] ?></td>
						<td><?php echo $row['b_inggris'] ?></td>
						<td><?php echo $row['matematika'] ?></td>
						<td><?php echo $row['keterangan'] ?></td>
						<td><?php echo $row['catatan'] ?></td>
						<td>
							<a href="detail-peserta.php?id=<?php echo $row['id_pendaftar'] ?>" title="Edit Data" class="text-orange"><i class="fa fa-edit"></i></a> 
							<a href="hapus-peserta.php?id=<?php echo $row['id_pendaftar'] ?>" onclick="return confirm('Yakin Hapus?')" title="Hapus Data" class="text-red"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	</div>
	</section>

</body>
</html>