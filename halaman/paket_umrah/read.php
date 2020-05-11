
<?php

include 'config/koneksi.php';
$id_paket=$_GET['id'];
$sql_paket=mysqli_query($koneksi,"SELECT * FROM tbl_data_paket INNER JOIN tbl_jenis_paket USING(jenispaket_id) INNER JOIN tbl_agent_travel USING(travel_id) WHERE paket_data_id='$id_paket'");
$data=mysqli_fetch_assoc($sql_paket);
?>
<!-- Begin Page Content -->
<div class="container-fluid col-xl-8 col-xs-8 mb-auto">

<!-- Page Heading -->

<!-- Content Buat Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Nama Paket</h6>
        </div>
        <div class="card-body">
            <form action="config/paket_travel/edit.php" method="POST">
                <div class="form-group">
                    <div class="row">
                    <div class="col-xl-2">
                    <label for="">Nama Paket</label>
                    </div>
                    <div class="col-xl-1">
                    :
                    </div>
                    <div class="col-xl-8">
                        <input type="text" class="form-control" name="namapaket" value="<?php echo $data['nama_paket'] ?>" readonly></input>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xl-2">
                        <label for="">Jenis Paket</label>
                        </div>
                        <div class="col-xl-1"> :</div>
                        <div class="col-xl-8">
                        <input type="text" class="form-control" value="<?php echo $data['jenispaket']; ?>"readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xl-2">
                            <label for="">Harga</label>
                        </div>
                        <div class="col-xl-1">:</div>
                        <div class="col-xl-8">
                            <input type="text" name="harga" class="form-control" value="<?php echo $data['harga_paket'];?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xl-2">
                            <label for="">Durasi Hari</label>
                        </div>
                        <div class="col-xl-1">:</div>
                        <div class="col-xl-8">
                            <input type="text" name="hari" class="form-control" value="<?php echo $data['jumlah_hari'];?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xl-2">
                            <label for="">Nama Hotel</label>
                        </div>
                        <div class="col-xl-1">:</div>
                        <div class="col-xl-8">
                            <input type="text" name="hotel" class="form-control" value="<?php echo $data['nama_hotel'];?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xl-2">
                            <label for="">Hotel Bintang</label>
                        </div>
                        <div class="col-xl-1">:</div>
                        <div class="col-xl-8">
                        <input type="text" name="hotel" class="form-control" value="<?php echo $data['bintang_hotel'];?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xl-2">
                            <label for="">Nama Maskapai</label>
                        </div>
                        <div class="col-xl-1">:</div>
                        <div class="col-xl-8">
                            <input type="text" name="namamaskapai" class="form-control" value="<?php echo $data['nama_maskapai']; ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xl-2">
                            <label for="">Rute Penerbangan</label>
                        </div>
                        <div class="col-xl-1">:</div>
                        <div class="col-xl-8">
                        <input type="text" name="hotel" class="form-control" value="<?php echo $data['rute_penerbangan'];?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xl-2">
                            <label for="">Objek Wisata</label>
                        </div>
                        <div class="col-xl-1">:</div>
                        <div class="col-xl-8">
                            <input type="text" name="objekwisata" class="form-control" value="<?php echo $data['objek_wisata']?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xl-2">
                            <label for="">Fasilitas</label>
                        </div>
                        <div class="col-xl-1">:</div>
                        <div class="col-xl-4">
                            <table class="table table-bordered">
                                <thead>
                                    <tr align="center">
                                        <th>Fasilitas Paket</th>
                                        
                                    </tr>
                
                                </thead>
                                <tbody>
                                <?php
                                $travel=$data['travel_id'];
                                $idpaket=$data['id_jumlah_fasilitas'];
                                $sql_fasilitas=mysqli_query($koneksi,"SELECT * FROM tbl_data_fasilitas where travel_id ='$travel'");
                                $sql_byk_fasilitas=mysqli_query($koneksi,"SELECT * FROM tbl_jumlah_fasilitas INNER JOIN tbl_data_fasilitas using(fasilitas_id) WHERE id_jumlah_fasilitas='$idpaket'");

                                while($data_banyak_fasilitas = mysqli_fetch_assoc($sql_byk_fasilitas)){
                                ?>
                                <tr id="<?php echo $data_banyak_fasilitas['fasilitas_id'];?>">
                                    <div class="form-check">
                                    <td><?php echo $data_banyak_fasilitas['nama_fasilitas'];?></td>
                                    </div>
                                </tr>
                                <?php 
                                }                             
                                ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xl-2">
                            <label for="">Pelayanan</label>
                        </div>
                        <div class="col-xl-1">:</div>
                        <div class="col-xl-4">
                            <table class="table table-bordered">
                                <thead>
                                    <tr align="center">
                                        <th>Pelayanan Paket</th>
                                     
                                    </tr>
                
                                </thead>
                                <tbody>
                                <?php
                                $travel=$data['travel_id'];
                                $idpaketpel=$data['id_jumlah_pelayanan'];
                                $sql_pelayanan=mysqli_query($koneksi,"SELECT * FROM tbl_data_pelayanan where travel_id ='$travel'");
                                $sql_byk_pelayanan=mysqli_query($koneksi,"SELECT * FROM tbl_jumlah_pelayanan INNER JOIN tbl_data_pelayanan using(pelayanan_id) WHERE id_jumlah_pelayanan='$idpaketpel'");

                                while($data_banyak_pelayanan = mysqli_fetch_assoc($sql_byk_pelayanan)){
                                ?>
                                <tr id="<?php echo $data_banyak_pelayanan['fasilitas_id'];?>">
                                    <div class="form-check">
                                    <td><?php echo $data_banyak_pelayanan['nama_pelayanan'];?></td>
                                    
                                    </div>
                                </tr>
                                <?php 
                                }                             
                                ?>
                                </tbody>
                            </table>
                            </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

    </div>
    </div>
    </div>
</div>
