<?php
session_start();
include('verifikasi_login.php');
include ('../koneksi.php');
include ('../db.php');

if(isset($_POST['update'])){
	$nama_kelas=ucwords(htmlentities($_POST['nama_kelas']));
	$id_kel=$_POST['id_kelas'];
	
	
	$query=mysql_query("UPDATE `data_kelas` SET 
						`nama_kelas` = '$nama_kelas' 
						
						WHERE 
						`id_kelas` = '$id_kel';
");
	
	mysql_query($query,$koneksi);
	header("Location:tambah_kelas.php");
	
}

$id_kelas=$_GET['id_kelas'];

$queryA  = "SELECT * FROM `data_kelas` where `id_kelas` = '$id_kelas'";
                    $resultA = mysql_query($queryA) or die('Error, query failed. ' . mysql_error());
					$row = mysql_fetch_array($resultA);	
                    
include('header.php')
?>

<body>

<?php
include('sidebar.php')
?>
	
	<!-- Begin Content -->
	<div id="content">
	<h1 class="title">Edit Kelas</h1>
	<div class="line"></div>
	
    <form action="edit_kelas.php" method="post">
 	        <table border="0" width="100%" cellpadding="0" cellspacing="0">
            <tr valign="top">
              <td>
                  <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                    <tr>
                      <th valign="top">Nama Kelas </th>
                      <td><input type="text" class="inp-form" name="nama_kelas" value="<?php echo $row['nama_kelas']; ?>"/></td>
                      <td></td>
                    </tr>
                         
                    <tr>
                      <th>&nbsp;</th>
                      <input type="hidden" value="<?php echo $row['id_kelas'];?>" name="id_kelas">
                      <td valign="top"><input type="submit" name="update" value="" class="form-submit" />
                         
                      </td>
                      <td></td>
                    </tr>
                  </table>
                <!-- end id-form  -->
                
                
              </td>
              
            </tr>
           
        	</table>
			</form>
            
           
    <!-- End Slider --> 
    
    
   
    
    
<?php
include('footer.php')
?>
