<?php
session_start();
include('verifikasi_login.php');
include ('../koneksi.php');
include ('../db.php');

$query="delete from `data_pelajaran` where id_pelajaran='".$_GET['id_pelajaran']."'";
	mysql_query($query,$koneksi);
	header("Location:tambah_pelajaran.php");

?>
