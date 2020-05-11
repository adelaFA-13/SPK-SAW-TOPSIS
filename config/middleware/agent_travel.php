<?php

if($_SESSION['level']!='agent'){
	$_SESSION['pesan'] = "Anda tidak berhak mengakses halaman tersebut";
	header('location:/spkumrohhajidela/halaman/404.php');
}

?>
