<?php
        include 'config/koneksi.php';
        $id=$_GET['id'];
        $hasil = mysqli_query($koneksi, "SELECT tbl_subkriteria.id as idSubkriteria, tbl_kriteria.id as id, tbl_kriteria.nama, tbl_kriteria.bobot, tbl_kriteria.jenis, tbl_subkriteria.nama_sub as nama_subkriteria , tbl_subkriteria.bobot as bobot_subkriteria, tbl_subkriteria.id as subkriteria_id FROM tbl_kriteria left join tbl_subkriteria on (tbl_kriteria.id=tbl_subkriteria.kriteria_id) WHERE kriteria_id='$id'");

        while ($data = mysqli_fetch_assoc($hasil)) {
            $datas[] = $data;
        }
        $hasil_kriteria = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria where id='$id'");
        $row = mysqli_fetch_assoc($hasil_kriteria);
        ?>
        
<!-- Begin Page Content -->
<div class="container-fluid col-xl-12 col-xs-12">

<!-- Page Heading -->

<!-- Content Buat Table -->
 <div class="card shadow mb-4">
 <div class="card-header py-3">
     <h6 class="m-0 font-weight-bold text-primary"> Subkriteria <?php echo $_GET['kriteria']?></h6>
 </div>
 <div class="card-body">
    <div class="row col-lg-5">
        <div class="col-lg-2">
            <label for="">ID</label>
        </div>
        <div class="col-lg-1">
            :
        </div>
        <div class="col-lg-2">
           <input type="text" name="id" value="<?php echo $row['id'];?>"></input>
        </div>
    </div>
    <div class="row col-lg-5">
        <div class="col-lg-2">
            <label for="">Kriteria</label>
        </div>
        <div class="col-lg-1">
            :
        </div>
        <div class="col-lg-2">
           <input type="text" name="nama_kriteria" value="<?php echo $row['nama'];?>"></input>
        </div>
    </div>
    <div class="row col-lg-5">
        <div class="col-lg-2">
            <label for="">Jenis</label>
        </div>
        <div class="col-lg-1">
            :
        </div>
        <div class="col-lg-2">
           <input type="text" nama="jenis" value="<?php echo $row['jenis']?>"></input>
        </div>
    </div>
    <div class="row col-lg-5">
        <div class="col-lg-2">
            <label for="">Bobot</label>
        </div>
        <div class="col-lg-1">
            :
        </div>
        <div class="col-lg-2">
           <input type="text" nama="bobot_kriteria" value="<?php echo $row['bobot']?>"></input>
        </div>
    </div>
    <!-- table subkriteria -->
  
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Subkriteria</h6>
        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambahsubkriteria"><i class="fas fa-plus fa-sm text-white-50"></i>Subkriteria</button>
        <!-- open modal -->
        <div id="tambahsubkriteria" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="col-lg-2">
                        <button type="button" class="close btn text-primary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                    <!-- modal body -->
                    <div class="modal-body">
                    <h5 class="modal-tittle" id=LabelSertifikat> Tambah Subkriteria</h5>
                        <p class="statusMsg"></p>
                        <form action="config/kriteria/proses_tambah_subkriteria.php" method="POST" role="form">
                        <input type="hidden" name="kriteria"value="<?php echo $_GET['kriteria'];?>">    
                        <input type="hidden" id="KriteriaId" name="id"value="<?php echo $id;?>">
                            <div class="form-group">
                                <label for="namaSubkriteria">Nama Subriteria</label>
                                <input type="text" class="form-control" id="namaSubkriteria" name="namaSubkriteria"placeholder="Masukan Nama Subkriteria">
                            </div>
                            <div class="form-group">
                                <label for="bobotSubkriteria">Bobot</label>
                                <input type="text" class="form-control" id="bobotSubkriteria" name="bobotSubkriteria" placeholder="Masukan Bobot Subkriteria">
                            </div>
                      
                    </div>
                    <!-- mofal footer -->
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-warning submitBtn" onclick="kirimSubkriteria">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" widht="100%" cellspacing="0">
        <thead>
            <tr align="center">
                <th style="width: 50px;">No</th>
                <th>Nama SubKriteria</th>
                <th>Bobot</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            
            <?php 
            $i=1;
            if(isset($datas)):?>
             <?php foreach($datas as $data):?>
                <tr align="center">
                    <td><?php echo $i++?></td>
                    <td><?php echo $data['nama_subkriteria'];?></td>
                    <td><?php echo $data['bobot_subkriteria'];?></td>
                    <td>
                    <a  class="btn btn-xs btn-warning text-white" data-toggle="modal" data-target="#editsubkriteria<?php echo $data['idSubkriteria'];?>" title="Edit">
                    <i class="fas fa-pen"></i>
                    </a>
                    <div id="editsubkriteria<?php echo $data['idSubkriteria'];?>" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="col-lg-2">
                        <button type="button" class="close btn text-primary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                    <!-- modal body -->
                    <div class="modal-body">
                    <h5 class="modal-tittle" id=LabelSubkriteria> Tambah Subkriteria</h5>
                        <p class="statusMsg"></p>
                        <form action="config/kriteria/proses_edit_subkriteria.php" method="POST" role="form">
                        <?php 
                        echo $idSubkriteria=$data['idSubkriteria'];
                        include 'config/koneksi.php';
                        $sql_edit= mysqli_query($koneksi,"SELECT * FROM tbl_subkriteria WHERE `id`='$idSubkriteria'");
                        $row=mysqli_fetch_assoc($sql_edit);
                       ?>
                        <input type="hidden" name="kriteria"value="<?php echo $_GET['kriteria'];?>">    
                        <input type="hidden" id="KriteriaId" name="idKriteria"value="<?php echo $id;?>">
                        <input type="hidden" id="KriteriaId" name="idSubkriteria"value="<?php echo $idSubkriteria;?>">
                            <div class="form-group">
                                <label for="namaSubkriteria">Nama Subriteria</label>
                                <input type="text" class="form-control" id="namaSubkriteria" name="namaSubkriteria" value="<?php echo $row['nama_sub'];?>" placeholder="Masukan Nama Subkriteria">
                            </div>
                            <div class="form-group">
                                <label for="bobotSubkriteria">Bobot</label>
                                <input type="text" class="form-control" id="bobotSubkriteria" name="bobotSubkriteria" value="<?php echo $row['bobot'];?>" placeholder="Masukan Bobot Subkriteria">
                            </div>
                      
                    </div>
                    <!-- mofal footer -->
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-warning submitBtn">Submit</button>
                    </form>
                </div>
            </div>
        </div>
                    <a href="config/kriteria/hapus_subkriteria.php?url=kriteria=<?php echo $data['nama']?>&Id=<?php echo $data['idSubkriteria']?>" class="btn btn-xs btn-danger " title="delete" onclick="return confirm('hapus data?')">
                    <i class="fas fa-trash-alt"></i>
                    </a>
                    </td>
                </tr>
             <?php endforeach; ?>
             <?php endif; ?>
        </tbody>
        </table>
    </div>
    
 
    <!-- table end -->
 </div>
</div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
</div>
</div>
</div>
