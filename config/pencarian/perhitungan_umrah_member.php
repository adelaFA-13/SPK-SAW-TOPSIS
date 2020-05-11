<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include '../koneksi.php';
session_start();


$bobot_harga = isset($_POST['bobot_harga']) ? $_POST['bobot_harga'] : null;
$bobot_paket = isset($_POST['bobot_paket']) ? $_POST['bobot_paket'] : null;
$bobot_keamanan = isset($_POST['bobot_keamanan']) ? $_POST['bobot_keamanan'] : null;
$bobot_fasilitas = isset($_POST['bobot_fasilitas']) ? $_POST['bobot_fasilitas'] : null;
$bobot_pelayanan = isset($_POST['bobot_pelayanan']) ? $_POST['bobot_pelayanan'] : null;
$bobot_sertifikat = isset($_POST['bobot_sertifikat']) ? $_POST['bobot_sertifikat'] : null;
$bobot_testimoni = isset($_POST['bobot_testimoni']) ? $_POST['bobot_testimoni'] : null;
$submit = isset($_POST['submit']) ? $_POST['bobot_submit'] : null;

 if($bobot_harga == null && $bobot_fasilitas == null && $bobot_keamanan == null && $bobot_paket == null && $bobot_pelayanan == null && $bobot_sertifikat == null && $bobot_testimoni == null){
    echo "<script language='javascript'>alert('Lengkapi Kriteria Prioritas Anda');window.history.go(-1);</script>";

}else{
    //menyimpan bobot kriteria
    $_SESSION['bobot_kriteria']=[
        'harga' => $bobot_harga,
        'keamanan' => $bobot_keamanan,
        'paket' => $bobot_paket,
        'fasilitas' => $bobot_fasilitas,
        'pelayanan' => $bobot_testimoni,
        'sertifikat' => $bobot_sertifikat,
        'testimoni' => $bobot_testimoni,
    ];
    //menyimpan bobot subkriteria

    $sql_subkriteria=mysqli_query($koneksi,"SELECT * FROM tbl_subkriteria");
    while($data=mysqli_fetch_assoc($sql_subkriteria)){
        $datas[$data['nama_sub']]=$data['bobot'];
    }
    $_SESSION['subkriteria']=$datas;
    $kriteria_bobot=$_SESSION['bobot_kriteria'];
    // print_r($kriteria_bobot);
    $subkriteria_bobot=$_SESSION['subkriteria'];
    //print_r($subkriteria_bobot);
    $subkriteria_bobot['Kelas Hotel']; //contoh manggil subkriteria

// Fungsi Ambil Nilai
function getJumlahAlternatif() {
	include '../koneksi.php';
	$query  = "SELECT count(*) FROM tbl_data_paket Where jenispaket_id='U1'";
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
	include '../koneksi.php';
	$query  = "SELECT paket_data_id FROM tbl_data_paket  Where jenispaket_id='U1' ORDER BY id" ;
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_assoc($result)) {
		$kd_paket[] = $row['paket_data_id'];
	}

    return $kd_paket[($kode_paket)];
}

function getJenis(){
	include '../koneksi.php';
	$query  = "SELECT paket_data_id, jenispaket FROM tbl_data_paket INNER JOIN tbl_jenis_paket USING(jenispaket_id)  Where jenispaket_id='U1' GROUP BY paket_data_id" ;
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_assoc($result)) {
		$jenis_paket[] = $row['jenispaket'];
	}

    return $jenis_paket;
}

function getDataPaketCoba(){
	include '../koneksi.php';
	$query  = "SELECT paket_data_id FROM tbl_data_paket Where jenispaket_id='U1' ORDER BY id" ;
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_assoc($result)) {
		$kd_paket[] = $row['paket_data_id'];
	}
    return $kd_paket;
}

function getDataTravel($kode_id_agent){
	include '../koneksi.php';
	$query  = "SELECT travel_id FROM tbl_data_paket   Where jenispaket_id='U1' ORDER BY id" ;
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_assoc($result)) {
		$kd_travel[] = $row['travel_id'];
	}

    return $kd_travel[($kode_id_agent)];
}


