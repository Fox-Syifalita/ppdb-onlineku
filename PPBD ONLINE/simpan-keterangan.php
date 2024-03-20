<?php

include 'koneksi.php';

$update = mysqli_query($conn, "UPDATE tb_nilai
    SET keterangan='".$_POST['keterangan']."',
        id_petugas=1,
        catatan='".$_POST['catatan']."'WHERE id_pendaftar='".$_POST['id_daftar']."'");

header("location:data-peserta.php");