<?php
 $koneksi=mysql_connect( '127.0.0.1','root','');
						if(!$koneksi){die('gagal'.mysql_error());}
mysql_select_db("sekolahku") or die("Gagal Konek ke database");
    ?>