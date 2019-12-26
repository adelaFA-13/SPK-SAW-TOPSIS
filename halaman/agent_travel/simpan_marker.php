<?php
$koneksi = mysqli_connect('localhost','root','','db_spk_tugasakhir(1)') or die(mysqli_error());
  function pesan($msg,$url){
    echo "<script>window.alert('$msg');window.location=('$url');</script>";
  }
  
  $latitude = $_GET['lat'];
  $longitude = $_GET['lng'];
  $id = $_GET['id'];

  if($id === 0){
    $query = "INSERT INTO tbl_lokasi (`lokasi_id`,`lat`,`long`,`travel_id`) VALUES ('','$latitude','$longitude','$id')";
  }else{
    $query = "UPDATE `tbl_lokasi` SET `lat`='$latitude', `long`='$longitude' WHERE `travel_id`='$id' ";
  }
  $a=mysqli_query($koneksi,$query);

  
if($a){
	$_SESSION['pesan'] = "berhasil menyimpan data marker";
}else{
	$_SESSION['pesan'] = "gagal menyimpan data marker";
}
header('location:/spk_tugasakhir1/index.php?url=pengaturan_agent');

?>