function getAgentTravel($kode_nama_agent){
	include '../koneksi.php';
	$query ="SELECT tbl_agent_travel.nama as nama FROM tbl_data_paket INNER JOIN tbl_agent_travel USING(travel_id)  Where jenispaket_id='U1' ORDER BY tbl_data_paket.id";
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_assoc($result)) {
		$nm_agent[] = $row['nama'];
	}
    return $nm_agent[($kode_nama_agent)];
}

function getDataHari($kd_hari){
	include '../koneksi.php';
	$query  = "SELECT * FROM tbl_data_paket  Where jenispaket_id='U1' ORDER BY id";
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
	
    return $nilaihari[($kd_hari)];
}


function getKelasHotel($kd_hotel){
	include '../koneksi.php';
	$query  = "SELECT bintang_hotel FROM tbl_data_paket  Where jenispaket_id='U1' ORDER BY id";
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

	return $nilaiHotel[($kd_hotel)];
}

function getRutePenerbangan($kd_rute){
	include '../koneksi.php';
	$query  = "SELECT rute_penerbangan FROM tbl_data_paket  Where jenispaket_id='U1' ORDER BY id";
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
	return $nilaipesawat[($kd_rute)];
}

function getObjekWisata($kd_wisata){
	include '../koneksi.php';
	$query  = "SELECT objek_wisata FROM tbl_data_paket  Where jenispaket_id='U1' ORDER BY id";
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
 	return $nilaiWisata[($kd_wisata)];
}

function getPelayanan($kd_pelayanan){
	include '../koneksi.php';
	$query =mysqli_query($koneksi, "SELECT tbl_data_paket.paket_data_id, COUNT(id_jumlah_pelayanan) as jumlah_pelayanan FROM tbl_jumlah_pelayanan LEFT JOIN tbl_agent_travel USING(travel_id) LEFT JOIN tbl_data_paket USING(id_jumlah_pelayanan) LEFT JOIN tbl_data_pelayanan USING(pelayanan_id)  Where jenispaket_id='U1' GROUP BY tbl_data_paket.id");

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

	return $nilai_pelayanan[($kd_pelayanan)];
}

function getFasilitas($kd_fasilitas){
	include '../koneksi.php';
	$query =mysqli_query($koneksi, "SELECT tbl_data_paket.paket_data_id, COUNT(id_jumlah_fasilitas) as jumlah_fasilitas FROM tbl_jumlah_fasilitas JOIN tbl_agent_travel USING(travel_id) JOIN tbl_data_paket USING(id_jumlah_fasilitas) JOIN tbl_data_fasilitas USING(fasilitas_id)  Where jenispaket_id='U1' GROUP BY tbl_data_paket.id");

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

	return $nilai_fasilitas[($kd_fasilitas)];

}

function getTestimoni($kd_testi){
	include '../koneksi.php';
	$query =mysqli_query($koneksi, "SELECT DISTINCT travel_id, paket_data_id, tbl_testimoni.testimoni_id, id_member, nilai, COUNT(nilai) as byk_data, sum(nilai) as jmlh_nilai FROM tbl_data_paket LEFT JOIN tbl_testimoni USING(travel_id)  Where jenispaket_id='U1' GROUP BY paket_data_id");
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
			$nilai_testimoni[$i]=round($data[$i]['jmlh_nilai']/$data[$i]['byk_data'],1);	
		}	
	}
	return $nilai_testimoni[($kd_testi)];
}

