<div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                         <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h4 class="mb-0 font-weight-bold text-primary"> Halaman Sertifikat</h4>
                            <button class="d-none d-sm-inline-block btn btn-primary shadow-sm text-white" data-toggle="modal" data-target="#tambahSertifikat"><i class="fas fa-plus fa-sm text-white"></i>Tambah</button>

                            <!-- open modal -->
                            <div id="tambahSertifikat" class="modal fade" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <!-- content modal -->
                                    <div class="modal-content">
                                    <!-- heading modal -->
                                    <div class="modal-header">
                                        <h5 class="modal-title">Upload Sertifikat</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <!-- body modal -->
                                    <div class="modal-body">
                                    <div class="card-body" style="height: 45rem;">
							<div class="row form-group mx-auto">
								<img src="img/undraw_posting_photo.svg" width="300" class="img-profile rounded-circle text-center mx-auto" alt="Foto">
							</div>
							<hr class="sidebar-divider">
								<form action="config/agent/input_sertif.php" method="post" enctype="multipart/form-data"> 
										<input type="hidden" class="form-control" name="travel_id" value="<?php echo $_SESSION['user_id']; ?>" placeholder="Nama">
                                
                                        <div class="row form-group">
							  <input type="file" name="gambar" class="font-weight-bold text-primary mx-auto">Ganti Foto</input>
							</div>
                                <div class="form-row">
									<div class="form-group col-xl-3 text-center">
										<label for="">Keterangan</label>
									</div>
									<div class="form-group col-xl-9">
										<input type="text" class="form-control" name="ket" placeholder="Keterangan">
									</div>
								</div>
								<div class="form-row">
                        			<div class="col lg-12" align="right">
                            			<button type="reset" class="btn btn-md btn-secondary"><i class="fa fa-undo"></i> Cancel</button>
                           				 <button type="submit" name="tombol" class="btn btn-xs btn-primary"><i class="fa fa-save"></i> Save</button>
                       				 </div>
                   				</div>
								</form>
		                </div>
		              </div>
		            </div>
                                    </div>
                            </div>
                              <!-- close modal -->
                     </div>
                    <?php 
                    include 'config/koneksi.php';
                    $id = $_SESSION['user_id'];
                    $query = mysqli_query($koneksi, "SELECT * FROM tbl_sertifikat where travel_id= '$id';");                 
                    ?>
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table class="table table-bordered" id="dataTable" widht="100%" cellspacing="0">
                               <thead>
                                   <tr align="center">
                                        <th width="60">
                                            No
                                        </th>
                                        <th>Nama Sertifikat</th>
                                        <th>Sertifikat</th>
                                        <th>Aksi</th>
                                   </tr>
                               </thead>
                                <tbody>
                                    <?php 
                                        $no=1;
                                        foreach ($query as $row){
                                    ?>
                                    <tr>
                                        <td align="center"><?php echo $no++; ?></td>
                                        <td><?php echo $row['ket'] ?></td>
                                        <td align="center"><img src="halaman/sertifikat/image_view.php?id=<?php echo $row['id']; ?>" width="100"/></<td>
                                        <td align="center">
                                        
                                        <a href="halaman/sertifikat/delete.php?id=<?php echo $row['id']?>" class="btn btn-xs btn-danger" title="delete" onclick="retrun confirm('Apakah anda yakin ingin menghapus?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                    </tr>
                                        <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
 
</div>
</div>
<div>
</div>
                                        </div>