<?php 
session_start();

// if (!isset($_SESSION['login'])) {
// 	header('location:login.php');
// 	$_SESSION['pesan'] = "Anda harus login terlebih dahulu";
// 	exit();
// }

if (!isset($_SESSION['login'])) {
	// header('location:pengguna_dashboard.php');
	$_SESSION['level'] ="pengguna";
	// include 'identifikasi_user.php';

}
// }else{
// 	//  include 'identifikasi_user.php';
// }
?>