<?php
include('config/koneksi.php');
$user_id=$_GET['id'];

$sql=mysqli_query($koneksi,"SELECT * FROM tbl_data_member INNER JOIN tbl_login ON tbl_data_member.id_member=tbl_login.user_id where `id_member`='$user_id'");
$data=mysqli_fetch_assoc($sql);


?>
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Data Member</h1>
</div>

 <!-- Content Buat Table -->
            <div class="card shadow mb-4">
           <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary"> Data Member READ</h6>
           </div>
           <div class="card-body">
              <div class="row">
                    <div class="form-group col-lg-3">
                    <label>Id Member:</label>
                    </div>
                    <div class="form-group col-lg-3">
                    <input type="text" class="form-control" value="<?php echo $data['id_member'];?>"readonly>
                    </div>
              </div>
              <div class="row">
                <div class="form-group col-lg-3">
                <label>Nama :</label>
                </div>
                <div class="form-group col-lg-3">
                <input type="text" class="form-control" value="<?php echo $data['nama'];?>" readonly>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-lg-3">
                <label>Emai :</label>
                </div>
                <div class="form-group col-lg-3">
                <input type="text" class="form-control" value="<?php echo $data['email'];?>" readonly>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-lg-3">
                <label>Password :</label>
                </div>
                <div class="form-group col-lg-3">
                <input type="password" class="form-control" value="<?php echo $data['password'];?>" readonly>
                </div>
              </div>
              <!-- <div class="row">
                <div class="col-lg-3-center">
                  <button class="btn btn-primary" href="/index.php?url=data_member">Back</button>
                </div>
              </div> -->
            
        </div>
<!-- /.container-fluid -->
</div>
</div>
</div>  
</div>  
</div>