<?php
$koneksi = mysqli_connect('localhost','root','','db_spk_tugasakhir(1)') or die(mysqli_error());
$id=$_GET['id'];

echo $id;

$sql="DELETE FROM `tbl_sertifikat` Where id='$id'";

if(mysqli_query($koneksi,$sql)){
    echo "<script language='javascript'>alert('Berhasil Menghapus Sertifikat');window.history.back();</script>";
}else{
    echo "<script language='javascript'>alert('Gagal Menghapus Sertifikat');window.history.back();</script>";
}
?>