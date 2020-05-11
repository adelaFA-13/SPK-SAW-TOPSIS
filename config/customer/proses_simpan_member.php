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


$username=isset($_POST['username']) ? $_POST['username'] : 0;
$email=isset($_POST['email']) ? $_POST['email'] : 0;
$pass=isset($_POST['password']) ? $_POST['password'] :0;
$auto_user=isset($_POST['kd_user']) ? $_POST['kd_user']: 0;

$sql_cek=mysqli_query($koneksi,"SELECT * FROM tbl_login where `username`='$username' OR `email`='$email'");
$hasilcek=mysqli_num_rows($sql_cek);

if($hasilcek >= 1){
    echo "<script language='javascript'>alert('Username or Email sudah digunakan!');window.history.back();</script>";
}else{

    $sql=mysqli_query($koneksi,"INSERT INTO `tbl_login` (`id`,`user_id`,`username`,`email`,`password`,`level`)VALUES(NULL,'$auto_user','$username','$email','$pass','member')");
    
    if($sql == true){
        $sql1=mysqli_query($koneksi,"INSERT INTO `tbl_data_member` (`id`,`id_member`)VALUES(NULL,'$auto_user')");
        echo $auto_user;
        
        echo "<script language='javascript'>alert('Data Member Travel Agent Berhasil Ditambahkan');</script>";
        header('location:/spkumrohhajidela/index.php?url=data_member');
    }else{
        echo "<script language='javascript'>alert('Tambah Member tidak berhasil ditambahkan');window.history.back();</script>";
    }
}



?>