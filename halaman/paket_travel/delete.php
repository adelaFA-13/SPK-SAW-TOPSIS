<?php 

$koneksi = mysqli_connect('localhost','root','','db_spk_tugasakhir(1)') or die(mysqli_error());

$kode_paket=$_GET['id'];
$kode_fasil=$_GET['fasil'];
$kode_pel=$_GET['pel'];


    $sqlhapus1="DELETE FROM tbl_jumlah_fasilitas WHERE id_jumlah_fasilitas='$kode_fasil'";
    $sqlhapus2="DELETE FROM tbl_jumlah_pelayanan WHERE id_jumlah_pelayanan='$kode_pel'";
    $sqlhapus="DELETE FROM tbl_data_paket WHERE paket_data_id='$kode_paket'";

    if(mysqli_query($koneksi,$sqlhapus1)){
        if(mysqli_query($koneksi,$sqlhapus2)){
            if(mysqli_query($koneksi,$sqlhapus)){

                echo "<script language='javascript'>alert('Berhasil Menghapus Paket Data');</script>";
                header('location:spkumrohhajidela/index.php?url=data_paket');
            }else{
                echo "<script language='javascript'>alert('Gagal Menghapus Paket Data')</script>";
                header('location:spkumrohhajidela/index.php?url=data_paket');
            }
        }else{
            echo "<script language='javascript'>alert('Gagal Menghapus Banyak pelayanan')</script>";
            header('location:spkumrohhajidela/index.php?url=data_paket');
        }
        echo "<script language='javascript'>alert('Gagal Menghapus Banyak pelayanan');</script>";
        header('location:spkumrohhajidela/index.php?url=data_paket');
    }else{
        echo "<script language='javascript'>alert('Gagal Menghapus Data Paket');</script>";
        header('location:spkumrohhajidela/index.php?url=data_paket');
    }
?>  