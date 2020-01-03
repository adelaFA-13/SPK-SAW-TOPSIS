<?php

$req = [];
$include = [];

if(isset($_GET['url'])){
	// All Route
	switch ($_GET['url']) {
		case 'Login':
			$include[]='login.php';
		break;
		case 'register':
			$include[]='register_user.php';
	// Khusus dashboard //
		case 'admin_dashboard':
			$inlude[]= 'halaman/dashboard.php';
			break;	
		case 'agent_travel_dashboard':
			$include[] = 'halaman/agent_travel_dashboard.php';
			break;
		case 'dashboard':
			$include[] = 'halaman/dashboard.php';
			break;
		case 'tamu':
			$include[] ='halaman/pengguna_dashboard.php';
			break;
		case 'member_dashboard':
			$include[]='halaman/member_dashboard.php';
		break;
		case 'pengguna_dashboard':
			$include[]='pengguna_dashboard.php';
		break;
	// end of khusus dashboard//
	//khusus pengguna
		case 'register':
			$include[]='register_travel.php';
		break;
		case 'home':
			$page ="home";
			$include[]='halaman/member_dashboard.php';
		break;
		case 'Halaman_agent_travel':
			$page="agent_travel";
			$req[]='config/member/load_data_agent.php';
			$include[]='halaman/member/agent_travel.php';
		break;
		case 'Agent_detail':
			$req[]='config/pengguna/detail_travelagent.php';
			$include[]='halaman/member/detail_agent.php';
		break;
		case 'Halaman_Pencarian':
			$include[]='halaman/member/pencarian.php';
		break;
		case 'Halaman_Pencarian_Umrah':
			$req[]='config/pencarian/load_pencarian_umrah.php';
			$include[]='halaman/member/pencarian_umrah.php';
		break;
		case 'Halaman_Pencarian_Haji':
		
			$include[]='halaman/member/pencarian_haji.php';
		break;
	//end of pengguna

	// khusus pengaturan profile agent //
		case 'pengaturan_agent':
			include 'config/middleware/agent_travel.php';
			//req[] = 'config/agent_travel/load_data';
			$include[] = 'halaman/agent_travel/pengaturan.php';
			break;
	// end of pengaturan profile //

	// khusus untuk admin //
		case 'data_customer':
			include 'config/middleware/superadmin.php';
			$req[] = 'config/customer/load_data.php';
			$include[] = 'halaman/customer/index.php';
			break;		
		case 'data_agent_travel':
			include 'config/middleware/superadmin.php';
			$req[] = 'config/admin/load_data.php';
			$include[] = 'halaman/admin/agent_travel.php';
			break;
		case 'data_paket_haji':
			$include[] ='halaman/paket_haji/lihat.php';
			break;
		case 'data_paket_umrah':
			$include[] ='halaman/paket_umrah/lihat.php';
			break;
		case 'data_kriteria':	
			$include[] ='halaman/kriteria_2/read.php';
			break;
		case 'tambah_kriteria':
			$include[] ='halaman/kriteria_2/create.php';
			break;
		case 'data_nilai':
			$req[] ='config/nilai/perhitungan.php';
			$include[] = 'halaman/nilai/lihat.php';
			break;
		case 'Data_Proses':
			$include[] = 'halaman/perhitungan/index.php';
			break;
		case 'data_agent_create':
			$include[] = 'halaman/agent_travel/create.php';
			break;
		case 'data_customer_create':
			$include[] = 'halaman/customer/create.php';
			break;
		case 'data_customer_read':
			//$req[]= 'config/customer/load_detail.php';
			$include[]='halaman/customer/read.php';
			break;
		
	// end of khusus admin //
	//khusus untuk travel_agent
		case 'data_paket':
			$req[]='config/paket_travel/load_data.php';
			// $req[]='confing/paket_travel/session_fasilitas.php';
			include 'config/middleware/agent_travel.php';
			$include[]='halaman/paket_travel/index.php';
			break;
		case 'paket_travel_tambah':
			$req[]= 'config/pelayanan/load_data.php';
			$req[]= 'config/Fasilitas/load_data.php';
			$req[]= 'config/paket_travel/load_data.php';
			$req[]= 'config/paket_travel/session_fasilitas.php';
			include 'config/middleware/agent_travel.php';
			$include[]='halaman/paket_travel/create.php';
			break;
		case 'data_fasilitas':
			$req[]= 'config/Fasilitas/load_data.php';
			$include[]='halaman/fasilitas/index.php';
			break;
		case 'data_pelayanan':
			$req[]= 'config/pelayanan/load_data.php';
			$include[]='halaman/pelayanan/index.php';
			break;
		case 'data_sertifikat':
			$include[]= 'halaman/sertifikat/index.php';
		case 'sertifikat_tambah':
			include 'config/middleware/agent_travel.php';
			$include[]='halaman/sertifikat/create.php';
			break;
		case 'Galeri':
			$include[]='halaman/galeri_travel/index.php';
			break;
					
	//end of khusus travel_agent
	//khusus untuk member
	case 'Profile':
		$include[]='halaman/member/Profile.php';
		break;
	//enf of untuk member
	
		case 'data_pengguna':
			include 'config/middleware/superadmin.php';
			$req[] = 'config/pengguna/load_data.php';
			$include[] = 'halaman/pengguna/index.php';
			break;
		case 'data_pengguna_tambah':
			include 'config/middleware/superadmin.php';
			$include[] = 'halaman/pengguna/tambah.php';
			break;
		case 'data_pengguna_lihat':
			include 'config/middleware/superadmin.php';
			$req[] = 'config/pengguna/load_detail.php';
			$include[] = 'halaman/pengguna/lihat.php';
			break;
		case 'data_pengguna_ubah':
			$req[] = 'config/pengguna/load_detail.php';
			$include[] = 'halaman/pengguna/ubah.php';
			break;
		case 'pengaturan':
			$req[] = 'config/pengguna/load_pengguna.php';
			$include[] = 'halaman/pengguna/pengaturan.php';
			break;

		case 'data_calon':
			$req[] = 'config/calon/load_data.php';
			$include[] = 'halaman/calon/index.php';
			break;
		case 'data_calon_tambah':
			$include[] = 'halaman/calon/tambah.php';
			break;
		case 'data_calon_lihat':
			$req[] = 'config/calon/load_detail.php';
			$include[] = 'halaman/calon/lihat.php';
			break;
		case 'data_calon_ubah':
			$req[] = 'config/calon/load_detail.php';
			$include[] = 'halaman/calon/ubah.php';
			break;

		case 'data_kriteria_tambah':
			$include[] = 'halaman/kriteria2/create.php';
			break;
		case 'data_kriteria_lihat':
			$req[] = 'config/kriteria/load_detail.php';
			$include[] = 'halaman/kriteria/lihat.php';
			break;
		case 'data_kriteria_ubah':
			include 'config/middleware/superadmin.php';
			$req[] = 'config/kriteria/load_detail.php';
			$include[] = 'halaman/kriteria/ubah.php';
			break;

		case 'data_subkriteria':
			$req[] = 'config/subkriteria/load_data.php';
			$include[] = 'halaman/subkriteria/index.php';
			break;
		case 'data_subkriteria_tambah':
			include 'config/middleware/superadmin.php';
			$include[] = 'halaman/subkriteria/tambah.php';
			break;
		case 'data_subkriteria_lihat':
			$req[] = 'config/subkriteria/load_detail.php';
			$include[] = 'halaman/subkriteria/lihat.php';
			break;
		case 'data_subkriteria_ubah':
			include 'config/middleware/superadmin.php';
			$req[] = 'config/subkriteria/load_detail.php';
			$include[] = 'halaman/subkriteria/ubah.php';
			break;

		case 'proses_seleksi':
			$req[] = 'config/koneksi.php';
			$req[] = 'config/proses_seleksi/load_kriteria.php';
			$include[] = 'halaman/seleksi/proses_seleksi.php';
			break;

		case 'hasil_seleksi':
			$req[] = 'config/koneksi.php';
			$req[] = 'config/proses_seleksi/load_kriteria.php';
			$req[] = 'config/proses_seleksi/load_calon.php';
			$req[] = 'config/pro/fungsi_preferensi.php';
			$req[] = 'config/proses_seleksi/proses_seleksi.php';
			$include[] = 'halaman/seleksi/hasil_seleksi.php';
			break;
		
		default:
		$req[]='config/koneksi.php';
		$req[]='config/pengguna/load_data.php';
		$include[] ='pengguna_dashboard.php';
		break;
	}
}else{
	//include 'config/middleware/superadmin.php';
	// $include[] = 'halaman/404.php';
	$req[]='config/koneksi.php';
	$req[]='config/pengguna/load_data.php';
	$include[] ='pengguna_dashboard.php';
	// header('location:/spk_tugasakhir1/pengguna_dashboard.php');
}

?>