<?php

include 'config/koneksi.php';

$id    = $_SESSION['level'];

$hasil = mysqli_query($koneksi, "SELECT* FROM tbl_agent_travel where `status`='Aktif'");

while($data= mysqli_fetch_assoc($hasil)){
    $datas[] = $data;
} 

?>