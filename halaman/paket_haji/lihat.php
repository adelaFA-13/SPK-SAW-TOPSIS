<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Buat Table -->
            <div class="card shadow mb-4">
           <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary"> Data Paket Haji</h6>
           </div>
           <div class="card-body">
               <div class="table-responsive">
                   <table class="table table-bordered" id="dataTable" widht="100%" cellspacing="0">
                    
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Paket Haji</th>
                                <th>Nama Agent Travel</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center"> 
                                <td>A</td>
                                <td>B</td>
                                <td>C</td>
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