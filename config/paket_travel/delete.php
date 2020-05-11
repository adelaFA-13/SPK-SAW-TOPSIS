<?php
include '../koneksi.php';
$id=$_GET['id'];
$id_paket_fasilitas=$_GET['Paket'];

$sql=mysqli_query($koneksi,"DELETE FROM tbl_jumlah_fasilitas WHERE fasilitas_id='$id' AND  `id_jumlah_fasilitas`='$id_paket_fasilitas'");

if(isset($sql)){
    echo "<script>alert('Berhasil hapus fasilitas!');window.history.go(-1);</script>";
}else{
 echo "gagal";
}

?>