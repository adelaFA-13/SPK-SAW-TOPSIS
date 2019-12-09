<?php

include '../koneksi.php';

$travel_id=$_POST['travel_id'];
$banyakfasilitas=$_POST['idbanyakfasilitas'];
$fasilitas_id=$_POST['fasilitasid'];

$jumlah_fasilitas=count($fasilitas_id);



// echo $travel_id;
// echo $fasilitas_id;

// for($i=0;$i<$jumlah_fasilitas;$i++){
//     $val=$fasilitas_id[$i];
//     echo $travel_id;
//     echo $banyakfasilitas;
//     echo $val;
//      ?><br><?php
     

//     //$sql="INSERT INTO `tbl_jumlah_fasilitas` (`id`,`travel_id`,`fasilitas_id`,`id_jumlah_fasilitas`) VALUES (NULL,'$travel_id','$val','$banyakfasilitas')";
//    $sql="INSERT INTO `tbl_jumlah_fasilitas` (`id`,`travel_id`,`fasilitas_id`,`id_jumlah_fasilitas`) VALUES (NULL,'$travel_id','$val','$banyakfasilitas')";
//   //  $sql="INSERT INTO `tbl_jumlah_fasilitas` (`id`,`fasilitas_id`) VALUES (NULL,'$val')";
// }

// $sql="INSERT INTO `tbl_banyak_fasilitas` (`id`,`travel_id`) VALUES (NULL,'$travel_id')";
// echo "berhasi";

for($X=0;$X<$jumlah_fasilitas;$X++){
    $sql="INSERT INTO tbl_jumlah_fasilitas (`id`,`travel_id`,`fasilitas_id`,`id_jumlah_fasilitas`) VALUES (NULL,'$travel_id','$fasilitas_id[$X]','$banyakfasilitas')";
    $query =mysqli_query($koneksi,$sql);
}


// if(mysqli_query($koneksi,$sql)){
//     $_SESSION['pesan'] = "Berhasil tambah data program_bantuan";
//     echo "berhasil";
//     //header('location:/spk_tugasakhir/index.php?url=data_paket');
// }else{
//     $_SESSION['pesan'] = "Gagal tambah data program_bantuan";
//     echo $_SESSION['pesan'];
// }
?>
