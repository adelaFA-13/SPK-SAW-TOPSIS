
<?php
$sql_paket=mysqli_query($koneksi,"SELECT * FROM tbl_data_paket INNER JOIN tbl_jenis_paket USING(jenispaket_id) INNER JOIN tbl_agent_travel USING(travel_id) WHERE paket_data_id='$id'");
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
                        <input type="text" class="form-control" name="namapaket" value="<?php echo $data['nama_paket'] ?>"></input>
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
                        <select name="jenispaket" id="jenispaket" class="form-control col-xl-4">
                            <?php
                                $sql_jenis_paket=mysqli_query($koneksi,"SELECT * FROM tbl_jenis_paket");
                                echo "<option> - Pilih -</option>";
                                while($data_jenis=mysqli_fetch_assoc($sql_jenis_paket)){
                                    if($data['jenispaket']==$data_jenis['jenispaket']){
                                        $selected="selected";
                                    }else{
                                        $selected="";
                                    }
                                    echo "<option $selected>".$data_jenis['jenispaket']."</option>";
                                }
                            ?>
                       </select>
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
                            <input type="text" name="harga" class="form-control" value="<?php echo $data['harga_paket'];?>">
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
                            <input type="text" name="hari" class="form-control" value="<?php echo $data['jumlah_hari'];?>">
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
                            <input type="text" name="hotel" class="form-control" value="<?php echo $data['nama_hotel'];?>">
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
                            <select name="bintanghotel" class="form-control"id="">
                                <option value="">--PILIH--</option>
                                <option value="bintang 5">bintang 5</option>
                                <option value="bintang 4">bintang 4</option>
                                <option value="bintang 3">bintang 3</option>
                                <option value="bintang 2">bintang 2</option>
                                <option value="bintang 1">bintang 1</option>
                            </select>
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
                            <input type="text" name="namamaskapai" class="form-control" value="<?php echo $data['nama_maskapai']; ?>">
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
                        <select name="rutepenerbangan" class="form-control"id="">
                                <option value="">--PILIH--</option>
                                <option value="Langsung">Langsung</option>
                                <option value="Tidak Langsung">Tidak Langsung</option>
                        </select>
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
                            <input type="text" name="objekwisata" class="form-control" value="<?php echo $data['objek_wisata']?>">
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
                                        <th></th>
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
                                    <td><label class=form-check-label><?php echo $data_banyak_fasilitas['nama_fasilitas'];?></label></td>
                                    <td align="right"><a href="config/paket_travel/delete.php?id=<?php echo $data_banyak_fasilitas['fasilitas_id']?>&&Paket=<?php echo $data_banyak_fasilitas['id_jumlah_fasilitas']?>" class="btn btn-danger btn-sm" onclick="return confirm('yakin delete fasilitas?')"><i class="fa fa-remove"></i></a></td>
                                    </div>
                                </tr>
                                <?php 
                                }                             
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-xl-4">
                            <table class="table table-bordered">
                                <thead>
                                    <tr align="center">
                                        <th>Fasilitas Travel</th>
                                        <th></th>
                                    </tr>
                
                                </thead>
                                <tbody>
                                <?php
                                $travel=$data['travel_id'];
                                $idpaket=$data['id_jumlah_fasilitas'];
                                $sql_fasilitas=mysqli_query($koneksi,"SELECT * FROM tbl_data_fasilitas where travel_id ='$travel'");
                                $sql_byk_fasilitas=mysqli_query($koneksi,"SELECT * FROM tbl_jumlah_fasilitas INNER JOIN tbl_data_fasilitas using(fasilitas_id) WHERE id_jumlah_fasilitas='$idpaket'");

                                while($data_fasilitas = mysqli_fetch_assoc($sql_fasilitas)){
                                ?>
                                <tr id="<?php echo $data_fasilitas['fasilitas_id'];?>">
                                    <div class="form-check">
                                    <td><label class=form-check-label><?php echo $data_fasilitas['nama_fasilitas'];?></label></td>
                                    <td align="right"><a href="config/paket_travel/tambah_fasilitas.php?id=<?php echo $data_fasilitas['fasilitas_id']?>&Paket=<?php echo $idpaket;?>&travel=<?php echo $travel;?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a></td>
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
                                        <th></th>
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
                                    <td><label class=form-check-label><?php echo $data_banyak_pelayanan['nama_pelayanan'];?></label></td>
                                    <td align="right"><a href="config/paket_travel/delete_pelayanan.php?id=<?php echo $data_banyak_pelayanan['pelayanan_id']?>&&Paket=<?php echo $data_banyak_pelayanan['id_jumlah_pelayanan']?>" class="btn btn-danger btn-sm" onclick="return confirm('yakin delete pelayanan?')"><i class="fa fa-remove"></i></a></td>
                                    </div>
                                </tr>
                                <?php 
                                }                             
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-xl-4">
                            <table class="table table-bordered">
                                <thead>
                                    <tr align="center">
                                        <th>Fasilitas Travel</th>
                                        <th></th>
                                    </tr>
                
                                </thead>
                                <tbody>
                                <?php
                                $travel=$data['travel_id'];
                                $idpaketpel=$data['id_jumlah_pelayanan'];
                                $sql_pelayanan=mysqli_query($koneksi,"SELECT * FROM tbl_data_pelayanan where travel_id ='$travel'");
                                $sql_byk_pelayanan=mysqli_query($koneksi,"SELECT * FROM tbl_jumlah_pelayanan INNER JOIN tbl_data_pelayanan using(pelayanan_id) WHERE id_jumlah_pelayanan='$idpaketpel'");

                                while($data_pelayanan = mysqli_fetch_assoc($sql_pelayanan)){
                                ?>
                                <tr id="<?php echo $data_pelayanan['pelayanan_id'];?>">
                                    <div class="form-check">
                                    <td><label class=form-check-label><?php echo $data_pelayanan['nama_pelayanan'];?></label></td>
                                    <td align="right"><a href="config/paket_travel/tambah_pelayanan.php?id=<?php echo $data_pelayanan['pelayanan_id']?>&Paket=<?php echo $idpaketpel;?>&travel=<?php echo $travel;?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a></td>
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
