<?php
include 'config/koneksi.php';

$sql = "SELECT MAX(`user_id`) FROM `tbl_login` ";
$query=mysqli_query($koneksi,$sql);

$id_user= mysqli_fetch_array($query);
if($id_user){
    $nilai=substr($id_user[0],1);
    $kode = (int)$nilai;

    $kode=$kode+1;
    $auto_user = "T".str_pad($kode,4,"0", STR_PAD_LEFT);
} else{
    $auto_user ="T001";
}
?>
    <div class="containter-fluid">
        <div class="col-xl-8 col-md-8  col-sm-8 mt-2 mx-auto">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 text-primary">Input Data Member</h6>
            </div>
            <div class="card-body">
                <!--Mulai form  -->
                <form action="config/customer/proses_simpan_member.php" method="post">
                <input type="hidden" name="kd_user" value="<?php echo $auto_user?>">
                    <div class="row form-group">
                    <div class="col-lg-3">
                            <label for="NamaMitra">Username Member</label>
                        </div>
                        <div class="col-lg-1">:</div>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="username" placeholder="Masukan Username Member" id="
                            NamaMitra">
                        </div>
                    </div>
                    <div class="row form-group">
                    <div class="col-lg-3">
                            <label for="">Email</label>
                        </div>
                        <div class="col-lg-1">:</div>
                        <div class="col-lg-8">
                            <input type="email" class="form-control" name="email" placeholder="Masukan Alamat Email">
                        </div>
                    </div>
                    <div class="row form-group">
                    <div class="col-lg-3">
                            <label for="">Password</label>
                        </div>
                        <div class="col-lg-1">:</div>
                        <div class="col-lg-8">
                            <input type="password" class="form-control" name="password" placeholder="Masukan Password">
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
    </div>

    
    </div>
  </div>
</div>
