<?php
include 'koneksi.php';

switch ($_POST['type']) {
	case 'data_kriteria':
		$hasil = mysqli_query($koneksi, 'SELECT* FROM tbl_data_paket WHERE jenispaket=\''.$_POST['jenis'].'\'');
		break;
	
	default:
		echo json_encode('Data not found!');
		exit();
		break;
}


$result = [];
if($hasil){
	$counter = 0;
	while($data= mysqli_fetch_assoc($hasil)){
		$data['no'] = $counter+1;
	    $result[] = $data;
	    $counter++;
	} 
	echo json_encode(['data' => $result]);
}
else{
	echo json_encode('Data not found!');
}
?>