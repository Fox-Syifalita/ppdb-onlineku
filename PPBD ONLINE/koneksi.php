<?php 	
	
	// Membuat koneksi database
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db   = 'ppdb_online';

	$conn = mysqli_connect($host, $user, $pass, $db);

	if(!$conn){
		echo 'Error : '.mysqli_connect_error($conn);
	}

?>