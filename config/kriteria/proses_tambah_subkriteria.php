<?php
 include '../koneksi.php';

 $id=$_POST['id'];
 $nama=$_POST['kriteria'];
 $namaSubkriteria=$_POST['namaSubkriteria'];
 $bobot=$_POST['bobotSubkriteria'];

 $sql=mysqli_query($koneksi,"INSERT INTO tbl_subkriteria values (null,'$nama','$namaSubkriteria','$bobot','$id')");

 if($sql){
     echo
    header('location:/spkumrohhajidela/index.php?url=halaman_subkriteria&kriteria='.$nama.'&id='.$id.'');
 }
 else{
     echo "gagal menambah kriteria";
 }
?>