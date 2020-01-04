<?php 
include 'config/koneksi.php';
$datas = [];
$hasil = mysqli_query($koneksi, "SELECT tbl_kriteria.id, tbl_kriteria.nama, tbl_kriteria.bobot, tbl_kriteria.jenis, tbl_subkriteria.nama as nama_subkriteria , tbl_subkriteria.bobot as bobot_subkriteria, tbl_subkriteria.id as subkriteria_id FROM tbl_kriteria left join tbl_subkriteria on (tbl_kriteria.id=tbl_subkriteria.kriteria_id)");

while ($data = mysqli_fetch_assoc($hasil)) {
	$datas[] = $data;
}

 ?>