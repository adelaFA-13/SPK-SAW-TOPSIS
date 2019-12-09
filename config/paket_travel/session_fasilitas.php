<?php
   include 'config/koneksi.php';

    $travel_id=$_SESSION['user_id'];
    
    $query= "SELECT * FROM tbl_jumlah_fasilitas";

    $hasil= mysqli_query($koneksi,$query);

    if(mysqli_num_rows($hasil)>0){
    $data = mysqli_fetch_assoc($hasil);
    $_SESSION['id_jumlah_fasilitas']=$data['id_jumlah_fasilitas'];
    }else{
        $_SESSION['pesan']="gagal";
    }
?>