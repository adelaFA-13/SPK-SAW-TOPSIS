<?php

include 'config/koneksi.php';

$id    = $_SESSION['user_id'];
// $id_jumlah_fasilitas=$_SESSION['id_jumlah_fasilitas'];
$hasil = mysqli_query($koneksi, "SELECT* FROM tbl_data_paket WHERE travel_id='$id'");
$hasil2 = mysqli_query($koneksi, "SELECT * FROM tbl_jenis_paket");
$query3=mysqli_query($koneksi,"SELECT * FROM tbl_data_fasilitas WHERE `travel_id`='$id'");
$hasil3 = mysqli_query($koneksi, "SELECT nama_paket, tbl_jenis_paket.jenispaket FROM tbl_data_paket INNER JOIN tbl_jenis_paket USING(jenispaket_id) INNER JOIN tbl_agent_travel USING(travel_id) WHERE tbl_data_paket.travel_id='$id'");
//$hasil4 = mysqli_query($koneksi,"SELECT tbl_data_fasilitas.nama_fasilitas, tbl_jumlah_fasilitas.id_jumlah_fasilitas, tbl_jumlah_fasilitas.travel_id FROM tbl_jumlah_fasilitas INNER JOIN tbl_data_fasilitas USING(fasilitas_id) INNER JOIN tbl_agent_travel ON tbl_agent_travel.travel_id=tbl_jumlah_fasilitas.travel_id WHERE id_jumlah_fasilitas='$id_jumlah_fasilitas' AND tbl_jumlah_fasilitas.travel_id='$id'");
while($data= mysqli_fetch_assoc($hasil)){
    $datas[] = $data;
}

while($row= mysqli_fetch_assoc($hasil2)){
    $rows[] = $row;
}
while($dato= mysqli_fetch_assoc($hasil3)){
    $datos[] = $dato;
}
while($fas= mysqli_fetch_assoc($hasil3)){
    $fass[] = $fas;
}
// while($result2= mysqli_fetch_assoc($hasil4)){
//     $result2s[] = $result2;
// }

?>