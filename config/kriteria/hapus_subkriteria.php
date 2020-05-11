<?php
include '../koneksi.php';

echo$id=$_GET['Id'];

$sql=mysqli_query($koneksi,"DELETE  FROM tbl_subkriteria WHERE id='$id'");

if($sql == True){
    echo "<script language='javascript'>alert('Data Subkriteria Berhasil Dihapus');window.history.back();</script>";
}else{

}

?>
