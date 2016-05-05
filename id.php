<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<?php
include ('koneksi.php');
include ('db.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<title>ID | SIS SMA CKTC</title>
<link rel="shortcut icon" type="image/x-icon" href="../style/images/favicon.png" />
<link rel="stylesheet" type="text/css" href="../style.css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Amaranth' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="style/css/ie7.css" media="all" />
<![endif]-->
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="style/css/ie8.css" media="all" />
<![endif]-->
<!--[if IE 9]>
<link rel="stylesheet" type="text/css" href="style/css/ie9.css" media="all" />
<![endif]-->

</head>

<body>

	
	<!-- Begin Content -->
	<div id="content">
	<h1 class="title">Daftar ID Member</h1>
	<div class="line"></div>
    
    <table border="1" width="80%" align="center">
            <tr>
            	<th colspan="4" align="left"> Daftar Id Admin </th>
            </tr>
            
            <tr>
            	<th colspan="4" align="left"> Password = Username </th>
            </tr>
                <tr align="center" bgcolor="#CCCCCC">
                	<td width="5%" align="center">No</th>
                    <th width="30%">Nama</th>
                    <th width="30%">Username</th>
                    <th width="30%">Password</th>
                   
                </tr>
                <?php
				
				
					$queryA  = "SELECT `nama`, `username`, `password` FROM `user_admin` WHERE 1";
                    $resultA = mysql_query($queryA) or die('Error, query failed. ' . mysql_error());
                    $nn=1;
					while($row = mysql_fetch_array($resultA))
                    { 
                    ?>
                    <tr>
                    	<td align="center"><?php echo $nn; ?> </td>
                        <td align="left"><?php echo $row['nama']; ?></td>
                        <td align="left"><?php echo $row['username']; ?></td>
                        <td align="left"><?php echo $row['password']; ?></td>
                        
                    </tr>
                     
                    <?php
					$nn=$nn+1;} //end of while
                    ?>
                </table>
                
                <br />
                <br />
                
    
    
    <table border="1" width="80%" align="center">
            <tr>
            	<th colspan="4" align="left"> Daftar Id Guru </th>
            </tr>
            
            <tr>
            	<th colspan="4" align="left"> Password = Username </th>
            </tr>
                <tr align="center" bgcolor="#CCCCCC">
                	<td width="5%" align="center">No</th>
                    <th width="30%">Nama</th>
                    <th width="30%">Username</th>
                    <th width="30%">Password</th>
                   
                </tr>
                <?php
				
				
					$queryA  = "SELECT `nama_guru`, `username_guru`, `password` FROM `user_guru` WHERE 1";
                    $resultA = mysql_query($queryA) or die('Error, query failed. ' . mysql_error());
                    $n=1;
					while($row = mysql_fetch_array($resultA))
                    { 
                    ?>
                    <tr>
                    	<td align="center"><?php echo $n; ?> </td>
                        <td align="left"><?php echo $row['nama_guru']; ?></td>
                        <td align="left"><?php echo $row['username_guru']; ?></td>
                        <td align="left"><?php echo $row['password']; ?></td>
                        
                    </tr>
                     
                    <?php
					$n=$n+1;} //end of while
                    ?>
                </table>
                
                <br />
                <br />
            
            <table border="1" width="80%" align="center">
            <tr>
            	<th colspan="4" align="left"> Daftar Id Siswa </th>
            </tr>
            
            <tr>
            	<th colspan="4" align="left"> Password = Username </th>
            </tr>
                <tr align="center" bgcolor="#CCCCCC">
                	<td width="5%" align="center">No</th>
                    <th width="30%">Nama</th>
                    <th width="30%">Username</th>
                    <th width="30%">Password</th>
                   
                </tr>
                <?php
				
				
					$queryA  = "SELECT `nama_siswa`, `username_siswa`, `password` FROM `user_siswa` WHERE 1";
                    $resultA = mysql_query($queryA) or die('Error, query failed. ' . mysql_error());
                    $nn=1;
					while($row = mysql_fetch_array($resultA))
                    { 
                    ?>
                    <tr>
                    	<td align="center"><?php echo $nn; ?> </td>
                        <td align="left"><?php echo $row['nama_siswa']; ?></td>
                        <td align="left"><?php echo $row['username_siswa']; ?></td>
                        <td align="left"><?php echo $row['password']; ?></td>
                        
                    </tr>
                     
                    <?php
					$nn=$nn+1;} //end of while
                    ?>
                </table>
    <!-- End Slider --> 
    
    

</body>
</html>