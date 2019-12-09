<?php 
include '../koneksi.php';

$travel_id = $_POST['travel_id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tahun = $_POST['tahun'];
$lokasi = $_POST['lokasi'];

if ($travel_id === 0){
	$sql = "INSERT INTO `tbl_agent_travel` (`id`,`travel_id`,`nama`,`alamat`,`thn_berdiri`,`lokasi`) VALUES ('','$travel_id','$nama','$alamat','$tahun','$lokasi')";
} else {
	$sql = "UPDATE `tbl_agent_travel` SET `nama`='$nama', `alamat`='$alamat',`thn_berdiri`='$tahun',`lokasi`='$lokasi' where `travel_id`='$travel_id'";
}




if(mysqli_query($koneksi,$sql)){
	$_SESSION['pesan'] = "Berhasil tambah data program_bantuan";
}else{
	$_SESSION['pesan'] = "Gagal tambah data program_bantuan";
}
header('location:/spk_tugasakhir/index.php?url=pengaturan_agent');


 ?>