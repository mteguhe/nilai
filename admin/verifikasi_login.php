<?php
if(!isset($_SESSION['username'])){
	header("Location:../index.php");
}
if($_SESSION['tingkat']!='admin'){
	header("Location:../index.php");
}
?>