<?php 

function getJmlhHaji(){
	include 'config/koneksi.php';
	$query=mysqli_query($koneksi, "SELECT count(paket_data_id) as banyak_paket FROM tbl_data_paket WHERE jenispaket_id <> 'H1'");
	while($data=mysqli_fetch_assoc($query)){
		$datas =implode($data);
	}

	return $datas;
}

function getJmlhUmrah(){
	include 'config/koneksi.php';
	$query=mysqli_query($koneksi, "SELECT count(paket_data_id) as banyak_paket FROM tbl_data_paket WHERE jenispaket_id <> 'U1'");
	while($data=mysqli_fetch_assoc($query)){
		$datas =implode($data);
	}

	return $datas;
}
function getJmlhTravel(){
	include 'config/koneksi.php';
	$query=mysqli_query($koneksi, "SELECT count(travel_id)  FROM tbl_agent_travel");
	while($data=mysqli_fetch_assoc($query)){
		$datas =implode($data);
	}

	return $datas;
}
 ?>