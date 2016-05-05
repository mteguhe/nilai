<?php
session_start();
include('verifikasi_login.php');
include ('../koneksi.php');
include ('../db.php');

if(isset($_POST['kirim'])){
	$nama_pelajaran=ucwords(htmlentities($_POST['nama_pelajaran']));
	$skbm=$_POST['skbm'];
	
	$query=mysql_query("insert into `data_pelajaran` values('','$nama_pelajaran','$skbm')");
	
	mysql_query($query,$koneksi);
	header("Location:tambah_pelajaran.php");
	
}


include('header.php')
?>

<body>

<?php
include('sidebar.php')
?>
	
	<!-- Begin Content -->
	<div id="content">
	<h1 class="title">Tambah Mata Pelajaran</h1>
	<div class="line"></div>
	
    <form action="tambah_pelajaran.php" method="post">
 	        <table border="0" width="100%" cellpadding="0" cellspacing="0">
            <tr valign="top">
              <td>
                  <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                    <tr>
                      <th valign="top">Nama Mata Pelajaran </th>
                      <td><input type="text" class="inp-form" name="nama_pelajaran"/></td>
                      <td></td>
                    </tr>
                   
                    <tr>
                      <th valign="top">SKBM</th>
                      <td><?php echo "<input type='text' class='inp-form' name='skbm' maxlength='2' size='20' value='60'
                    onKeypress='if(event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;'"; ?>
                    onBlur="if(this.value=='')this.value='60'" onFocus="if(this.value=='60')this.value=''" /></td>
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
                    <td width="50%" align="center">Mata Pelajaran</td>
                    <td width="10%" align="center">SKBM</td>
                    <td width="8%" align="center">Edit</td>
                </tr>
                <?php
					$queryA  = "SELECT * FROM `data_pelajaran` order by `nama_pelajaran` asc";
                    $resultA = mysql_query($queryA) or die('Error, query failed. ' . mysql_error());
                    $nn=1;
					while($row = mysql_fetch_array($resultA))
                    { 
                    ?>
                    <tr>
                    	<td align="center"><?php echo $nn; ?> </td>
                        <td align="left"><?php echo $row['nama_pelajaran']; ?></td>
                        <td align="center"><?php echo $row['skbm']; ?></td>
                        <td align="center"> 
                        <a class="icon-1 info-tooltip" href="edit_pelajaran.php?id_pelajaran=<?php echo $row['id_pelajaran']; ?>"> </a>
						<a class="icon-2 info-tooltip" href="hapus_pelajaran.php?id_pelajaran=<?php echo $row['id_pelajaran']; ?>" onClick="return confirm('Hapus Mata Pelajaran Ini ?');"> </a> 
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
