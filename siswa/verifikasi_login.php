<?php
if(!isset($_COOKIE['username'])){
	header("Location:../index.php");
}
if($_COOKIE['tingkat']!='siswa'){
	header("Location:../index.php");
}
?>