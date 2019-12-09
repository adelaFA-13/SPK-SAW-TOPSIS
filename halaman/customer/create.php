<div class="containter-fluid">
        <div class="col-xl-8 col-md-8 col-sm-8 mt-2 mx-auto">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0 text-primary text-center font-bold">Form Input Data Customer</h4>
            </div>
            <div class="card-body">
                <!--Mulai form  -->
                <form action="config/admin/proses_simpan_agent.php" method="post">
                    <div class="row form-group">
                    <div class="col-lg-3">
                            <label for="Namacustomer">Nama Customer</label>
                        </div>
                        <div class="col-lg-1">:</div>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="nama_customer" placeholder="Masukan Nama Customer" id="
                            Namacustomer">
                        </div>
                    </div>
                    <div class="row form-group">
                    <div class="col-lg-3">
                            <label for="">Alamat Email</label>
                        </div>
                        <div class="col-lg-1">:</div>
                        <div class="col-lg-8">
                            <input type="email" class="form-control" name="email_customer" placeholder="Masukan Alamat Email">
                        </div>
                    </div>
                    <div class="row form-group">
                    <div class="col-lg-3">
                            <label for="">Alamat</label>
                        </div>
                        <div class="col-lg-1">:</div>
                        <div class="col-lg-8">
                         <textarea class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col lg-12" align="right">
                            <button type="reset" class="btn btn-md btn-secondary"><i class="fa fa-undo"></i> Ulangi</button>
                            <button type="submit" class="btn btn-xs btn-primary"><i class="fa fa-save"></i> Simpan</button>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>

    
    </div>
  </div>
</div>
