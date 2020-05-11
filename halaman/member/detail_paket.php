<main>
      <section class="section-details-header"></section>
      <section class="section-details-content">
        <div class="container">
          <div class="row">
            <div class="col p-0">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">
                    Agent Travel 
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                   Paket  Details
                  </li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-8 pl-lg-0">
              <div class="card card-details">
                    <div class="row">
                        <?php
                        $data=mysqli_fetch_assoc($query);
                        ?>
                        <div class="col-md-6">
                            <h1><?php echo $data['nama']?></h1>
                            <p><?php echo $data['nomor_izin']?></p>
                            <div class="gallery">
                                <div class="xzoom-container">
                                    <?php 
                                    $id=$_GET['Travel'];
                                    $sqlgaleri1=mysqli_query($koneksi,"SELECT * FROM tbl_galeri where travel_id='$id' ORDER BY id ASC LIMIT 1");
                                    $datagaleri= mysqli_fetch_assoc($sqlgaleri1);
                                    ?>
                                    <img src="<?php echo "config/galeri/".$datagaleri['foto']; ?>"alt="" class="xzoom" id="xzoom-default" xoriginal="A"<?php echo "config/galeri/".$datagaleri['foto']; ?> style="height: 350px;"></img>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-right">
                            <?php
                            $sql_testi =mysqli_query($koneksi, "SELECT DISTINCT travel_id, paket_data_id, COUNT(nilai) as byk_data, sum(nilai) as jmlh_nilai FROM tbl_data_paket LEFT JOIN tbl_testimoni USING(travel_id) WHERE travel_id='$id' GROUP BY paket_data_id"); 

                            $data_testi=mysqli_fetch_assoc($sql_testi);

                            if(empty($data_testi['jmlh_nilai']) && empty($data['byk_data'])){
                                $nilai_testimoni =0;
                            }else{
                                $nilai_testimoni=$data_testi['jmlh_nilai']/$data_testi['byk_data'];
                            }

                            if($nilai_testimoni == 5 | $nilai_testimoni > 4.5){
                                ?>
                                 <a href=""><i class="fa fa-star"><i class="fa fa-star"><i class="fa fa-star"><i class="fa fa-star"><i class="fa fa-star"></i></i></i></i></i>(<?php echo round($nilai_testimoni,1)?>/5 <sub>(<?php echo $data_testi['byk_data']?> ratings)</sub>)</a>
                                <?php
                            }else if($nilai_testimoni == 4.5 | $nilai_testimoni > 4){
                                ?>
                                <a href=""><i class="fa fa-star"><i class="fa fa-star"><i class="fa fa-star"><i class="fa fa-star"><i class="fas fa-star-half-alt"></i></i></i></i></i>(<?php echo round($nilai_testimoni,1)?>/5 <sub>(<?php echo $data_testi['byk_data']?> ratings)</sub>)</a>
                                <?php
                            }else if($nilai_testimoni == 4 | $nilai_testimoni > 4.5){
                                ?>
                                <a href=""><i class="fa fa-star"><i class="fa fa-star"><i class="fa fa-star"><i class="fa fa-star"><i class="fa fa-star text-dark"></i></i></i></i></i>(<?php echo round($nilai_testimoni,1)?>/5 <sub>(<?php echo $data_testi['byk_data']?> ratings)</sub>)</a>
                                <?php
                            }else if($nilai_testimoni == 3.5 | $nilai_testimoni > 3){
                                ?>
                                <a href=""><i class="fa fa-star"><i class="fa fa-star"><i class="fa fa-star"><i class="fas fa-star-half-alt"><i class="fa fa-star text-dark"></i></i></i></i></i>(<?php echo round($nilai_testimoni,1)?>/5 <sub>(<?php echo $data_testi['byk_data']?> ratings)</sub>)</a>
                                <?php
                            }else if($nilai_testimoni == 3 | $nilai_testimoni >2.5){
                                ?>
                                 <a href=""><i class="fa fa-star"><i class="fa fa-star"><i class="fa fa-star"><i class="fa fa-star text-dark"><i class="fa fa-star text-dark"></i></i></i></i></i>(<?php echo round($nilai_testimoni,1)?>/5 <sub>(<?php echo $data_testi['byk_data']?> ratings)</sub>)</a>
                                <?php
                            }else if($nilai_testimoni == 2.5 | $nilai_testimoni > 2){
                                ?>
                                 <a href=""><i class="fa fa-star"><i class="fa fa-star"><i class="fas fa-star-half-alt"><i class="fa fa-star text-dark"><i class="fa fa-star text-dark"></i></i></i></i></i>(<?php echo round($nilai_testimoni,1)?>/5 <sub>(<?php echo $data_testi['byk_data']?> ratings)</sub>)</a>
                                <?php
                            }else if($nilai_testimoni == 2 | $nilai_testimoni > 1.5){
                                ?>
                                <a href=""><i class="fa fa-star"><i class="fa fa-star"><i class="fa fa-star text-dark"><i class="fa fa-star text-dark"><i class="fa fa-star text-dark"></i></i></i></i></i>(<?php echo round($nilai_testimoni,1)?>/5 <sub>(<?php echo $data_testi['byk_data']?> ratings)</sub>)</a>
                                <?php
                            }else if($nilai_testimoni == 1.5| $nilai_testimoni > 1){
                                ?>
                                <a href=""><i class="fa fa-star"><i class="fas fa-star-half-alt"><i class="fa fa-star text-dark"><i class="fa fa-star text-dark"><i class="fa fa-star text-dark"></i></i></i></i></i>(<?php echo round($nilai_testimoni,1)?>/5 <sub>(<?php echo $data_testi['byk_data']?> ratings)</sub>)</a>
                                <?php
                            }else if($nilai_testimoni == 1 | $nilai_testimoni > 0.5 ){
                                ?>
                                 <a href=""><i class="fa fa-star"><i class="fa fa-star text-dark"><i class="fa fa-star text-dark"><i class="fa fa-star text-dark"><i class="fa fa-star text-dark"></i></i></i></i></i>(<?php echo round($nilai_testimoni,1)?>/5 <sub>(<?php echo $data_testi['byk_data']?> ratings)</sub>)</a>
                                <?php
                            }else if($nilai_testimoni == 0.5 | $nilai_testimoni >0){
                                ?>
                                 <a href=""><i class="fas fa-star-half-alt"><i class="fa fa-star text-dark"><i class="fa fa-star text-dark"><i class="fa fa-star text-dark"><i class="fa fa-star text-dark"></i></i></i></i></i>(<?php echo round($nilai_testimoni,1)?>/5 <sub>(<?php echo $data_testi['byk_data']?> ratings)</sub>)</a>
                                <?php
                            }else{
                                ?>
                                <a href=""><i class="fa fa-star text-dark"><i class="fa fa-star text-dark"><i class="fa fa-star text-dark"><i class="fa fa-star text-dark"><i class="fa fa-star text-dark"></i></i></i></i></i>(<?php echo round($nilai_testimoni,1)?>/5 <sub>(<?php echo $data_testi['byk_data']?> ratings)</sub>)</a>
                               <?php
                            }
                            ?>
                            </div>
                            </br></br>
                            <div class="card card-details">
                                <form action="">
                                    <?php
                                    $id=$_GET['Travel'];
                                    $id_paket=$_GET['id'];
                                    $sql_paket=mysqli_query($koneksi,"SELECT * FROM tbl_data_paket WHERE travel_id='$id' AND paket_data_id='$id_paket'");
                                    $data_paket=mysqli_fetch_assoc($sql_paket);
                                    ?>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                            <label>Nama Paket</label>
                                            </div>
                                            <div class="col-sm-6">
                                            <label><?php echo $data_paket['nama_paket'];?></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                            <label>Paket</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                            <label>Durasi Hari</label>
                                            </div>
                                            <div class="col-sm-6">
                                            <label><?php echo $data_paket['jumlah_hari'];?> Hari</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                            <label>Hotel</label>
                                            </div>
                                            <div class="col-sm-6">
                                            <label><?php echo $data_paket['nama_hotel']?>(<?php echo $data_paket['bintang_hotel'];?>)</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                            <label>Maskapai</label>
                                            </div>
                                            <div class="col-sm-6">
                                            <label><?php echo $data_paket['nama_maskapai']?></label>
                                            <label for="">Penerbangan <?php echo $data_paket['rute_penerbangan']?></label>
                                            </div>
                                        </div>
                                        <?php if(!empty($data_paket['objek_wisata'])){
                                            ?>
                                            <div class="row">
                                            <div class="col-sm-6">
                                            <label>Wisata</label>
                                            </div>
                                            <div class="col-sm-6">
                                            <label><?php echo $data_paket['objek_wisata'] ?></label>
                                            </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
              </div>
                </br>
              <div class="card card-details">
                  <div class="row">
                      <div class="col-lg-6">
                      <table class="table table-bordered">
                        <thead>
                            <tr align="center">
                                <th>Fasilitas</th>
                            </tr>
                        </thead>
                        <?php 
                         $id=$_GET['Travel'];
                        $id_paket=$_GET['id'];
                        $query_fasil1=mysqli_query($koneksi,"SELECT * FROM tbl_data_paket where travel_id='$id' and paket_data_id='$id_paket'");
                        $data_fasili1=mysqli_fetch_assoc($query_fasil1);
                        $id_banyak_fasilitas=$data_fasili1['id_jumlah_fasilitas'];
                        
                        $query_fasil2=mysqli_query($koneksi,"SELECT * FROM tbl_jumlah_fasilitas INNER JOIN tbl_data_fasilitas USING(fasilitas_id) Where id_jumlah_fasilitas='$id_banyak_fasilitas'");
                        ?>
                        <tbody>
                            <?php
                            while($data_fasil=mysqli_fetch_assoc($query_fasil2)){
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $data_fasil['nama_fasilitas'];?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            
                        </tbody>
                       </table>
                       </div>
                       <div class="col-lg-6">
                      <table class="table table-bordered">
                        <thead>
                            <tr align="center">
                                <th>Pelayanan</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                         $id=$_GET['Travel'];
                        $id_paket=$_GET['id'];
                        $query_pel1=mysqli_query($koneksi,"SELECT * FROM tbl_data_paket where travel_id='$id' and paket_data_id='$id_paket'");
                        $data_pel1=mysqli_fetch_assoc($query_pel1);
                        $id_banyak_pelayanan=$data_pel1['id_jumlah_pelayanan'];
                        
                        $query_pelayanan2=mysqli_query($koneksi,"SELECT * FROM tbl_jumlah_pelayanan INNER JOIN tbl_data_pelayanan USING(pelayanan_id) Where id_jumlah_pelayanan='$id_banyak_pelayanan'");
                        while($data_pelayanan=mysqli_fetch_assoc($query_pelayanan2)){
                            ?>
                             <tr>
                                <td>
                                    <?php echo $data_pelayanan['nama_pelayanan'];?>
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
              </br>
              
            </div>
            <div class="col-lg-4">
                <!-- Informasi Agent Travel-->
                <div class="card card-details ">
                    <h2>Informasi Agent Travel</h2>
                    <!-- <div class="members my-2">
                    <img src="Asset3/images/members.png" alt="" class="w-75" />
                    </div> -->
                    <hr />
                  <?php 
                  $query1=mysqli_query($koneksi,"SELECT * FROM tbl_agent_travel where travel_id='$id'");
                  while($data=mysqli_fetch_assoc($query1)){
                    ?>
                    <table class="trip-informations">
                    <tr>
                        <th width="50%">Tahun berdiri</th>
                        <td width="50%" class="text-right"><?php echo $data['thn_berdiri'];?></td>
                    </tr>
                    <tr>
                        <th width="50%">Tahun Izin</th>
                        <td width="50%" class="text-right"><?php echo date('d F Y'), strtotime($data['thn_izin']);?></td>
                    </tr>
                    <tr>
                        <th width="50%">Nomor Izin</th>
                        <td width="50%" class="text-right"><?php echo $data['nomor_izin'];?></td>
                    </tr>
                    <tr>
                        <th width="50%">Nomor Telpon</th>
                        <td width="50%" class="text-right"><?php echo $data['No_HP'];?></td>
                    </tr>
                    </table>
                  
              </div>
                </br>
                <!-- Informasi Agent Travel-->
                <div class="card card-details">
                    <h3>Details Alamat</h3>
                    <table class="trip-informations">
                        <tr>
                        <th width="50%">Alamat</th>
                        </tr>
                        <tr>
                        <?php 
                         include 'config/koneksi.php';
                         $id = $_GET['id'];
                        $sql_lokasi=mysqli_query($koneksi,"SELECT * FROM tbl_lokasi WHERE travel_id='$id'");
                        $data_lokasi=mysqli_fetch_assoc($sql_lokasi);
                        
                        ?>
                        <td width="50%" class="text-right"><a href="http://maps.google.com/maps?q=<?php echo$data_lokasi['lat']?>,<?php echo$data_lokasi['long']?>"><?php echo $data['alamat'] ?></a></td>
                        </tr>
                    </table>
                    <?php 
                  }
                  ?>
                    <hr />
                    <h3>Lokasi</h3>
                    <div class="card card-details" id="dvMap" style=" height:250px;">
                    <div  class="form-control" ></div>
                    </div>
                </div>
                <!-- Halaman Sertifikat-->
                <hr/>
                <div class="card card-details">
                    <h3>Our Sertificate</h3>
                    <hr/>
                    <div class="gallery">
                        <!-- <div class="xzoom-container">
                            <img
                            class="xzoom"
                            id="xzoom-default"
                            src="Asset3/images/details-1.jpg"
                            xoriginal="Asset3/images/details-1.jpg"
                            /> --> 
                                 <?php 
                                      include 'config/koneksi.php';
                                      $id = $_GET['id'];
                                      $query = mysqli_query($koneksi, "SELECT * FROM tbl_sertifikat where travel_id= '$id';");                 
                                 ?>
                          
                            <div class="xzoom-thumbs">
                            <?php 
                                        $no=1;
                                        foreach ($query as $row1){
                                    ?>
                            <a href="halaman/sertifikat/image_view.php?id=<?php echo $row1['id']; ?>"
                                ><img
                                class="xzoom-gallery"
                                width="128"
                                src="halaman/sertifikat/image_view.php?id=<?php echo $row1['id']; ?>"
                                xpreview="halaman/sertifikat/image_view.php?id=<?php echo $row1['id']; ?>"
                                        /></a> <?php }?> 
                            <!-- <a href="Asset3/images/details-1.jpg"
                                ><img
                                class="xzoom-gallery"
                                width="128"
                                src="Asset3/images/details-1.jpg"
                                xpreview="Asset3/images/details-1.jpg"
                            /></a>
                            <a href="Asset3/images/details-1.jpg"
                                ><img
                                class="xzoom-gallery"
                                width="128"
                                src="Asset3/images/details-1.jpg"
                                xpreview="Asset3/images/details-1.jpg"
                            /></a> -->
                            </div>
                        <!-- </div> -->
                    </div>
                </div>
               
                <!-- end of halaman sertifikat-->
                <!-- Halaman Testimoni-->
                <hr/>
                <?php
                $id=$_GET['Travel'];
                $query4 =mysqli_query($koneksi, "SELECT DISTINCT travel_id, paket_data_id, COUNT(nilai) as byk_data, sum(nilai) as jmlh_nilai FROM tbl_data_paket LEFT JOIN tbl_testimoni USING(travel_id) WHERE travel_id='$id' GROUP BY paket_data_id");
                $row=mysqli_fetch_assoc($query4);

                if(empty($row['jmlh_nilai']) && empty($row['byk_data'])){
                  $nilai_testimoni= 0;
                }else{
                  $nilai_testimoni=$row['jmlh_nilai']/$row['byk_data'];	
                }

                ?>
                <div class="card card-details">
                    <h2 align="center">Testimoni</h2>
                    <h2 align ="center"><?php echo round($nilai_testimoni,1).'/5('.$row['byk_data'].'ratings)'?></h2>
                    <hr/>
                    <table class="trip-informations">
                        <tr>
                        <th width="50%">Click to rate :</th>
                        <td width="50%" class="text-right">
                            <div class='starrr' id='star1'></div>
                        </td>
                        </tr>
                    </table>
                    <div>&nbsp;
                    <span class='your-choice-was' style='display: none;'>
                        Your rating was <span class="choice rating">
                        </span>
                    </span>
                    <input type="hidden" class="choice" name="rating">
                    </div>
                    <hr/>
                    <div class="join-container">
                        <button class="btn btn-block btn-join-now mt-3 py-2" onclick="setRatingAgent()"
                            > Submit</button>
                    </div>
                </div>
                <!-- end of halaman sertifikat-->

            </div>
            </div> 
          <br>
        
        </div>
      </section>
    </main>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBY7rzsCpS1LPaauLQRxJcFHIWuEUU3_Uo&libraries=drawing" async defer></script>
  <script type="text/javascript">
    var markers = [
    <?php
     include 'config/koneksi.php';
     $id = $_GET['Travel'];
    $sql_lokasi= mysqli_query($koneksi, "SELECT * FROM tbl_lokasi WHERE travel_id='$id'");
    while(($data_lokasi =  mysqli_fetch_assoc($sql_lokasi))) {
    ?>
    {
         "lat": '<?php echo $data_lokasi['lat']; ?>',
         "long": '<?php echo $data_lokasi['long']; ?>',
         "keterangan": '<?php echo $data_lokasi['keterangan']; ?>'
         
    },
    <?php
    
    }
    ?>
    ];
    </script>
    <script type="text/javascript">

        window.onload = function () {
      
            var mapOptions = {
            center: new google.maps.LatLng(-2.990934,104.756554),
                zoom: 9,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }; 
            var infoWindow = new google.maps.InfoWindow();
            var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
           var drawingManager = new google.maps.drawing.DrawingManager({
                    drawingControl: true,
                    drawingControlOptions: {
                        position: google.maps.ControlPosition.TOP_CENTER,
                        drawingModes: [google.maps.drawing.OverlayType.MARKER]
                    }
                });
                
      drawingManager.setMap(map);
      
            for (i = 0; i < markers.length; i++) {
                var data = markers[i];
        var latnya = data.lat;
        var longnya = data.long;
        var myLatlng = new google.maps.LatLng(latnya, longnya);
                var marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map,
                    title: data.keterangan
                });
                (function (marker, data) {
                    google.maps.event.addListener(marker, "click", function (e) {
                        infoWindow.setContent('<b>Keterangan</b> :' + data.keterangan + '<br>');
                        infoWindow.open(map, marker);
                    });
               })(marker, data);
            }
            
        }
    </script>