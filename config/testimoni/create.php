<?php
	include '../koneksi.php';
	session_start();
	$sql = "SELECT MAX(`testimoni_id`) FROM `tbl_testimoni`";
	$query=mysqli_query($koneksi,$sql);

	$id_testimoni= mysqli_fetch_array($query);
	if($id_testimoni){
		$nilai=substr($id_testimoni[0],1);
		$kode = (int)$nilai;
		
		$kode=$kode+1;
		$auto_kode = "M".str_pad($kode,4,"0", STR_PAD_LEFT);
	} else{
		$auto_kode ="M001";
	}

	$nilai = $_POST['nilai'];

	//user_id di session adalah id user yang login
	if(!isset($_SESSION['user_id'])){ //jika tidak di set nilai session user_id
		$response = ['status'=>false, 'message'=>'Please login for submit rating!'];
		echo json_encode($response);exit(); //jika tidak masuk ke kondisi, maka exit
	}

	$id_member = $_SESSION['user_id'];
	$tanggal = date('Y-m-d H:i:s');
	$travel_id = $_POST['travel_id'];
	$is_reload_page = $_POST['is_reload_page'];

	$testimoni = mysqli_query($koneksi, "SELECT `id`,`testimoni_id`,`nilai` FROM `tbl_testimoni` WHERE `id_member`='$id_member' LIMIT 1");
	$data = [];
	
	if($testimoni != false){
		while ($row = mysqli_fetch_assoc($testimoni)) {
			$data[] = $row;
		}

		if($is_reload_page==1){
			$nilai = isset($data[0]['nilai']) ? $data[0]['nilai'] : '';
		}
	}
	if(count($data) == 0){

		// $last_testimoni_id = mysqli_query($koneksi, "SELECT `testimoni_id` FROM `tbl_testimoni` ORDER BY `testimoni_id` DESC LIMIT 1");
		// $testimoni_id = '';
		// if($last_testimoni_id != false){
		// 	while ($row = mysqli_fetch_assoc($last_testimoni_id)) {
		// 		$testimoni_id = $row['testimoni_id'];
		// 	}
		// }
		// $id_num = [];
		// $regex = "/[1-9]{1}+[0-9]{0,10}/";
		// preg_match($regex, $testimoni_id, $id_num);
		// $testimoni_id = preg_replace($regex, ($id_num[0]+1), $testimoni_id);
		
		$query = "INSERT INTO `tbl_testimoni` (`id`,`id_member`,`nilai`,`travel_id`,`tanggal`) VALUES ('','$id_member','$nilai','$travel_id','$tanggal')";
  	}else{
    	$query = "UPDATE `tbl_testimoni` SET `nilai`='$nilai' WHERE `id_member`='$id_member'";
 	}
  	
  	$res = mysqli_query($koneksi,$query);
  	if($res){
	  	$response = ['status'=>true, 'nilai'=>$nilai];
		echo json_encode($response);
	}else{
		$response = ['status'=>false, 'message'=>'Gagal submit rating!'];
		echo json_encode($response);
	}
?>