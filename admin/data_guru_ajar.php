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
	<h1 class="title">Data Guru Pengajar</h1>
	<div class="line"></div>
	
    <form action="data_guru_ajar.php" method="post">
 	        <table border="0" width="100%" cellpadding="0" cellspacing="0">
            <tr valign="top">
              <td>
                  <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                   
                    <tr>
                      <th valign="top">Kelas</th>
                      <td><select name="kelas"  class="styledselect_form_1">
                          <option value="kelas">Pilih Kelas</option>
						  <?php
						  $kelas=mysql_query("select * from data_kelas where id_kelas>2 order by nama_kelas asc");
						  while($row1=mysql_fetch_array($kelas)){
						  ?>
							  <option value="<?php echo $row1['id_kelas'];?>"><?php echo $row1['nama_kelas'];?></option>
						  <?php
						  }
						  ?> 
                        </select>
                      </td>
                      <td></td>
                    </tr>
                    
                    <tr>
                      <th valign="top">Pelajaran</th>
                      <td><select name="pelajaran"  class="styledselect_form_1">
                          <option value="pelajaran">Mata Pelajaran</option>
						  <?php
						  $pelajaran=mysql_query("select * from data_pelajaran order by nama_pelajaran asc");
						  while($row2=mysql_fetch_array($pelajaran)){
						  ?>
							  <option value="<?php echo $row2['id_pelajaran'];?>"><?php echo $row2['nama_pelajaran'];?></option>
						  <?php
						  }
						  ?> 
                        </select>
                      </td>
                      <td></td>
                    </tr>
                    
                    <tr>
                      <th valign="top">Guru</th>
                      <td><select name="guru"  class="styledselect_form_1">
                          <option value="guru">Guru Pengajar</option>
						  <?php
						  $guru=mysql_query("select * from user_guru order by nama_guru asc");
						  while($row3=mysql_fetch_array($guru)){
						  ?>
							  <option value="<?php echo $row3['id_guru'];?>"><?php echo $row3['nama_guru'];?></option>
						  <?php
						  }
						  ?> 
                        </select>
                      </td>
                      <td></td>
                    </tr>
                    
                    <tr>
                      <th>&nbsp;</th>
                      <td valign="top"><input type="submit" name="cari" value="" class="form-submit" /> </td>
                      <td></td>
                    </tr>
                  </table>
                <!-- end id-form  -->
                
                
              </td>
              
            </tr>
           
        	</table>
			</form>
            
            <table border="1" width="75">
                <tr align="center" bgcolor="#CCCCCC">
                	<td width="5%" align="center">No</th>
                    <th width="20%">Kelas</th>
                    <th width="20%">Mata Pelajaran</th>
                    <th width="20%">Guru</th>
                    <th width="10%">Edit</th>
                </tr>
                <?php
				$semester='S'.$_SESSION['tahun_pelajaran'];
				
					if(isset($_POST['cari'])){
						
					$cari_kelas=$_POST['kelas'];
					$cari_pelajaran=$_POST['pelajaran'];
					$cari_guru=$_POST['guru'];
					
					if($cari_kelas=="kelas"){
						$filter_kelas=" ";	}
					else{
						$filter_kelas="and ajar.id_kelas like '%$cari_kelas%'"; }
						
					if($cari_pelajaran=="pelajaran"){
						$filter_pelajaran=" "; }
					else{
						$filter_pelajaran="and pelajaran.id_pelajaran like '%$cari_pelajaran%'"; }
						
					if($cari_guru=="guru"){
						$filter_guru=" "; }
					else{
						$filter_guru="and guru.id_guru ='$cari_guru'"; }
					
					$queryA  = "SELECT * FROM guru_ajar ajar, data_pelajaran pelajaran, user_guru guru, data_kelas kelas WHERE ajar.id_guru=guru.id_guru and ajar.id_pelajaran=pelajaran.id_pelajaran and ajar.id_kelas=kelas.id_kelas and ajar.id_ajar like '$semester%' $filter_kelas $filter_guru $filter_pelajaran" ;
						
					}
					else{
					$queryA  = "SELECT * FROM guru_ajar ajar, data_pelajaran pelajaran, user_guru guru, data_kelas kelas WHERE ajar.id_guru=guru.id_guru and ajar.id_pelajaran=pelajaran.id_pelajaran and ajar.id_kelas=kelas.id_kelas and ajar.id_ajar like '$semester%'";
					}
					
                    $resultA = mysql_query($queryA) or die('Error, query failed. ' . mysql_error());
                    $nn=1;
					while($row = mysql_fetch_array($resultA))
                    { 
                    ?>
                    <tr>
                    	<td align="center"><?php echo $nn; ?> </td>
                        <td align="left"><?php echo $row['nama_kelas']; ?></td>
                        <td align="left"><?php echo $row['nama_pelajaran']; ?></td>
                        <td align="left"><?php echo $row['nama_guru']; ?></td>
                        
                        <td> 
                        <a class="icon-1 info-tooltip" href=""> </a>
						<a class="icon-2 info-tooltip" href=""> </a> 
                        </td>
                    </tr>
                     
                    <?php
					$nn=$nn+1;} //end of while
                    ?>
                </table>
    <!-- End Slider --> 
    
    
   
    
    
<?php
include('footer.php')
?>
