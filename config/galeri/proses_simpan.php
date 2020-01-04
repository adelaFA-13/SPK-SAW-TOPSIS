<?php 
include '../koneksi.php';

$travel_id = $_POST['travel_id'];

		$dirfoto='foto/';
		$foto_path=$dirfoto.basename($_FILES['foto']['name']);
		$foto=move_uploaded_file($_FILES['foto']['tmp_name'], $foto_path);
		$ukuran	= $_FILES['foto']['size'];
		if($ukuran < 1500000){
                $sql = "INSERT INTO `tbl_galeri` (`id`,`travel_id`,`foto`) VALUES ('','$travel_id','$foto_path')";
			if(mysqli_query($koneksi,$sql)){
				$_SESSION['pesan'] = "Berhasil tambah data";
			}else{
				$_SESSION['pesan'] = "Gagal tambah data";
			}
			header('location:/spk_tugasakhir1/index.php?url=Galeri');
			
		}
		else
		{
			$_SESSION['pesan']= "Ubah ukuran foto anda";
		}


 ?>