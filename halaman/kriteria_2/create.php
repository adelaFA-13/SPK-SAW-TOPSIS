<div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Tambah Data Kriteria Baru</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    Form kriteria 
                                </div>
                                <div class="panel-body">
                                    <form action="config/kriteria/proses_simpan.php" method="post">
                                        
                                    <!-- body form -->
                                    
                                    <div class="row form-group">
                                            <div class="col-lg-3">
                                                <label>Nama</label>
                                            </div>
                                            <div class="col-lg-9">
                                                <input class="form-control" type="text" name="nama" placeholder="Nama" required>
                                            <!--kalau pakek datavase
                                            value="<?php if(isset($data_kriteria)) echo $data_kriteria[0]['nama']; ?>
                                            -->
                                            </div>
                                        </div>
                                        
                                        <!-- <div class="row form-group">
                                            <div class="col-lg-3">
                                                <label>Bobot</label>
                                            </div>
                                            <div class="col-lg-9">
                                                <input class="form-control" type="text" name="bobot" placeholder="Bobot" required="" value="<?php if(isset($data_kriteria)) echo $data_kriteria[0]['bobot']; ?>">
                                            </div>
                                        </div> -->
                                        <div class="row form-group">
                                            <div class="col-lg-3">
                                                <label>Jenis</label>
                                            </div>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="jenis">
                                                    <option value="">- Jenis -</option>
                                                    <option value="Benefit" >Benefit</option>
                                                    <option value="Cost" >Cost</option>
                                                <!-- UNTUK database
                                                <?php if(isset($data_kriteria[0]) && $data_kriteria[0]['jenis']=='Benefit') echo "selected"; ?>
                                                <?php if(isset($data_kriteria[0]) && $data_kriteria[0]['jenis']=='Cost') echo "selected"; ?>
                                                -->
                                                </select>
                                            </div>
                                        </div>
                                    <!-- end body form-->
                                         <div class="row form-group">
                                            <div class="col-lg-3">
                                                <label>SubKriteria</label>
                                            </div>
                                            <div class="col-lg-9">
                                                <select class="form-control" name="subkriteria"id="add_sub">
                                                    <option value="">- Sub Kriteria -</option>
                                                    <option value="Tidak Ada">Tidak Ada</option>
                                                    <option value="Punya">Punya</option>
                                                  
                                                </select>
                                            </div>
                                        </div>
                                        <div id="sub"></div>
    
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <button type="submit" class="btn btn-md btn-success"><i class="fa fa-save"></i> Simpan</button>
                                                <button type="reset" class="btn btn-md btn-warning"><i class="fa fa-undo"></i> Ulangi</button>
                                            </div>
                                        </div>
    
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
    </div>
</div>
</div>
</div>