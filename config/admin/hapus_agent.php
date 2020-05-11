<?php
 include '../koneksi.php';
echo $id=$_GET['id'];

 $sql_login=mysqli_query($koneksi,"DELETE FROM tbl_login where `user_id`='$id'") or mysqli_error();
 $sql_agent_travel=mysqli_query($koneksi,"DELETE FROM tbl_agent_travel where `travel_id`='$id'");
 $sql_lokasi=mysqli_query($koneksi,"DELETE FROM tbl_lokasi where `travel_id`='$id'");
 $sql_galeri=mysqli_query($koneksi,"DELETE FROM tbl_galeri where `travel_id`='$id'");
 $sql_sertifikat=mysqli_query($koneksi,"DELETE FROM tbl_sertifikat where `travel_id`='$id'");
 $sql_testimoni=mysqli_query($koneksi,"DELETE FROM tbl_testimoni where `travel_id`='$id'");
 $sql_data_fasilitas=mysqli_query($koneksi,"DELETE FROM tbl_data_fasilitas where `travel_id`='$id'");
 $sql_jumlah_fasilitas=mysqli_query($koneksi,"DELETE FROM tbl_jumlah_fasilitas where `travel_id`='$id'");
 $sql_data_pelayanan=mysqli_query($koneksi,"DELETE FROM tbl_data_pelayanan where `travel_id`='$id'");
 $sql_jumlah_pelayanan=mysqli_query($koneksi,"DELETE FROM tbl_jumlah_pelayanan where `travel_id`='$id'");
 $sql_data_paket=mysqli_query($koneksi,"DELETE FROM tbl_data_paket where `travel_id`='$id'");
 $sql_agent_travel=mysqli_query($koneksi,"DELETE FROM tbl_agent_travel where `travel_id`='$id'");

 echo "<script language='javascript'>;window.history.back();</script>";
?>