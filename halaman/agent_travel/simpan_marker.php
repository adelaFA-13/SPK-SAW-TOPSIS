<?php
$koneksi = mysqli_connect('localhost','root','','db_spk_tugasakhir(1)') or die(mysqli_error());
  function pesan($msg,$url){
    echo "<script>window.alert('$msg');window.location=('$url');</script>";
  }
  
  $latitude = $_GET['lat'];
  $longitude = $_GET['lng'];
  $id = $_GET['id'];

  // echo $latitude;
  // echo "/";
  // echo $longitude;
  // echo "/";
  // echo $id;
  // die();

  // if($id === '0'){
    $q = "SELECT * FROM tbl_lokasi Where travel_id='$id'";
    $anjay = mysqli_query($koneksi,$q);
    $anjay1=mysqli_fetch_assoc($anjay);
    if($anjay1['travel_id'] == $id){
      $query = "UPDATE `tbl_lokasi` SET `lat`='$latitude', `long`='$longitude' WHERE `travel_id`='$id' ";
       $a=mysqli_query($koneksi,$query);
    }else{
      $query = "INSERT INTO tbl_lokasi (`lokasi_id`,`lat`,`long`,`travel_id`) VALUES ('','$latitude','$longitude','$id')";
      $a=mysqli_query($koneksi,$query);  
    }
  
  // }else{
  //   $
  // }

  
if($a){
  $_SESSION['pesan'] = "berhasil menyimpan data marker";
  echo "<script language='javascript'>alert('Proses Memasukkan Data Travel Agent Berhasil');window.history.back();</script>";
}else{
  $_SESSION['pesan'] = "gagal menyimpan data marker";
  echo "<script language='javascript'>alert('Gagal memasukan lokasi');window.history.back();</script>";
}
?>