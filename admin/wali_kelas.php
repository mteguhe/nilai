<?php
session_start();
include('verifikasi_login.php');
include ('../koneksi.php');
include ('../db.php');

if(isset($_POST['update'])){
	
	
	
	for ($i=1; $i<=6; $i++)
	{
	  
	   $id_kelas = $_POST['id_kelas_update'.$i];
	   
	   $id_guru =$_POST['guru'.$i];
	   	
	   $query = mysql_query("UPDATE `data_kelas` SET `id_wali_kelas` = '$id_guru' WHERE `id_kelas` = '$id_kelas'");
	
		mysql_query($query,$koneksi);
	}	header("Location:wali_kelas.php");
	
}


include('header.php')
?>

<body>

<?php
include('sidebar.php')
?>
	
	<!-- Begin Content -->
	<div id="content">
	<h1 class="title">Wali Kelas</h1>
	<div class="line"></div>
	
            <form action="wali_kelas.php" method="post" >    
            <table border="1" width="75">
                <tr align="center" bgcolor="#CCCCCC">
                	<td width="5%" align="center">No</td>
                    <td width="70%">Kelas</td>
                    <td width="40%">Wali Kelas</td>
                </tr>
                <?php
					$queryA  = "SELECT * FROM data_kelas kelas, user_guru guru WHERE kelas.id_kelas>2 and kelas.id_wali_kelas=guru.id_guru";
                    $resultA = mysql_query($queryA) or die('Error, query failed. ' . mysql_error());
                    $nn=1;
					while($row = mysql_fetch_array($resultA))
                    { 
                    ?>
                    <tr>
                    	<td align="center"><?php echo $nn; ?> </td>
                        <td align="left"><?php echo $row['nama_kelas'];  echo "<input type='hidden' name='id_kelas_update".$nn."' value='".$row['id_kelas']."' />"?></td>
                        <td align="left"><?php echo "<select name='guru".$nn."' class='styledselect_form_1'>" ?>
                        	  <option value="<?php echo $row['id_guru']; ?>"><?php echo $row['nama_guru'];?></option>
						<?php   
						  	  
						  $guru=mysql_query("select * from user_guru order by nama_guru asc");
						  while($row3=mysql_fetch_array($guru)){
						  ?>
							  <option value="<?php echo $row3['id_guru']; ?>"><?php echo $row3['nama_guru'];?></option>
						  <?php
						  }
						  ?> 
                        </select></td>
                    </tr>
                     
                    <?php
					$nn=$nn+1;} //end of while
                    ?>
                    <tr>
                      <td valign="top" width="75%" align="right" colspan="3">
                      <input type="submit" name="update" value="" class="form-submi" />
                      </td>
                    </tr>
                </table>
                </form>
    <!-- End Slider --> 
    
    
   
    
    
<?php
include('footer.php')
?>
