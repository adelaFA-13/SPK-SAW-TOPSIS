<?php 
include '../koneksi.php';


$travel_id = $_POST['travel_id'];
$nama_pelayanan = $_POST['pelayanannew'];
$pelayanan_id=$_POST['pelayanan_id'];


// $QUERY = "INSERT INTO `tbl_data_fasilitas`(`id`, `fasilitas_id`, `nama_fasilitas`) VALUES (' ','$kode','$nama_fasilitas')";
 $QUERY ="INSERT INTO `tbl_data_pelayanan`(`id`, `pelayanan_id`,`nama_pelayanan`,`travel_id`) VALUES ('','$pelayanan_id','$nama_pelayanan','$travel_id')";

 if(mysqli_query($koneksi,$QUERY)){
     $_SESSION['pesan'] = "Berhasil tambah data program_bantuan";
     header('location:/spk_tugasakhir/index.php?url=data_pelayanan');
 }else{
 	$_SESSION['pesan'] = "Gagal tambah data program_bantuan";
 }

// echo $nama_fasilitas;
//  ?>