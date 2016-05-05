<?php
session_start();
include('verifikasi_login.php');
include ('../koneksi.php');
include ('../db.php');

$semester='S'.$_GET['semester'];
$user_siswa=$_COOKIE['username'];

include('header.php');
?>

<body>

<?php
include('sidebar.php')


?>
	
	<!-- Begin Content -->
	<div id="content">
	<h1 class="title">Prestasi Nilai Semester Ini</h1>
	<div class="line"></div>
            
            <form action="verif_nilai.php" method="post">
            <table border="1" width="75">
                <tr align="center" bgcolor="#CCCCCC">
                	<td width="5%" align="center">No</th>
                    <td width="25%" align="center">Nama Pelajaran</th>
                    <td width="6%" align="center">Tugas 1</th>
                    <td width="6%" align="center">Tugas 2</th>
                    <td width="6%" align="center">Tugas 3</th>
                    <td width="6%" align="center">Ujian 1</th>
                    <td width="6%" align="center">Ujian 2</th>
                    <td width="6%" align="center">Ujian 3</th>
                    <td width="6%" align="center">UTS</th>
                    <td width="6%" align="center">UAS</th>
                    <td width="6%" align="center">Total</th>
                   
                </tr>
                <?php
					$querysiswa  = "SELECT * FROM 
									data_nilai nilai, 
									data_pelajaran pelajaran, 
									user_siswa siswa,
									user_guru guru,
									guru_ajar ajar WHERE  
									
									nilai.nis=siswa.nis and
									nilai.id_ajar=ajar.id_ajar and
									ajar.id_guru=guru.id_guru and
									ajar.id_pelajaran=pelajaran.id_pelajaran and
									siswa.username_siswa='$user_siswa' and
									nilai.id_ajar like '$semester%'";
                    $resultsiswa = mysql_query($querysiswa) or die('Error, query failed. ' . mysql_error());
                    $nomor=1;
					while($row2 = mysql_fetch_array($resultsiswa))
                    { 
                    ?>
                <tr align="center">
                	<td ><?php echo $nomor; ?> </td>
                    <td><input type="text" class="inp-form-rad1" name="kelas" maxlength="20" value="<?php echo $row2['nama_pelajaran'] ?>" disabled/></td>
                    <td><input type="text" class="inp-form-rad2" name="T1" maxlength="3" size="20" value="<?php echo $row2['tugas_1'];?>"
                    disabled/></td>
                    
                    <td><input type="text" class="inp-form-rad2" name="T2" maxlength="3" size="20" value="<?php echo $row2['tugas_2'];?>"
                    disabled/></td>
                   
                    <td><input type="text" class="inp-form-rad2" name="T3" maxlength="3" size="20" value="<?php echo $row2['tugas_3'];?>"
                    disabled/></td>
                   
                    <td><input type="text" class="inp-form-rad2" name="U1" maxlength="3" size="20" value="<?php echo $row2['ujian_1'];?>"
                    disabled/></td>
                    
                    <td><input type="text" class="inp-form-rad2" name="U2" maxlength="3" size="20" value="<?php echo $row2['ujian_2'];?>"
                    disabled/></td>
                    
                    <td><input type="text" class="inp-form-rad2" name="U3" maxlength="3" size="20" value="<?php echo $row2['ujian_3'];?>"
                    disabled/></td>
                    
                    <td><input type="text" class="inp-form-rad2" name="UTS" maxlength="3" size="20" value="<?php echo $row2['UTS'];?>"
                    disabled/></td>
                    
                    <td><input type="text" class="inp-form-rad2" name="UAS" maxlength="3" size="20" value="<?php echo $row2['UAS'];?>"
                    disabled/></td>
                    
                    <td><input type="text" class="inp-form-rad2" name="Total" maxlength="3" size="20" value="<?php echo $row2['Akhir'];?>"
                    disabled/></td>
                    
                </tr>
                    <?php
					$nomor=$nomor+1;} //end of while
                    ?>
                    </form>
               
                    <tr>                      
                      <td valign="top" colspan="11"><a href="daftar_pelajaran.php" target="_new"><a href="raport_print.php?semester=<?php echo $semester; ?>"><input type="button" name="kirim" value="" class="form-submi" /></a></td>
                    </tr>
                </table>
                
                
                
    <!-- End Slider --> 
    
    
   
    
    
<?php
include('footer.php')
?>
