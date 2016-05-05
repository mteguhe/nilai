<?php
session_start();

include('verifikasi_login.php');
include ('../koneksi.php');
include ('../db.php');

include('header.php');
?>

<body>

<?php
include('sidebar.php')
?>
	
	<!-- Begin Content -->
	<div id="content">
	<h1 class="title">Welcome</h1>
	<div class="line"></div>
	
    <h1 align="center">SISTEM NILAI SEKOLAH</h1>
    
<?php
include('footer.php')
?>
