<?php


function getJumlahAlternatif() {
	include 'config/koneksi.php';
	$query  = "SELECT count(*) FROM tbl_data_paket";
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_array($result)) {
		$jmlData = $row[0];
	}

	return $jmlData;
}

function nilai_tertinggi($nilai_tinggi,$nilai_dihitung)
{
    if ($nilai_dihitung >= $nilai_tinggi ) {
        $nilai_tinggi = $nilai_dihitung;
    }

    return $nilai_tinggi;
}
function getDataPaket($kode_paket){
	include 'config/koneksi.php';
	$query  = "SELECT paket_data_id FROM tbl_data_paket ORDER BY id" ;
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_assoc($result)) {
		$kd_paket[] = $row['paket_data_id'];
	}

    return $kd_paket[($kode_paket)];
}

function getJenis(){
	include 'config/koneksi.php';
	$query  = "SELECT paket_data_id, jenispaket FROM tbl_data_paket INNER JOIN tbl_jenis_paket USING(jenispaket_id) GROUP BY paket_data_id" ;
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_assoc($result)) {
		$jenis_paket[] = $row['jenispaket'];
	}

    return $jenis_paket;
}



function getDataPaketCoba(){
	include 'config/koneksi.php';
	$query  = "SELECT paket_data_id FROM tbl_data_paket ORDER BY id" ;
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_assoc($result)) {
		$kd_paket[] = $row['paket_data_id'];
	}

    return $kd_paket;
}

function getDataTravel(){
	include 'config/koneksi.php';
	$query  = "SELECT travel_id FROM tbl_data_paket ORDER BY id" ;
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_assoc($result)) {
		$kd_travel[] = $row['travel_id'];
	}

    return $kd_travel;
}


function getAgentTravel(){
	include 'config/koneksi.php';
	$query ="SELECT tbl_agent_travel.nama as nama FROM tbl_data_paket INNER JOIN tbl_agent_travel USING(travel_id) ORDER BY tbl_data_paket.id";
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_assoc($result)) {
		$nm_agent[] = $row['nama'];
	}
    return $nm_agent;
}

function getDataHari(){
	include 'config/koneksi.php';
	$query  = "SELECT * FROM tbl_data_paket ORDER BY id";
	$result = mysqli_query($koneksi,$query);
	while ($row = mysqli_fetch_assoc($result)) {
		$hari[] = $row;
	}
	$i=0;
	
		for($i=0;$i<count($hari);$i++){
			if($hari[$i]['jenispaket_id'] == "U1"){
			if($hari[$i]['jumlah_hari'] ==  10){

	            $nilaihari[$i] =3;
	            
	            }else if($hari[$i]['jumlah_hari'] > 10){
	               
	               $nilaihari[$i] =5;
	            }else{
	                
	               $nilaihari[$i]=1;
	            }

			// $nilaihari[$i]= "Umrah";
	     }else{
     		if($hari[$i]['jumlah_hari'] <=  23){

	           $nilaihari[$i] = 1;
	            
            }else if($hari[$i]['jumlah_hari'] == 24 | $hari[$i]['jumlah_hari'] <= 25){
	                
               $nilaihari[$i] = 2;

	        }else if($hari[$i]['jumlah_hari'] == 26 | $hari[$i]['jumlah_hari'] <= 27){
	                
               $nilaihari[$i] =3;

            }else if($hari[$i]['jumlah_hari'] == 28 | $hari[$i]['jumlah_hari'] <= 29){
	                
                $nilaihari[$i] =4;
            }
            else{
              $nilaihari[$i]=5;
            }
		}
	}
	
    return $nilaihari;
}


function getKelasHotel(){
	include 'config/koneksi.php';
	$query  = "SELECT bintang_hotel FROM tbl_data_paket ORDER BY id";
	$result = mysqli_query($koneksi,$query);
	while ($row = mysqli_fetch_assoc($result)) {
		$hotel[] = $row['bintang_hotel'];
	}

		$i=0;
		for($i=0;$i<count($hotel);$i++){
		switch ($hotel[$i]) {
		case 'bintang 5':
			$nilaiHotel[$i] = 5;
			break;
		case 'bintang 4':
			$nilaiHotel[$i] = 4;
			break;
		case 'bintang 3':
			$nilaiHotel[$i] = 3;
			break;
		case 'bintang 2':
			$nilaiHotel[$i] = 2;
			break;
		case 'bintang 1':
			$nilaiHotel[$i] = 1;
			break;
		default:
			$nilaiHotel[$i] = 0;
			break;
		}
	}

	return $nilaiHotel;
}


function getRutePenerbangan(){
	include 'config/koneksi.php';
	$query  = "SELECT rute_penerbangan FROM tbl_data_paket ORDER BY id";
	$result = mysqli_query($koneksi,$query);
	while ($row = mysqli_fetch_assoc($result)) {
		$pesawat[] = $row['rute_penerbangan'];
	}

		$i=0;
		for($i=0;$i<count($pesawat);$i++){
		switch ($pesawat[$i]) {
		case 'Langsung':
			$nilaipesawat[$i] = 5;
			break;
		case 'Tidak Langsung':
			$nilaipesawat[$i] = 3;
			break;
		default:
			$nilaipesawat[$i] = 0;
			break;
		}
	}
	return $nilaipesawat;
}

