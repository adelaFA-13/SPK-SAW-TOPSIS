<?php
$travel=$_SESSION['user_id'];   
$sql=mysqli_query($koneksi,"SELECT * FROM tbl_agent_travel where travel_id='$travel' and `status`='Aktif'");
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    
<!-- Content Buat Table -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0 font-weight-bold text-primary"> Data Paket</h6>
            <?php
            if(mysqli_num_rows($sql) >=1){
            ?>
<a href="index.php?url=paket_travel_tambah" class="d-none d-sm-inline-block btn btn-primary shadow-sm text-white"><i class="fas fa-plus fa-sm text-white"></i>Tambah</a>
            <?php

            }else{
                ?>
                <div class="alert alert-danger">
                           <strong>Maaf anda belum bisa memasukkan data paket karena Saat Ini Data Anda Masih Dalam Proses Verifikasi    </strong>
                        </div>
            <?php
            }
            ?>
        </div>
    </div>

    <div class="card-body">
     <div class="table-responsive">
         <table class="table table-bordered" id="dataTable" widht="100%" cellspacing="0">
          
              <thead>
                  <tr>
                      <th width="50">No.</th>
                      <th>Nama Paket</th>
                      <th>Jenis Paket</th>
                      <th>Details</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                  $x=1;
                  if(isset($datos)): 
                    foreach($datos as $dato):
                  ?>
                  <tr> 
                      <td align="center"><?php echo $x++;?></td>
                      <td><?php echo $dato['nama_paket'];?></td>
                      <td><?php echo $dato['jenispaket'];?></td>
                      <td align="center">
                          <a href="index.php?url=Halaman_Paket_Lihat&id=<?php echo $dato['paket_data_id']?>" class="btn btn-xs btn-info" title="lihat">
                              <i class="fa fa-eye"></i>
                          </a>
                          <!-- <a href="data_paket_haji_edit.html" class="btn btn-xs btn-warning" title="Edit">
                              <i class="fas fa-pen"></i>
                          </a> -->
                          <a href="halaman/paket_travel/delete.php?id=<?php echo $dato['paket_data_id']?>&fasili=<?php echo $dato['id_jumlah_fasilitas']?>&pel=<?php echo $dato['id_jumlah_pelayanan']?>" class="btn btn-xs btn-danger" title="delete" onclick="retrun confirm('Apakah anda yakin ingin menghapus?')">
                              <i class="fas fa-trash-alt"></i>
                          </a>
                      </td>

                  </tr>
                  <?php
                    endforeach;
                endif;
                  ?>
              </tbody>
         </table>
     </div>
 </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
</div>
</div>
</div>