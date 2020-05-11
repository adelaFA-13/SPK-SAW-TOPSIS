<?php
include '../koneksi.php';

$id=$_GET['id'];
$id_paket_fasilitas=$_GET['Paket'];
$travel=$_GET['travel'];

$sqlcek=mysqli_query($koneksi,"SELECT * FROM tbl_jumlah_fasilitas WHERE fasilitas_id='$id' AND `id_jumlah_fasilitas`='$id_paket_fasilitas'");

if(mysqli_num_rows($sqlcek)>=1){

    echo "<script language='javascript'>alert('Fasilitas ini telah tersedia!');window.history.back();</script>";
}else{
    $sqlinsert=mysqli_query($koneksi,"INSERT INTO tbl_jumlah_fasilitas  VALUES('','$travel','$id','$id_paket_fasilitas')");
    if(isset($sqlinsert)){
        echo "<script language='javascript'>alert('Berhasil Menambah Fasilitas!');window.history.back();</script>";
    }else{
        echo "<script language='javascript'>alert('Gagal Menambah Fasilitas Paket!');window.history.back();</script>";
    }
}

?>