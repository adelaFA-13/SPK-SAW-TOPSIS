
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Perhitungan</h1>
          </div>

          <!-- Content Buat Table -->
              <div class="card shadow mb-4">
           <div class="card-header py-3">
   
         
               <h6 class="m-0 font-weight-bold text-primary"> Data Nilai</h6>
               <p>Current Date: <?php echo date("l, j F Y");?></p>
          
            
               <!-- <select class="nav-item dropdown d-none d-sm-inline-block btn btn-sm btn-warning" name="jenis_paket" id="jenis_paket" onchange="getDataKriteria(this)">
                <option value="">-pilih-</option>
                <option value="Haji">Haji</option>
                <option value="Umrah">Umrah</option>
               </select> -->
          
               <!-- <button class="nav-item dropdown d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
                   <a href="#" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">
                       Pilih
                    <div class="div dropdown-menu">
                        <a href="javascript:getDataKriteria('Haji');" class="dropdown-item">Haji</a>
                        <a href="javascript:getDataKriteria('Umrah');" class="dropdown-item">Umrah</a>
                    </div>
                   </a>
               </button>

               <button  id="cari" name="cari" class="nav-item dropdown d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
               Add</button> -->
           </div>
<?php 
$sql_subkriteria=mysqli_query($koneksi,"SELECT * FROM tbl_subkriteria");
while($data=mysqli_fetch_assoc($sql_subkriteria)){
    $datas[$data['nama_sub']]=$data['bobot'];
}
$_SESSION['subkriteria']=$datas;
$subkriteria_bobot=$_SESSION['subkriteria'];

$n=getJumlahAlternatif();
$dataPaket = getDataPaketCoba();
$agentTravel = getAgentTravel();
$jenis = getJenis();
$harga = getHarga();
$hari = getDataHari();
$hotel = getKelasHotel();
$rute =getRutePenerbangan();
$wisata = getObjekWisata();
$keamanan = getKeamanan();
$fasilitas = getFasilitas();
$pelayanan = getPelayanan();
$sertifikat= getSertifikat();
$testimoni = getTestimoni();
?>
           <form action="index.php?url=Halaman_Proses_Umrah" method="post">
           <input type="hidden" name="jenis" value="<?php echo $jenis[0];?>">
           <div class="card-body">
               <div class="table-responsive">
                   <div class="data">
                   <table class="table table-bordered" id="dataTable" widht="100%" cellspacing="0">
                   <thead>
                            <tr align="center">
                                <th width="20">No.</th>
                                <th>Nama Paket</th>
                                <th>Nama Agent</th>
                                <th>Jenis Paket</th>
                                <th>Harga</th>
                                <th>Paket</th>
                                <th>Keamanan</th>
                                <th>Fasilitas</th>
                                <th>Pelayanan</th>
                                <th>Sertifikat</th>
                                <th>Testimoni</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        for($i=0;$i<$n;$i++){
                            if($jenis[0] == 'U1'){
                                $paket[$i]= ($hari[$i]*$subkriteria_bobot['Durasi_perjalanan'])+($hotel[$i]*$subkriteria_bobot['Kelas Hotel'])+($rute[$i]*$subkriteria_bobot['Rute Penerbangan'])+($wisata[$i]*$subkriteria_bobot['Objek Wisata']);
                                //$paket[$i] = $wisata[$i]+$hari[$i]+$hotel[$i]+$rute[$i];
                            }else{
                                $paket[$i] = ($hari[$i]*$subkriteria_bobot['Durasi_perjalanan'])+($hotel[$i]*$subkriteria_bobot['Kelas Hotel'])+($rute[$i]*$subkriteria_bobot['Rute Penerbangan']);
                            }
                            //$paket[$i] = ($hari[$i]*$subkriteria_bobot['Durasi_perjalanan'])+($hotel[$i]*$subkriteria_bobot['Kelas Hotel'])+($rute[$i]*$subkriteria_bobot['Rute Penerbangan'])+($wisata[$i]*$subkriteria_bobot['Objek Wisata']);
                            //$paket[$i] = $wisata[$i]+$hari[$i]+$hotel[$i]+$rute[$i];
                           ?>
                            <tr align="center">
                                <td><?php echo $i+1; ?></td>
                                <td ><input type="hidden" name="kodepaket[]" value="<?php echo $dataPaket[$i]; ?>"><?php echo $dataPaket[$i]; ?>
                                </td>
                                <td ><input type="hidden" name="namaagent[]" value="<?php echo $agentTravel[$i]; ?>"><?php echo $agentTravel[$i]; ?>
                                </td> 
                                <td><input type="hidden" name="jenis[]" value="<?php echo $jenis[$i]; ?>"><?php echo $jenis[$i]; ?></td>
                                <td ><input type="hidden" name="harga[]" value="<?php echo $harga[$i]; ?>"><?php echo $harga[$i]; ?>
                                </td> 
                                <td ><input type="hidden" name="paket[]" value="<?php echo $paket[$i] ?>"><?php echo $paket[$i]; ?>
                                </td> 
                                <td ><input type="hidden" name="keamanan[]" value="<?php echo $keamanan[$i]; ?>"><?php echo $keamanan[$i]; ?>
                                </td> 
                                <td ><input type="hidden" name="fasilitas[]" value="<?php echo $fasilitas[$i]; ?>"><?php echo $fasilitas[$i]; ?>
                                </td> 
                                <td ><input type="hidden" name="pelayanan[]" value="<?php echo $pelayanan[$i]; ?>"><?php echo $pelayanan[$i]; ?>
                                </td> 
                                <td ><input type="hidden" name="sertifikat[]" value="<?php echo $sertifikat[$i]; ?>"><?php echo $sertifikat[$i]; ?>
                                </td> 
                                <td ><input type="hidden" name="testimoni[]" value="<?php echo $testimoni[$i]; ?>"><?php echo $testimoni[$i]; ?>
                                </td> 
                                 
                            </tr>
                           <?php 
                        }

                        ?>
                        </tbody>
                   </table>   
                    </div>   
               </div>
            </div>
            <button class="btn btn-warning col-lg-12" type="submit" name="proses" value="submit">Proses</button>
            </form>
       </div> 
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
  </div>
</div>
</div>