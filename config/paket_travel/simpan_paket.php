<?php

include '../koneksi.php';

$travel_id=$_POST['travel_id'];
$kodepaket=$_POST['paket_data_id'];

$nama_paket=$_POST['nama_paket'];
$jenis_paket=$_POST['jenis_paket'];
$harga=$_POST['harga_paket'];
$nama_hotel=$_POST['namahotel'];
$bintang_hotel=$_POST['hotelbintang'];
$nama_maskapai=$_POST['nama_maskapai'];
$rute=$_POST['rute'];
$objek=$_POST['objekwisata'];
$durasi=$_POST['durasi'];

// POST FASILITAS
$travel_id=$_POST['travel_id'];
$idbanyakfasilitas=$_POST['idbanyakfasilitas'];
$fasilitas_id=$_POST['fasilitasid'];
$jumlah_fasilitas=count($fasilitas_id);


//post pelayanan
$idbanyakpelayanan =$_POST['idbanyakpelayanan'];
$pelayanan_id=$_POST['pelayananid']; 
$jumlah_pelayanan=count($pelayanan_id); 

for($n=0; $n<$jumlah_pelayanan; $n++){
    $data= "INSERT INTO tbl_jumlah_pelayanan(`id`,`travel_id`,`pelayanan_id`,`id_jumlah_pelayanan`) value (NULL,'$travel_id','$pelayanan_id[$n]','$idbanyakpelayanan')";
    $datas=mysqli_query($koneksi,$data);
}

for($X=0;$X<$jumlah_fasilitas;$X++){
    $sql="INSERT INTO tbl_jumlah_fasilitas (`id`,`travel_id`,`fasilitas_id`,`id_jumlah_fasilitas`) VALUES (NULL,'$travel_id','$fasilitas_id[$X]','$idbanyakfasilitas')";
    $eksekusi =mysqli_query($koneksi,$sql);
}

$query= "INSERT INTO `tbl_data_paket` (`id`,`paket_data_id`,`travel_id`,`nama_paket`,`jenispaket_id`,`harga_paket`,`nama_hotel`,`bintang_hotel`,`nama_maskapai`,`rute_penerbangan`,`objek_wisata`,`id_jumlah_fasilitas`,`id_jumlah_pelayanan`,`jumlah_hari`) VALUES(NULL,'$kodepaket','$travel_id','$nama_paket','$jenis_paket','$harga','$nama_hotel','$bintang_hotel','$nama_maskapai','$rute','$objek','$idbanyakfasilitas','$idbanyakpelayanan','$durasi')";
if(mysqli_query($koneksi,$query)){
    $_SESSION['pesan'] = "Berhasil tambah data PAKET";
    header('location:/spk_tugasakhir1/index.php?url=data_paket');
}else{
    $_SESSION['pesan'] = "Gagal tambah data paket ";
    echo $_SESSION['pesan'];
    exit();
}
?>