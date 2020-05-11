<?php 
include 'config/koneksi.php';
$datas = [];
$hasil = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria");

while ($data = mysqli_fetch_assoc($hasil)) {
	$datas[] = $data;
}

 ?>