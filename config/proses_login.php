<?php 

	include('koneksi.php');

	session_start();

	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = "SELECT * FROM tbl_login where username ='$username' AND password='$password'";

	$hasil = mysqli_query($koneksi, $query);

	if(mysqli_num_rows($hasil)>0){
		$data = mysqli_fetch_assoc($hasil);
		$_SESSION['login'] = true;
		$_SESSION['id'] = $data['id'];
		$_SESSION['user_id']= $data['user_id'];
		$_SESSION['username'] = $data['username'];
		$_SESSION['password'] = $data['password'];
		$_SESSION['email'] = $data['email'];
		$_SESSION['level'] = $data['level'];
	
	
		include 'identifikasi_user.php';
		// if($_SESSION['level'] == 'superadmin'){
		// 	header('location:../index.php?url=dashboard');
		// }
		// $_SESSION['pesan'] = "Selamat Datang ".$data['nama'];
		
		// var_dump($data);

	}else{
		header('location:../login.php');
		$_SESSION['pesan'] = "Username dan Password yang anda masukkan salah";
	}

 ?>