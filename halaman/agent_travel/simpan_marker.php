<?php
$koneksi = mysqli_connect('localhost','root','','db_spk_tugasakhir(1)') or die(mysqli_error());
  function pesan($msg,$url){
    echo "<script>window.alert('$msg');window.location=('$url');</script>";
  }
  
  $latitude = $_GET['lat'];
  $longitude = $_GET['lng'];
  $query = "INSERT INTO tbl_tes (`lokasi_id`,`lat`,`long`) VALUES ('','$latitude','$longitude')";
  $a=mysqli_query($koneksi,$query);

  
if($a){
	$_SESSION['pesan'] = "berhasil menyimpan data marker";
}else{
	$_SESSION['pesan'] = "gagal menyimpan data marker";
}
header('location:/spk_tugasakhir/index.php?url=pengaturan_agent');

?>