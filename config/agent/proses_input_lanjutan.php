<?php 
include '../koneksi.php';

$travel_id = $_POST['travel_id'];
$no_izin = $_POST['no_izin'];
$thn_izin = $_POST['thn_izin'];
$thn_habis = $_POST['thn_habis'];
$no_hp = $_POST['no_hp'];
$deskripsi = $_POST['deskripsi'];

$sql = "UPDATE `tbl_agent_travel` SET `nomor_izin`='$no_izin',`thn_izin`='$thn_izin',`thn_habis`='$thn_habis',`No_HP`='$no_hp',`deskripsi`='$deskripsi' where `travel_id`='$travel_id'";

// echo $sql;

if(mysqli_query($koneksi,$sql)){
	$_SESSION['pesan'] = "Berhasil tambah data program_bantuan";
}else{
	$_SESSION['pesan'] = "Gagal tambah data program_bantuan";
}
header('location:/spk_tugasakhir/index.php?url=pengaturan_agent');


 ?>