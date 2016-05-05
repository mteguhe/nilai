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
	   
	   $id_kelas =$_POST['kelas_update'.$i];
	   	
	   $query = mysql_query("UPDATE `ruang_kelas` SET `id_kelas` = '$id_kelas' WHERE `nis` = '$nis'");
	
		mysql_query($query,$koneksi);
	}
	header("Location:ruang_kelas.php");
	
}

include('header.php')
?>

<body>

<?php
include('sidebar.php')
?>
	
	<!-- Begin Content -->
	<div id="content">
	<h1 class="title">Data Guru</h1>
	<div class="line"></div>
	
    	   <form action="data_guru.php" method="post">
 	        <table border="0" width="100%" cellpadding="0" cellspacing="0">
            <tr valign="top">
              <td>
                  <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                   
                   
                    
                    <tr>
                      <th valign="top" width="5%">Nama</th>
                      <td><input type="text" class="inp-form" name="nama_guru" value="Nama Guru" 
                      onBlur="if(this.value=='')this.value='Nama Guru'" onFocus="if(this.value=='Nama Guru')this.value=''"/></td>
                    </tr>
                    
                    <tr>
                      <th valign="top" width="5%">NIP</th>
                      <td><input type="text" class="inp-form" name="nip" value="N I P"
                      onBlur="if(this.value=='')this.value='N I P'" onFocus="if(this.value=='N I P')this.value=''"/></td>
                    </tr>
                    
                  
                    <tr>
                      <th valign="top" width="5%"></th>
                      <td valign="top" width="75%">
                      <input type="submit" name="cari" value="" class="form-submit" />
                      </td>
                    </tr>
                    
                  </table>
                <!-- end id-form  -->
               
                
                
              </td>
              
            </tr>
           
        	</table>
			</form>
            
            <form action="data_guru.php" method="post" >
            <table border="1" width="75">
                <tr align="center" bgcolor="#CCCCCC">
                	<td width="4%" align="center">No</th>
                    <th width="10%">NIP</th>
                    <th width="15%">Nama Guru</th>
                    <th width="5%">Username</th>
                    <th width="5%">Password</th>
                    <th width="4%">Edit</th>
                   
                </tr>
                <?php
					if(isset($_POST['cari'])){
						
					$cari_nip=$_POST['nip'];
					$cari_guru=$_POST['nama_guru'];
					
					if($cari_nip=="N I P"){
						$filter_nip=" ";	}
					else{
						$filter_nip="and nip like '%$cari_nip%'"; }
						
					if($cari_guru=="Nama Guru"){
						$filter_nama=" "; }
					else{
						$filter_nama="and nama_guru like '%$cari_guru%'"; }
						
					
					$querycari  = "SELECT * FROM  user_guru  where id_guru is not null $filter_nip $filter_nama ";
						
					}
					else{
					$querycari  = "SELECT * FROM  user_guru";
					}
					
					
                    $resultA = mysql_query($querycari) or die('Error, query failed. ' . mysql_error());
                    $nn=1;
					while($row = mysql_fetch_array($resultA))
                    { 
                    ?>
                    <tr>
                    	<td align="center"><?php echo $nn; ?> </td>
                        <td align="left"><?php echo "<input type='text' class='inp-form-rad2' name='nis_update".$nn."' 
											value='".$row['nip']."' />"?></td>
                        <td align="left" ><?php echo $row['nama_guru']; ?></td>
                        <td align="left" ><?php echo $row['username_guru']; ?></td>
                        <td align="left" ><?php echo $row['password']; ?></td>
                        <td> 
                        <a class="icon-1 info-tooltip" href="edit_guru.php?id_guru_edit=<?php echo $row['id_guru'] ?>"> </a>
						
                        </td>
                        
                        
                    </tr>
                     
                    <?php
					$nn=$nn+1;} //end of while
                    
                    $jumlahsiswa=$nn-1;
					?>
                    <input type="hidden" name="jumlahsiswa" value="<?php echo $jumlahsiswa ?>" />
                    <tr border=0 >
                   
                    <td colspan="6" ><input type="submit" name="update" value="" class="form-submi" /></td>
                    </tr>
               
                </table>
                </form>
    			
    <!-- End Slider --> 
    
    
   
    
    
<?php
include('footer.php')
?>
