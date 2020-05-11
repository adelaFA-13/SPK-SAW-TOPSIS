<?php 
include '../koneksi.php';

$travel_id = $_POST['travel_id'];
$no_izin = $_POST['no_izin'];
$thn_izin = date('Y-m-d',strtotime($_POST['thn_izin']));
$thn_habis =date('Y-m-d',strtotime($_POST['thn_habis']));
$no_hp = $_POST['no_hp'];
$deskripsi = $_POST['deskripsi'];



$sql = "UPDATE `tbl_agent_travel` SET `nomor_izin`='$no_izin',`thn_izin`='$thn_izin',`thn_habis`='$thn_habis',`No_HP`='$no_hp',`deskripsi`='$deskripsi' where `travel_id`='$travel_id'";

//echo $sql;

if(mysqli_query($koneksi,$sql)){
	$_SESSION['pesan'] = "Berhasil tambah data program_bantuan";
	echo "<script language='javascript'>alert('Proses Memasukkan Data Travel Agent Berhasil');</script>";
	header('location:/spkumrohhajidela/index.php?url=pengaturan_agent');
}else{
	$_SESSION['pesan'] = "Gagal tambah data program_bantuan";
}
 ?>