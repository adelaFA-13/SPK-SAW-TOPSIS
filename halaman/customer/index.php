<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Data Member</h1>
  <a href="index.php?url=data_member_create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Create</a>
</div>

 <!-- Content Buat Table -->
            <div class="card shadow mb-4">
           <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary"> Data Member</h6>
           </div>
           <div class="card-body">
               <div class="table-responsive">
                   <table class="table table-bordered" id="dataTable" widht="100%" cellspacing="0">
                    
                        <thead>
                            <tr align="center">
                                <th width="50">No.</th>
                                <th>Nama Member</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i=1;
                            if(empty($data)):
                                foreach($datas as $data):
                            ?>
                            <tr>
                            <td align="center"><?php echo $i++;?></td>
                                <td align="center"><?php echo $data['username'];?></td>
                                <td align="center">
                                    <!-- <a href="index.php?url=data_agent_travel_t&id=<?php echo $data['id_member'];?>" class="btn btn-xs btn-info" title="Lihat">
                                        <i class="fa fa-eye"></i>
                                    </a> -->
                                    <a href="index.php?url=data_member_lihat&id=<?php echo $data['user_id']?>" class="btn btn-xs btn-warning" title="Edit">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <!--<a href="config/admin/hapus_agent.php?&id= class="btn btn-xs btn-danger" title="delete" onclick="retrun confirm('Apakah anda yakin ingin menghapus?')">
                                        <i class="fas fa-trash-alt"></i> -->
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
</div>
</div>  
</div>  
</div>