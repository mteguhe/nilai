<?php

session_start();
include('verifikasi_login.php');
include ('../koneksi.php');
include ('../db.php');

$semester=$_GET['semester'];
$user_siswa=$_COOKIE['username'];

$querysiswa  = "SELECT * FROM 
									data_nilai nilai, 
									data_pelajaran pelajaran, 
									user_siswa siswa,
									user_guru guru,
									guru_ajar ajar,
									semester seme,
									data_kelas kelas WHERE  
									
									ajar.id_kelas=kelas.id_kelas and
									ajar.id_semester=seme.id_semester and
									nilai.nis=siswa.nis and
									nilai.id_ajar=ajar.id_ajar and
									ajar.id_guru=guru.id_guru and
									ajar.id_pelajaran=pelajaran.id_pelajaran and
									siswa.username_siswa='$user_siswa' and
									nilai.id_ajar like '$semester%'";
                    $resultidsiswa = mysql_query($querysiswa) or die('Error, query failed. ' . mysql_error());
                    $idsiswa=mysql_fetch_array($resultidsiswa);
					
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<title></title>

</head>

<body>

	
	<!-- Begin Content -->
	<div id="content">
	<h2 class="title" align="center">SMA CINTA KASIH TZU CHI</h2>
    <h4 class="title" align="center">Jl Kamal Raya No 20 Outer Ring Road Cengkareng - Jakarta Barat</h4>
    
	<div class="line"></div>
            
    	<table align="center" width="90%">
        <tr height="10"></tr>
        
        <tr align="left">
        	<td > </td>
        	<td>NIS</td>
            <td><?php echo $idsiswa['nis']; ?></td>
            <td> </td>
            <td>Tahun Pelajajaran</td>
            <td><?php echo $idsiswa['tahun_pelajaran_mulai']; ?> - <?php echo $idsiswa['tahun_pelajaran_mulai']+1; ?></td>
            <td> </td>
        </tr>
        
        <tr>
        	<td width="5%"> </td>
        	<td width="17%">Nama Siswa</td>
            <td width="20%"><?php echo $idsiswa['nama_siswa']; ?></td>
            <td width="15%"> </td>
            <td width="22%">Semester</td>
            <td width="16%"><?php echo $idsiswa['semester']; ?></td>
            <td width="5%"> </td>
        </tr>
        
        <tr>
        	<td> </td>
        	<td>Kelas</td>
            <td><?php echo $idsiswa['nama_kelas']; ?></td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
        </tr>
        
        <tr height="20"> </tr>
        
        <tr>
        	<td colspan="7">        
            <table border="1" width="90%" align="center">
                <tr align="center" bgcolor="#CCCCCC" height="50">
                	<th width="5%" valign="bottom"><h3>No</h3></th>
                    <th width="" valign="bottom"><h3>Nama Pelajaran</h3></th>
                    <th width="10%" valign="bottom"><h3>Nilai</h3></th>
                   
                </tr>
                <?php
					$resultsiswa = mysql_query($querysiswa) or die('Error, query failed. ' . mysql_error());
                    $nomor=1;
					
					while($row2 = mysql_fetch_array($resultsiswa))
                    { 
                    ?>
                <tr height="30">
                	<td align="center" ><?php echo $nomor; ?> </td>
                    <td align="left"><?php echo $row2['nama_pelajaran'] ?></td>
                    
                    <td align="center"><?php echo $row2['Akhir'];?></td>
                    
                </tr>
                    <?php
					$nomor=$nomor+1;} //end of while
                    ?>
               
                </table>
                </td>
                </tr>
                </table>
                
                <table align="center" width="81%">
                <tr>
                	<td colspan="2" align="center" valign="bottom" height="60">Mengetahui , </td>
                </tr>
                
                <tr height="120">
                	<td width="50%"> </td>
                    <td width="50%"> </td>
                </tr>
                
                <tr align="center">
                	<td width="50%"> Wali Kelas </td>
                    <td width="50%"> Orang Tua</td>
                </tr>
                    
    <!-- End Slider --> 
    
</html>
<script>
window.print();
</script>
   