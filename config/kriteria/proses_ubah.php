<?php 
include '../koneksi.php';

$data['id'] = isset($_POST['id']) ? $_POST['id'] : null;
$data['nama'] = isset($_POST['nama']) ? $_POST['nama'] : null;
$data['bobot'] = isset($_POST['bobot']) ? $_POST['bobot'] : null;
$data['jenis'] = isset($_POST['jenis']) ? $_POST['jenis'] : null;

$sqlKriteria = "UPDATE `tbl_kriteria` set `bobot`='".$data['bobot']."'";
//$sqlSubkriteria = "UPDATE `tbl_subkriteria` set `bobot`='".$data['bobot']."'";

if(isset($data['name'])){
	$sqlKriteria .= ',`name`='.$data['name'];
}
if(isset($data['jenis'])){
	$sqlKriteria .= ',`jenis`='.$data['jenis'];
}

$sqlKriteria .= " where `id`='".$data['id']."'";
//$sqlSubkriteria .= " where `kriteria_id`='".$data['id']."'";

if(mysqli_query($koneksi,$sqlKriteria) /*&& mysqli_query($koneksi,$sqlSubkriteria)*/){
	$_SESSION['pesan'] = "Berhasil tambah data kriteria";
	echo json_encode(['message'=>'Berhasil diubah!']);
}else{
	$_SESSION['pesan'] = "Gagal tambah data kriteria";
	echo json_encode(['message'=>'Gagal diubah!']);
}
exit();
header('location:/spk_pro/index.php?url=data_kriteria');


 ?>