<?php
session_start();
include('verifikasi_login.php');
include ('../koneksi.php');
include ('../db.php');

if(isset($_POST['update'])){
	$nama_pelajaran=ucwords(htmlentities($_POST['nama_pelajaran']));
	$skbm=$_POST['skbm'];
	$id_pel=$_POST['id_pelajaran'];
	
	
	$query=mysql_query("UPDATE `data_pelajaran` SET 
						`nama_pelajaran` = '$nama_pelajaran', 
						`skbm` = '$skbm' 
						
						WHERE 
						
						`id_pelajaran` = '$id_pel';
");
	
	mysql_query($query,$koneksi);
	header("Location:tambah_pelajaran.php");
	
}

$id_pelajaran=$_GET['id_pelajaran'];

$queryA  = "SELECT * FROM `data_pelajaran` where `id_pelajaran` = '$id_pelajaran'";
                    $resultA = mysql_query($queryA) or die('Error, query failed. ' . mysql_error());
					$row = mysql_fetch_array($resultA);
					$skbmawal=$row['skbm'];
					
                    
include('header.php')
?>

<body>

<?php
include('sidebar.php')
?>
	
	<!-- Begin Content -->
	<div id="content">
	<h1 class="title">Edit Mata Pelajaran</h1>
	<div class="line"></div>
	
    <form action="edit_pelajaran.php" method="post">
 	        <table border="0" width="100%" cellpadding="0" cellspacing="0">
            <tr valign="top">
              <td>
                  <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                    <tr>
                      <th valign="top">Nama Mata Pelajaran </th>
                      <td><input type="text" class="inp-form" name="nama_pelajaran" value="<?php echo $row['nama_pelajaran']; ?>"/></td>
                      <td></td>
                    </tr>
                   
                    <tr>
                      <th valign="top">SKBM</th>
                      <td><?php echo "<input type='text' class='inp-form' name='skbm' maxlength='2' size='20' value='$skbmawal'
                    onKeypress='if(event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;'"; ?>
                    onBlur="if(this.value=='')this.value='0'" onFocus="if(this.value=='0')this.value=''" /></td>
                      <td></td>
                    </tr>
                    
                    <tr>
                      <th>&nbsp;</th>
                      <input type="hidden" value="<?php echo $row['id_pelajaran'];?>" name="id_pelajaran">
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
