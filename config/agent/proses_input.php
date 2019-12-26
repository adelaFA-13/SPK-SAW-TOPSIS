<?php 
// include '../koneksi.php';

// $travel_id = $_POST['travel_id'];
// $nama = $_POST['nama'];
// $alamat = $_POST['alamat'];
// $tahun = $_POST['tahun'];

// if ($travel_id === 0){
// 	$sql = "INSERT INTO `tbl_agent_travel` (`id`,`travel_id`,`nama`,`alamat`,`thn_berdiri`,`lokasi`) VALUES ('','$travel_id','$nama','$alamat','$tahun','$lokasi')";
// 	$sql1= "INSERT INTO `tbl_lokasi` (`keterangan`) VALUES ('$alamat')";
// } else {
// 	$sql = "UPDATE `tbl_agent_travel` SET `nama`='$nama', `alamat`='$alamat',`thn_berdiri`='$tahun',`lokasi`='$lokasi' where `travel_id`='$travel_id'";
// 	$sql1 = "UPDATE `tbl_lokasi` SET `keterangan`='$alamat' where `travel_id`='$travel_id' ";
// }




// if(mysqli_query($koneksi,$sql)){
// 	mysqli_query($koneksi,$sql1);
// 	$_SESSION['pesan'] = "Berhasil tambah data program_bantuan";
// 	echo $_SESSION['pesan'];
// }else{
// 	$_SESSION['pesan'] = "Gagal tambah data program_bantuan";
// 	echo $_SESSION['pesan'];
// }
// header('location:/spk_tugasakhir1/index.php?url=pengaturan_agent');

include '../koneksi.php';

$travel_id = $_POST['travel_id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tahun = $_POST['tahun'];
$keterangan= $_POST['keterangan'];

		$dirfoto='foto/';
		$foto_path=$dirfoto.basename($_FILES['foto']['name']);
		$foto=move_uploaded_file($_FILES['foto']['tmp_name'], $foto_path);
		$ukuran	= $_FILES['foto']['size'];
		if($ukuran < 1500000)
		{
			if ($travel_id == '0'){
				$sql = "INSERT INTO `tbl_agent_travel` (`id`,`travel_id`,`nama`,`alamat`,`thn_berdiri`,`foto`) VALUES ('','$travel_id','$nama','$alamat','$tahun','$foto_path')";
				$sql1= "INSERT INTO `tbl_lokasi` (`keterangan`) VALUES ('$keterangan')";
			} else {
				$sql = "UPDATE `tbl_agent_travel` SET `nama`='$nama', `alamat`='$alamat',`thn_berdiri`='$tahun',`foto`='$foto_path' where `travel_id`='$travel_id'";
				$sql1 = "UPDATE `tbl_lokasi` SET `keterangan`='$keterangan' where `travel_id`='$travel_id' ";
			}
			if(mysqli_query($koneksi,$sql)){
				$_SESSION['pesan'] = "Berhasil tambah data";
			}else{
				$_SESSION['pesan'] = "Gagal tambah data";
			}
			header('location:/spk_tugasakhir1/index.php?url=pengaturan_agent');
			
		}
		else
		{
			$_SESSION['pesan']= "Ubah ukuran foto anda";
		}


 ?>