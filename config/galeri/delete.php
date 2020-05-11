<?php

include '../koneksi.php';

$id=$_GET['id'];

$sql="DELETE from tbl_galeri where id='$id'";

if(mysqli_query($koneksi,$sql)){
    echo "<script language='javascript'>alert('Hapus Galeri berhasil!');window.history.go(-1);</script>";
}else{
    echo "<script language='javascript'>alert('Gagal menghapus galeri');window.history.back();</script>";
}
?>