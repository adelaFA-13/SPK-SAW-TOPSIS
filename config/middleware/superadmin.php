<?php 

if($_SESSION['level']!='admin'){
	$_SESSION['pesan'] = "Anda tidak berhak mengakses halaman tersebut";
	header('location:/spk_tugasakhir/halaman/404.php');
}
	// if($_SESSION['level'] == 'superadmin'){
	// 	header('location:/spk_tugasakhir/halaman/admin/index.php');
	// } else if ($_SESSION['level'] == 'agent_travel'){
	// 	header('location:/spk_tugasakhir/halaman/agent_travel/index.php');
	// }else{
	// 	header('location:/spk_tugasakhir/halaman/404.php');
	// }
 ?>