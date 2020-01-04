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
               <h6 class="m-0 font-weight-bold text-primary"> Data Kriteria Baru</h6>
               <!-- <button style="float:right" class="nav-item dropdown d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm">
                   <a href="#" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">
                       Pilih
                    <div class="div dropdown-menu">
                        <a href="#" class="dropdown-item">Haji</a>
                        <a href="#" class="dropdown-item">Umrah</a>
                    </div>
                   </a>
               </button> -->
           </div>
           <div class="card-body">
               <div class="table-responsive">
                   <table class="table table-bordered" id="dataTable-kriteria" widht="100%" cellspacing="0">
                        <thead>
                            <tr align="center">
                                <th rowspan="2" width="30">No</th>
                                <th rowspan="2">Kriteria</th>
                                <th rowspan="2">Jenis</th>
                                <th rowspan="2" width="50">Bobot</th>
                                <th colspan="2">subktiteria</th>
                            </tr>
                            <tr>
                                <th width="150">Nama Subkriteria</th>
                                <th width="50">Bobot</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $ketetapan_bobot = 5;
                          foreach ($datas as $key => $data): ?>
                            <tr>
                              <td><?php echo $data['id'] ?></td>
                              <td><?php echo $data['nama'] ?></td>
                              <td><?php echo $data['jenis'] ?></td>
                              <td>
                                <a href="#" class="nav-link dropdown-toggle" id="navbardrop<?php echo $key?>" data-toggle="dropdown">
                                  <?php echo ($data['bobot']>$ketetapan_bobot) ? 0 : $data['bobot'];?>
                                  <div class="div dropdown-menu">
                                    <?php for($i = 1; $i <= $ketetapan_bobot; $i++) { 
                                      echo '<a href="javascript:updateNilaiBobot('.$data['id'].','.$i.','.$key.')" class="dropdown-item">'.$i.'</a>';
                                    } ?>
                                  </div>
                                </a>
                              </td>
                              <td><?php echo $data['nama_subkriteria'] ?></td>
                              <td><?php echo $data['bobot_subkriteria'] ?></td>
                            </tr>
                          <?php endforeach ?>
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