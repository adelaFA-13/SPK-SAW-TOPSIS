<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Data Member</h1>
  <a href="index.php?url=data_customer_create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Create</a>
</div>

<!-- Content Buat Table -->
<div class="card shadow col-xl-8 mb-4 mx-auto">
 <div class="card-header py-3">
     <h6 class="m-0 font-weight-bold text-primary"> Data Member</h6>
 </div>
 <div class="card-body">
     <div class="table-responsive">
         <table class="table table-bordered" id="dataTable" widht="100%" cellspacing="0">
              <thead>
                <?php 
                $i=1;
                if(isset($datas)):
                foreach($datas as $c):
                ?>
                  <tr align="center">
                      <th width="50">No.</th>
                      <th>Nama Member</th>
                      <th>Details</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td><?php echo $i++;?></td>
                      <td><?php echo $c['nama']; ?></td>
                      <td align="center">
                          <a href="index.php?url=data_customer_read" class="btn btn-xs btn-info" title="lihat">
                              <i class="fa fa-eye"></i>
                          </a>
                          <a href="data_pengguna_edit.html" class="btn btn-xs btn-warning" title="Edit">
                              <i class="fas fa-pen"></i>
                          </a>
                          <a href="data_pengguna_delete.html" class="btn btn-xs btn-danger" title="delete" onclick="retrun confirm('Apakah anda yakin ingin menghapus?')">
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
<!-- /.container-fluid -->
</div>
</div>
</div>  
</div>  