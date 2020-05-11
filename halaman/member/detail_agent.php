<main>
      <section class="section-details-header"></section>
      <section class="section-details-content">
        <div class="container">
          <div class="row">
            <div class="col p-0">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">
                    Travel Agent 
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Details
                  </li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-8 pl-lg-0">
              <div class="card card-details">
             <?php  $data=mysqli_fetch_assoc($query)
               
              ?>
                <h1><?php echo $data['nama'] ?></h1>
                <p></p>
                <div class="gallery">
                  <div class="xzoom-container">
                    <?php $id=$_GET['id'];
                        $sqlgaleri1=mysqli_query($koneksi,"SELECT * FROM tbl_galeri where travel_id='$id' ORDER BY id ASC LIMIT 1");
                       $datagaleri= mysqli_fetch_assoc($sqlgaleri1);
                        if (!isset($datagaleri['foto']))
                        {
                          ?> 
                          <img
                              class="xzoom"
                              id="xzoom-default"
                              src="img/no_image.jpg"
                              xoriginal="A"<?php echo "config/galeri/".$datagaleri['foto']; ?>"
                          />   
                       <?php }else{
                        ?>
                    <img
                      class="xzoom"
                      id="xzoom-default"
                      src="<?php echo "config/galeri/".$datagaleri['foto']; ?>"
                      xoriginal="A"<?php echo "config/galeri/".$datagaleri['foto']; ?>"
                       /> <?php } ?>
                    <div class="xzoom-thumbs">
                    <?php
                    $id=$_GET['id'];
                    $sqlgaleri=mysqli_query($koneksi,"SELECT * FROM tbl_galeri where travel_id='$id'");
                        $no=1;
                        foreach ($sqlgaleri as $row1){
                    ?>
                      <a href="<?php echo "config/galeri/".$row1['foto']; ?>"
                        ><img
                          class="xzoom-gallery"
                          width="128"
                          src="<?php echo "config/galeri/".$row1['foto']; ?>"
                          xpreview="<?php echo "config/galeri/".$row1['foto']; ?>"
                      /></a>
                      <?php } ?>
                    </div>
                  
                  </div>
                  <h2>Deskrisi Travel</h2>
                  <p><?php echo $data['deskripsi'] ?>
                  </p>
                </div>
              </div>
           
              </br>
              <!-- tampil paket data -->
              <div class="card card-details">
                  <div class="attendee">
                  <div class="table-responsive">
                    <table class="table table-responsive-sm text-center" id="dataTable" cellspacing="0">
                        <thead>
                          <tr>
                            <th>
                              No
                            </th>
                            <th>
                              Nama Paket
                            </th>
                            <th>
                              Jenis
                            </th>
                            <th>
                              Lihat
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php $x=1;?>
                        <?php if(isset($datas)): ?>
                        <?php foreach($datas as $data): ?>        
                          <tr>
                            <td><?php echo $x++?></td>
                            <td><?php echo $data['nama_paket']?></td>
                            <td><?php echo $data['jenispaket']?></td>
                            <td><a href="index.php?url=detail_data_paket&id=<?php echo $data['paket_data_id']?>&Travel=<?php echo$data['travel_id']; ?>" class="btn btn-xs btn-info" title="lihat">
                              <i class="fa fa-eye"></i>
                          </a></td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                      </tbody>
                      </table>
                  </div>
                  </div>
              </div>
            </div>
            <div class="col-lg-4">
                <!-- Informasi Agent Travel-->
                <div class="card card-details ">
                    <h2>Informasi Agent Travel</h2>
                    <!-- <div class="members my-2">
                    <img src="Asset3/images/members.png" alt="" class="w-75" />
                    </div> -->
                    <hr />
                  <?php while($data=mysqli_fetch_assoc($query1)){
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
                <br>
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
    $sql = mysqli_query($koneksi, "SELECT * FROM tbl_lokasi WHERE travel_id='$id'");
    while(($data =  mysqli_fetch_assoc($sql))) {
    ?>
    {
         "lat": '<?php echo $data['lat']; ?>',
         "long": '<?php echo $data['long']; ?>',
         "keterangan": '<?php echo $data['keterangan']; ?>'
         
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
    