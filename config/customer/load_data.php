<?php 
include 'config/koneksi.php';

$hasil = mysqli_query($koneksi, "SELECT * FROM tbl_data_member");

while ($data = mysqli_fetch_assoc($hasil)) {
	$datas[] = $data;
}

 ?>