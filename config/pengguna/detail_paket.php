<?php
include 'config/koneksi.php';

$id=$_GET['id'];
$travel=$_GET['Travel'];
$query=mysqli_query($koneksi,"SELECT * FROM tbl_agent_travel where travel_id='$travel'");

$query2=mysqli_query($koneksi,"SELECT * FROM tbl_sertifikat where travel_id='$travel'");

$query3=mysqli_query($koneksi,"SELECT * FROM `tbl_data_paket` INNER JOIN tbl_jenis_paket USING(jenispaket_id) WHERE travel_id='$id' AND paket_data_id='$travel' GROUP BY paket_data_id");


?>