function getHarga($kd_harga){
	include '../koneksi.php';
	$query=mysqli_query($koneksi,"SELECT harga_paket from tbl_data_paket  Where jenispaket_id='U1' GROUP by paket_data_id");
	while ($row=mysqli_fetch_assoc($query)) {
		$harga= number_format($row['harga_paket'],2);
		$data[] = $harga;
	}

	return $data[($kd_harga)];
}
function getKeamanan($kd_keamanan){
	include '../koneksi.php';
	$query=mysqli_query($koneksi,"SELECT DISTINCT paket_data_id, thn_habis, travel_id FROM tbl_data_paket INNER JOIN tbl_agent_travel USING(travel_id)  Where jenispaket_id='U1' GROUP BY paket_data_id");
	while ($row =mysqli_fetch_assoc($query)) {
			date_default_timezone_set('Asia/Jakarta');
			$habis[] = new DateTime($row['thn_habis']);
			$today[] = new DateTime();		
	}
	//deklarasi:
	$i=0;
	$n=getJumlahAlternatif();
	for($i=0; $i<$n; $i++){
	 if( $today[$i] >= $habis[$i]) {
	 	$nilai_keamanan[$i]=1;
	 }else{
	 	$nilai_keamanan[$i]=5;
	 }
	}
	//print_r($nilai_keamanan);
	//return $nilai_keamanan[($kd_keamanan)]; 
	return $nilai_keamanan[($kd_keamanan)];
}

function getSertifikat($kd_sertif){
	include '../koneksi.php';
	$query=mysqli_query($koneksi,"SELECT DISTINCT paket_data_id, COUNT(DISTINCT sertifikat) as jmlh_sertif from tbl_data_paket LEFT JOIN tbl_sertifikat USING(travel_id)  Where jenispaket_id='U1' GROUP BY paket_data_id");
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
		if(empty($data[$i])){
		$hasil_sertif[$i]= 0;
	}else{
		$hasil_sertif[$i]= $data[$i]/$max_sertif;	
	}
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
	return $nilai_sertifikat[($kd_sertif)];
}

function getKriteriaPaket($kd_paket){
    
    $n= getJumlahAlternatif();
    for($i=0; $i<$n; $i++){
        $nilai_Paket[$i]=getDataHari($i);
    }
    return $nilai_Paket[($kd_paket)];
}

// masuki nilai alternatif
$n= getJumlahAlternatif();
// echo $n;
for($i=0; $i<$n; $i++){
    $_SESSION['data'][$i]=[
        'kodepaket'=> getDataPaket($i),
        'namaagent'=>getAgentTravel($i),
        'harga' =>getHarga($i),
        'paket' =>(getDataHari($i)*$subkriteria_bobot['Durasi_perjalanan'])+(getKelasHotel($i)*$subkriteria_bobot['Kelas Hotel'])+(getRutePenerbangan($i)*$subkriteria_bobot['Rute Penerbangan'])+(getObjekWisata($i)*$subkriteria_bobot['Objek Wisata']),
        'wisata' =>getObjekWisata($i),
        'keamanan'=>getKeamanan($i),
        'fasilitas'=>getFasilitas($i),
        'pelayanan'=>getPelayanan($i),
        'sertifikat'=>getSertifikat($i),
        'testimoni'=>getTestimoni($i),

    ];
}
$data =$_SESSION['data'];
$nilai_harga=array_column($data, 'harga');
$kode_paket=array_column($data, 'kodepaket');
$nama_agent=array_column($data,'namaagent');
$nilai_keamanan=array_column($data, 'keamanan');
$nilai_fasilitas=array_column($data,'fasilitas');
$nilai_pelayanan=array_column($data,'pelayanan');
$nilai_sertifikat=array_column($data,'sertifikat');
$nilai_paket=array_column($data,'paket');
$nilai_testimoni=array_column($data,'testimoni');

$length = count($data);
$length;
//print_r($data);
//echo $data[0]['namaagent']; contoh pemanggilan

//mengubah nilai harga
for($i=0;$i<$length;$i++){
    $nominal_harga = str_replace(',', '', $data[$i]['harga']);
    $nominal_harga = floatval($nominal_harga);

    $data[$i]['harga'] = round($nominal_harga/1000000, 2);
}

//membuat matrik keputusan normalisasi R
$data1=$data;
//print_r($data1);
// mengurutkan nilai
rsort($nilai_harga);
rsort($nilai_paket);
rsort($nilai_keamanan);
rsort($nilai_fasilitas);
rsort($nilai_sertifikat);
rsort($nilai_pelayanan);
rsort($nilai_testimoni);

