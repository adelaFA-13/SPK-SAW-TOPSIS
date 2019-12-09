<!-- Begin Page Content -->
<div class="container-fluid">
    
<!-- Content Buat Table -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0 font-weight-bold text-primary"> Data Paket</h6>
            <a href="index.php?url=paket_travel_tambah" class="d-none d-sm-inline-block btn btn-primary shadow-sm text-white"><i class="fas fa-plus fa-sm text-white"></i>Tambah</a>
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
                          <a href="data_paket_haji_read.html" class="btn btn-xs btn-info" title="lihat">
                              <i class="fa fa-eye"></i>
                          </a>
                          <a href="data_paket_haji_edit.html" class="btn btn-xs btn-warning" title="Edit">
                              <i class="fas fa-pen"></i>
                          </a>
                          <a href="data_paket_haji_delete.html" class="btn btn-xs btn-danger" title="delete" onclick="retrun confirm('Apakah anda yakin ingin menghapus?')">
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