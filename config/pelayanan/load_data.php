<?php

include 'config/koneksi.php';

$id    = $_SESSION['user_id'];
$hasil = mysqli_query($koneksi, "SELECT* FROM tbl_data_pelayanan WHERE travel_id='$id'");

while($data= mysqli_fetch_assoc($hasil)){
    $datas[] = $data;
}
?>