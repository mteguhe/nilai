<!-- Begin Wrapper -->
<div id="wrapper">
	<!-- Begin Sidebar -->
	<div id="sidebar">
		 <div id="logo"><a href="index.php"><img src="../style/images/logo1.png" alt="Caprice" width="200" height="80"/></a></div>
		 
	<!-- Begin Menu -->
    <div id="menu" class="menu-v">
      <ul>
        <li><a href="index.php" class="active">Home</a></li>
        <li><a href="#">Nilai</a>
        	<ul>
        		<li><a href="daftar_pelajaran.php">Input Nilai</a></li>
        	</ul>
        </li>
        <?php 
		$queryside="select id_kelas, id_guru, id_wali_kelas, username_guru, nama_kelas from user_guru guru, data_kelas kelas 
				where guru.id_guru = kelas.id_wali_kelas and guru.username_guru='".$_SESSION['username']."'";
		$resultside = mysql_query($queryside) or die('Error, query failed. ' . mysql_error());
        while($rowside = mysql_fetch_array($resultside))
                    { ?>
		<li><a href="#">Wali Kelas</a>
        	<ul>
        		<li><a href="wali_kelas.php?kelas=<?php echo $rowside['id_kelas'];?>"><?php echo $rowside['nama_kelas']; ?></a></li>
        	</ul>
        </li>				
                         
				<?php }
	 	?>
        <li><a href="logout.php">Log Out</a></li>
      </ul>
    </div>
    <!-- End Menu -->
   
    
    <div class="sidebox">
    <ul class="share">
    	<li><a href="#"><img src="../style/images/icon-rss.png" alt="RSS" /></a></li>
    	<li><a href="#"><img src="../style/images/icon-facebook.png" alt="Facebook" /></a></li>
    	<li><a href="#"><img src="../style/images/icon-twitter.png" alt="Twitter" /></a></li>
    	<li><a href="#"><img src="../style/images/icon-dribbble.png" alt="Dribbble" /></a></li>
    	<li><a href="#"><img src="../style/images/icon-linkedin.png" alt="LinkedIn" /></a></li>
    </ul>
    </div>

    
	</div>
	<!-- End Sidebar -->