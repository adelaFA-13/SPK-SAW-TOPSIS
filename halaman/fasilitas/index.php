<?php
include 'config/koneksi.php';
$id=$_SESSION['user_id'];
$sql = "SELECT MAX(`fasilitas_id`) FROM `tbl_data_fasilitas`";
$query=mysqli_query($koneksi,$sql);

$id_fasilitas= mysqli_fetch_array($query);
if($id_fasilitas){
    $nilai=substr($id_fasilitas[0],1);
    $kode = (int)$nilai;
    echo $kode;
    $kode=$kode+1;
    $auto_kode = "F".str_pad($kode,4,"0", STR_PAD_LEFT);
} else{
    $auto_kode ="F001";
}
?>

<div class="container-fluid">
        
        <div class="row">
                <!-- buat content fasilitas -->
                <div class="col-xl-7">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h5 class="font-weight-bold text-primary ">Data Fasilitas</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <input type="hidden" class="form-control" name="travel_id" value="<?php echo $_SESSION['user_id']; ?>" placeholder="Nama">
                            <table class="table table-bordered" id="dataTable" widht="100%" cellspacing="0">
                               <thead>
                                   <tr align="center">
                                        <th width="50">
                                            No.
                                        </th>
                                        <th>Fasilitas ID</th>
                                        <th>Nama Fasilitas</th>
                                        <th>Aksi</th>
                                   </tr>
                               </thead>
                                <tbody>
                                    <?php $x=1; ?>
                                    <?php if(isset($datas)): ?>
                                        <?php foreach($datas as $data): ?>
                                    <tr>
                                        <td align="center"><?php echo $x++;?></td>
                                        <td><?php echo $data['fasilitas_id'];?></td>
                                        <td><?php echo $data['nama_fasilitas']; ?></td>
                                        <td align="center">
                                        <a href="data_agent_edit.html" class="btn btn-xs btn-warning" title="Edit">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="data_agent_delete.html" class="btn btn-xs btn-danger" title="delete" onclick="retrun confirm('Apakah anda yakin ingin menghapus?');">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                </div>

                <div class="col xl-5">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <h6>Tambah Fasilitas</h6>
                        </div>
                        <div class="card-body">
                            <form action="config/Fasilitas/proses_simpan.php" method="POST">
                          <input type="hidden" class="form-control" name="travel_id" value="<?php echo $_SESSION['user_id'];?>">
                            <input type="hidden" class="form-control" name="fasilitas_id" value="<?php echo $auto_kode; ?>">
                            <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="">Nama Fasilitas :</label>
                                    </div>
                                    <div class="form-group col md-8">
                                        <input class="form-control" type="text"  name="Fasilitasnew" id="" placeholder="Tuliskan Fasilitas Terbaru">
                                        </div>
                                    
                                </div>
                                <div class="form-group" align="right">
                                        <button type="reset" class="btn btn-md btn-secondary"><i class="fa fa-undo"></i>Cancel</button>    
                                        <button type="submit" class="btn btn-xs btn-primary"><i class="fa fa-save"></i> Save</button>
                                           
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
</div>
</div>
<div>
</div>