//berdasarkan cost dan benefit
$min_harga= $nilai_harga[$length-1];
$max_paket=$nilai_paket[0];
$max_keamanan=$nilai_keamanan[0];
$max_fasilitas=$nilai_fasilitas[0];
$max_pelayanan=$nilai_pelayanan[0];
$max_sertifikat=$nilai_sertifikat[0];
$max_testimoni=$nilai_testimoni[0];

for($i=0;$i<$length;$i++){
    $harga[$i]=(($min_harga==0 || $data[$i]['harga']==0) ? 0 : round($min_harga/$data[$i]['harga'],2));
    $pakett[$i]=(($max_paket==0 || $data[$i]['paket']==0) ? 0 : round($data[$i]['paket']/$max_paket,2));
    $keamanan[$i]=(($max_keamanan==0 || $data[$i]['keamanan']==0) ? 0 :round($data[$i]['keamanan']/$max_keamanan,2));
    $fasilitas[$i]=round($data[$i]['fasilitas']/$max_fasilitas,2);
    $pelayanan[$i]=round($data[$i]['pelayanan']/$max_pelayanan,2);
    $sertifikat[$i]=round($data[$i]['sertifikat']/$max_sertifikat,2);
    $testimoni[$i]=(($max_testimoni==0 || $data[$i]['testimoni']==0) ? 0 :round($data[$i]['testimoni']/$max_testimoni,2));

}
$matriksR = array( 
                'harga' =>$harga,
                'paket' => $pakett,
                'keamanan'=>$keamanan,
                'fasilitas' =>$fasilitas,
                'pelayanan' =>$pelayanan,
                'sertifikat'=>$sertifikat,
                'testimoni' =>$testimoni,
        );
//print_r($matriksR);

//TOPSIS
//normalisasi matriks y
//bobot kriteria
//echo $kriteria_bobot['harga']; contoh pemanggilan bobot
$totalbobot=array_sum($kriteria_bobot);

//echo $totalbobot;
for($i=0;$i<$length;$i++){
    $harga[$i]= round($matriksR['harga'][$i]*(round(($kriteria_bobot['harga'])/$totalbobot,5)),3);

    $pakett[$i]= round($matriksR['paket'][$i]* (round(($kriteria_bobot['paket'])/$totalbobot,5)),3);
    $keamanan[$i]= round($matriksR['keamanan'][$i]*(round(($kriteria_bobot['keamanan'])/$totalbobot,5)),3);
    $fasilitas[$i]= round($matriksR['fasilitas'][$i]*(round(($kriteria_bobot['fasilitas'])/$totalbobot,5)),3);
    $pelayanan[$i]= round($matriksR['pelayanan'][$i]*(round(($kriteria_bobot['pelayanan'])/$totalbobot,5)),3);
    $sertifikat[$i]= round($matriksR['sertifikat'][$i]*(round(($kriteria_bobot['sertifikat'])/$totalbobot,5)),3);
    $testimoni[$i]= round($matriksR['testimoni'][$i]*(round(($kriteria_bobot['testimoni'])/$totalbobot,5)),3);
}
$matriksY = array( 
    'harga' =>$harga,
    'paket' => $pakett,
    'keamanan'=>$keamanan,
    'fasilitas' =>$fasilitas,
    'pelayanan' =>$pelayanan,
    'sertifikat'=>$sertifikat,
    'testimoni' =>$testimoni,
);
//print_r($matriksY);
$matriksY2 = $matriksY;

// Mencari Solusi Ideal Positif dan Negatif
rsort($matriksY2['harga']);
rsort($matriksY2['paket']);
rsort($matriksY2['keamanan']);
rsort($matriksY2['fasilitas']);
rsort($matriksY2['pelayanan']);
rsort($matriksY2['sertifikat']);
rsort($matriksY2['testimoni']);

