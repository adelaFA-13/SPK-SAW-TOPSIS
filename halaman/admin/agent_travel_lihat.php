<!-- Begin Page Content -->
<!-- <div class="container-fluid col-xl-12 col-xs-12">

<!-- Page Heading -->
<!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Data Agent Travel Detail</h1>
  <a href="index.php?url=data_agent_create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Create</a>
</div> -->

<!-- Content Buat Table -->
  <!-- <div class="card shadow mb-4">
 <div class="card-header py-3">
     <h6 class="m-0 font-weight-bold text-primary"> Data Agent Travel</h6>
 </div>
 <div class="card-body">
    
 </div>
</div> -->
<!-- /.container-fluid -->
<!-- </div> -->
<!-- End of Main Content -->
<!-- </div>
</div>
</div> -->

<?php 

$id= $_GET['id'];
$koneksi = mysqli_connect('localhost','root','','db_spk_tugasakhir(1)') or die(mysqli_error());
$a="SELECT * FROM `tbl_login` WHERE `user_id` ='$id'";
$b=mysqli_fetch_assoc(mysqli_query($koneksi,$a));


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include librari phpmailer
include('phpmailer/Exception.php');
include('phpmailer/PHPMailer.php');
include('phpmailer/SMTP.php');

$email_pengirim = 'ketanahsuci.spk@gmail.com'; // Isikan dengan email pengirim
$nama_pengirim = 'ADMIN Ketanah Suci'; // Isikan dengan nama pengirim
$email_penerima =$b['email'];; // Ambil email penerima dari inputan form
$subjek = "Verifikasi Akun"; // Ambil subjek dari inputan form
$pesan = "SELAMAT ! Akun anda telah terverifikasi ,silahkan login untuk melengkapi data paket anda"; // Ambil pesan dari inputan form
// $attachment = $_FILES['attachment']['name']; // Ambil nama file yang di upload

$mail = new PHPMailer;
$mail->isSMTP();

$mail->Host = 'smtp.gmail.com';
$mail->Username = $email_pengirim; // Email Pengirim
$mail->Password = 'mpswgquxfrxriaww'; // Isikan dengan Password email pengirim
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
// $mail->SMTPDebug = 2; // Aktifkan untuk melakukan debugging

$mail->setFrom($email_pengirim, $nama_pengirim);
$mail->addAddress($email_penerima, '');
$mail->isHTML(true); // Aktifkan jika isi emailnya berupa html

// Load file content.php
ob_start();
include "content.php";

$content = ob_get_contents(); // Ambil isi file content.php dan masukan ke variabel $content
ob_end_clean();

$mail->Subject = $subjek;
$mail->Body = $content;
$mail->AddEmbeddedImage('image/logo.png', 'logo_mynotescode', 'logo.png'); // Aktifkan jika ingin menampilkan gambar dalam email

// if(empty($attachment)){ // Jika tanpa attachment
    $send = $mail->send();

    if($send){ // Jika Email berhasil dikirim
        $update = "UPDATE tbl_agent_travel SET `status` ='Aktif', `punya_izin`='IYA'
        WHERE travel_id='$id'";
        $update1=mysqli_query($koneksi,$update);
        echo "<h1>Email berhasil dikirim</h1><br /><a href='index.php'>Kembali ke Form</a>";
    }else{ // Jika Email gagal dikirim
        echo "<h1>Email gagal dikirim</h1><br /><a href='index.php'>Kembali ke Form</a>";
        // echo '<h1>ERROR<br /><small>Error while sending email: '.$mail->getError().'</small></h1>'; // Aktifkan untuk mengetahui error message
    }
// }else{ // Jika dengan attachment
//     $tmp = $_FILES['attachment']['tmp_name'];
//     $size = $_FILES['attachment']['size'];

//     if($size <= 25000000){ // Jika ukuran file <= 25 MB (25.000.000 bytes)
//         $mail->addAttachment($tmp, $attachment); // Add file yang akan di kirim

//         $send = $mail->send();

//         if($send){ // Jika Email berhasil dikirim
//             echo "<h1>Email berhasil dikirim</h1><br /><a href='index.php'>Kembali ke Form</a>";
//         }else{ // Jika Email gagal dikirim
//             echo "<h1>Email gagal dikirim</h1><br /><a href='index.php'>Kembali ke Form</a>";
//             // echo '<h1>ERROR<br /><small>Error while sending email: '.$mail->getError().'</small></h1>'; // Aktifkan untuk mengetahui error message
//         }
//     }else{ // Jika Ukuran file lebih dari 25 MB
//         echo "<h1>Ukuran file attachment maksimal 25 MB</h1><br /><a href='index.php'>Kembali ke Form</a>";
//     }
// }

?>