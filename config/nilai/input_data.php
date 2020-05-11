<?php
	$data = $_SESSION['data_nilai'];
    $length = count($data['kodepaket']);
       
//perhitungan pertama data alternatif
for($i=0;$i<$length;$i++){
    $nominal_harga = str_replace(',', '', $data['harga'][$i]);
    $nominal_harga = floatval($nominal_harga);

    $data['harga'][$i] = round($nominal_harga/1000000, 2);
}

//membuat notmalisasi matriks keputusan R
$data2=$_SESSION['data_nilai'];
    sort($data2['harga']);
	rsort($data2['paket']);
	rsort($data2['keamanan']);
	rsort($data2['fasilitas']);
	rsort($data2['pelayanan']);
	rsort($data2['sertifikat']);
	rsort($data2['testimoni']);
	$min_harga= $data2['harga'][0];
	$max_paket=$data2['paket'][0];
	$max_keamanan=$data2['keamanan'][0];
	$max_fasilitas=$data2['fasilitas'][0];
	$max_pelayanan=$data2['pelayanan'][0];
	$max_sertifikat=$data2['sertifikat'][0];
    $max_testimoni=$data2['testimoni'][0];

for($i=0;$i<$length;$i++){
		$harga[$i]=(($min_harga==0 || $data['harga'][$i]==0) ? 0 : round($min_harga/$data['harga'][$i],2));
		$paket[$i]=round($data['paket'][$i]/$max_paket,2);
		$keamanan[$i]=round($data['keamanan'][$i]/$max_keamanan,2);
		$fasilitas[$i]=round($data['fasilitas'][$i]/$max_fasilitas,2);
		$pelayanan[$i]=round($data['pelayanan'][$i]/$max_pelayanan,2);
		$sertifikat[$i]=round($data['sertifikat'][$i]/$max_sertifikat,2);
		$testimoni[$i]=round($data['testimoni'][$i]/$max_testimoni,2);
	}
	$matriksR = array( 
					'kodepaket'=>$data['kodepaket'],
					'namaagent'=>$data['namaagent'],
					'harga' =>$harga,
					'paket' => $paket,
					'keamanan'=>$keamanan,
					'fasilitas' =>$fasilitas,
					'pelayanan' =>$pelayanan,
					'sertifikat'=>$sertifikat,
					'testimoni' =>$testimoni,
    );
    
//MEMBUAT NORMALISASI MATRIKS Y
$bobot =['5','4','3','3','5','2','1']; // --> ubah ambil dari database
	for($i=0;$i<$length;$i++){
		$harga[$i]= $matriksR['harga'][$i]*$bobot[0];
		$paket[$i]= $matriksR['paket'][$i]*$bobot[1];
		$keamanan[$i]= $matriksR['keamanan'][$i]*$bobot[2];
		$fasilitas[$i]= $matriksR['fasilitas'][$i]*$bobot[3];
		$pelayanan[$i]= $matriksR['pelayanan'][$i]*$bobot[4];
		$sertifikat[$i]= $matriksR['sertifikat'][$i]*$bobot[5];
		$testimoni[$i]= $matriksR['testimoni'][$i]*$bobot[6];
		
	}
	$matriksY = array( 
					'kodepaket'=>$data['kodepaket'],
					'namaagent'=>$data['namaagent'],
					'harga' =>$harga,
					'paket' => $paket,
					'keamanan'=>$keamanan,
					'fasilitas' =>$fasilitas,
					'pelayanan' =>$pelayanan,
					'sertifikat'=>$sertifikat,
					'testimoni' =>$testimoni,
			);
    $matriksY2 = $matriksY;

   //Mencari solusi ideal positif dan negatif

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
    
  //mencari solusi ideal positif dan negatif setiap kriteria

  // jarak alternatif dari solusi ideal positif dan negatif D+ -D-
  for($i=0; $i<$length; $i++){
	$Dpositif[$i]=round(sqrt((pow($Y1max - $matriksY['harga'][$i],2))+(pow($Y2max - $matriksY['paket'][$i],2))+(pow($Y3max - $matriksY['keamanan'][$i],2))+(pow($Y4max - $matriksY['fasilitas'][$i],2))+(pow($Y5max - $matriksY['pelayanan'][$i],2))+(pow($Y6max - $matriksY['sertifikat'][$i],2))+(pow($Y7max - $matriksY['testimoni'][$i],2))),2).'<br>';
}

for($i=0; $i<$length; $i++){
	$Dnegatif[$i]=round(sqrt((pow($matriksY['harga'][$i] - $Y1min,2))+(pow($matriksY['paket'][$i] - $Y2min,2))+(pow($matriksY['keamanan'][$i] - $Y3min,2))+(pow($matriksY['fasilitas'][$i]- $Y4min,2))+(pow($matriksY['pelayanan'][$i]-$Y5min,2))+(pow($matriksY['sertifikat'][$i]-$Y6max,2))+(pow($matriksY['testimoni'][$i] - $Y7min,2))),2).'<br>';
}

//menghitung nilai preferensi
for($i=0; $i<$length; $i++){
	$preverensi[$i]=round($Dnegatif[$i]/$Dpositif[$i]+$Dnegatif[$i],2);
}
?>