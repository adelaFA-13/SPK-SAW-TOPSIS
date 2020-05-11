
<?php
include 'config/koneksi.php';
$id=$_SESSION['user_id'];
$sql = "SELECT MAX(`paket_data_id`) FROM `tbl_data_paket`";
$query=mysqli_query($koneksi,$sql);

$id_paket= mysqli_fetch_array($query);
if($id_paket){
    $nilai=substr($id_paket[0],1);
    $kode = (int)$nilai;

    $kode=$kode+1;
    $auto_kode = "P".str_pad($kode,4,"0", STR_PAD_LEFT);
    $auto_banyak = "BF".str_pad($kode,4,"0", STR_PAD_LEFT);
    $kode_pel = "BS".str_pad($kode,4,"0", STR_PAD_LEFT);
} else{
    $auto_kode ="P001";
    $auto_banyak ="BF001";
    $kode_pel ="BS001";
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
                            <input type="hidden" class="form-control" name="idbanyakpelayanan" value="<?php echo $kode_pel;?>">    
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
                            <label for="">Durasi Hari</label>
                    </div>
                        <div class="col-lg-1">:</div>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="durasi" placeholder="Masukan Lama Perjalanan">
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
                    <div class="col-lg-3 col-sm3">
                            <label for="">Hotel Bintang</label>
                        </div>
                        <div class="col-lg-1 col-sm-1">:</div>
                        <div class="col-lg-8">
                        <select class="col-lg-8 col-sm-8" name="hotelbintang" id="">
                                    <option value="">-Pilih-</option>
                                    <option value="bintang 5">bintang 5</option>
                                    <option value="bintang 4">bintang 4</option>
                                    <option value="bintang 3">bintang 3</option>
                                    <option value="bintang 2">bintang 2</option>
                                    <option value="bintang 1">bintang 1</option>
                            </select>
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
                    <div class="row form-group">
                        <div class="col-lg-3">
                                <label for="">Pelayanan</label>
                        </div>
                        <div class="col-lg-1">:</div>
                        <div class="col-lg-8">
                        <div class="form-row">
                            <?php  include 'config/koneksi.php';
                                $travel_id1 = $_SESSION['user_id'];
                                $query4="SELECT * FROM `tbl_data_pelayanan` WHERE `travel_id`='$travel_id1'";
                                $sql4 = mysqli_query($koneksi,$query4); 
                                while ($result1=mysqli_fetch_array($sql4)){
                            ?>
                            <input type="checkbox" name="pelayananid[]" value="<?php echo $result1['pelayanan_id']?>"> <?php echo $result1['nama_pelayanan']?></input>
                            &nbsp;
                            <?php
                            }
                            ?>
                        </div>         
                        </div>
                    </div>  
                    <div class="row form-group">
                    <div class="col-lg-3 ">
                            <label for=""> Detail Paket</label>
                    </div>
                        <div class="col-lg-1">:</div>
                        <div class="col-lg-8">
                            <textarea name="" id="" cols="50" name="detailpaket"rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col lg-12" align="right">
                            
                            <button type="reset" class="btn btn-md btn-secondary"><i class="fa fa-undo"></i> Ulangi</button>
                            <button type="submit" class="btn btn-xs btn-primary" onclick="return confirm('Yakin data paket anda sudah benar?')"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end of bagian pertama -->

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