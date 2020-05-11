<?php

include '../koneksi.php';

echo $id=$_GET['kode'];


if (mysqli_query($koneksi, "DELETE FROM tbl_data_fasilitas where fasilitas_id='$id'")){
    mysqli_query($koneksi,"DELETE FROM tbl_jumlah_fasilitas where fasilitas_id='$id'");
    $_SESSION['pesan'] = "Berhasil hapus data kriteria";
    echo "<script language='javascript'>alert('Data Fasilitas Berhasil Dihapus');window.history.back();</script>";
}
   
else{
	$_SESSION['pesan'] = "Gagal hapus data kriteria";
    echo "<script language='javascript'>alert('Data Fasilitas Gagal Dihapus');window.history.back();</script>";
}

 ?>