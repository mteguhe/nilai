<?php
session_start();
include('verifikasi_login.php');

include ('../koneksi.php');
include ('../db.php');

if(isset($_POST['update'])){
	
	$jumsis = $_POST['jumlahsiswa'];
	
	
	for ($i=1; $i<=$jumsis; $i++)
	{
	  
	   $nis = $_POST['nis_update'.$i];
	   
	   $id_kelas = $_POST['id_kelas'.$i];
	   	
	   $query = mysql_query("UPDATE `ruang_kelas` SET `id_kelas` = '$id_kelas' WHERE `nis` = '$nis'");
	
		mysql_query($query,$koneksi);
	}
	header("Location:ruang_kelas_verif.php");
	
}


include('header.php')
?>

<body>

<?php
include('sidebar.php')
?>
	
	<!-- Begin Content -->
	<div id="content">
	<h1 class="title">Ruang Kelas</h1>
	<div class="line"></div>
	
    	   
            
            <form method="post" action="ruang_kelas_verif.php">
            <table border="1" width="75">
                <tr align="center" bgcolor="#CCCCCC">
                	<td width="5%" align="center">No</th>
                    <th width="10%">NIS</th>
                    <th width="50%">Nama Siswa</th>
                    <th width="10%">Kelas</th>
                   
                </tr>
                <?php
					$querycari  = "SELECT * FROM ruang_kelas kelas, user_siswa siswa, data_kelas data where kelas.nis=siswa.nis and data.id_kelas=kelas.id_kelas";
					
                    $resultA = mysql_query($querycari) or die('Error, query failed. ' . mysql_error());
                    $nn=1;
					while($row = mysql_fetch_array($resultA))
                    { 
                    ?>
                    <tr>
                    	<td align="center"><?php echo $nn; ?> </td>
                        <td align="left"><?php echo $row['nis']; ?></td>
                        <td align="left" ><?php echo $row['nama_siswa']; ?></td>
                        <td align="left" >
                          <select name="kelas_update"  class="styledselect_form_1" >
                          <option value="<?php echo $row['id_kelas'];?>"><?php echo $row['nama_kelas'];?></option>
                          <?php
						  $kelas_up=mysql_query("select * from data_kelas order by nama_kelas asc");
						  while($row3=mysql_fetch_array($kelas_up)){
						  ?>
							  <option value="<?php echo $row3['id_kelas'];?>"><?php echo $row3['nama_kelas'];?></option>
						  <?php
						  }
						  ?> 
                           </select></td>
                        
                        
                    </tr>
                     
                    <?php
					$nn=$nn+1;} //end of while
                    
                    $jumlahsiswa=$nn-1;
					?>
                    <input type="hidden" name="jumlahsiswa" value="<?php echo $jumlahsiswa ?>" />
                    <tr border=0 >
                   
                    <td colspan="4" ><input type="submit" name="update" value="" class="form-submi" /></td>
                    </tr>
                </form>    
                </table>
    <!-- End Slider --> 
    
    
   
    
    
<?php
include('footer.php')
?>
