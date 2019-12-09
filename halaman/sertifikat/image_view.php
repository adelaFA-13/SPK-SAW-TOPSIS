<?php
$koneksi = mysqli_connect('localhost','root','','db_spk_tugasakhir(1)') or die(mysqli_error());
if(isset($_GET['id'])) 
{
    $query1 = "select * from tbl_sertifikat where id='".$_GET['id']."'"; 
    $query = mysqli_query($koneksi,$query1);
    $row = mysqli_fetch_array($query);
    header("Content-type: " .$row['tipe_gambar']);
    echo $row['sertifikat'];
}
else
{
    header('location:index.php');
}
?>