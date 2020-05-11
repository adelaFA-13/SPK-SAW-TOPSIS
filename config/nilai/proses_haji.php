<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$request= [];

if(!empty($_POST)){
    $jenis = $_POST['jenis'][0];
    $_SESSION['data_nilai'] = [
        'kodepaket' => $_POST['kodepaket'],
        'namaagent' => $_POST['namaagent'],
        'harga' => $_POST['harga'],
        'paket' => $_POST['paket'],
        'keamanan' => $_POST['keamanan'],
        'fasilitas' => $_POST['fasilitas'],
        'pelayanan'=> $_POST['pelayanan'],
        'sertifikat' => $_POST['sertifikat'],
        'testimoni' => $_POST['testimoni'],
    ];
    $data =$_SESSION['data_nilai'];
    $n= count($data['kodepaket']);
    for($i=0;$i<$n;$i++){
        $_SESSION['data'][$i]=[
             'kodepaket' => $_POST['kodepaket'][$i],
             'namaagent' => $_POST['namaagent'][$i],
             'harga' => $_POST['harga'][$i],
             'paket' => $_POST['paket'][$i],
             'keamanan' => $_POST['keamanan'][$i],
             'fasilitas' => $_POST['fasilitas'][$i],
             'pelayanan'=> $_POST['pelayanan'][$i],
             'sertifikat' => $_POST['sertifikat'][$i],
             'testimoni' => $_POST['testimoni'][$i],
         ];
     }
}

//deklarasi array

$datas = $_SESSION['data'];
//print_r($data);
//print_r($data['kodepaket']);
$nilai_harga=array_column($data, 'harga');
$nilai_paket=array_column($datas, 'kodepaket');
//print_r($nilai_paket);
$length = count($datas);

?>

<div class="container-fluid">

