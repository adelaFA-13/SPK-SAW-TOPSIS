<?php 
// $nama = $_POST['nama'];
// $bobot = $_POST['bobot'];
// $jenis = $_POST['jenis'];

// $subkriteria = $_POST['subkriteria'];

// $sub_nama = $_POST['sub_nama'];
// $sub_bobot = $_POST['sub_bobot'];

// $sql = "INSERT INTO kriteria VALUES(NULL,'$nama','$bobot','$jenis')";

// if(mysqli_query($koneksi,$sql)){
// 	$kriteria_id = $koneksi->insert_id;

// 	if($subkriteria=="Punya"){
// 		for ($i=0; $i < count($sub_nama); $i++) { 
// 			mysqli_query($koneksi,"INSERT INTO subkriteria VALUES(NULL,'$kriteria_id','$sub_nama[$i]','$sub_bobot[$i]')");
// 		}
// 	}else{
// 		mysqli_query($koneksi,"INSERT INTO subkriteria VALUES(NULL,'$kriteria_id','input','NULL')");
// 	}
// 	$_SESSION['pesan'] = "Berhasil tambah data kriteria";
// }else{
// 	$_SESSION['pesan'] = "Gagal tambah data kriteria";
// }


// header('location:/spk_pro/index.php?url=data_kriteria');
$koneksi = mysqli_connect('localhost','root','','db_spk_tugasakhir(1)') or die(mysqli_error());


$nama=$_POST['nama'];
$jenis=$_POST['jenis'];

$subkriteria =isset($_POST['subkriteria']) ? $_POST['subkriteria'] : null;

if($subkriteria){
	//ada editan lain mungkin
	$sub_nama= isset($_POST['sub_nama']) ? $_POST['sub_nama'] : null;
	$sub_bobot = isset($_POST['sub_bobot']) ? $_POST['sub_bobot'] : null;
}

//insert new kriteria
$sqlInsertNewKriteria = "INSERT INTO tbl_kriteria(`id`,`nama`,`jenis`) VALUES(NULL,'$nama','$jenis')";
$sqlGetLatestIdIn_tbl_kriteria="SELECT MAX(id) from `tbl_kriteria`";

if(mysqli_query($koneksi,$sqlInsertNewKriteria)){
	$resultGetLatestId=mysqli_query($koneksi,$sqlGetLatestIdIn_tbl_kriteria);
	
	if($resultGetLatestId){
		$dataLatestId=mysqli_fetch_row($resultGetLatestId);
		echo $kriteria_id=$dataLatestId[0];
		
		if($subkriteria =="Punya"){

			for ($i=0; $i <count($sub_nama); $i++) {
				mysqli_query($koneksi,"INSERT INTO tbl_subkriteria VALUES(NULL,'$nama','$sub_nama[$i]','$sub_bobot[$i]','$kriteria_id')");
			}
		}/*else{
			mysqli_query($koneksi,"INSERT INTO tbl_subkriteria VALUES(NULL,'$nama','NULL','NULL')");
		}*/
		$_SESSION['pesan'] = "Berhasil tambah data kriteria";
		echo $_SESSION['pesan'];
		header('location:/spkumrohhajidela/index.php?url=data_kriteria');
	}
	else{
		$_SESSION['pesan'] = "Gagal tambah data subkriteria";
		echo $_SESSION['pesan'];
	}
	
 }
 else{
	$_SESSION['pesan'] = "Gagal tambah data kriteria";
	echo $_SESSION['pesan'];
  }

?>