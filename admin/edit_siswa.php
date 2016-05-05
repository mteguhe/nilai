<?php
session_start();
include('verifikasi_login.php');
include ('../koneksi.php');
include ('../db.php');

if(isset($_POST['kirim'])){
	$pengacak="kMzwAy87Aa";
	$nama_siswa=ucwords(htmlentities($_POST['nama_siswa']));
	$nis=htmlentities($_POST['nis']);
	$kelamin=htmlentities($_POST['kelamin']);
	$alamat_siswa=ucwords(htmlentities($_POST['alamat_siswa']));
	$telpon_siswa=strtoupper(htmlentities($_POST['telpon_siswa']));
	$username=htmlentities($_POST['username']);
	$password=md5($pengacak . md5(htmlentities($_POST['password'])) . $pengacak );
	$id_siswa_edit=$_POST['id_siswa_edit'];
	
	$query=mysql_query("update `user_siswa` set nama_siswa='$nama_siswa', nis='$nis', kelamin='$kelamin', alamat='$alamat_siswa', telpon_siswa='$telpon_siswa', username_siswa='$username', password='$password' where id_siswa='$id_siswa_edit'");
	
	mysql_query($query,$koneksi);
	header("Location:data_siswa.php");
	
}

include('header.php')
?>

<body>

<?php
include('sidebar.php')
?>
	
	<!-- Begin Content -->
	<div id="content">
	<h1 class="title">Edit Data Siswa</h1>
	<div class="line"></div>
    
	<?php 
	$id_siswa_edit=$_GET['id_siswa_edit'];
	$queryA  = "SELECT * FROM user_siswa WHERE id_siswa='$id_siswa_edit%'";
                    $resultA = mysql_query($queryA) or die('Error, query failed. ' . mysql_error());
                    $nn=1;
					while($row = mysql_fetch_array($resultA))
                    { 
	?>
    <form action="edit_siswa.php" method="post">
 	        <table border="0" width="100%" cellpadding="0" cellspacing="0">
            <tr valign="top">
              <td>
                  <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                    <tr>
                      <th valign="top">Nama Siswa </th>
                      <td><input type="text" class="inp-form" name="nama_siswa" value="<?php echo $row['nama_siswa'] ?>"/></td>
                      <td><input type="hidden" name="id_siswa_edit" value="<?php echo $id_siswa_edit ?>"></td>
                    </tr>
                     <tr>
                      <th valign="top">NIS </th>
                      <td><input type="text" class="inp-form" name="nis" value="<?php echo $row['nis'] ?>"/></td>
                      <td></td>
                    </tr>
                    <tr>
                      <th valign="top">Kelamin</th>
                      <td><select name="kelamin"  class="styledselect_form_1">
                      	  <option value="<?php echo $row['kelamin']?>"><?php echo ucwords(htmlentities($row['kelamin']))?></option>
                          <option value="laki-laki">Laki-laki</option>
                          <option value="perempuan">Perempuan</option>
                        </select>
                      </td>
                      <td></td>
                    </tr>
                    <tr>
                      <th valign="top">Alamat</th>
                      <td><textarea name="alamat_siswa" cols="" rows="" class="form-textarea"><?php echo $row['alamat'] ?></textarea></td>
                      <td></td>
                    </tr>
                     <tr>
                      <th valign="top">Telpon </th>
                      <td><input type="text" class="inp-form" name="telpon_siswa" value="<?php echo $row['telpon_siswa'] ?>"/></td>
                      <td></td>
                    </tr>
                     <tr>
                      <th valign="top">Username</th>
                      <td><input type="text" class="inp-form" name="username" value="<?php echo $row['username_siswa'] ?>"/></td>
                      <td></td>
                    </tr>
                     <tr>
                      <th valign="top">Password</th>
                      <td><input type="password" class="inp-form" name="password" value="<?php echo $row['password'] ?>"/></td>
                      <td></td>
                    </tr>
                    <tr>
                      <th>&nbsp;</th>
                      <td valign="top"><input type="submit" name="kirim" value="" class="form-submit" />
                          <input type="reset" value="" class="form-reset"  />
                      </td>
                      <td></td>
                    </tr>
                  </table>
                  <?php } ?>
                <!-- end id-form  -->
              </td>
              
            </tr>
           
        	</table>
			</form>
    <!-- End Slider --> 
    
    
   
    
    
<?php
include('footer.php')
?>
