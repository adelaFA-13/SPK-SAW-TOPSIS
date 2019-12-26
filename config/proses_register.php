<?php
include 'koneksi.php';

$username=$_POST['username'];
$user_id=$_POST['user_id'];
$email=$_POST['email'];
$level=$_POST['level'];
$pass=$_POST['password'];

$sql="INSERT INTO `tbl_login` (`id`,`user_id`,`username`,`email`,`password`,`level`)VALUES(NULL,'$user_id','$username','$email','$pass','$level')";
$sql1="INSERT INTO `tbl_data_member`(`id`,`id_member`,`nama`) VALUES(NULL,'$user_id','$username')";

if(mysqli_query($koneksi,$sql)){
    mysqli_query($koneksi,$sql1);
   $_SESSION['pesan'] = "Berhasil tambah data program_bantuan";
    header('location:/spk_tugasakhir/login.php');
}else{
    $_SESSION['pesan'] = "Gagal menambahkan data";
    
    header('location:/spk_tugasakhir1/register_user.php');
}

?>