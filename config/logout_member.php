<?php 

unset($_SESSION['level']);
session_destroy();
header('location:/spkumrohhajidela/index.php?url=pengguna_dashboard');

 ?>