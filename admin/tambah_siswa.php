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
	
	$query=mysql_query("insert into `user_siswa` values('','$nama_siswa','$nis','$kelamin','$alamat_siswa','$telpon_siswa','$username','$password')");
	$query1=mysql_query("insert into `ruang_kelas` values('$nis','1')");
	
	
	mysql_query($query,$koneksi);
	mysql_query($query1,$koneksi);
	header("Location:tambah_siswa.php");
	
}

include('header.php')
?>

<body>

<?php
include('sidebar.php')
?>
	
	<!-- Begin Content -->
	<div id="content">
	<h1 class="title">Tambah Siswa</h1>
	<div class="line"></div>
	
    <form action="tambah_siswa.php" method="post">
 	        <table border="0" width="100%" cellpadding="0" cellspacing="0">
            <tr valign="top">
              <td>
                  <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                    <tr>
                      <th valign="top">Nama Siswa </th>
                      <td><input type="text" class="inp-form" name="nama_siswa"/></td>
                      <td></td>
                    </tr>
                     <tr>
                      <th valign="top">NIS </th>
                      <td><input type="text" class="inp-form" name="nis"/></td>
                      <td></td>
                    </tr>
                    <tr>
                      <th valign="top">Kelamin</th>
                      <td><select name="kelamin"  class="styledselect_form_1">
                          <option value="laki-laki">Laki-laki</option>
                          <option value="perempuan">Perempuan</option>
                        </select>
                      </td>
                      <td></td>
                    </tr>
                    <tr>
                      <th valign="top">Alamat</th>
                      <td><textarea name="alamat_siswa" cols="" rows="" class="form-textarea"></textarea></td>
                      <td></td>
                    </tr>
                     <tr>
                      <th valign="top">Telpon </th>
                      <td><input type="text" class="inp-form" name="telpon_siswa"/></td>
                      <td></td>
                    </tr>
                     <tr>
                      <th valign="top">Username</th>
                      <td><input type="text" class="inp-form" name="username"/></td>
                      <td></td>
                    </tr>
                     <tr>
                      <th valign="top">Password</th>
                      <td><input type="password" class="inp-form" name="password"/></td>
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
                <!-- end id-form  -->
              </td>
              
            </tr>
           
        	</table>
			</form>
    <!-- End Slider --> 
    
    
   
    
    
<?php
include('footer.php')
?>