function getObjekWisata(){
	include 'config/koneksi.php';
	$query  = "SELECT objek_wisata FROM tbl_data_paket ORDER BY id";
	$result = mysqli_query($koneksi,$query);
	while ($row = mysqli_fetch_assoc($result)) {
		$wisata[] = $row['objek_wisata'];
	}
	$i=0;
		for($i=0;$i<count($wisata);$i++){
 			if($wisata[$i] == false){
 				$nilaiWisata[$i] = 3;
 			}else{
 				$nilaiWisata[$i] = 5;
 			}
 		}
 	return $nilaiWisata;
}

function getPelayanan(){
	include 'config/koneksi.php';
	$query =mysqli_query($koneksi, "SELECT tbl_data_paket.paket_data_id, COUNT(id_jumlah_pelayanan) as jumlah_pelayanan FROM tbl_jumlah_pelayanan LEFT JOIN tbl_agent_travel USING(travel_id) LEFT JOIN tbl_data_paket USING(id_jumlah_pelayanan) LEFT JOIN tbl_data_pelayanan USING(pelayanan_id) GROUP BY tbl_data_paket.id");

	$n=getJumlahAlternatif();
	$max=0;
	while($row= mysqli_fetch_assoc($query)){
	 $pel[] =$row['jumlah_pelayanan'];
	 $max_pel = nilai_tertinggi($row['jumlah_pelayanan'],$max);
	}

	$i=0;
	for($i=0;$i<$n;$i++){
  	$hasil_pel[$i]= $pel[$i]/$max_pel;
	}

	$i=0;
	for($i=0;$i<$n;$i++){
    //echo round($hasil_fasil[$i],3).'<br/>';
	    if($hasil_pel[$i] == 1 | $hasil_pel[$i] >= 0.801){
	       
	        $nilai_pelayanan[$i] = 5;
	    }else if($hasil_pel[$i] == 0.8 | $hasil_pel[$i] >= 0.601){
	       
	        $nilai_pelayanan[$i] = 4;
	    }else if($hasil_pel[$i] == 0.6 | $hasil_pel[$i] >= 0.401){
	       
	        $nilai_pelayanan[$i] = 3;
	    }
	    
	    else if($hasil_pel[$i] == 0.4 | $hasil_pel[$i] >= 0.201){
	       
	        $nilai_pelayanan[$i] = 2;
	    }
	    else{
	        $nilai_pelayanan[$i]=1;
	    }
	}

	return $nilai_pelayanan;


}

function getFasilitas(){
	include 'config/koneksi.php';
	$query =mysqli_query($koneksi, "SELECT tbl_data_paket.paket_data_id, COUNT(id_jumlah_fasilitas) as jumlah_fasilitas FROM tbl_jumlah_fasilitas JOIN tbl_agent_travel USING(travel_id) JOIN tbl_data_paket USING(id_jumlah_fasilitas) JOIN tbl_data_fasilitas USING(fasilitas_id) GROUP BY tbl_data_paket.id");

	$n=getJumlahAlternatif();
	$max=0;
	while($row= mysqli_fetch_assoc($query)){
	 $fasil[] =$row['jumlah_fasilitas'];
	 $fasil2[] =$row['jumlah_fasilitas'];
	 sort($fasil2);
	 //$max_fasil = nilai_tertinggi($row['jumlah_fasilitas'],$max);
	}

	$max_fasil=$fasil2[$n-1];
	$i=0;
	for($i=0;$i<$n;$i++){
  	$hasil_fasil[$i]= $fasil[$i]/$max_fasil;
	}

	$i=0;
	for($i=0;$i<$n;$i++){
    //echo round($hasil_fasil[$i],3).'<br/>';
	    if($hasil_fasil[$i] == 1 | $hasil_fasil[$i] >= 0.801){
	       
	        $nilai_fasilitas[$i] = 5;
	    }else if($hasil_fasil[$i] == 0.8 | $hasil_fasil[$i] >= 0.601){
	       
	        $nilai_fasilitas[$i] = 4;
	    }else if($hasil_fasil[$i] == 0.6 | $hasil_fasil[$i] >= 0.401){
	       
	        $nilai_fasilitas[$i] = 3;
	    }
	    
	    else if($hasil_fasil[$i] == 0.4 | $hasil_fasil[$i] >= 0.201){
	       
	        $nilai_fasilitas[$i] = 2;
	    }
	    else{
	        $nilai_fasilitas[$i]=1;
	    }
	}

	return $nilai_fasilitas;

}

