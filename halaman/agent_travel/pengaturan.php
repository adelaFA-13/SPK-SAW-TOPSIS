<?php 
include 'config/koneksi.php';
$id         = $_SESSION['user_id'];
$agent      = mysqli_query($koneksi, "select * from tbl_agent_travel WHERE travel_id='$id'");
$row        = mysqli_fetch_array($agent);?>

<!-- Begin Page Content -->
        <div class="container-fluid">
	          <!-- Content Row -->
	         <div class="row">
		         	<!-- Profile  -->
		            <div class="col-xl-5 col-lg-5 col-sm-5">
		              <div class="card shadow mb-4">
		                <!-- Card Header - Dropdown -->
		                <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		                  <h6 class="m-0 font-weight-bold text-primary"></h6>
		                </div> -->
		                <!-- Card Body -->
		                <div class="card-body" style="height: 45rem;">
							<div class="row form-group mx-auto">
								<img src="img/undraw_posting_photo.svg" width="300" class="img-profile rounded-circle text-center mx-auto" alt="Foto">
							</div>
						  	<div class="row form-group">
							  <a href="#" class="font-weight-bold text-primary mx-auto">Ganti Foto</a>
							</div>
							<hr class="sidebar-divider">
								<form action="config/agent/proses_input.php" method="post"> 
										<input type="hidden" class="form-control" name="travel_id" value="<?php echo $_SESSION['travel_id']; ?>" placeholder="Nama">
								<div class="form-row">
									<div class="form-group col-xl-3 text-center">
										<label for="">Nama</label>
									</div>
									<div class="form-group col-xl-9">
										<input type="text" class="form-control" value="<?php echo $row['nama'];?>" name="nama" placeholder="Nama">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-xl-3 text-center">
										<label for="">Alamat</label>
									</div>
									<div class="form-group col-xl-9">
										
										<input class="form-control" value="<?php echo $row['alamat']; ?>" name="alamat"  placeholder="Alamat Agent Travel"></input>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-xl-3 text-center">
										<label for="">Tahun berdiri</label>
									</div>
									<div class="form-group col-xl-9">
										<!-- kalo bisa dropdown -->
										<input type="year" class="form-control" value="<?php echo $row['thn_berdiri'];?>" name="tahun" placeholder="Tahun berdiri">
									</div>
								</div>
								<div class="form-row">
								<div id="dvMap" style="width: 1000px; height: 550px"></div>
								</div>
								<div class="form-row">
                        			<div class="col lg-12" align="right">
                            			<button type="reset" class="btn btn-md btn-secondary"><i class="fa fa-undo"></i> Cancel</button>
                           				 <button type="submit" class="btn btn-xs btn-primary"><i class="fa fa-save"></i> Save</button>
                       				 </div>
                   				</div>
								</form>
		                </div>
		              </div>
		            </div>
		            <!-- Data agent travel -->
		            <div class="col-xl-7 col-lg-7 col-sm-7">
		              <div class="card shadow mb-4">
		                <!-- Card Header - -->
		                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		                  <h6 class="m-0 font-weight-bold text-primary">Profile Agent Travel</h6>
		                </div>
		                <!-- Card Body -->
		                <div class="card-body" style="height: 42rem;">
		                  <form action="config/agent/proses_input_lanjutan.php" method="POST">
						  <input type="hidden" class="form-control" name="travel_id" value="<?php echo $_SESSION['travel_id']; ?>" placeholder="Nama">
								<div class="form-group">
									<label for="">Nomor Izin</label>
									<input type="text" name="no_izin" value="<?php echo $row['nomor_izin'];?>" class="form-control" placeholder="Nomor Izin">
								</div>
								<div class="form-row">
									<div class="form-group col-lg-6">
										<label for="">Tahun Mulai</label>
										<input type="text" name="thn_izin"  value="<?php echo $row['thn_izin'];?>" class="form-control" placeholder="Tahun Mulai">
									</div>
									<div class="form-group col-lg-6">
										<label for="">Tahun Berakhir</label>
										<input type="text" name="thn_habis" placeholder="Tahun Berakhir" value="<?php echo $row['thn_habis'];?>" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label for="">Nomor HandPhone(WhatsAPP)</label>
									<input type="text" name="no_hp" placeholder="Nomor HandPhone" value="<?php echo $row['No_HP'];?>" class="form-control">
								</div>
								<div class="form-group">
									<label for="">Deskripsi Agent Travel</label>
									<textarea name="deskripsi" id="" class="form-control"><?php echo $row['deskripsi'];?></textarea>
								</div>
								<div class="form-row">
                        			<div class="col lg-12" align="right">
                            			<button type="reset" class="btn btn-md btn-secondary"><i class="fa fa-undo"></i> Cancel</button>
                           				 <button type="submit" class="btn btn-xs btn-primary"><i class="fa fa-save"></i> Save</button>
                       				 </div>
                   				</div>
						  </form>
		                  </div>
		                </div>
		              </div>
		            </div>
	          </div>
	          <!-- end of Content Row -->
	          

        </div>
<!-- end of Begin Page Content -->
    </div>
</div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuLLvncdk9Pp1L_MTRIRGXWtXhRyGk-O0&libraries=drawing" async defer></script>
  <script type="text/javascript">
    var markers = [
    <?php
    $sql = mysqli_query($koneksi, "SELECT * FROM tbl_tes");
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
            google.maps.event.addListener(drawingManager, 'markercomplete', function(marker){
    var lat = marker.getPosition().lat(); 
    var lng = marker.getPosition().lng();
    if (confirm('Anda ingin menyimpan marker ini?')){
  window.location.href = "halaman/agent_travel/simpan_marker.php?lat="+lat+"&lng="+lng;}});
        }
    </script>