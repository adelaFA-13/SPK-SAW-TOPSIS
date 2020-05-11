<?php
include '../koneksi.php';

$id=$_GET['id'];
$id_paket_pelayanan=$_GET['Paket'];
$travel=$_GET['travel'];

$sqlcek=mysqli_query($koneksi,"SELECT * FROM tbl_jumlah_pelayanan WHERE pelayanan_id='$id' AND `id_jumlah_pelayanan`='$id_paket_pelayanan'");

if(mysqli_num_rows($sqlcek)>=1){

    echo "<script language='javascript'>alert('pelayanan ini telah tersedia!');window.history.back();</script>";
}else{
    $sqlinsert=mysqli_query($koneksi,"INSERT INTO tbl_jumlah_pelayanan  VALUES('','$travel','$id','$id_paket_pelayanan')");
    if(isset($sqlinsert)){
        echo "<script language='javascript'>alert('Berhasil Menambah pelayanan!');window.history.back();</script>";
    }else{
        echo "<script language='javascript'>alert('Gagal Menambah pelayanan Paket!');window.history.back();</script>";
    }
}

?>