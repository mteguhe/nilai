<?php
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
                      <th valign="top">Kelamin</th>
                      <td><select name="semester"  class="styledselect_form_1">
                          <option value="1">Ganjil</option>
                          <option value="2">Genap</option>
                        </select>
                      </td>
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
