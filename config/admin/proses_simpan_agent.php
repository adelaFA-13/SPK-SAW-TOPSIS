<?php
include '../koneksi.php';

$sql = "SELECT MAX(`user_id`) FROM `tbl_login` ";
$query=mysqli_query($koneksi,$sql);

$id_user= mysqli_fetch_array($query);
if($id_user){
    $nilai=substr($id_user[0],1);
    $kode = (int)$nilai;

    $kode=$kode+1;
    $auto_user = "T".str_pad($kode,4,"0", STR_PAD_LEFT);
} else{
    $auto_user ="T001";
}


$username=$_POST['usernameagent'];
$email=$_POST['email_agent'];
$pass=$_POST['password_agent'];
$auto_user=$_POST['kd_user'];


$ceksql=mysqli_query($koneksi,"SELECT * FROM `tbl_login` where `username`='".$username."' OR `email`='".$email."'") or die("error query".mysqli_error());
if(mysqli_num_rows($ceksql)>=1){
    echo "<script language='javascript'>alert('Username or email is Already Exist!');window.history.back();</script>";
}else{

$sql=mysqli_query($koneksi,"INSERT INTO `tbl_login` (`id`,`user_id`,`username`,`email`,`password`,`level`)VALUES(NULL,'$auto_user','$username','$email','$pass','agent')");
$sql1="INSERT INTO `tbl_agent_travel`(`id`,`travel_id`,`status`) VALUES(NULL,'$auto_user','belum_aktif')";
if($sql == true){
    mysqli_query($koneksi,$sql1);
    echo "<script language='javascript'>alert('Data Mitra Travel Agent Berhasil Ditambahkan');window.history.back();</script>";
}else{
    echo "<script language='javascript'>alert('Data Mitra Travel Agent Gagal Dimasukkan');window.history.back();</script>";
}
}
?>