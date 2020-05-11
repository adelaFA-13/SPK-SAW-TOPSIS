<?php 
include '../koneksi.php';

$travel_id = $_POST['travel_id'];

		$dirfoto='foto/';
		$foto_path=$dirfoto.basename($_FILES['foto']['name']);
		$foto=move_uploaded_file($_FILES['foto']['tmp_name'], $foto_path);
		$ukuran	= $_FILES['foto']['size'];

		if($ukuran < 1500000){
               	$sql="INSERT INTO tbl_galeri VALUES('','$travel_id','$foto_path')";
				if(mysqli_query($koneksi,$sql)){
				$_SESSION['pesan'] = "Berhasil tambah data";
				echo "<script language='javascript'>alert('Anda Berhasil Mengupload Galeri ');window.history.back();</script>";
			}else{
				$_SESSION['pesan'] = "Gagal tambah data";
				echo "<script language='javascript'>alert('Gagal  Mengupload Galeri ');window.history.back();</script>";
			}
		}
		else
		{
			echo "<script language='javascript'>alert('Silahkan ubah foto anda dibawah 1.5 MB ');window.history.back();</script>";
		}

 ?>