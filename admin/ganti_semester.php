<?php
session_start();
include('verifikasi_login.php');

include ('../koneksi.php');
include ('../db.php');

if(isset($_POST['ganti'])){
	
	$semester_baru=htmlentities($_POST['semester_baru']);
	$tahun_pelajaran_baru=(int)substr($_POST['tahun_pelajaran_baru'],0,4);
	
	$query=mysql_query("INSERT INTO `semester` (`id_semester`, `tahun_pelajaran_mulai`, `semester`) VALUES ('', '$tahun_pelajaran_baru', '$semester_baru');");
	
	mysql_query($query,$koneksi);
	
	header("Location:ganti_semester.php");
	
}

$querytahun="SELECT (`id_semester`) FROM semester";
$hasiltahun = mysql_query($querytahun) or die('Error, query failed. ' . mysql_error());
$tahun=0;
while($row = mysql_fetch_array($hasiltahun))
{
	$_SESSION['tahun_pelajaran']=$row['id_semester'];
}

$idsemester=$_SESSION['tahun_pelajaran'];

include('header.php')
?>

<body>

<?php
include('sidebar.php')
?>
	
	<!-- Begin Content -->
	<div id="content">
	<h1 class="title">Ganti Semester</h1>
	<div class="line"></div>
	
    <form action="ganti_semester.php" method="post">
 	       
			
            
            <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                <?php
					$semester  = "SELECT * FROM `semester` WHERE `id_semester`=$idsemester";
                    $resultsemester = mysql_query($semester) or die('Error, query failed. ' . mysql_error());
                    $nn=1;
					while($row = mysql_fetch_array($resultsemester))
                    { 
					$tahunpel=$row['tahun_pelajaran_mulai'];
					$semesterpel=$row['semester'];
                    ?>
                    <tr>
                      <th>&nbsp;</th>
                      <th colspan="2" id="label-tabel"> Tahun Pelajaran Berjalan </th>
                    </tr>
                    
                    <tr>
                      <th>&nbsp;</th>
                      <th valign="bottom">Tahun Pelajaran </th>
                      <td colspan="2"><input type="text" class="inp-form" name="nama_pelajaran" value="<?php echo $tahunpel ?> - <?php echo $tahunpel+1; ?>" disabled="disabled" /></td>
                      <td width="20%"></td>
                    </tr>
                    
                    <tr>
                      <th>&nbsp;</th>
                      <th valign="bottom">Semester</th>
                      <td colspan="2"><input type="text" class="inp-form" name="semester" value="<?php echo $semesterpel ?>" disabled="disabled"/></td>
                      
                    </tr>
                     
                    <tr>
                      <th>&nbsp;</th>
                      <th valign="bottom" colspan="3" id="label-tabel" rowspan=""></th>
                    </tr>
                   
                    <tr>
                      <th>&nbsp;</th>
                      <th valign="bottom" colspan="2" id="label-tabel">Semester Baru  </th>
                    </tr>
                    
                    <?php
					if ($semesterpel=='Genap')
					{
					?>
                    
                    <tr>
                      <th>&nbsp;</th>
                      <th valign="bottom">Tahun Pelajaran </th>
                      <td colspan="2"><input type="text" class="inp-form" name="tahun_pelajaran_baru" value="<?php echo $tahunpel+1; ?> - <?php echo $tahunpel+2; ?>" /></td>
                    
                    </tr>
                    
                    <tr>
                      <th>&nbsp;</th>
                      <th valign="bottom">Semester</th>
                      <td colspan="2"><input type="text" class="inp-form" name="semester_baru" value="Ganjil"/></td>
                    
                    </tr>
                    
                   <?php
					}
					elseif ($semesterpel=='Ganjil')
					{
				   ?>
                   
                   <tr>
                      <th>&nbsp;</th>
                      <th valign="bottom">Tahun Pelajaran </th>
                      <td colspan="2"><input type="text" class="inp-form" name="tahun_pelajaran_baru" value="<?php echo $tahunpel; ?> - <?php echo $tahunpel+1; ?>" /></td>
                    
                    </tr>
                    
                    <tr>
                      <th>&nbsp;</th>
                      <th valign="bottom">Semester</th>
                      <td colspan="2"><input type="text" class="inp-form" name="semester_baru" value="Genap" /></td>
                    
                    </tr>
                   
                   <?php
					}
					?>
                     <tr>
                      <th>&nbsp;</th>
                      <td valign="top" colspan="2"><input type="submit" name="ganti" value="" class="form-submi" /></td>
                    </tr>
                    <?php
					$nn=$nn+1;} //end of while
                    ?>
                </table>
                
                </form>
    <!-- End Slider --> 
    
    
   
    
    
<?php
include('footer.php')
?>
