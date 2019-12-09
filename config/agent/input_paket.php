<?php 
include '../koneksi.php';

$travel_id = $_POST['travel_id'];
$nama = $_POST['nama'];
$jenis = $_POST['jenis'];
$harga = $_POST['harga'];
$objek = $_POST['objek'];
$hotel = $_POST['hotel'];
$pelayanan = $_POST['pelayanan'];
$rute = $_POST['rute'];
$fasilitas = $_POST['fasilitas'];

$sql = "INSERT INTO `tbl_data_paket` (`id`,`travel_id`,`nama`,`alamat`,`thn_berdiri`,`lokasi`) VALUES ('','$travel_id','$nama','$alamat','$tahun','$lokasi')";



if(mysqli_query($koneksi,$sql)){
	$_SESSION['pesan'] = "Berhasil tambah data program_bantuan";
}else{
	$_SESSION['pesan'] = "Gagal tambah data program_bantuan";
}
header('location:/spk_tugasakhir/index.php?url=pengaturan_agent');


 ?>