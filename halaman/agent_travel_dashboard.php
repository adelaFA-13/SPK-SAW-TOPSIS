<?php
function getTestimoni(){
  include 'config/koneksi.php';
  $travel=$_SESSION['user_id'];

	$query =mysqli_query($koneksi, "SELECT DISTINCT travel_id, paket_data_id, tbl_testimoni.testimoni_id, id_member, nilai, COUNT(DISTINCT nilai) as byk_data, sum(DISTINCT nilai) as jmlh_nilai FROM tbl_data_paket LEFT JOIN tbl_testimoni USING(travel_id) WHERE travel_id='$travel'");
	$row=mysqli_fetch_assoc($query);

	//deklarasi

		if(empty($row['jmlh_nilai']) && empty($row['byk_data'])){
			$nilai_testimoni= 0;
		}else{
			$nilai_testimoni=$row['jmlh_nilai']/$row['byk_data'];	
		}	
  
  return $nilai_testimoni;
}

function getjmlhHaji(){
  include 'config/koneksi.php';
  $travel=$_SESSION['user_id'];

  include 'config/koneksi.php';
  $travel=$_SESSION['user_id'];
  $id="H1";
  $query=mysqli_query($koneksi,"SELECT count(paket_data_id) as byk_haji FROM tbl_data_paket WHERE jenispaket_id='$id' AND travel_id='$travel'");
  $row=mysqli_fetch_assoc($query);

  return $row['byk_haji'];
}
function getjlmhUmrah(){
  include 'config/koneksi.php';
  $travel=$_SESSION['user_id'];
  $id="U1";
  $query=mysqli_query($koneksi,"SELECT count(paket_data_id) as byk_umrah FROM tbl_data_paket WHERE jenispaket_id='$id' AND travel_id='$travel'");
  $row=mysqli_fetch_assoc($query);

  return $row['byk_umrah'];
}
include 'config/koneksi.php';
$travel=$_SESSION['user_id'];
$query =mysqli_query($koneksi, "SELECT DISTINCT travel_id, paket_data_id, tbl_testimoni.testimoni_id, id_member, nilai, COUNT(nilai) as byk_data, sum(nilai) as jmlh_nilai FROM tbl_data_paket LEFT JOIN tbl_testimoni USING(travel_id) WHERE travel_id='$travel'");
$row=mysqli_fetch_assoc($query);
$sql=mysqli_query($koneksi,"SELECT * FROM tbl_agent_travel where travel_id='$travel' and `status`='Aktif'");

?>

<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="row">
                    <div class="col-lg-12">
                        
                        <?php if(mysqli_num_rows($sql) >= 1){
                        ?><div class="alert alert-info">
                        Selamat Datang, Admin <strong><?php echo $_SESSION['username']; ?></strong>
                    </div>
                          
                          <?php
                        }else{
                          ?>
                          <div class="alert alert-danger">
                            Selamat Datang, Admin <strong><?php echo $_SESSION['username']; ?> Saat Ini Data Anda Masih Dalam Proses </strong>
                        </div>
                          
                          <?php
                        }
                          ?>
                        
                    </div>   
                </div>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Statistik Jumlah Agent -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Paket Haji</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?PHP echo getjmlhHaji();?></div> <!--Contoh jumlah agent-->
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Paket Umrah -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Paket Umrah</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo getjlmhUmrah();?></div><!-- Contoh Jumlah Paket Umrah-->
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-th-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Paket Haji -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Testimoni</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo getTestimoni();?>/5(<?php echo $row['byk_data']?>rating)</div> <!--contoh jumlah paket haji-->
                        </div>
                        
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-star fa-2x text-yelow-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

    </div>
</div>
</div>