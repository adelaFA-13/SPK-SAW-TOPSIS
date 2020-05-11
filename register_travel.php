<?php
include 'config/koneksi.php';
$sql = "SELECT MAX(`user_id`) FROM `tbl_login` ";
$query=mysqli_query($koneksi,$sql);

$id_user= mysqli_fetch_array($query);
if($id_user){
    $nilai=substr($id_user[0],1);
    $kode = (int)$nilai;

    $kode=$kode+1;
    $auto_user = "T".str_pad($kode,4,"0", STR_PAD_LEFT);
} else{
    $auto_user ="T001";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Register Agent</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="asset4/css/my-login.css">
</head>
<body class="my-login-page" style="background-color:#d6a4348f">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div style="margin-left: auto;">
						<img src="Asset3/images/icon.png" width="150 px" class="tengah">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Register Mitra KetanahSuci</h4>
							<form action="config/proses_register_travel.php" method="POST" class="my-login-validation" novalidate="">
                            <input type="hidden" class="form-control" name="user_id" value="<?php echo $auto_user; ?>">
                            <input type="hidden" class="form-control" name="level" value="agent">   
                            <div class="form-group">
									<label for="name">Name Agent Travel</label>
									<input id="name" type="text" class="form-control" name="username" placeholder="Entry your Travel Agent" required autofocus>
									<div class="invalid-feedback">
										What's your Agent Travel?
									</div>
								</div>

								<div class="form-group">
									<label for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="email" required>
									<div class="invalid-feedback">
										Your email is invalid
									</div>
								</div>

								<div class="form-group">
									<label for="password">Password</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
									<div class="invalid-feedback">
										Password is required
									</div>
								</div>

								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="agree" id="agree" class="custom-control-input" required="">
										<label for="agree" class="custom-control-label">I agree to the <a href="#">Terms and Conditions</a></label>
										<div class="invalid-feedback">
											You must agree with our Terms and Conditions
										</div>
									</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block">
										Register
									</button>
								</div>
								<div class="mt-4 text-center">
									Already have an account? <a href="login.php">Login</a>
								</div>
							</form>
						</div>
					</div>
					<!-- <div class="footer">
						Copyright &copy; 2017 &mdash; Your Company 
					</div> -->
				</div>
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="asset4/js/my-login.js"></script>
</body>
</html>