<?php 

include '../koneksi.php';
// $koneksi = mysqli_connect('localhost','root','','db_spk_tugasakhir(1)') or die(mysqli_error());

if(!empty($_POST['Fasilitasnew'])){

    $travel_id = $_POST['travel_id'];
    $nama_fasilitas = $_POST['Fasilitasnew'];
    $fasilitas_id= $_POST['fasilitas_id'];
    $QUERY ="INSERT INTO `tbl_data_fasilitas`(`id`, `fasilitas_id`,`nama_fasilitas`, `travel_id`) VALUES ('','$fasilitas_id','$nama_fasilitas', '$travel_id')";
    
    if(mysqli_query($koneksi,$QUERY)){

        header('location:/spkumrohhajidela/index.php?url=data_fasilitas');
    }else{
        $_SESSION['pesan'] = "Gagal menambahkan data";
    
        echo "<script language='javascript'>alert('Proses Memasukkan Data Travel Agent Gagal');window.history.back();</script>";
    }
}else{
    
    echo "<script language='javascript'>alert('Lets Entry your Facilities First!');window.history.back();</script>";
}
 
?>