<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h3 mb-0 text-gray-800">Hasil Perhitungan <?echo $jenis?></h1>
    </div>

    <div class="card shadow mb-4">
              <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold text-primary"> Data Alternatif</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                        <div class="data">
                            <table class="table table-bordered" id="dataTable" widht="100%" cellspacing="0">
                            <thead>
                            <tr align="center">
                                <th rowspan="2">Alternatif</th>
                                <th colspan="7">Kriteria</th>
                            </tr>
                            <tr align="center">
                                <th>C1</th>
                                <th>C2</th>
                                <th>C3</th>
                                <th>C4</th>
                                <th>C5</th>
                                <th>C6</th>
                                <th>C7</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                               $data =$_SESSION['data_nilai'];
                               $datas = $_SESSION['data'];
                               $nilai_harga=array_column($data, 'harga');
                               $nilai_paket=array_column($data, 'kodepaket');
                               $length = count($data['kodepaket']);
                            
                            //perhitungan pertama data alternatif
                            for($i=0;$i<$length;$i++){
                                $nominal_harga = str_replace(',', '', $data['harga'][$i]);
                                $nominal_harga = floatval($nominal_harga);

                                $data['harga'][$i] = round($nominal_harga/1000000, 2);
                            
                            echo '
                            <tr align="center">
                              <td>A'.($i+1).'</td>
                              <td>'.$data['harga'][$i].'</td>
                              <td>'.$data['paket'][$i].'</td>
                              <td>'.$data['keamanan'][$i].'</td>
                              <td>'.$data['fasilitas'][$i].'</td>
                              <td>'.$data['pelayanan'][$i].'</td>
                              <td>'.$data['sertifikat'][$i].'</td>
                              <td>'.$data['testimoni'][$i].'</td>
                          </tr>
                        ';
                            }
                            ?>
                            </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
              </div>
          </div>
        <!-- end of kolom step 1 -->
    
   <!-- Kolom step 2 -->
   
   <div class="card shadow mb-4">
              <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold text-primary"> Membuat Normalisasi Matriks Keputusan R</h5>
                    <div class="card-body">
                        <div class="table-responsive">

                        <div class="data">
                            <table class="table table-bordered" id="dataTable" widht="100%" cellspacing="0">
                            <thead>
                                <tr align="center">
                                    <th rowspan="2">Alternatif</th>
                                    <th colspan="7">Kriteria</th>
                                </tr>
                                <tr align="center">
                                    <th>C1</th>
                                    <th>C2</th>
                                    <th>C3</th>
                                    <th>C4</th>
                                    <th>C5</th>
                                    <th>C6</th>
                                    <th>C7</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                          
                                $data2=$_SESSION['data_nilai'];
                                // rsort -> descending( mengurutkan dari atas kebawah)
                                // sort -> ascending (mengurutkan dari bawah ketas)
                             
                                rsort($data2['harga']);
                                rsort($data2['paket']);
                                rsort($data2['keamanan']);
                                rsort($data2['fasilitas']);
                                rsort($data2['pelayanan']);
                                rsort($data2['sertifikat']);
                                rsort($data2['testimoni']);
        
                                $min_harga= $data2['harga'][$length-1];
                                $max_paket=$data2['paket'][0];
                                $max_keamanan=$data2['keamanan'][0];
                                $max_fasilitas=$data2['fasilitas'][0];
                                $max_pelayanan=$data2['pelayanan'][0];
                                $max_sertifikat=$data2['sertifikat'][0];
                                $max_testimoni=$data2['testimoni'][0];
                            ?>
                            <?php

                            for($i=0;$i<$length;$i++){
                                $harga[$i]=(($min_harga==0 || $data['harga'][$i]==0) ? 0 : round($min_harga/$data['harga'][$i],2));
                                $pakett[$i]=round($data['paket'][$i]/$max_paket,2);
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
                                            'paket' => $pakett,
                                            'keamanan'=>$keamanan,
                                            'fasilitas' =>$fasilitas,
                                            'pelayanan' =>$pelayanan,
                                            'sertifikat'=>$sertifikat,
                                            'testimoni' =>$testimoni,
                                    );
                            ?>
                            <?php
                            for($i=0;$i<$length;$i++){
                                        echo '
                                    <tr align="center">
                                        <td>A'.($i+1).'</td>
                                        <td>'.$matriksR['harga'][$i].'</td>
                                        <td>'.$matriksR['paket'][$i].'</td>
                                        <td>'.$matriksR['keamanan'][$i].'</td>
                                        <td>'.$matriksR['fasilitas'][$i].'</td>
                                        <td>'.$matriksR['pelayanan'][$i].'</td>
                                        <td>'.$matriksR['sertifikat'][$i].'</td>
                                        <td>'.$matriksR['testimoni'][$i].'</td>
                                    </tr>
                                ';
                            }
                            ?>    	
                            </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
              </div>
          </div>
    <!-- end of kolom step 2 -->
 <!-- Kolom step 2 -->
 <div class="card shadow mb-4">
              <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold text-primary">Membuat Normalisasi Matriks TERNORMALISASI Y</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                        <div class="data">
                            <table class="table table-bordered" id="dataTable" widht="100%" cellspacing="0">
                            <thead>
                                <tr align="center">
                                    <th rowspan="2">Alternatif</th>
                                    <th colspan="7">Kriteria</th>
                                </tr>
                                <tr align="center">
                                    <th>C1</th>
                                    <th>C2</th>
                                    <th>C3</th>
                                    <th>C4</th>
                                    <th>C5</th>
                                    <th>C6</th>
                                    <th>C7</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php

                            $sql=mysqli_query($koneksi,"SELECT distinct tbl_kriteria.* FROM tbl_kriteria");
                            while($kriteria=mysqli_fetch_assoc($sql)){
                             $datakriteria['data'][$kriteria['nama']]=$kriteria;
                             ($kriteria);
                            //  echo $datakriteria['data'][$kriteria['nama']]['id'].'</br>'; (isinya id kriteria)
                            $sql2=mysqli_query($koneksi,"SELECT * FROM tbl_subkriteria WHERE kriteria_id =".$datakriteria['data'][$kriteria['nama']]['id']);
                                while($kriteria2=mysqli_fetch_assoc($sql2)){
                                    $datakriteria['data'][$kriteria['nama']]['subkriteria'][]=$kriteria2;
                                }
                            $bobot[]=$datakriteria['data'][$kriteria['nama']]['bobot'];   
                        }
                        
                            $datakriteria['ekstra']['total_bobot'] = array_sum($bobot);
                            $data_kriteria=$datakriteria;
                            //print_r($datakriteria['ekstra']['total_bobot']);
                            //print json_encode($data_kriteria['data'][$kriteria['nama']]);
                            //print_r($data_kriteria);
                            // contoh subkriteria print_r ($data_kriteria['data']['Paket']['subkriteria'][0]['bobot']);
                            unset($datakriteria);
                            //contoh total bobot ternormalisasi
                            //(round(($data_kriteria['data']['harga']['bobot'])/$data_kriteria['ekstra']['total_bobot'],5));


                                    for($i=0;$i<$length;$i++){
                                        $harga[$i]= round($matriksR['harga'][$i]*(round(($data_kriteria['data']['harga']['bobot'])/$data_kriteria['ekstra']['total_bobot'],5)),3);
                                        $pakett[$i]= round($matriksR['paket'][$i]* (round(($data_kriteria['data']['Paket']['bobot'])/$data_kriteria['ekstra']['total_bobot'],5)),3);
                                        $keamanan[$i]= round($matriksR['keamanan'][$i]*(round(($data_kriteria['data']['Keamanan']['bobot'])/$data_kriteria['ekstra']['total_bobot'],5)),3);
                                        $fasilitas[$i]= round($matriksR['fasilitas'][$i]*(round(($data_kriteria['data']['Fasilitas']['bobot'])/$data_kriteria['ekstra']['total_bobot'],5)),3);
                                        $pelayanan[$i]= round($matriksR['pelayanan'][$i]*(round(($data_kriteria['data']['Pelayanan']['bobot'])/$data_kriteria['ekstra']['total_bobot'],5)),3);
                                        $sertifikat[$i]= round($matriksR['sertifikat'][$i]*(round(($data_kriteria['data']['Sertifikat']['bobot'])/$data_kriteria['ekstra']['total_bobot'],5)),3);
                                        $testimoni[$i]= round($matriksR['testimoni'][$i]*(round(($data_kriteria['data']['Testimoni']['bobot'])/$data_kriteria['ekstra']['total_bobot'],5)),3);
                                        
                                    }
                                    $matriksY = array( 
                                                    'kodepaket'=>$data['kodepaket'],
                                                    'namaagent'=>$data['namaagent'],
                                                    'harga' =>$harga,
                                                    'paket' => $pakett,
                                                    'keamanan'=>$keamanan,
                                                    'fasilitas' =>$fasilitas,
                                                    'pelayanan' =>$pelayanan,
                                                    'sertifikat'=>$sertifikat,
                                                    'testimoni' =>$testimoni,
                                            );
                                    $matriksY2 = $matriksY;
                                ?>
                                <?php
                                for($i=0;$i<$length;$i++){
                                            echo '
                                        <tr align="center">
                                            <td>A'.($i+1).'</td>
                                            <td>'.$matriksY['harga'][$i].'</td>
                                            <td>'.$matriksY['paket'][$i].'</td>
                                            <td>'.$matriksY['keamanan'][$i].'</td>
                                            <td>'.$matriksY['fasilitas'][$i].'</td>
                                            <td>'.$matriksY['pelayanan'][$i].'</td>
                                            <td>'.$matriksY['sertifikat'][$i].'</td>
                                            <td>'.$matriksY['testimoni'][$i].'</td>
                                        </tr>
                                    ';
                                }
                                ?>
                            </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
              </div>
          </div>
    <!-- end of kolom step 2 -->
    <!-- Kolom step 3 -->
    <div class="card shadow mb-4">
              <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold text-primary">Mencari solusi ideal postiif dan negatif setiap kriteria</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                        <div class="data">
                            <table class="table table-bordered" id="dataTable" widht="100%" cellspacing="0">
                            <thead>
                            <tr align="center">
                                <th rowspan="2">Alternatif</th>
                                <th colspan="7">Kriteria</th>
                            </tr>
                            <tr align="center">
                                <?php
                                for($i=0;$i<7;$i++){
                                    echo '
                                    <th>C'.($i+1).'</th>
                                ';
                                }
                                ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
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
                                ?>
                                <tr align="center">
                                    <td>A min</td>
                                    <?php
                                    for($i=0;$i<7;$i++){
                                    ?>
                                    <td><?php echo $Amin[$i]?></td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                                <tr align="center">
                                    <td>A max</td>
                        
                                    <?php
                                    for($i=0;$i<7;$i++){
                                    ?>
                                    <td><?php echo $Amax[$i]?></td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
              </div>
          </div>
    <!-- end of kolom step 3 -->
<!-- Kolom step 4 -->
<div class="card shadow mb-4">
              <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold text-primary">Menghitung jarak alternatif dari solusi ideal positif dan negatif</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                        <div class="data">
                            <table class="table table-bordered" id="dataTable" widht="100%" cellspacing="0">
                            <thead>
                            <tr align="center">
                                <th rowspan="2">Alternatif</th>
                                <th colspan="2">jarak alternatif dari solusi ideal positif dan negatif</th>
                            </tr>
                            <tr align="center">
                                <th>D+</th>
                                <th>D-</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            for($i=0; $i<$length; $i++){
                                $Dpositif[$i]=round(sqrt((pow($Y1max - $matriksY['harga'][$i],2))+(pow($Y2max - $matriksY['paket'][$i],2))+(pow($Y3max - $matriksY['keamanan'][$i],2))+(pow($Y4max - $matriksY['fasilitas'][$i],2))+(pow($Y5max - $matriksY['pelayanan'][$i],2))+(pow($Y6max - $matriksY['sertifikat'][$i],2))+(pow($Y7max - $matriksY['testimoni'][$i],2))),2).'<br>';
                            }   

                            for($i=0; $i<$length; $i++){
                                $Dnegatif[$i]=round(sqrt((pow($matriksY['harga'][$i] - $Y1min,2))+(pow($matriksY['paket'][$i] - $Y2min,2))+(pow($matriksY['keamanan'][$i] - $Y3min,2))+(pow($matriksY['fasilitas'][$i]- $Y4min,2))+(pow($matriksY['pelayanan'][$i]-$Y5min,2))+(pow($matriksY['sertifikat'][$i]-$Y6min,2))+(pow($matriksY['testimoni'][$i] - $Y7min,2))),2).'<br>';
                            }
                            ?>
                            <?php
                                for($i=0;$i<$length; $i++){
                                    echo '<tr align="center">
                                        <td> A'.($i+1). '</td>
                                        <td>'. ($Dpositif[$i]).'</td>
                                        <td>'. ($Dnegatif[$i]).'</td>
                                        </tr>';
                                }
                            ?>
                            </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
              </div>
          </div>
    <!-- end of kolom step 4 -->
     <!-- Kolom step 5 -->
     <div class="card shadow mb-4">
              <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold text-primary">   Menghitung nilai preferensi untuk setiap altenatif</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                        <div class="data">
                            <table class="table table-bordered" id="dataTable" widht="100%" cellspacing="0">
                            <thead>
                            <tr align="center">
                                <th rowspan="2">Alternatif</th>
                                <th colspan="1">Menghitung Nilai Preferensi</th>
                            </tr>
                            <tr align="center">
                                <th>Vi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            //menghitung nilai preferensi
                            // vi = D-/(D+)+(D-)
                            for($i=0; $i<$length; $i++){
                                $preverensi[$i]=round($Dnegatif[$i]/($Dpositif[$i]+$Dnegatif[$i]),3);
                                }
                                $s_kdpaket=array_column($datas,'kodepaket');
                                $array=array_combine($s_kdpaket, $preverensi);
                            ?>
                            <?php
                                for($i=0; $i<$length; $i++){
                                echo '<tr align="center">
                                    <td> A'.($i+1).'</td>
                                    <td align="center"> '.($preverensi[$i]).'</td>
                                    </tr>';
                                }
                            ?>
                            </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
              </div>
          </div>
    <!-- end of kolom step 5 -->
    <!-- Kolom step 6 -->
    <div class="card shadow mb-4">
              <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold text-primary"> Ranking </h5>
                    <div class="card-body">
                        <div class="table-responsive">
                        <div class="data">
                            <table class="table table-bordered" id="dataTable" widht="100%" cellspacing="0">
                            <thead>
                                <tr align="center">
                                <th>Alternatif</th>
                                <th>Kode Paket</th>
                                <th>Nama Agent</th>
                                <th>Preferensi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $s_sorted_agent_preferensi;
                                $s_kdpaket=array_column($datas,'kodepaket');
                                $s_agentname=array_column($datas, 'namaagent');
                                //mengecek kodepaket
                                //print_r($s_kdpaket)
                                $i=0;
                                //echo($preverensi[0]);
                                foreach($s_kdpaket as $key_kd_paket => $value_kd_paket){
                                    //echo $tem_value_kd_paket=$value_kd_paket.'</br>';
                                        //echo $value_preferenasi.'</br>';
                                        $nilai_preverensi[$i]=[
                                            'alternatif'=>"A".($i+1),
                                            'kodepaket'=>$value_kd_paket,
                                            'namaagent'=>$s_agentname[$i],
                                            'preferensi'=>$preverensi[$i]
                                        ];
                                    $i++;
                                }
                             
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
                                
                                $array_combine_preferensi_kdpaket=array_combine($preverensi, $s_kdpaket);
                                $array_combine_kdpaket_namaagent=array_combine($s_kdpaket,$s_agentname);
                                //mengecek combine preferensi
                                //print_r($s_kdpaket);
                                //echo "/";
                                //print_r($preverensi);
                                //print_r($array_combine_preferensi_kdpaket);

                                for($i=0; $i<$length; $i++){
                                    $alternatif[$i]="A".($i+1);
                                }

                                $array_combine_kdpaket_alternatif=array_combine($s_kdpaket,$alternatif);

                                $sorted_preferensi=$array_combine_preferensi_kdpaket;
                                krsort($sorted_preferensi);
                                //print_r($sorted_preferensi);
                                //sudah terurut
                                //kita harus flip $sorted_preferensi
                                $i=0;
                                foreach($sorted_preferensi as $preferensi => $kd_paket){
                                    $s_sorted_agent_preferensi[$i]=[
                                        'alternatif'=>($array_combine_kdpaket_alternatif[$kd_paket]),
                                        'kodepaket'=>$kd_paket,
                                        'namaagent'=>($array_combine_kdpaket_namaagent[$kd_paket]),
                                        'preferensi'=>$preferensi
                                    ];
                                    $i++;
                                }
                                //print_r($s_sorted_agent_preferensi);
                            ?>
                            <?php
                                //print_r($array_combine_preferensi_kdpaket);
                                //print_r($sorted_preferensi);
                                for($i=0; $i<$length; $i++){
                                echo '<tr align="center">
                                        <td> '.($nilai_preverensi[$i]['alternatif']).'</td>
                                        <td> '.($nilai_preverensi[$i]['kodepaket']).'</td>
                                        <td> '.($nilai_preverensi[$i]['namaagent']).'</td>
                                        <td> '.($nilai_preverensi[$i]['preferensi']).'</td>
                                    </tr>';
                                }

                            ?>
                            </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
              </div>
          </div>
    <!-- end of kolom step 6 -->
    <?php 
    unset($_SESSION['data_nilai']);
    unset($_SESSION['data']);
    ?>


    