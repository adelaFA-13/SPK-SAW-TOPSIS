<?php 
// <!-- Auth user -->
include 'config/auth_user.php';

// // lihat level
// include 'config/middleware/superadmin.php';

// <!-- Load Route -->
include 'config/routes.php';

// <!-- Load Header -->
if($_SESSION['level'] == 'admin'){

	   include 'halaman/admin_header.php';
	   
	   } else if ($_SESSION['level'] == 'agent'){
	    
	  include 'halaman/agent_travel_header.php';
	   }
	   else if($_SESSION['level'] == 'pengguna'){
	
		include 'halaman/pengguna_header.php';
	     
	   }else if($_SESSION['level'] == 'member'){
		include 'halaman/member_header.php';
	   }
	   else{
		include 'halaman/pengguna_header.php';
	   }
 


// <!-- Load Content -->
foreach ($req as $key => $value) {
	require_once $value;
}
foreach ($include as $key => $value) {
	require_once $value;
}

// <!-- Load Footer -->
include 'halaman/footer.php'; 

?>