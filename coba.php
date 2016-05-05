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
	<h1 class="title">Ruang Kelas</h1>
	<div class="line"></div>
	
    	   <form action="ruang_kelas.php" method="post">
 	        <table border="0" width="100%" cellpadding="0" cellspacing="0">
            <tr valign="top">
              <td>
                  <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                   
                   
                    
                    <tr>
                      <th valign="top" width="5%">Nama</th>
                      <td><input type="text" class="inp-form" name="nama_siswa" value="Nama Siswa" 
                      onBlur="if(this.value=='')this.value='Nama Siswa'" onFocus="if(this.value=='Nama Siswa')this.value=''"/></td>
                    </tr>
                    
                    <tr>
                      <th valign="top" width="5%">NIS</th>
                      <td><input type="text" class="inp-form" name="nis" value="N I S"
                      onBlur="if(this.value=='')this.value='N I S'" onFocus="if(this.value=='N I S')this.value=''"/></td>
                    </tr>
                    
                    <tr>
                      <th valign="top" width="5%">Kelas</th>
                      <td width="20%"><select name="kelas"  class="styledselect_form_1">
                      <option value="Pilih Kelas">Pilih Kelas</option>
                          <?php
						  $kelas=mysql_query("select * from data_kelas order by id_kelas asc");
						  while($row1=mysql_fetch_array($kelas)){
						  ?>
							  <option value="<?php echo $row1['id_kelas'];?>"><?php echo $row1['nama_kelas'];?></option>
						  <?php
						  }
						  ?> 
                        </select>
                      </td>
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
            
            <form action="ruang_kelas.php" method="post" >
            <table border="1" width="75">
                <tr align="center" bgcolor="#CCCCCC">
                	<td width="5%" align="center">No</th>
                    <th width="10%">NIS</th>
                    <th width="50%">Nama Siswa</th>
                    <th width="10%">Kelas</th>
                   
                </tr>
                <?php
					if(isset($_POST['cari'])){
						
					$cari_nis=$_POST['nis'];
					$cari_nama=$_POST['nama_siswa'];
					$cari_kelas=$_POST['kelas'];
					
					if($cari_nis=="N I S"){
						$filter_nis=" ";	}
					else{
						$filter_nis="and kelas.nis like '%$cari_nis%'"; }
						
					if($cari_nama=="Nama Siswa"){
						$filter_nama=" "; }
					else{
						$filter_nama="and siswa.nama_siswa like '%$cari_nama%'"; }
						
					if($cari_kelas=="Pilih Kelas"){
						$filter_kelas=" "; }
					else{
						$filter_kelas="and kelas.id_kelas ='$cari_kelas'"; }
					
					$querycari  = "SELECT * FROM ruang_kelas kelas, user_siswa siswa, data_kelas data where kelas.nis=siswa.nis and data.id_kelas=kelas.id_kelas $filter_nis $filter_nama $filter_kelas and data.id_kelas != 2 ";
						
					}
					else{
					$querycari  = "SELECT * FROM ruang_kelas kelas, user_siswa siswa, data_kelas data where kelas.nis=siswa.nis and data.id_kelas=kelas.id_kelas and data.id_kelas != 2";
					}
					
					
                    $resultA = mysql_query($querycari) or die('Error, query failed. ' . mysql_error());
                    $nn=1;
					while($row = mysql_fetch_array($resultA))
                    { 
                    ?>
                    <tr>
                    	<td align="center"><?php echo $nn; ?> </td>
                        <td align="left"><?php echo "<input type='text' class='inp-form' name='nis_update".$nn."' 
											value='".$row['nis']."' />"?></td>
                        <td align="left" ><?php echo $row['nama_siswa']; ?></td>
                        <td align="left" >
                          <?php echo"<select name='kelas_update".$nn."'  class='styledselect_form_1' >
                          <option value='".$row['id_kelas']."'>".$row['nama_kelas'].""?></option>
                          <?php
						  $kelas_up=mysql_query("select * from data_kelas where id_kelas>1 order by nama_kelas asc");
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
               
                </table>
                </form>
    			
    <!-- End Slider --> 
    
    
   
    
    
<?php
include('footer.php')
?>
