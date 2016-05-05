<?php
session_start();
include('verifikasi_login.php');
include ('../koneksi.php');
include ('../db.php');

include('header.php')
?>

<body>

<?php
include('sidebar.php')
?>
	
	<!-- Begin Content -->
	<div id="content">
	<h1 class="title">Input Nilai</h1>
	<div class="line"></div>
    
    <?php
					$id_ajar=$_GET['idajar'];
					$queryA  = "SELECT * FROM guru_ajar ajar, data_kelas kelas, data_pelajaran pelajaran, user_guru guru WHERE ajar.id_ajar='$id_ajar' and ajar.id_kelas=kelas.id_kelas and ajar.id_pelajaran=pelajaran.id_pelajaran and ajar.id_guru=guru.id_guru";
                    $resultA = mysql_query($queryA) or die('Error, query failed. ' . mysql_error());
                    $nn=1;
					$row = mysql_fetch_array($resultA)
	?>
	
    <form action="tambah_pelajaran.php" method="post">
 	        <table border="0" width="100%" cellpadding="0" cellspacing="0">
            <tr valign="top">
              <td>
                  <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                    <tr>
                      <th valign="top">Kelas </th>
                      <td><input type="text" class="inp-form" name="kelas"/ value="<?php echo $row['nama_kelas'] ?>" disabled /></td>
                      <td></td>
                    </tr>
                    
                    <tr>
                      <th valign="top">Mata Pelajaran </th>
                      <td><input type="text" class="inp-form" name="nama_pelajaran" value="<?php echo $row['nama_pelajaran'] ?>" disabled /></td>
                      <td></td>
                    </tr>
                    
                    <tr>
                      <th valign="top">Guru Pengajar </th>
                      <td><input type="text" class="inp-form" name="guru_pengajar" value="<?php echo $row['nama_guru'] ?>" disabled /></td>
                      <td></td>
                    </tr>
                    
                  </table>
                <!-- end id-form  -->
                
                
              </td>
              
            </tr>
           
        	</table>
			</form>
            
            <form action="verifikasi_nilai.php" method="post">
            <input type="hidden" name="idajartampil" value="<?php echo $id_ajar?>" />
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
                   
                </tr>
                <?php
					$querysiswa  = "SELECT * FROM user_siswa siswa, ruang_kelas kelas, guru_ajar ajar WHERE 
									ajar.id_ajar='$id_ajar' and 
									kelas.id_kelas=ajar.id_kelas and 
									siswa.nis=kelas.nis";
                    $resultsiswa = mysql_query($querysiswa) or die('Error, query failed. ' . mysql_error());
                    $nomor=1;
					while($row2 = mysql_fetch_array($resultsiswa))
                    { 
                    ?>
                <tr align="center">
                	<td ><?php echo $nomor; ?>
					<?php echo "<input type='hidden' name='nis_update".$nomor."' 
											value='".$row2['nis']."' />"?>
                    </td>
                    <td><input type="text" class="inp-form-rad1" name="kelas" maxlength="20" value="<?php echo $row2['nama_siswa'] ?>" disabled/></td>
                    <td><?php echo "<input type='text' class='inp-form-rad2' name='T1".$nomor."' maxlength='3' size='20' value='0'
                    onKeypress='if(event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;'"; ?>
                    onBlur="if(this.value=='')this.value='0'" onFocus="if(this.value=='0')this.value=''" /></td>
                    
                    <td><?php echo "<input type='text' class='inp-form-rad2' name='T2".$nomor."' maxlength='3' size='20' value='0'
                    onKeypress='if(event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;'"; ?>
                    onBlur="if(this.value=='')this.value='0'" onFocus="if(this.value=='0')this.value=''" /></td>
                    
                    <td><?php echo "<input type='text' class='inp-form-rad2' name='T3".$nomor."' maxlength='3' size='20' value='0'
                    onKeypress='if(event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;'"; ?>
                    onBlur="if(this.value=='')this.value='0'" onFocus="if(this.value=='0')this.value=''" /></td>
                   
                    <td><?php echo "<input type='text' class='inp-form-rad2' name='U1".$nomor."' maxlength='3' size='20' value='0'
                    onKeypress='if(event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;'"; ?>
                    onBlur="if(this.value=='')this.value='0'" onFocus="if(this.value=='0')this.value=''" /></td>
                    
                    <td><?php echo "<input type='text' class='inp-form-rad2' name='U2".$nomor."' maxlength='3' size='20' value='0'
                    onKeypress='if(event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;'"; ?>
                    onBlur="if(this.value=='')this.value='0'" onFocus="if(this.value=='0')this.value=''" /></td>
                    
                    <td><?php echo "<input type='text' class='inp-form-rad2' name='U3".$nomor."' maxlength='3' size='20' value='0'
                    onKeypress='if(event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;'"; ?>
                    onBlur="if(this.value=='')this.value='0'" onFocus="if(this.value=='0')this.value=''" /></td>
                    
                    <td><?php echo "<input type='text' class='inp-form-rad2' name='UTS".$nomor."' maxlength='3' size='20' value='0'
                    onKeypress='if(event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;'"; ?>
                    onBlur="if(this.value=='')this.value='0'" onFocus="if(this.value=='0')this.value=''" /></td>
                    
                    <td><?php echo "<input type='text' class='inp-form-rad2' name='UAS".$nomor."' maxlength='3' size='20' value='0'
                    onKeypress='if(event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;'"; ?>
                    onBlur="if(this.value=='')this.value='0'" onFocus="if(this.value=='0')this.value=''" /></td>
                    
                </tr>
                    <?php
					$nomor=$nomor+1;} //end of while
					$jumlahsiswa=$nomor-1;
                    ?>
                    <input type="hidden" name="jumlahsiswa" value="<?php echo $jumlahsiswa; ?>">
               		<input type="hidden" name="idajar" value="<?php echo $id_ajar; ?>">
                    <tr>                      
                      <td valign="top" colspan="10"><input type="submit" name="input" value="" class="form-submi" /></td>
                    </tr>
                </table>
                
                
                </form>
    <!-- End Slider --> 
    
    
   
    
    
<?php
include('footer.php')
?>
