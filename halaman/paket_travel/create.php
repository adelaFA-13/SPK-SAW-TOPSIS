
<?php
include 'config/koneksi.php';
$id=$_SESSION['user_id'];
$sql = "SELECT MAX(`paket_data_id`) FROM `tbl_data_paket` WHERE `travel_id`='$id'";
$query=mysqli_query($koneksi,$sql);

$id_paket= mysqli_fetch_array($query);
if($id_paket){
    $nilai=substr($id_paket[0],1);
    $kode = (int)$nilai;

    $kode=$kode+1;
    $auto_kode = "P".str_pad($kode,4,"0", STR_PAD_LEFT);
    $auto_banyak = "BF".str_pad($kode,4,"0", STR_PAD_LEFT);
} else{
    $auto_kode ="P001";
    $auto_banyak ="BF001";
}
?>

<div class="containter-fluid">
    
    <!-- bagian pertama -->
    <div class="col-xl-8 col-md-8 mt-2 mx-auto">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 text-primary font-weight-bold">Input Paket Agent Travel</h6>
            </div>
            <div class="card-body">
                <!--Mulai form  -->
                <form action="config/paket_travel/simpan_paket.php" method="post">
                <input type="hidden" class="form-control" name="travel_id" value="<?php echo $_SESSION['user_id']; ?>">
                            <input type="hidden" class="form-control" name="paket_data_id" value="<?php echo $auto_kode; ?>">
                            <input type="hidden" class="form-control" name="idbanyakfasilitas" value="<?php echo $auto_banyak;?>">  
                <div class="row form-group">
                    <div class="col-lg-3 ">
                            <label for="NamaMitra">Nama Paket</label>
                        </div>
                        <div class="col-lg-1">:</div>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="nama_paket" placeholder="Masukan Nama Paket" id="
                            NamaMitra">
                        </div>
                    </div>
                    <div class="row form-group">
                    <div class="col-lg-3 ">
                            <label for="NamaMitra">Jenis Paket</label>
                        </div>
                        <div class="col-lg-1">:</div>
                        <div class="col-lg-8">
                            <select class="col-lg-8" name="jenis_paket" id="">
                                    <option value="">-Pilih-</option>
                                    <?php if(isset($rows)): ?>
                                        <?php foreach($rows as $row): ?>
                                    <option value="<?php echo$row['jenispaket_id'];?>"><?php echo $row['jenispaket'];?></option>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                            </select>
                           
                        </div>
                    </div>
                    <div class="row form-group">
                    <div class="col-lg-3">
                            <label for="">Harga Paket</label>
                        </div>
                        <div class="col-lg-1">:</div>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="harga_paket" placeholder="Masukan Harga Paket">
                        </div>
                    </div>
                    <div class="row form-group">
                    <div class="col-lg-3">
                            <label for="">Nama Hotel</label>
                    </div>
                        <div class="col-lg-1">:</div>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="namahotel" placeholder="Masukan Nama Hotel">
                        </div>
                    </div>
                    <div class="row form-group">
                    <div class="col-lg-3">
                            <label for="">Hotel Bintang</label>
                        </div>
                        <div class="col-lg-1">:</div>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="hotelbintang" placeholder="Masukan Bintang">
                        </div>
                    </div>
                    <div class="row form-group">
                    <div class="col-lg-3 ">
                            <label for=""> Nama maskapai</label>
                        </div>
                        <div class="col-lg-1">:</div>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="nama_maskapai" placeholder="Masukan Maskapai" id="">
                        </div>
                    </div>
                    <div class="row form-group">
                    <div class="col-lg-3 ">
                            <label for="NamaMitra">Rute Penerbangan</label>
                        </div>
                        <div class="col-lg-1">:</div>
                        <div class="col-lg-8">
                            <select class="col-lg-8" name="rute" id="">
                                    <option value="">-Pilih-</option>
                                    <option value="Langsung">Langsung</option>
                                    <option value="Tidak Langsung">Tidak Langsung</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                    <div class="col-lg-3">
                            <label for="">Objek Wisata</label>
                        </div>
                        <div class="col-lg-1">:</div>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="objekwisata" placeholder="Masukan Objek Wisata">
                        </div>
                    </div>
                    <div class="row form-group">
                    <div class="col-lg-3">
                            <label for=""> Fasilitas</label>
                    </div>
                    <div class="col-lg-1">:</div>
                    <div class="col-lg-8">
                    <div class="form-row">
                        <?php  include 'config/koneksi.php';
                            $travel_id1 = $_SESSION['user_id'];
                            $query3="SELECT * FROM `tbl_data_fasilitas` WHERE `travel_id`='$travel_id1'";
                            $sql3 = mysqli_query($koneksi,$query3); 
                            while ($result=mysqli_fetch_array($sql3)){
                        ?>
                        <input type="checkbox" name="fasilitasid[]" value="<?php echo $result['fasilitas_id']?>"> <?php echo $result['nama_fasilitas']?></input>
                        &nbsp;
                        <?php
                        }
                        ?>
                    </div>         
                    </div>
                    </div>  
                    <div class="form-group">
                        <div class="col lg-12" align="right">
                            
                            <button type="reset" class="btn btn-md btn-secondary"><i class="fa fa-undo"></i> Ulangi</button>
                            <button type="submit" class="btn btn-xs btn-primary"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end of bagian pertama -->

    <!-- bagian kedua -->
    <div class="col-xl-8 col-md-8 mt-2 mx-auto">
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="row">
            <div class="col-xl-6">
                <h5 class="Font-bold text-primary">Fasilitas</h5>
            </div>
            <div class="col-xl-6 text-right">
              <i class="fas fa-plus text-primary" data-toggle="modal" data-target="#tambahFasilitas"></i>
            <!-- modal-->
                <div id="tambahFasilitas" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                    <!-- content modal -->
                        <div class="modal-content">
                    <!-- heading modal -->
                            <div class="modal-header">
                                    <h5 class="modal-title">Tambah Fasilitas</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                    <!-- body modal -->
                            <div class="modal-body">
                                <div class="card-body" style="height: 45rem;">
                                    <!-- <div class="row form-group mx-auto">
                                        </div> -->
                                    <form action="config/paket_travel/simpan_paket_fasilitas.php" method="post" enctype="multipart/form-data"> 
                                            <input type="hidden" class="form-control" name="travel_id" value="<?php echo $_SESSION['user_id']; ?>">
                                            <input type="hidden" class="form-control" name="idbanyakfasilitas" value="<?php echo $auto_banyak;?>">
                                            <div class="form-row">
                                                <?php  include 'config/koneksi.php';
                                                        $travel_id1 = $_SESSION['user_id'];
                                                        $query3="SELECT * FROM `tbl_data_fasilitas` WHERE `travel_id`='$travel_id1'";
                                                        $sql3 = mysqli_query($koneksi,$query3); 
                                                        
                                                        while ($result=mysqli_fetch_array($sql3)){
                                                ?>
                                                                <input type="checkbox" name="fasilitasid[]" value="<?php echo $result['fasilitas_id']?>"> <?php echo $result['nama_fasilitas']?></input>
                                                        &nbsp;
                                                            <?php
                                                            }
                                                        ?>
                                            </div>        
                                    
                                            <div class="form-row">
                                                <div class="col lg-12" align="right">
                                                <button type="reset" class="btn btn-md btn-secondary"><i class="fa fa-undo"></i> Cancel</button>
                                                <button type="submit" name="tombol" class="btn btn-xs btn-primary"><i class="fa fa-save"></i> Save</button>
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
            <!-- close modal-->
          <div class="row">
              <div class="col-xl-12 md-auto">
                   <div class="card-body">
                     <form action="config/paket_travel/#" method="post">
                     <input type="hidden" class="form-control" name="travel_id" value="<?php echo $_SESSION['user_id']; ?>">
                     <input type="hidden" class="form-control" name="paket_data_id" value="<?php echo $auto_kode; ?>">  
                        <div class="row form-grup">
                            <div class="col lg-12">
                            <div class="form-check">
                                    <?php 
                                            include 'config/koneksi.php';
                                            $travel_id1 = $_SESSION['user_id'];
                                            $id_jumlah_fasilitas=$_SESSION['id_jumlah_fasilitas'];
                                            $hasil4 = mysqli_query($koneksi,"SELECT tbl_data_fasilitas.nama_fasilitas, tbl_jumlah_fasilitas.id_jumlah_fasilitas, tbl_jumlah_fasilitas.travel_id FROM tbl_jumlah_fasilitas INNER JOIN tbl_data_fasilitas USING(fasilitas_id) INNER JOIN tbl_agent_travel ON tbl_agent_travel.travel_id=tbl_jumlah_fasilitas.travel_id WHERE id_jumlah_fasilitas='$id_jumlah_fasilitas' AND tbl_jumlah_fasilitas.travel_id='$travel_id1'");


                                            while($result2= mysqli_fetch_assoc($hasil4)){
                                                $result2s[] = $result2;
                                                echo $result2['nama_fasilitas'];
                                    ?>      
                                    </br>
                                    <?php
                                            }
                                    ?>   
                            </div>  
                            </div>
                       </div>
                        <div class="row form-group">
                            <div class="col lg-12" align="right"> 
                                <button type="reset" class="btn btn-md btn-secondary"><i class="fa fa-undo"></i> Ulangi</button>
                                <button type="submit" class="btn btn-xs btn-primary"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>  
                    </form>         
                    </div>
                </div>             
            </div>
                            
        </div>
      </div>
    </div>
    <!-- end of bagian kedua -->
    <!-- bagian ketiga pelayanan -->
    <div class="col-xl-8 col-md-8 mt-2 mx-auto">
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="row">
                    <div class="col-xl-6">
                        <h5 class="Font-bold text-primary">Pelayanan</h5>
                    </div>
                    <div class="col-xl-6 text-right">
                        <i class="fas fa-plus text-primary" data-toggle="modal" data-target="#tambahPelayanan"></i>
                        <!-- modal-->
                        <div id="tambahPelayanan" class="modal fade" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <!-- content modal -->
                                    <div class="modal-content">
                                    <!-- heading modal -->
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tambah Pelayanan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                    <!-- body modal -->
                                    <div class="modal-body">
                                    <div class="card-body" style="height: 45rem;">
                                            <!-- <div class="row form-group mx-auto">
                                                
                                            </div> -->
							  
								    <form action="config/agent/proses_simpan_fasilitas.php" method="post" enctype="multipart/form-data"> 
                                    <input type="hidden" class="form-control" name="travel_id" value="<?php echo $_SESSION['user_id']; ?>">
                            <input type="hidden" class="form-control" name="paket_id" value="<?php echo $auto_kode; ?>">
                                        <div class="form-row">
                                           <?php 
                                           include 'config/koneksi.php';

                                           $travel_id    = $_SESSION['user_id'];
                                           $query=(" SELECT * FROM `tbl_data_pelayanan` WHERE `travel_id`='$travel_id'");
                                           $sql = mysqli_query($koneksi,$query); 
                                           while ($hasil=mysqli_fetch_assoc($sql)){
                                                ?>
                                                <input type="checkbox" name="checkbox" value="<?php echo $hasil['nama_pelayanan']?>" ><?php echo $hasil['nama_pelayanan']?></input>
                                           &nbsp;
                                            <?php
                                            }
                                            ?>
                                            </div>        
                                        </div>
                                        <div class="form-row">
                                            <div class="col lg-12" align="right">
                                                <button type="reset" class="btn btn-md btn-secondary"><i class="fa fa-undo"></i> Cancel</button>
                                                <button type="submit" name="tombol" class="btn btn-xs btn-primary"><i class="fa fa-save"></i> Save</button>
                                            </div>
                                        </div>
								    </form>
                                 </div>
                                 <!-- tutup body fasilitas-->
		                          </div>
		                          </div>
                                </div>
                        </div>
                        <!-- close modal-->
                        <div class="col-lg-6">
                            <div class="card-body">
                                <?php
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
        
       <!-- end of bagian ketiga -->
<!-- div cointainer -->
    </div>  
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2.min.js"></script>
<script>
$(document).ready(function(){
    $("fasilitas").select2({
        placeholder:"silahkan pilih"
    });
});
</script>