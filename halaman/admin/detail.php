<?php 

$koneksi = mysqli_connect('localhost','root','','db_spk_tugasakhir(1)') or die(mysqli_error());

	$id = $_GET['id'];

	$sqlagent = "SELECT * FROM `tbl_agent_travel` WHERE `travel_id` ='$id'";
	$datablm = mysqli_query($koneksi,$sqlagent);
	$data = mysqli_fetch_assoc($datablm);

?>

<div class="container-fluid col-xl-12 col-xs-12">

<!-- Page Heading -->

<!-- Content Buat Table -->
 <div class="card shadow mb-4">
 <div class="card-header py-3">
     <h6 class="m-0 font-weight-bold text-primary"> DATA TRAVEL AGENT <?php echo $data['nama']?></h6>
 </div>
 <div class="card-body">
    <div class="row col-lg-6">
        <div class="col-lg-3">
            <label for="">Nama Travel Agent</label>
        </div>
        <div class="col-lg-1">
            :
        </div>
        <div class="col-lg-7">
        <label for="" class="col-form-label"><?php echo $data['nama'];?></label>
        </div>
    </div>
    <div class="row col-lg-6">
        <div class="col-lg-3">
            <label for="">Alamat</label>
        </div>
        <div class="col-lg-1">
            :
        </div>
        <div class="col-lg-7">
       <label for="" class="col-form-label"><?php echo $data['alamat'];?></label>
        </div>
    </div>
    <div class="row col-lg-6">
        <div class="col-lg-3">
            <label for="">Tahun berdiri</label>
        </div>
        <div class="col-lg-1">
            :
        </div>
        <div class="col-lg-7">
		<label for="" class="col-form-label"><?php echo $data['thn_berdiri'];?></label>
        </div>
    </div>
    <div class="row col-lg-6">
        <div class="col-lg-3">
            <label for="">Nomor IZIN</label>
        </div>
        <div class="col-lg-1">
            :
        </div>
        <div class="col-lg-7">
		<label for="" class="col-form-label"><?php echo $data['nomor_izin'];?></label>
        </div>
	</div>
	<div class="row col-lg-6">
        <div class="col-lg-3">
            <label for="">Tahun izin</label>
        </div>
        <div class="col-lg-1">
            :
        </div>
        <div class="col-lg-7">
		<label for="" class="col-form-label"><?php echo date('d-m-Y', strtotime($data['thn_izin']));?></label>
        </div>
	</div>
	<div class="row col-lg-6">
        <div class="col-lg-3">
            <label for="">Tahun habis</label>
        </div>
        <div class="col-lg-1">
            :
        </div>
        <div class="col-lg-7">
		<label for="" class="col-form-label"><?php echo date('d-m-Y', strtotime($data['thn_habis']));?></label>
        </div>
	</div>
	



</div>
<a href="index.php?url=data_agent_travel" > <button class="btn btn-warning" >Back</button></a>
</div>
</div>
</div>