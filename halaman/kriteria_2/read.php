   <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Perhitungan</h1>
            <a href="index.php?url=tambah_kriteria" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Kriteria</a>
          </div>

          <!-- Content Buat Table -->
           <div class="card shadow mb-4">
           <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary"> Data Kriteria</h6>
               <button style="float:right" class="nav-item dropdown d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
                   <a href="#" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">
                       Pilih
                    <div class="div dropdown-menu">
                        <a href="#" class="dropdown-item">Haji</a>
                        <a href="#" class="dropdown-item">Umrah</a>
                    </div>
                   </a>
               </button>
           </div>
           <div class="card-body">
               <div class="table-responsive">
                   <table class="table table-bordered" id="dataTable" widht="100%" cellspacing="0">
                    
                        <thead>
                            <tr align="center">
                                <th>No.</th>
                                <th>Nama Kriteria</th>
                                <th>Nama Bobot</th>
                                <th>Jenis</th>
                                <th>Subkriteria(Bobot)</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>A</td>
                                <td>B</td>
                                <td>C</td>
                                <td>d</td>
                                <td>e</td>
                                <td align="center">
                                    <a href="#" class="btn btn-xs btn-info" title="lihat">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="#" class="btn btn-xs btn-warning" title="Edit">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="#" class="btn btn-xs btn-danger" title="delete" onclick="retrun confirm('Apakah anda yakin ingin menghapus?')">
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