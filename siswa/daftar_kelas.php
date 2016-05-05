<?php
session_start();

include('verifikasi_login.php');

include ('../koneksi.php');
include ('../db.php');

$banyaksemester=$_SESSION['tahun_pelajaran'];
$user_siswa=$_COOKIE['username'];


include('header.php')
?>

<body>

<?php
include('sidebar.php')
?>
	
	<!-- Begin Content -->
	<div id="content">
	<h1 class="title">Daftar Mata Pelajaran</h1>
	<div class="line"></div>
            
            <table border="1" width="75">
                <tr align="center" bgcolor="#CCCCCC">
                	<td width="5%" align="center">No</td>
                    <th width="55%">Kelas</th>
                    <th width="20%">Tahun Pelajaran</th>
                    <th width="20%">Semester</th>                   
                </tr>
                <?php
					$nourut=0;
					for ($semaku=1; $semaku<=$banyaksemester; $semaku++){
					$semester='S'.$semaku;
					
					$querykelas  = "SELECT * FROM 
									data_nilai nilai,
									user_siswa siswa,
									user_guru guru,
									guru_ajar ajar,
									data_kelas kelas WHERE  
									
									nilai.id_ajar like '$semester%' and
									nilai.nis=siswa.nis and
									nilai.id_ajar=ajar.id_ajar and
									ajar.id_kelas=kelas.id_kelas and
									ajar.id_guru=guru.id_guru and
									siswa.username_siswa='$user_siswa'";
                    $resultkelas = mysql_query($querykelas) or die('Error, query failed. ' . mysql_error());
                    $nn=1;
					$ada_nilai=mysql_num_rows($resultkelas);
					if($ada_nilai>0){
                    	
						$querykelassemester="SELECT * FROM 
														data_kelas kelas,
														data_nilai nilai,
														guru_ajar ajar,
														user_siswa siswa,
														semester sem WHERE
														
														kelas.id_kelas=ajar.id_kelas and
														ajar.id_ajar=nilai.id_ajar and
														ajar.id_semester=sem.id_semester and
														sem.id_semester='$semaku' and
														siswa.nis=nilai.nis and
														siswa.username_siswa='$user_siswa'";
						$resultkelassemester= mysql_query($querykelassemester) or die ('Error, query failed. ' . mysql_error());
						
						$no1cetak=1;
						while($row = mysql_fetch_array($resultkelassemester))
                    		{ 
							if($no1cetak<2){
								$nourut=$nourut+1;
                    ?>
                    
                    <tr>
                    	<td align="center"><?php echo $nourut; ?> </td>
                        <td align="left"><a href="raport.php?semester=<?php echo $row['id_semester']?>"><?php echo $row['nama_kelas']; ?></td></a>
                        <td align="left"><?php echo $row['tahun_pelajaran_mulai']; ?> - <?php echo $row['tahun_pelajaran_mulai']+1; ?></td>
                        <td align="left"><?php echo $row['semester']; ?></td>
                    </tr>
                    
                     
                    <?php
							$no1cetak=$no1cetak+1;
							}
							}
					} //end of while
					}
                    ?>
                </table>
    <!-- End Slider --> 
    
    
   
    
    
<?php
include('footer.php')
?>
