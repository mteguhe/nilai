<?php
if(!isset($_SESSION['username'])){
	header("Location:../index.php");
}
if($_SESSION['tingkat']!='guru'){
	header("Location:../index.php");
}
?>