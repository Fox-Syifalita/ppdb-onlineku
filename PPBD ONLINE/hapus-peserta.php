<?php 
	include 'koneksi.php';

	if(isset($_GET['id'])){
		$delete_tb_pendaftar = mysqli_query($conn, "DELETE FROM tb_pendaftar 
			WHERE id_pendaftar = '".$_GET['id']."'");
		$delete_tb_nilai = mysqli_query($conn, "DELETE FROM tb_nilai 
			WHERE id_pendaftar = '".$_GET['id']."'");
		$delete_tb_ortu = mysqli_query($conn, "DELETE FROM tb_ortu 
			WHERE id_pendaftar = '".$_GET['id']."'");
		$delete_tb_asal_sekolah = mysqli_query($conn, "DELETE FROM tb_asal_sekolah
			WHERE id_pendaftar = '".$_GET['id']."'");
		$update_akun = mysqli_query($conn, "UPDATE akun SET id_pendaftar = ''
			WHERE id_pendaftar = '".$_GET['id']."'");
		echo '<script>window.location="data-peserta.php"</script>';
	}
 ?>