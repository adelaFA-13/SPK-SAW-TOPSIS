<?php
include '../koneksi.php';
$id=$_GET['id'];
$id_paket_fasilitas=$_GET['Paket'];

$sql=mysqli_query($koneksi,"DELETE FROM tbl_jumlah_pelayanan WHERE pelayanan_id='$id' AND  `id_jumlah_pelayanan`='$id_paket_fasilitas'");

if(isset($sql)){
    echo "<script>alert('Berhasil hapus pelayanan!');window.history.go(-1);</script>";
}else{
    echo "<script>alert('Maaf tidak berhasil menghapus pelayanan!');window.history.go(-1);</script>";
}

?>
