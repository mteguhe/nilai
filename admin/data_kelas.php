<?php
session_start();
include('verifikasi_login.php');
include ('../koneksi.php');
include ('../db.php');

if(isset($_POST['kirim'])){
	$nama_kelas=strtoupper(htmlentities($_POST['nama_kelas']));
	
	$query=mysql_query("insert into `data_kelas` values('','$nama_kelas')");
	
	mysql_query($query,$koneksi);
	header("Location:tambah_kelas.php");
	
}


include('header.php')
?>

<body>

<?php
include('sidebar.php')
?>
	
	<!-- Begin Content -->
	<div id="content">
	<h1 class="title">Data Kelas</h1>
	<div class="line"></div>
	
                
            <table border="1" width="75">
                <tr align="center" bgcolor="#CCCCCC">
                	<td width="5%" align="center">No</td>
                    <td width="50%">Kelas</td>
                    <td width="40%">Wali Kelas</td>
                    <td width="2%" align="center">Edit</td>
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
                        <td align="left"><?php echo $row['nama_kelas']; ?></td>
                        <td align="left"><?php echo $row['nama_guru']; ?></td>
                        <td> 
                        <a class="icon-1 info-tooltip" href="edit_kelas.php?id_kelas=<?php echo $row['id_kelas']; ?>" onClick="return confirm('Edit Mata Pelajaran Ini ?');"> </a>
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
