<div class="col-lg-12">
                            <div class="card-body">
                            <form action="config/paket_travel/#" method="post">
                            <input type="hidden" class="form-control" name="travel_id" value="<?php echo $_SESSION['user_id']; ?>">
                            <input type="hidden" class="form-control" name="paket_data_id" value="<?php echo $auto_kode; ?>">  
                             <div class="row form-grup">
                                <div class="form-check">
                                <?php 
                                           include 'config/koneksi.php';
                                          $travel_id1 = $_SESSION['user_id'];
                                          $id_jumlah_fasilitas=$_SESSION['id_jumlah_fasilitas'];
                                         $hasil4 = mysqli_query($koneksi,"SELECT tbl_data_fasilitas.nama_fasilitas, tbl_jumlah_fasilitas.id_jumlah_fasilitas, tbl_jumlah_fasilitas.travel_id FROM tbl_jumlah_fasilitas INNER JOIN tbl_data_fasilitas USING(fasilitas_id) INNER JOIN tbl_agent_travel ON tbl_agent_travel.travel_id=tbl_jumlah_fasilitas.travel_id WHERE id_jumlah_fasilitas='$id_jumlah_fasilitas' AND tbl_jumlah_fasilitas.travel_id='$travel_id1'");


                                         while($result2= mysqli_fetch_assoc($hasil4)){
                                             $result2s[] = $result2;
                                         ?>
                                        <input class="form-check-input" type="radio" disabled>
                                            <label class="form-check-label" value=""></label>
                                </br>
                                </div>  
                                <?php
                                         }
                                ?>   
                             </div>
                            <div class="row form-group">
                                <div class="col lg-12" align="right">
                            
                                 <button type="reset" class="btn btn-md btn-secondary"><i class="fa fa-undo"></i> Ulangi</button>
                                <button type="submit" class="btn btn-xs btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                </div>
                            </div>  
                            </form>         
                            </div>
</div>