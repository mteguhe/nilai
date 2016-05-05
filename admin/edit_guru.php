<?php
session_start();
include('verifikasi_login.php');
include ('../koneksi.php');
include ('../db.php');

if(isset($_POST['kirim'])){
	$pengacak="kMzwAy87Aa";
	$nama_guru=ucwords(htmlentities($_POST['nama_guru']));
	$nip=htmlentities($_POST['nip']);
	$kelamin=htmlentities($_POST['kelamin']);
	$alamat_guru=ucwords(htmlentities($_POST['alamat_guru']));
	$telpon_guru=strtoupper(htmlentities($_POST['telpon_guru']));
	$username=htmlentities($_POST['username']);
	$password=md5($pengacak . md5(htmlentities($_POST['password'])) . $pengacak );
	$id_guru_edit=$_POST['id_guru_edit'];
	
	$query=mysql_query("update `user_guru` set nama_guru='$nama_guru', nip='$nip', kelamin='$kelamin', alamat='$alamat_guru', telpon_guru='$telpon_guru', username_guru='$username', password='$password' where id_guru='$id_guru_edit'");
	
	mysql_query($query,$koneksi);
	header("Location:data_guru.php");
	
}

include('header.php')
?>

<body>

<?php
include('sidebar.php')
?>
	
	<!-- Begin Content -->
	<div id="content">
	<h1 class="title">Edit Data Guru</h1>
	<div class="line"></div>
    
	<?php 
	$id_guru_edit=$_GET['id_guru_edit'];
	$queryA  = "SELECT * FROM user_guru WHERE id_guru='$id_guru_edit%'";
                    $resultA = mysql_query($queryA) or die('Error, query failed. ' . mysql_error());
                    $nn=1;
					while($row = mysql_fetch_array($resultA))
                    { 
	?>
    <form action="edit_guru.php" method="post">
 	        <table border="0" width="100%" cellpadding="0" cellspacing="0">
            <tr valign="top">
              <td>
                  <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                    <tr>
                      <th valign="top">Nama Guru </th>
                      <td><input type="text" class="inp-form" name="nama_guru" value="<?php echo $row['nama_guru'] ?>"/></td>
                      <td><input type="hidden" name="id_guru_edit" value="<?php echo $id_guru_edit ?>"></td>
                    </tr>
                     <tr>
                      <th valign="top">NIP </th>
                      <td><input type="text" class="inp-form" name="nip" value="<?php echo $row['nip'] ?>"/></td>
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
                      <td><textarea name="alamat_guru" cols="" rows="" class="form-textarea"><?php echo $row['alamat'] ?></textarea></td>
                      <td></td>
                    </tr>
                     <tr>
                      <th valign="top">Telpon </th>
                      <td><input type="text" class="inp-form" name="telpon_guru" value="<?php echo $row['telpon_guru'] ?>"/></td>
                      <td></td>
                    </tr>
                     <tr>
                      <th valign="top">Username</th>
                      <td><input type="text" class="inp-form" name="username" value="<?php echo $row['username_guru'] ?>"/></td>
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
