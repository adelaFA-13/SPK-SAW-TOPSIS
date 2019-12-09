<?php

if($_SESSION['level']!='agent'){
	$_SESSION['pesan'] = "Anda tidak berhak mengakses halaman tersebut";
	header('location:/spk_tugasakhir/halaman/404.php');
}

?>
