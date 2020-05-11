
<main>
      <section class="section-details-header"></section>
      <section class="section-details-content">
        <div class="container">
          <!-- <div class="row">
            <div class="col p-0">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">
                    Paket Travel
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Details
                  </li>
                </ol>
              </nav>
            </div>
          </div> -->
          <div class="row">
            <div class="col-lg-12 pl-lg-0">
              <form action="config/perhitungan.php">
                  <!-- <button type="submit"> Submit</button> -->
              </form>
            </div>
          </div>
          <div class="row">
              <div class="col-lg-9 pl-lg-0">
                <div class="card card-details mb-3">
                  <h1>Hasil Mesin Pencarian Travel Agent Perjalanan Umrah <?php echo $_SESSION['level']?></h1>
                  <p>
                    Ini merupakan hasil pencarian dari nilai prioritas kriteria yang anda masukan
                  </p>
                  <div class="attendee">
                    <table class="table table-bordered table-hover table-xs text-center">
                      <thead>
                        <tr>
                          <th widht="20">No</th>
                          <th scope="col">Agent Travel</th>
                          <th>Keterangan</th>
                          <th scope="col">Harga</th>
                          <th scope="col">Paket</th>
                          <th scope="col">Fasilitas</th>
                          <th scope="col">Pelayanan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        include ('config/koneksi.php');
                        
                        $data=isset($_SESSION['hasil_akhir']) ? $_SESSION['hasil_akhir'] : 0;
                       
                        // print_r($data);
                        if(!empty($data)){
                          $i=1;
                        foreach ($data as $q):
                        $sql_cari=mysqli_query($koneksi,"SELECT DISTINCT paket_data_id, nama_paket, travel_id, tbl_agent_travel.nama, tbl_agent_travel.nomor_izin , tbl_agent_travel.thn_habis,tbl_data_paket.harga_paket,tbl_data_paket.jumlah_hari,tbl_data_paket.nama_maskapai,tbl_data_paket.rute_penerbangan,tbl_data_paket.objek_wisata,tbl_data_paket.bintang_hotel, COUNT(DISTINCT nilai) as byk_data_testimoni, sum(DISTINCT nilai) as jmlh_nilai_testimoni, tbl_jumlah_fasilitas.id_jumlah_fasilitas, tbl_jumlah_pelayanan.id_jumlah_pelayanan FROM tbl_data_paket LEFT JOIN tbl_testimoni USING(travel_id) INNER JOIN tbl_agent_travel USING(travel_id) JOIN tbl_jumlah_fasilitas USING(travel_id) JOIN tbl_jumlah_pelayanan USING(travel_id) WHERE  `paket_data_id`='".$q['kodepaket']."' GROUP BY paket_data_id");  
                        $row=mysqli_fetch_assoc($sql_cari);
                      ?>
                      <tr style="font-size:12px;">
                        <td><?php echo $i++?></td>
                        <td> <a href="index.php?url=Agent_detail&id=<?php echo $row['travel_id'];?>"><?php echo $row['nama']?></a>
                          </td>
                        <td>
                          <div class="row">
                            <div class="col-sm-12">
                              <label>Surat Izin SK :</label>
                              <span><?php echo $row['nomor_izin'];?></span>
                             </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12">
                            <label>Masa Berlaku</label>
                            <span><?php echo $row['thn_habis'];?></span>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12">
                            <label>Rating</label>
                            <span><?php 
                            if(empty($row['jmlh_nilai_testimoni']) && empty($row['byk_data_testimoni'])){
                              echo "Belum ada testimoni" ;
                            }else{
                              echo round($row['jmlh_nilai_testimoni']/$row['byk_data_testimoni'],2).'/5('.$row['byk_data_testimoni'].'ratings)';
                            }?></span>
                            </div>
                          </div>
                        </td>
                        <td>
                            <form>
                                <div class="row">
                                  <div class="col-sm-12">
                                    <label>Nama Paket:</label>
                                    <span><?php echo $row['nama_paket']?></span>
                                  </div>
                                </div>
                                  <div class="row">
                                    <div class="col-xs-12">
                                    <label>Harga :</label>
                                    <span><?php echo number_format($row['harga_paket'],2);?></span>
                                    </div>
                                </div>
                            </form>
                        </td>
                        <td>
                            <div class="row">
                              <div class="col-sm-12">
                                <label>Durasi Perjalanan:</label>
                                <span><?php echo $row['jumlah_hari']?> Hari</span>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-12">
                                <label>Penginapan</label>
                                <span><?php echo $row['bintang_hotel']?></span>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-12">
                                <label>Maskapai :</label>
                                <span><?php echo $row['nama_maskapai']?>(Penerbangan <?php echo $row['rute_penerbangan']?>)</span>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-12">
                                <?php if($row['objek_wisata'] == null){
                                  }else{?>
                                <label>Wisata</label>
                                <span><?php echo $row['objek_wisata']?></span>
                                <?php }?>
                              </div>
                            </div>
                        </td>
                        <td>
                          <?php $sql_fasilitas=mysqli_query($koneksi,"SELECT * FROM tbl_jumlah_fasilitas JOIN tbl_agent_travel USING(travel_id) JOIN tbl_data_paket USING(id_jumlah_fasilitas) JOIN tbl_data_fasilitas USING(fasilitas_id)  WHERE id_jumlah_fasilitas='".$row['id_jumlah_fasilitas']."'");
                              while ($now=mysqli_fetch_assoc($sql_fasilitas)){
                          ?>
                              <div class="row">
                                <div class="col-sm-12">
                                  <span><?php echo $now['nama_fasilitas']?>,</span>
                                  </div>
                              </div>
                          <?php 
                          }
                          ?>
                        </td>
                        <td>
                            <?php $sql_pelayanan=mysqli_query($koneksi,"SELECT * FROM tbl_jumlah_pelayanan JOIN tbl_agent_travel USING(travel_id) JOIN tbl_data_paket USING(id_jumlah_pelayanan) JOIN tbl_data_pelayanan USING(pelayanan_id)  WHERE id_jumlah_pelayanan='".$row['id_jumlah_pelayanan']."'");
                            while ($now=mysqli_fetch_assoc($sql_pelayanan)){
                        ?>
                            <div class="row">
                              <div class="col-sm-12">
                                <span><?php echo $now['nama_pelayanan']?></span>
                                </div>
                            </div>
                        <?php 
                        }
                        ?>
                      </td>
                   </tr>
                      <?php
                        endforeach;
                      }else{
                      ?>
                         <tr>
                          <td colspan="7">Silahkan Input Kriteria Terlebih Dahulu</td>
                        </tr>
                        <?php
                        }
                     ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="member mt-3">
                  <form action="config/perhitungan.php">
                  <!-- <button type="submit"> Submit</button> -->
                  </form>
                    <h3 class="mt-2 mb-0">Note</h3>
                    <p class="disclaimer mb-0">
                     Nilai 5 = Sangat Penting </br>
                     Nilai 4 = Penting </br>
                     Nilai 3 = Normal </br>
                     Nilai 2 = Tidak Penting </br>
                     Nilai 1 = Sangat Tidak Penting </br>
                    </p>
                  </div>
                </div>
              </div>
              <!-- masukan Nilai bobot-->
              <!-- <div class="col lg-3">
                <div class="card-details">
                  <form action="">
                    <button type="submit">TEKAN</button>
                  </form>
                </div>
              </div> -->
              <div class="col-lg-3">
                <div class="card card-details">
                  <h3>Silahkan masukan nilai prioritas kriteria pencarian anda:</h3>
                  <form action="config/pencarian/perhitungan_umrah_member.php" method="POST">
                  <table class="trip-informations">
                    <tr>
                      <th width="50%">Harga</th>
                      <td width="50%" class="text-right">
                      <select name="bobot_harga" id="" class="btn btn-block-xs">
                          <option value="">--Pilih--</option>
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3">3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th width="50%">Paket</th>
                      <td width="50%" class="text-right">
                      <select name="bobot_paket" id="" class="btn btn-block-xs ">
                          <option value="">--Pilih--</option>
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3">3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th width="50%">Keamanan</th>
                      <td width="50%" class="text-right">
                      <select name="bobot_keamanan" id="" class="btn btn-block-xs ">
                          <option value="">--Pilih--</option>
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3">3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th width="50%">Fasilitas</th>
                      <td width="50%" class="text-right">
                      <select name="bobot_fasilitas" id="" class="btn btn-block-xs ">
                          <option value="">--Pilih--</option>
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3">3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th width="50%">Pelayanan</th>
                      <td width="50%" class="text-right">
                      <select name="bobot_pelayanan" id="" class="btn btn-block-xs ">
                          <option value="">--Pilih--</option>
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3">3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th width="50%">Sertifikat</th>
                      <td width="50%" class="text-right">
                      <select name="bobot_sertifikat" id="" class="btn btn-block-xs ">
                          <option value="">--Pilih--</option>
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3">3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th width="50%">Testimoni</th>
                      <td width="50%" class="text-right">
                      <select name="bobot_testimoni" id="" class="btn btn-block-xs ">
                          <option value="">--Pilih--</option>
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3">3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select>
                      </td>
                    </tr>
                    <!-- <tr>
                      <th width="50%">Total (+Unique)</th>
                      <td width="50%" class="text-right text-total">
                        <span class="text-blue">$ 279,</span
                        ><span class="text-orange">33</span>
                      </td>
                    </tr> -->
                  </table>
                    
                  <hr />
                <div class="join-container">
                  <input type="submit" class="btn btn-block btn-join-now mt-3 py-2"
                    value="Submit"></input>
                </div>
                </form>
                <div class="text-center mt-3">
                  <a href="#" class="text-muted">Cancel</a>
                </div>
              </div>
            </div>
        </div>
      </section>
    </main>
    <?php 
    
    unset($_SESSION['subkriteria']);
    unset($_SESSION['data']);
    unset($_SESSION['hasil_akhir']);
    unset($_SESSION['bobot_kriteria']);
    ?>