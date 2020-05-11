<?php
$koneksi = mysqli_connect('localhost','root','','db_spk_tugasakhir(1)') or die(mysqli_error());
//$id    = $_SESSION['user_id'];
$jenis = $_POST['jenis_paket'];
//$id_jumlah_fasilitas=$_SESSION['id_jumlah_fasilitas'];

if ($jenis == 'H1') 
{
	$hasil = mysqli_query($koneksi, "SELECT* FROM tbl_agent_travel where jenispaket_id = '$jenis'");
	while($data= mysqli_fetch_assoc($hasil))
	{
    	$datas[] = $data;
	}
} elseif ($jenis == 'H1') 
{
	$hasil1 = mysqli_query($koneksi, "SELECT* FROM tbl_agent_travel where jenispaket_id = '$jenis'");
	while($datoo= mysqli_fetch_assoc($hasil1))
	{
    	$datoss[] = $datoo;
	}
}
?>