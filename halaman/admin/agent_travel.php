<!-- Begin Page Content -->
        <div class="container-fluid col-xl-12 col-xs-12">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data</h1>
            <a href="index.php?url=data_agent_create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Create</a>
          </div>

          <!-- Content Buat Table -->
            <div class="card shadow mb-4">
           <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary"> Data Agent Travel</h6>
           </div>
           <div class="card-body">
               <div class="table-responsive">
                   <table class="table table-bordered" id="dataTable" widht="100%" cellspacing="0">
                    
                        <thead>
                            <tr align="center">
                                <th width="50">No.</th>
                                <th>Nama Agent Travel</th>
                                <th>Status</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i=1;
                            if(!isset($data)):
                                foreach($datas as $data):
                            ?>
                            <tr>
                            <td align="center"><?php echo $i++;?></td>
                                <td><?php echo $data['nama'];?></td>
                                <td><?php echo $data['status'];?></td>
                                <td align="center">
                                    <a href="data_agent_read.html" class="btn btn-xs btn-info" title="lihat">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="data_agent_edit.html" class="btn btn-xs btn-warning" title="Edit">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="data_agent_delete.html" class="btn btn-xs btn-danger" title="delete" onclick="retrun confirm('Apakah anda yakin ingin menghapus?')">
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