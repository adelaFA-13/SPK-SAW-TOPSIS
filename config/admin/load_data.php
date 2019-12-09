<?php

include 'config/koneksi.php';

$id    = $_SESSION['user_id'];
// $id_jumlah_fasilitas=$_SESSION['id_jumlah_fasilitas'];

$hasil = mysqli_query($koneksi, "SELECT* FROM tbl_agent_travel");

while($data= mysqli_fetch_assoc($hasil)){
    $datas[] = $data;
} 

?>