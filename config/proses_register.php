<?php
include 'koneksi.php';


$username=$_POST['username'];
$user_id=$_POST['user_id'];
$email=$_POST['email'];
$level=$_POST['level'];
$pass=$_POST['password'];

$ceksql=mysqli_query($koneksi,"SELECT * FROM `tbl_login` where `username`='".$username."' OR `email`='".$email."'") or die("error query".mysqli_error());
if(mysqli_num_rows($ceksql)>=1){
    echo "<script language='javascript'>alert('Username or email is Already Exist!');window.history.back();</script>";
}else{$sql="INSERT INTO `tbl_login` (`id`,`user_id`,`username`,`email`,`password`,`level`)VALUES(NULL,'$user_id','$username','$email','$pass','$level')";
    $sql1="INSERT INTO `tbl_data_member`(`id`,`id_member`,`nama`) VALUES(NULL,'$user_id','$username')";
    
    if(mysqli_query($koneksi,$sql)){
        mysqli_query($koneksi,$sql1);
       $_SESSION['pesan'] = "Berhasil tambah data program_bantuan";
       echo "<script language='javascript'>alert('Register Berhasil!');</script>";
        header('location:/spkumrohhajidela/login.php');
    }else{
        $_SESSION['pesan'] = "Gagal menambahkan data";
        
        header('location:/spkumrohhajidela/register_user.php');
    }

}

?>