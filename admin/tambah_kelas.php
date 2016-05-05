<?php
session_start();
include('verifikasi_login.php');
include ('../koneksi.php');
include ('../db.php');

if(isset($_POST['kirim'])){
	$nama_kelas=strtoupper(htmlentities($_POST['nama_kelas']));
	
	$query=mysql_query("insert into `data_kelas` values('NULL','$nama_kelas','')");
	
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
	<h1 class="title">Tambah Kelas</h1>
	<div class="line"></div>
	
    <form action="tambah_kelas.php" method="post">
 	        <table border="0" width="100%" cellpadding="0" cellspacing="0">
            <tr valign="top">
              <td>
                  <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                    <tr>
                      <th valign="top">Nama Kelas </th>
                      <td><input type="text" class="inp-form" name="nama_kelas"/></td>
                      <td></td>
                    </tr>
                   
                  
                    
                    <tr>
                      <th>&nbsp;</th>
                      <td valign="top"><input type="submit" name="kirim" value="" class="form-submit" />
                         
                      </td>
                      <td></td>
                    </tr>
                  </table>
                <!-- end id-form  -->
                
                
              </td>
              
            </tr>
           
        	</table>
			</form>
            
            <table border="1" width="75">
                <tr align="center" bgcolor="#CCCCCC">
                	<td width="5%" align="center">No</td>
                    <td width="50%">Mata Pelajaran</td>
                    <td width="8%">Edit</td>
                </tr>
                <?php
					$queryA  = "SELECT * FROM `data_kelas`";
                    $resultA = mysql_query($queryA) or die('Error, query failed. ' . mysql_error());
                    $nn=1;
					while($row = mysql_fetch_array($resultA))
                    { 
                    ?>
                    <tr>
                    	<td align="center"><?php echo $nn; ?> </td>
                        <td align="left"><?php echo $row['nama_kelas']; ?></td>
                        <td> 
                        <a class="icon-1 info-tooltip" href="edit_kelas.php?id_kelas=<?php echo $row['id_kelas']; ?>"> </a>
						<a class="icon-2 info-tooltip" href="hapus_kelas.php?id_kelas=<?php echo $row['id_kelas']; ?>" onClick="return confirm('Hapus Mata Pelajaran Ini ?');"> </a> 
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
