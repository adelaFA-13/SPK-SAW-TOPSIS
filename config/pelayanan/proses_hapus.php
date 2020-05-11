<?php
include '../koneksi.php';

$id=$_GET['id'];

$sql=mysqli_query($koneksi,"DELETE FROM tbl_pelayanan WHERE pelayanan_id='$id'");

if($sql == true){
    echo "<script language='javascript'>alert('Data pelayanan berhasil dihapus!');window.history.back();</script>";
}else{
    echo "<script language='javascript'>alert('Gagal menghapus Pelayanan');window.history.back();</script>";
}
?>