$Y1max=$matriksY2['harga'][0];
$Y2max=$matriksY2['paket'][0];
$Y3max=$matriksY2['keamanan'][0];
$Y4max=$matriksY2['fasilitas'][0];
$Y5max=$matriksY2['pelayanan'][0];
$Y6max=$matriksY2['sertifikat'][0];
$Y7max=$matriksY2['testimoni'][0];
$matriksY3 = $matriksY;
sort($matriksY3['harga']);
sort($matriksY3['paket']);
sort($matriksY3['keamanan']);
sort($matriksY3['fasilitas']);
sort($matriksY3['pelayanan']);
sort($matriksY3['sertifikat']);
sort($matriksY3['testimoni']);
$Y1min=$matriksY3['harga'][0];
$Y2min=$matriksY3['paket'][0];
$Y3min=$matriksY3['keamanan'][0];
$Y4min=$matriksY3['fasilitas'][0];
$Y5min=$matriksY3['pelayanan'][0];
$Y6min=$matriksY3['sertifikat'][0];
$Y7min=$matriksY3['testimoni'][0];

$Amin= array( $Y1min,$Y2min,$Y3min,$Y4min,$Y5min,$Y6min,$Y7min		
    );
$Amax= array( $Y1max,$Y2max,$Y3max,$Y4max,$Y5max,$Y6max,$Y7max		
    );

//print_r($Amin);
// print_r($Amax);

//Menghitung Jarak Alternatif Solusi Ideal Positif dan Negatif
for($i=0; $i<$length; $i++){
    $Dpositif[$i]=round(sqrt((pow($Y1max - $matriksY['harga'][$i],2))+(pow($Y2max - $matriksY['paket'][$i],2))+(pow($Y3max - $matriksY['keamanan'][$i],2))+(pow($Y4max - $matriksY['fasilitas'][$i],2))+(pow($Y5max - $matriksY['pelayanan'][$i],2))+(pow($Y6max - $matriksY['sertifikat'][$i],2))+(pow($Y7max - $matriksY['testimoni'][$i],2))),2).'<br>';
}

for($i=0; $i<$length; $i++){
    $Dnegatif[$i]=round(sqrt((pow($matriksY['harga'][$i] - $Y1min,2))+(pow($matriksY['paket'][$i] - $Y2min,2))+(pow($matriksY['keamanan'][$i] - $Y3min,2))+(pow($matriksY['fasilitas'][$i]- $Y4min,2))+(pow($matriksY['pelayanan'][$i]-$Y5min,2))+(pow($matriksY['sertifikat'][$i]-$Y6min,2))+(pow($matriksY['testimoni'][$i] - $Y7min,2))),2).'<br>';
}
//print_r($Dpositif);
//print_r($Dnegatif);

//menghitung nilai preferemso untuk setiap alternatif
for($i=0; $i<$length; $i++){
    $preverensi[$i]=round($Dnegatif[$i]/($Dpositif[$i]+$Dnegatif[$i]),2);
}

//print_r($preverensi);

// mengurutkan nilai preferensi

for($i=0; $i<$length;$i++){
    $nilai_preverensi[$i]=[
        'Alternatif'=>"A".($i+1),
        'kodepaket'=>$data[$i]['kodepaket'],
        'namaagent'=>$data[$i]['namaagent'],
        'preferensi'=>$preverensi[$i],
    ];
}
//print_r($nilai_preverensi);


for($i=0; $i<$length; $i++){
    for($j=0; $j<=$length-1; $j++){
        
        if ($nilai_preverensi[$j]['preferensi'] < $nilai_preverensi[$j+1]['preferensi']){
            $tem=$nilai_preverensi[$j];
            $nilai_preverensi[$j]=$nilai_preverensi[$j+1];
            $nilai_preverensi[$j+1]=$tem;
        }else{
            $nilai_preverensi[$j]=$nilai_preverensi[$j];
        }
    }
}

//print_r($nilai_preverensi);

$_SESSION['hasil_akhir']=$nilai_preverensi;

print_r($_SESSION['hasil_akhir']);
header('location:/spkumrohhajidela/index.php?url=Halaman_Pencarian_Umrah_member');
}

?>
