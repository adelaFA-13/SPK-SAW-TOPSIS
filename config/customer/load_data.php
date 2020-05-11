<?php 
include 'config/koneksi.php';

$hasil = mysqli_query($koneksi, "SELECT * FROM tbl_login where `level`='member'");

while ($data = mysqli_fetch_assoc($hasil)) {
	$datas[] = $data;
}

 ?>