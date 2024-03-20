<?php
	session_start();
	include 'koneksi.php';
?>

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
			<li ><a href="home-user.php">Home</a></li>
			<li class="active"><a href="formulir.php">Pendaftaran</a></li>
			<li><a href="keluar-user.php">Logout</a></li>
		</ul>
		</div>
	</header>

	<!-- label -->
    <section class="label">
        <div class="container">
            <p>Home / Pengumuman</p>
        </div>
    </section>

	<div class="container">
		<button type="button" class="btn" onclick="window.location = 'formulir.php'">Back</button> 
	</div>

	<!-- content -->
	<div class="section">
		<div class="container">
			<div class="box">
				<?php
				$e = mysqli_query($conn,"SELECT akun.email,akun.id_pendaftar,n.keterangan,n.catatan,tb_petugas.nm_petugas
				FROM tb_nilai AS n
				JOIN akun ON(n.id_pendaftar = akun.id_pendaftar)
				JOIN tb_petugas ON (tb_petugas.id_petugas = n.id_petugas)
				WHERE akun.email='".$_SESSION['email']."'");
				$d = mysqli_fetch_object($e);
				if($d->keterangan == ''){
					echo "Kami masih meninjau datamu";
				}elseif($d->keterangan == 'Tidak Lulus'){
					echo "Mohon maaf Anda kami nyatakan TIDAK LULUS seleksi di SMKN 7 Yonaprama Banglitafi";
				}else{
					echo "Selamat Anda kami nyatakan LULUS seleksi di SMKN 7 Yonaprama Banglitafi";?></br><?php
					echo "Petugas : $d->nm_petugas";
				}
				?>
			</div>
	
</body>
</html>