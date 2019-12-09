<?php
include('koneksi.php');
	if($_SESSION['level'] == 'admin'){

	   header('location:../index.php?url=dashboard');
	   
	   } else if ($_SESSION['level'] == 'agent'){
	    
	   header('location:../index.php?url=agent_travel_dashboard');

	   }else if ($_SESSION['level'] == 'member'){
		   
		header('location:../index.php?url=member_dashboard');
		}else{
	     
	      echo "salah";
	   }
?>
