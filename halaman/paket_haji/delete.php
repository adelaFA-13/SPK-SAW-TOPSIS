<?php 

include 'config/koneksi.php';

$kode_paket=$_GET['id']

$sql=myqli_query($koneksi,"SELECT * FROM tbl_data_paket where paket_data_id='$id'");


if((mysqli_num_rows($sql)) >0){
    $data=mysqli_fetch_assoc($sql);
    $data['id_jumlah_fasilitas'];
    $data['id_jumlah_pelayanan'];

    $sqlhapus1="DELETE FROM tbl_jumlah_fasilitas WHERE id_jumlah_fasilitas=".$data['id_jumlah_fasilitas']."";
    echo $sqlhapus1;
    $sqlhapus="DELETE FROM tbl_data_paket WHERE paket_data_id='$id'";
}
?>