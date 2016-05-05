<?php
session_start();


include ('koneksi.php');
include ('db.php');

$querytahun="SELECT (`id_semester`) FROM semester";
$hasiltahun = mysql_query($querytahun) or die('Error, query failed. ' . mysql_error());
$tahun=0;
while($row = mysql_fetch_array($hasiltahun))
{
	$_SESSION['tahun_pelajaran']=$row['id_semester'];
}


$pengacak="kMzwAy87Aa";
$username=$_POST['username'];
$password=md5($pengacak . md5(htmlentities($_POST['password'])) . $pengacak );
$tingkat=$_POST['tingkat'];

if($tingkat=='admin'){
	 $query="SELECT * FROM user_admin WHERE username='".$username."' AND password ='".$password."'";
	 $hasil = mysql_query($query, $koneksi);
	 $n = mysql_num_rows ($hasil);
	 $resultcate = mysql_query($query) or die('Error, query failed. ' . mysql_error());


	 if($n > 0) { 
	 			$_SESSION['username']=$username;
				$_SESSION['tingkat']=$tingkat;
				$_SESSION['id_guru']=$n['id_guru'];
				header ('Location:admin/index.php'); }
	 else { 
	 			header ('Location:index.php');}		
	}
	
if($tingkat=='guru'){
	 $query="SELECT * FROM user_guru WHERE username_guru='".$username."' AND password ='".$password."'";
	 $hasil = mysql_query($query, $koneksi);
	 $n = mysql_num_rows ($hasil);
	 $resultcate = mysql_query($query) or die('Error, query failed. ' . mysql_error());
	 

	 if($n > 0) { 
	 			$_SESSION['username']=$username;
				$_SESSION['tingkat']=$tingkat;
				while($noid=mysql_fetch_array($hasil)){
				$_SESSION['id_guru']=$noid['id_guru'];	
				}
				header ('Location:guru/index.php'); }
	 else { 
	 			header ('Location:index.php');}		
	}
	
if($tingkat=='siswa'){
	 $query="SELECT * FROM user_siswa WHERE username_siswa='".$username."' AND password ='".$password."'";
	 $hasil = mysql_query($query, $koneksi);
	 $n = mysql_num_rows ($hasil);
	 $resultcate = mysql_query($query) or die('Error, query failed. ' . mysql_error());


	 if($n > 0) { 
	 			setcookie ('username',$username, time()+3600); 
				setcookie ('tingkat','siswa', time()+3600); 
				header ('Location:siswa/index.php'); }
	 else { 
	 			header ('Location:index.php');}		
	}




?>