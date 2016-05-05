<?php
session_start();
if(isset($_SESSION['username'])){
	session_unset("username");
	session_unset("tingkat");
	header("Location:../index.php");
	//session_destroy();
	
}else{
	header("Location:../index.php");
}
?>