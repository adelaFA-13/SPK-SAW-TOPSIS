
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
               <h6 class="m-0 font-weight-bold text-primary"> Data Travel Agent</h6>
           </div>
           <div class="card-body">
               <div class="table-responsive">
                   <table class="table table-bordered" id="dataTable" widht="100%" cellspacing="0">
                    
                        <thead>
                            <tr align="center">
                                <th width="50">No.</th>
                                <th>Nama Travel Agent</th>
                                <th>Status</th>
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
                            <td align="center" style="width:20px;"><?php echo $i++;?></td>
                                <td><?php echo $data['nama'];?></td>
                                <td align="center"><a class=" btn btn-sm btn-primary text-white shadow-sm"><i class="fas fa-certificate fa-sm text-white-50"></i>verified</a></td>
                                <td align="center">
                                    <a class="btn btn-xs btn-info text-white" href="index.php?url=detail_travel_agent&id=<?php echo $data['travel_id']; ?>" title="Lihat">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    
                                        <!-- <a href="index.php?url=data_agent_travel_edit&id=<?php echo $_SESSION['user_id']?>" class="btn btn-xs btn-warning" title="Edit">
                                        <i class="fas fa-pen"></i>
                                    </a> -->
                                    <!-- <a href="config/admin/hapus_agent.php?&id=<?php echo $data['travel_id']?>" class="btn btn-xs btn-danger" title="delete" onclick="retrun confirm('Apakah anda yakin ingin menghapus?')">
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

        

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Pengajuan Akun Travel Agent</h1>
          </div>

          <!-- Content Buat Table -->
            <div class="card shadow mb-4">
           <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary"> Data Travel Agent</h6>
           </div>
           <div class="card-body">
               <div class="table">
                   <table class="table table-bordered"  widht="100%" cellspacing="0">
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
                            $no=1;
                                $sqlagent = "SELECT * FROM `tbl_agent_travel` WHERE `status` ='belum_aktif'";
                                $datablm = mysqli_query($koneksi,$sqlagent);

                                if(isset($datablm)){
                                foreach($datablm as $data1):
                            ?>
                            
                            <tr>
                                <td align="center"><?php echo $no++;?></td>
                                <td><?php echo $data1['nama'];?></td>
                                <td align="center"><a class=" btn btn-sm btn-primary text-white shadow-sm"><i class="fas fa-certificate fa-sm text-white-50"></i>notverified</a></td>
                                <td align="center">
                                    <a href="index.php?url=data_agent_travel_lihat&id=<?php echo $data1['travel_id'];?>" class="btn btn-xs btn-info" title="Verifikasi">
                                        <i class="fa fa-check-circle"></i>
                                    </a>
                                    <a class="btn btn-xs btn-warning text-white" href="index.php?url=detail_travel_agent&id=<?php echo $data1['travel_id']; ?>" title="Edit">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="lihatAgentPengajuan" tabindex="-1" role="dialog" aria-labelledby="lihatAgent" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="lihatAgent">Data Agent Travel</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-3" align="left">
                                                        <label for="">Nama Agent :</label>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" value="<?php echo $data1['nama'];?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-3" align="left">
                                                        <label for="">Alamat :</label>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <label  type="text" class="form-control"  readonly><?php echo $data1['alamat'];?></label>
                                                        </div>
                                                    </div> 
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-3" align="left">
                                                        <label for="">Tahun berdri :</label>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" value="<?php echo $data1['thn_berdiri'];?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-8" align="left">
                                                        <label for="">Nomor SK :</label>
                                                        <input type="text" class="form-control" value="<?php echo $data1['nomor_izin'];?>" readonly>
                                                        </div>
                                                        <div class="col-sm-4">
                                                        <label for="">Tahun Izin :</label>
                                                        <input type="text" class="form-control" value="<?php echo $data1['thn_izin'];?>"readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <a href="config/admin/proses_hapus_agent.php?&id=<?php echo $_SESSION['user_id']?>" class="btn btn-xs btn-danger" title="delete" onclick="retrun confirm('Apakah anda yakin ingin menghapus?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                            endforeach;
                            }else{
                                ?> <tr>
                                    <td colspan="4" align="center">No data available in table</td>
                                </tr><?php
                            }
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