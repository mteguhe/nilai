<?php
session_start();
include('verifikasi_login.php');
include ('../koneksi.php');
include ('../db.php');

$query="delete from `data_kelas` where id_kelas='".$_GET['id_kelas']."'";
	mysql_query($query,$koneksi);
	header("Location:tambah_kelas.php");

?>
