<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data</h1>
            
          </div>

          <!-- Content Buat Table -->
            <div class="card shadow mb-4">
           <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary"> Data Paket Umrah</h6>
           </div>
           <div class="card-body">
               <div class="table-responsive">
                   <table class="table table-bordered" id="dataTable" widht="100%" cellspacing="0">
                    
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Paket umrah</th>
                                <th>Nama Travel Agent</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i=1;
                        if(isset($datas)): 
                            foreach($datas as $d):
                        ?>
                            <tr align="center"> 
                                <td width="30"><?php echo $i++?></td>
                                <td><?php echo $d['nama_paket'];?></td>
                                <td><?php echo $d['nama'];?></td>
                                <td align="center">
                                    <a href="index.php?url=paket_umrah_lihat&id=<?php echo $d['paket_data_id']; ?>" class="btn btn-xs btn-info" title="lihat">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <!-- <a href="data_paket_haji_edit.html" class="btn btn-xs btn-warning" title="Edit">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="data_paket_haji_delete.html" class="btn btn-xs btn-danger" title="delete" onclick="retrun confirm('Apakah anda yakin ingin menghapus?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </a> -->
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