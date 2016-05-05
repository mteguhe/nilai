<?php
session_start();

include('verifikasi_login.php');

include ('../koneksi.php');
include ('../db.php');

if(isset($_POST['kirim'])){
	$kelas=ucwords(htmlentities($_POST['kelas']));
	$pelajaran=ucwords(htmlentities($_POST['pelajaran']));
	$guru=ucwords(htmlentities($_POST['guru']));
	$id_ajar=$_SESSION['tahun_pelajaran'].$kelas.$pelajaran;
	
	$query=mysql_query("insert into `guru_ajar` values('$id_ajar','$kelas','$guru','$pelajaran','')");
	
	mysql_query($query,$koneksi);
	header("Location:guru_ajar.php");
	
}


include('header.php')
?>

<body>

<?php
include('sidebar.php')
?>
	
	<!-- Begin Content -->
	<div id="content">
	<h1 class="title">Daftar Mata Pelajaran</h1>
	<div class="line"></div>
            
            <table border="1" width="75">
                <tr align="center" bgcolor="#CCCCCC">
                	<td width="5%" align="center">No</th>
                    <th width="20%">Kelas</th>
                    <th width="20%">Mata Pelajaran</th>
                   
                </tr>
                <?php
				$semester=$_SESSION['tahun_pelajaran'];
				$gurup=$_SESSION['id_guru'];
				
					$queryA  = "SELECT * FROM guru_ajar ajar, data_pelajaran pelajaran, user_guru guru, data_kelas kelas WHERE ajar.id_guru=guru.id_guru and ajar.id_pelajaran=pelajaran.id_pelajaran and ajar.id_kelas=kelas.id_kelas and ajar.id_guru=$gurup and ajar.id_ajar like 'S$semester%'";
                    $resultA = mysql_query($queryA) or die('Error, query failed. ' . mysql_error());
                    $nn=1;
					while($row = mysql_fetch_array($resultA))
                    { 
                    ?>
                    <tr>
                    	<td align="center"><?php echo $nn; ?> </td>
                        <td align="left"><?php echo $row['nama_kelas']; ?></td>
                        <td align="left">
                        <?php
						$id_ajaran=$row['id_ajar'];
						$querylink="SELECT * FROM `data_nilai` WHERE `id_ajar` LIKE '$id_ajaran'";
						$resultlink=mysql_query($querylink, $koneksi);
						$numrows=mysql_num_rows($resultlink);
							
							if($numrows>0){
                        ?>
                        <a href="update_nilai.php?idajar=<?php echo $row['id_ajar']; ?>"><?php echo $row['nama_pelajaran']; ?></a>
                        <?php }
							else{
						?>
                        <a href="input_nilai.php?idajar=<?php echo $row['id_ajar']; ?>"><?php echo $row['nama_pelajaran']; ?></a>
                        <?php
							}
						?>
                        
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
