<?php
include 'config/koneksi.php';

$sql=mysqli_query($koneksi,"SELECT * FROM tbl_data_paket inner join tbl_agent_travel USING(travel_id) WHERE jenispaket_id='U1'");

while($data=mysqli_fetch_assoc($sql)){
    $datas[]=$data;
}
?>