<?php

include 'config/koneksi.php';

$id    = $_SESSION['user_id'];
$hasil = mysqli_query($koneksi, "SELECT tbl_data_fasilitas.fasilitas_id,tbl_data_fasilitas.nama_fasilitas, tbl_data_fasilitas.travel_id FROM tbl_data_fasilitas JOIN tbl_agent_travel ON tbl_data_fasilitas.travel_id = tbl_agent_travel.travel_id WHERE tbl_data_fasilitas.travel_id ='$id' ");

while($data= mysqli_fetch_array($hasil)){
    $datas[] = $data;
}
?>