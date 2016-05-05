<?php
session_start();
include('verifikasi_login.php');
include ('../koneksi.php');
include ('../db.php');

if(isset($_POST['input'])){
	$jumsis=$_POST['jumlahsiswa'];
	$id_ajar=$_POST['idajar'];
	
	for ($i=1; $i<=$jumsis; $i++)
	{	  
	   $nis = $_POST['nis_update'.$i];
	   $t1= $_POST['T1'.$i];
	   $t2= $_POST['T2'.$i];
	   $t3= $_POST['T3'.$i];
	   $u1= $_POST['U1'.$i];
	   $u2= $_POST['U2'.$i];
	   $u3= $_POST['U3'.$i];
	   $uts= $_POST['UTS'.$i];
	   $uas= $_POST['UAS'.$i];
	   
	   $idnilai=$id_ajar.$nis;
	   
	   $total=($t1+$t2+$t3)*10/300 + ($u1 + $u2 + $u3 )*20/300 + ($uts) * 30/100 + ($uas) * 40/100;
	   
	   $query = mysql_query("INSERT INTO `data_nilai` 
	   						(`id_nilai`, 
							`nis`, 
							`id_ajar`, 
							`tugas_1`, 
							`tugas_2`, 
							`tugas_3`, 
							`ujian_1`, 
							`ujian_2`, 
							`ujian_3`, 
							`UTS`, 
							`UAS`, 
							`Akhir`)
							
							VALUES ('$idnilai', '$nis', '$id_ajar', '$t1', '$t2', '$t3', '$u1', '$u2', '$u3', '$uts', '$uas', '$total');");
	
		mysql_query($query,$koneksi);
	}
	
}

if(isset($_POST['update'])){
	$jumsis=$_POST['jumlahsiswa'];
	$id_ajar=$_POST['idajar'];
	
	for ($i=1; $i<=$jumsis; $i++)
	{	  
	   $nis = $_POST['nis_update'.$i];
	   $t1= $_POST['T1'.$i];
	   $t2= $_POST['T2'.$i];
	   $t3= $_POST['T3'.$i];
	   $u1= $_POST['U1'.$i];
	   $u2= $_POST['U2'.$i];
	   $u3= $_POST['U3'.$i];
	   $uts= $_POST['UTS'.$i];
	   $uas= $_POST['UAS'.$i];
	   
	   $idnilai=$id_ajar.$nis;
	   
	   $total=($t1+$t2+$t3)*30/300 + ($u1 + $u2 + $u3 )*35/300 + ($uts) * 15/100 + ($uas) * 20/100;
	   
	   $query = mysql_query("UPDATE `data_nilai` SET 
	   			`tugas_1` = '$t1', 
				`tugas_2` = '$t2', 
				`tugas_3` = '$t3', 
				`ujian_1` = '$u1', 
				`ujian_2` = '$u2', 
				`ujian_3` = '$u3', 
				`UTS` = '$uts', 
				`UAS` = '$uas', 
				`Akhir` = '$total' 
				
				WHERE `data_nilai`.`id_nilai` = '$idnilai';");
	
		mysql_query($query,$koneksi);
	}
	
}

$idajartampil=$_POST['idajartampil'];
include('header.php');
?>

<body>

<?php
include('sidebar.php')
?>
	
	<!-- Begin Content -->
	<div id="content">
	<h1 class="title">Verifikasi Nilai</h1>
	<div class="line"></div>
            
            <form action="verif_nilai.php" method="post">
            <table border="1" width="75">
                <tr align="center" bgcolor="#CCCCCC">
                	<td width="5%" align="center">No</th>
                    <td width="25%" align="center">Nama Siswa</th>
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
					$querysiswa  = "SELECT * FROM data_nilai nilai, user_siswa siswa WHERE  
								nilai.nis=siswa.nis and
								nilai.id_ajar='$idajartampil'";
                    $resultsiswa = mysql_query($querysiswa) or die('Error, query failed. ' . mysql_error());
                    $nomor=1;
					while($row2 = mysql_fetch_array($resultsiswa))
                    { 
                    ?>
                <tr align="center">
                	<td ><?php echo $nomor; ?> </td>
                    <td><input type="text" class="inp-form-rad1" name="kelas" maxlength="20" value="<?php echo $row2['nama_siswa'] ?>" disabled/></td>
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
                      <td valign="top" colspan="11"><a href="daftar_pelajaran.php"><input type="button" name="kirim" value="" class="form-submi" /></a></td>
                    </tr>
                </table>
                
                
                
    <!-- End Slider --> 
    
    
   
    
    
<?php
include('footer.php')
?>