function getTestimoni(){
	include 'config/koneksi.php';
	$query =mysqli_query($koneksi, "SELECT DISTINCT travel_id, paket_data_id, tbl_testimoni.testimoni_id, id_member, nilai, COUNT(DISTINCT nilai) as byk_data, sum(DISTINCT nilai) as jmlh_nilai FROM tbl_data_paket LEFT JOIN tbl_testimoni USING(travel_id) GROUP BY paket_data_id");
	while ($row=mysqli_fetch_assoc($query)) {
		$data[]=$row;
	}

	//deklarasi
	$i=0;
	$n=getJumlahAlternatif();
	for($i=0; $i<$n; $i++){
		if(empty($data[$i]['jmlh_nilai']) && empty($data[$i]['byk_data'])){
			$nilai_testimoni[$i]= 0;
		}else{
			$nilai_testimoni[$i]=$data[$i]['jmlh_nilai']/$data[$i]['byk_data'];	
		}	
	}
	
	for($i=0; $i<$n; $i++){
		if($nilai_testimoni[$i] == 5 | $nilai_testimoni[$i] >= 4.1){

			$hasil_testi[$i] = 5;

		}else if($nilai_testimoni[$i] == 4 | $nilai_testimoni[$i] >= 3.1){

			$hasil_testi[$i] = 4;

		} else if($nilai_testimoni[$i] == 3 | $nilai_testimoni[$i] >= 2.1){

			$hasil_testi[$i] = 3;

		}else if($nilai_testimoni[$i] == 2 | $nilai_testimoni[$i] >= 1.1){

			$hasil_testi[$i] = 2;

		}
		else{
			$hasil_testi[$i] = 1;
		}
	}
	return $hasil_testi;
}

function getHarga(){
	include 'config/koneksi.php';
	$query=mysqli_query($koneksi,"SELECT harga_paket from tbl_data_paket GROUP by paket_data_id");
	while ($row=mysqli_fetch_assoc($query)) {
		$harga= number_format($row['harga_paket'],2);
		$data[] = $harga;
	}

	return $data;
}
function getKeamanan(){
	include 'config/koneksi.php';
	$query=mysqli_query($koneksi,"SELECT DISTINCT paket_data_id, thn_habis, travel_id FROM tbl_data_paket INNER JOIN tbl_agent_travel USING(travel_id) GROUP BY paket_data_id");
	while ($row =mysqli_fetch_assoc($query)) {
		
			$habis = new DateTime($row['thn_habis']);
			$today = new DateTime();
			$diff = $today->diff($habis);

			$data[]=$diff->d;
	}
	//deklarasi:
	$i=0;
	$n=getJumlahAlternatif();
	for($i=0; $i<$n; $i++){
	 if( $data[$i] == 0) {
	 	$nilai_keamanan[$i]=1;
	 }else{
	 	$nilai_keamanan[$i]=5;
	 }
	}
	//print_r($nilai_keamanan);
	//return $nilai_keamanan[($kd_keamanan)]; 
	return $nilai_keamanan;
}

function getSertifikat(){
	include 'config/koneksi.php';
	$query=mysqli_query($koneksi,"SELECT DISTINCT paket_data_id, COUNT(DISTINCT sertifikat) as jmlh_sertif from tbl_data_paket LEFT JOIN tbl_sertifikat USING(travel_id) GROUP BY paket_data_id");
	//deklarasi:
	$i=0;
	$max =0;
	$n=getJumlahAlternatif();
	while($row= mysqli_fetch_assoc($query)){
		$data[] = $row['jmlh_sertif'];
		$data2[] = $row['jmlh_sertif'];

		// $max_sertif=nilai_tertinggi($row['jmlh_sertif'],$max);
	}
	sort($data2);
	$max_sertif=$data2[$n-1];

	for($i=0;$i<$n;$i++){
		$hasil_sertif[$i]= $data[$i]/$max_sertif;	
	}



	for($i=0; $i<$n; $i++){	
	  	if($hasil_sertif[$i] == 1 | $hasil_sertif[$i] >= 0.801){
	       
	        $nilai_sertifikat[$i] = 5;

	    }else if($hasil_sertif[$i] == 0.8 | $hasil_sertif[$i] >= 0.601){
	       
	        $nilai_sertifikat[$i] = 4;

	    }else if($hasil_sertif[$i] == 0.6 | $hasil_sertif[$i] >= 0.401){
	       
	        $nilai_sertifikat[$i] = 3;
	    }
	    
	    else if($hasil_sertif[$i] == 0.4 | $hasil_sertif[$i] >= 0.201){
	       
	        $nilai_sertifikat[$i] = 2;
	    }
	    else{
	        $nilai_sertifikat[$i]=1;
	    }
	}
	return $nilai_sertifikat;
}
// function nilaiHari(){
//     include 'koneksi.php';
// 	$query  = "SELECT count(*) FROM tbl_data_paket";
// 	$result = mysqli_query($koneksi, $query);
// 	while ($row = mysqli_fetch_array($result)) {
// 		$jmlPaket = $row[0];
// 	}

//     return $jmlPaket;
// }
    

?>