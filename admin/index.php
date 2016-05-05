<?php
session_start();
include('verifikasi_login.php');

include ('../koneksi.php');
include ('../db.php');


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
	<h1 class="title">SISTEM LAPORAN NILAI ONLINE</h1>
	<div class="line"></div>
	<h1 align="left"></h1>
    <br>
    <br>
    
    
 	       
			
            
            <table border="0" cellpadding="0" cellspacing="0"   align="center">
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
                      <th valign="bottom"><h3>Tahun Pelajaran </h3>
                      </th>
                      <td colspan="2"><input type="text" class="inp-form" name="nama_pelajaran" value="<?php echo $tahunpel ?> - <?php echo $tahunpel+1; ?>" disabled="disabled" /></td>
                      <td width="20%"></td>
                    </tr>
                    
                    <tr>
                      <th>&nbsp;</th>
                      <th valign="bottom"><h3>Semester</h3></th>
                      <td colspan="2"><input type="text" class="inp-form" name="semester" value="<?php echo $semesterpel ?>" disabled="disabled"/></td>
                      
                    </tr>
                     
                    
                   
                    <tr>
                      <th>&nbsp;</th>
                      <td valign="top" colspan="2">  </td>
                    </tr>
                    
                    
                    
                    <?php
					$nn=$nn+1;} //end of while
                    ?>
                </table>
                
               
    <!-- End Slider --> 
    
    
   
    
    
<?php
include('footer.php')
?>
