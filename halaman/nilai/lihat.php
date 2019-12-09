<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Perhitungan</h1>
          </div>

          <!-- Content Buat Table -->
              <div class="card shadow mb-4">
           <div class="card-header py-3">
               <form action="config/admin/load_data.php" method="POST">
         
               <h6 class="m-0 font-weight-bold text-primary"> Data Nilai</h6>
          
            
               <select  class="nav-item dropdown d-none d-sm-inline-block btn btn-sm btn-warning" name="jenis_paket" id="" >
                        <option value="">-Pilih-</option>
                        <option value="">a</option>
               </select>
          

               <button type="submit" class="nav-item dropdown d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
               Add</button>
          
               </form>
           </div>
           <div class="card-body">
               <div class="table-responsive">
                   <table class="table table-bordered" id="dataTable" widht="100%" cellspacing="0">
                    
                        <thead>
                            <tr align="center">
                                <th>No.</th>
                                <th>Nama Paket</th>
                                <th>Nama Agent</th>
                                <th>Harga</th>
                                <th>Paket</th>
                                <th>Keamanan</th>
                                <th>Fasilitas</th>
                                <th>Pelayanan</th>
                                <th>Sertifikat</th>
                                <th>Testimoni</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>A</td>
                                <td>B</td>
                                <td>e</td>
                                <td>f</td>
                                <td>g</td>
                                <td>h</td>
                                <td>C</td>
                                <td>d</td>
                                <td>e</td>
                                <td>f</td> 
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