<?php

include 'config/koneksi.php';

$id    = $_SESSION['user_id'];
// $jenis = $_POST['jenispaket'];
// $id_jumlah_fasilitas=$_SESSION['id_jumlah_fasilitas'];

$hasil = mysqli_query($koneksi, "SELECT * FROM tbl_agent_travel WHERE `status`='Aktif'");

while($data= mysqli_fetch_assoc($hasil)){
    $datas[] = $data;
} 

function getJmlhAgent(){
    include 'config/koneksi.php';
    $sql=mysqli_query($koneksi,"SELECT count(travel_id) as byk_data FROM tbl_agent_travel");

    while($row=mysqli_fetch_assoc($sql)){
        $jmlhAgent=$row['byk_data'];
    }
    
    return $jmlhAgent;
}
function getPaketUmrah(){
    include 'config/koneksi.php';
    $sql=mysqli_query($koneksi,"SELECT count(paket_data_id) as byk_data FROM tbl_data_paket WHERE jenispaket_id ='H1'");

    while($row=mysqli_fetch_assoc($sql)){
        $jmlhUmrah=$row['byk_data'];
    }
    
    return $jmlhUmrah;
}
function getPaketHaji(){
    include 'config/koneksi.php';
    $sql=mysqli_query($koneksi,"SELECT count(paket_data_id) as byk_data FROM tbl_data_paket WHERE jenispaket_id ='H1'");

    while($row=mysqli_fetch_assoc($sql)){
        $jmlhHaji=$row['byk_data'];
    }
    
    return $jmlhHaji;
}
function getJmlhMember(){
    include 'config/koneksi.php';
    $sql=mysqli_query($koneksi,"SELECT count(id_member) as byk_data FROM tbl_data_member");

    while($row=mysqli_fetch_assoc($sql)){
        $jmlhMember=$row['byk_data'];
    }
    
    return $jmlhMember;
}
?>