<?php
session_start();
include('verifikasi_login.php');
include ('../koneksi.php');
include ('../db.php');

$id_kelas=$_GET['kelas'];

include('header.php')
?>

<body>

<?php
include('sidebar.php')
?>
	
	<!-- Begin Content -->
	<div id="content">
	<h1 class="title">Cetak Raport</h1>
	<div class="line"></div>
    
    
            
            <form action="verifikasi_nilai.php" method="post">
            <input type="hidden" name="idajartampil" value="<?php echo $id_ajar?>" ?>
            <table border="1" width="75">
                <tr align="center" bgcolor="#CCCCCC">
                	<td width="10%" align="center">No</th>
                    <td width="80%" align="center">Nama Siswa</th>
                    <td width="10%" align="center">Raport</th>                  
                </tr>
                <?php
					$querysiswa  = "SELECT * FROM user_siswa siswa, ruang_kelas kelas WHERE  
								siswa.nis=kelas.nis and kelas.id_kelas=$id_kelas order by nama_siswa ASC";
                    $resultsiswa = mysql_query($querysiswa) or die('Error, query failed. ' . mysql_error());
                    $nomor=1;
					while($row2 = mysql_fetch_array($resultsiswa))
                    { 
                    ?>
                <tr align="center">
                	<td ><?php echo $nomor; ?></td>
                    <td align="left"><?php echo $row2['nama_siswa'] ?></td>
                    <td><a href="raport_print.php?nis=<?php echo $row2['nis'];?>">Aksi</td>
                    
                    <?php
					$nomor=$nomor+1;} //end of while
					$jumlahsiswa=$nomor-1;
                    ?>
                    <input type="hidden" name="jumlahsiswa" value="<?php echo $jumlahsiswa; ?>">
               		<input type="hidden" name="idajar" value="<?php echo $id_ajar; ?>">
                    <tr>                      
                      <td valign="top" colspan="3"><input type="submit" name="update" value="" class="form-submi" /></td>
                    </tr>
                </table>
                
                
                </form>
    <!-- End Slider --> 
    
    
   
    
    
<?php
include('footer.php')
?>
