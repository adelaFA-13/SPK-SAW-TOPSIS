<?php 

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
		$file = ($_FILES['foto']['name']);

		if($ukuran < 1500000)
		{
			if ($travel_id === '0'){
				$sql = "INSERT INTO `tbl_agent_travel` (`id`,`travel_id`,`nama`,`alamat`,`thn_berdiri`,`foto`) VALUES ('','$travel_id','$nama','$alamat','$tahun','$foto_path')";
				$sql1= "INSERT INTO `tbl_lokasi` (`keterangan`) VALUES ('$keterangan')";
			} else if(empty($file)){
				$sql = "UPDATE `tbl_agent_travel` SET `nama`='$nama', `alamat`='$alamat',`thn_berdiri`='$tahun' where `travel_id`='$travel_id'";
				$sql1 = "UPDATE `tbl_lokasi` SET `keterangan`='$keterangan' where `travel_id`='$travel_id'";
		
			}else{
				$sql = "UPDATE `tbl_agent_travel` SET `nama`='$nama', `alamat`='$alamat',`thn_berdiri`='$tahun',`foto`='$foto_path' where `travel_id`='$travel_id'";
				$sql1 = "UPDATE `tbl_lokasi` SET `keterangan`='$keterangan' where `travel_id`='$travel_id' ";
				echo $sql1;
			}

			if(mysqli_query($koneksi,$sql)){
				mysqli_query($koneksi,$sql1);
				$_SESSION['pesan'] = "Berhasil tambah data";
				echo "<script language='javascript'>alert('Proses Memasukkan Data Travel Agent Berhasil');</script>";
				header('location:/spkumrohhajidela/index.php?url=pengaturan_agent');
			}else{
				$_SESSION['pesan'] = "Gagal tambah data";
			}
			// header('location:/spkumrohhajidela/index.php?url=pengaturan_agent');
		}
		else
		{
			$_SESSION['pesan']= "Ubah ukuran foto anda";
		}


 ?>