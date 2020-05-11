
<?php

include '../koneksi.php';

$idKriteria=$_POST['idKriteria'];
$idSubkriteria=$_POST['idSubkriteria'];
$nama=$_POST['kriteria'];
$namaSubkriteria=$_POST['namaSubkriteria'];
$bobot=$_POST['bobotSubkriteria'];

$sql=mysqli_query($koneksi,"UPDATE tbl_subkriteria set `nama_sub`='$namaSubkriteria', `bobot`='$bobot' where `id`='$idSubkriteria'");
    
if($sql == true){
    echo "<script language='javascript'>alert('Data Subkriteria $nama Berhasil Ditambahkan');window.history.back();</script>";
    // header('location:/spkumrohhajidela/index.php?url=halaman_subkriteria&kriteria='.$nama.'&id='.$idKriteria.'');
}else{
    echo "gagal mengirim";
}

?>
   