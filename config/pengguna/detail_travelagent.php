<?php

 include 'config/koneksi.php';
 $id= $_GET['id'];
 $query=mysqli_query($koneksi,"SELECT * FROM tbl_agent_travel where travel_id='$id'");
 $query1=mysqli_query($koneksi,"SELECT * FROM tbl_agent_travel where travel_id='$id'");
 $query2=mysqli_query($koneksi,"SELECT * FROM tbl_sertifikat where travel_id='$id'");

 $query3=mysqli_query($koneksi,"SELECT * FROM `tbl_data_paket` INNER JOIN tbl_jenis_paket USING(jenispaket_id) WHERE travel_id='$id' GROUP BY paket_data_id");
 while($data=mysqli_fetch_assoc($query3)){
     $datas[] =$data;
 }

 $query4 =mysqli_query($koneksi, "SELECT DISTINCT travel_id, paket_data_id, tbl_testimoni.testimoni_id, id_member, nilai, COUNT(DISTINCT nilai) as byk_data, sum(DISTINCT nilai) as jmlh_nilai FROM tbl_data_paket LEFT JOIN tbl_testimoni USING(travel_id) WHERE travel_id='$id' GROUP BY paket_data_id");
 $row=mysqli_fetch_assoc($query4);

 if(empty($row['jmlh_nilai']) && empty($row['byk_data'])){
    $nilai_testimoni= 0;
  }else{
    $nilai_testimoni=$row['jmlh_nilai']/$row['byk_data'];	
  }
?>