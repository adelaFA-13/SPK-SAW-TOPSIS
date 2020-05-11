<?php 

include '../koneksi.php';
if(isset($_POST['tombol']))
{
    if(!isset($_FILES['gambar']['tmp_name'])){
        echo '<span style="color:red"><b><u><i>Pilih file gambar</i></u></b></span>';
    }
    else
    {
        $file_name = $_FILES['gambar']['name'];
        $file_size = $_FILES['gambar']['size'];
        $file_type = $_FILES['gambar']['type'];
        if ($file_size < 20480000000 and ($file_type =='image/jpeg' or $file_type == 'image/png'))
        {
            $image   = addslashes(file_get_contents($_FILES['gambar']['tmp_name']));
            $keterangan = $_POST['ket'];
            $travel = $_POST['travel_id'];
            mysqli_query($koneksi,"insert into tbl_sertifikat (sertifikat,travel_id,tipe_gambar,ukuran_gambar,ket) values ('$image','$travel','$file_type','$file_size','$keterangan')");
            header('location:/spkumrohhajidela/index.php?url=data_sertifikat');
        }
        else
        {
            echo '<span style="color:red"><b><u><i>Ukuruan File / Tipe File Tidak Sesuai</i></u></b></span>';
        }
    }
}
?>
