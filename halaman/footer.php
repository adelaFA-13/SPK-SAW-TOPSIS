     <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; 09031381621072 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

    <!-- jQuery -->
    <script src="asset/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="asset/sweetalert/dist/sweetalert2.all.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="asset/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="asset/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="asset/bower_components/datatables-responsive/js/dataTables.responsive.js"></script>
    
    <!-- Custom Theme JavaScript -->
    <!-- <script src="asset/dist/js/sb-admin-2.js"></script> -->

    <!-- aseet2 -->
    <!-- Bootstrap core JavaScript-->
    <script src="asset2/vendor/jquery/jquery.min.js"></script>
    <script src="asset2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="asset2/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="asset2/js/sb-admin-2.min.js"></script>
  <script type="text" src="asset2/js/jquery.js"></script>

  <!-- Page level plugins -->
  <script src="asset2/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="asset2/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="asset2/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="asset2/js/demo/datatables-demo.js"></script>
    <script src="asset2/vendor/datatables/lisenme.js"></script>
    <script src="asset4/js/custom.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>

      $(document).ready(function() {
        // var table = document.getElementById("dataTable");
        // if(table){
        //   jQuery('#dataTable').ddTableFilter();
        // }
        
        table = document.getElementById("dataTables-example");
        if(table){
          $('#dataTables-example').DataTable({
              responsive: true
          });
        }
        
        table = document.getElementById("dataTables-result");
        if(table){
          $('#dataTables-result').DataTable({
              responsive: true,
              order : []
          });
        }

        table = document.getElementById("dataTables-ranking");
        if(table){
          $('#dataTables-ranking').DataTable({
              responsive: true,
              order : []
          });
        }
        
        table = document.getElementById("dataTables-kecocokan");
        if(table){
          $('#dataTables-kecocokan').DataTable({
              responsive: true,
              order : []
          });
        }

        table = document.getElementById("dataTable-kriteria");
        if(table){
          $('#dataTable-kriteria').DataTable({
              responsive: true,
              order : []
          });
        }
      });
    
      $('#add_sub').change(function(e) {
        var pilihan = $('#add_sub').val();
        if(pilihan == "Punya"){
          $('#sub').after('<div class="row form-group" id="sub_comp">                                        <div class="col-lg-3 col-lg-offset-3">                                            <button type="button" id="btn_add_sub" class="btn btn-md btn-success">                                                <i class="fa fa-plus"></i>                                                Tambah Subkriteria                                            </button>                                        </div>                                        <div class="col-lg-6" id="sub_form">                                                                                    </div>                                    </div>');
          $('#btn_add_sub').click(function(e) {
               $('#sub_form').append('<div class="row form-group"><div class="col-lg-5"><input class="form-control" type="text" name="sub_nama[]" placeholder="Nama SubKriteria"></div><div class="col-lg-5"><input class="form-control" type="text" name="sub_bobot[]" placeholder="Bobot SubKriteria"></div><div class="col-lg-2"><button onclick="btn_remove(this)" type="button" class="btn btn-md btn-danger"><i class="fa fa-remove"></i></button></div></div>');
          });
      }else{
              $('#sub_comp').remove();
          }   
    });
  
  function btn_remove(argument) {
      var r = confirm("Are You Sure?");
      if (r == true) {
          argument.closest('.form-group').remove();
      }
      
  }
  </script>

  <script type="text/javascript">
    $(document).ready(function(){
          $('ul li a').click(function(){
            $('li a').removeClass("active");
            $(this).addClass("active");
        });
    });
</script>

<script>
$(document).ready(function(){
  $('#btn_delete').click(function(){
    if(confirm("Yakin Mendelte Fasilitas?")){
      var id=[];
      $(':checkbox:checked').each(function(i){
        id[i] = $(this).val();
      });

      if(id.length === 0){ //if array empty
        alert("Belum Ada Fasilitas yang terselek");window.location.go(-1);
      }
      else{
        $.ajax({
          url:"config/paket_travel/delete.php",
          method:"POST",
          data:{id:id},
          success:function()
          {
            for(var i=0; i<id.length; i++){
              $('tr#'+id[i]+'').css('background-color','#ccc');
              $('tr#'+id[i]+'').fadeOut('slow');
            }
          }
        });
      }
    }
    else{
     
    }
  });
});
</script>

    <script>
        jQuery(document).ready(function($){
            $('.edit-link').on('click',function(){
               var getLink = $(this).attr('href');
                swal({
                        title: ' Alert',
                        text: 'Edit Data?',
                        html: true,
                        confirmButtonColor: '#d9534f',
                        showCancelButton: true,
                        },function(){
                        window.location.href = getLink
                    });
                return false;
            });
        });
    </script>



<script>
  function updateNilaiBobot(id, bobot, idx_dropdown){
    $.ajax({
        type: "POST",
        url: "config/kriteria/proses_ubah.php",
        dataType: "JSON",
        data: {
            'id': id,
            'bobot': bobot
        },
        success: function(response) {
            console.log('#navbardrop'+idx_dropdown);
            $('#navbardrop'+idx_dropdown).text(bobot+' ');
        },
        error: function(xhr, status, err) {
          // alert(xhr.responseText+", "+status+", "+err);
        }
    });
  }

  // function kirimSubkriteria(){
  //   //var reg = /^[A=-Z0-9._%+-]+@([A-Z0-9]+\.)+[A-Z]{2,4}$/i;
  //   var namaSubkriteria =$('#namaSubkriteria').val();
  //   var bobotSubkriteria=$('#bobotSubkriteria').val();

  //   $if(namaSubkriteria.trim() == ''){
  //     alert('Masukkan Nama Subkriteria.');
  //     $('#namaSubkriteria').focus();
  //     return false;
  //   }else if(bobotSubkriteria.trim() == ''){
  //     alert('Masukkan Bobot Subkriteria.');
  //     $('#bobotSubkriteria').focus();
  //     return false;
  //   }else{
  //     $.ajax({
  //       type:"POST",
  //       url:"config/kriteria/proses_tambah_subkriteria.php";
  //       dataType: "JSON",
  //       data:
  //         'Submit=1$id'+id+'&nama'+$namaSubkriteria+'&bobot'+$bobotSubkriteria,
  //         beforeSend:function(){
  //           ('.submitBtn').attr("disabled","disabled");
  //           $('.modal-body').css('opacity','0.5');
  //         },
  //         success:function(msg){
  //           if(msg== 'ok'){
  //             $('#namaSubkriteria').val('');
  //             $('#bobotSubkriteria').val('');
  //             $('statusMsg').html('<span style="color:green;">Subkriteria Berhadil Dimasukkan.</span>');
  //           }else{
  //             $('statusMsg').html('<span style="color:red;">Subkriteria Tidak Berhasil Dimasukkan.</span>');
  //           }

  //           ('submitBtn').removeAttr("disabled");
  //           $('.modal-body').css('opacity','');
  //         }
  //     });
  //   }
  // }

  function getDataNilai(comp){
    var nilai = comp.options[comp.selectedIndex].text;
    // if(nilai.toLowerCase() == "--pilih--"){
    //   return false;
    // }
    // $.ajax({
    //     type: "POST",
    //     url: hb_base_url + "consumer",
    //     contentType: "application/json",
    //     dataType: "json",
    //     data: JSON.stringify({
    //         first_name: $("#namec").val(),
    //         last_name: $("#surnamec").val(),
    //         email: $("#emailc").val(),
    //         mobile: $("#numberc").val(),
    //         password: $("#passwordc").val()
    //     }),
    //     success: function(response) {
    //         console.log(response);
    //     },
    //     error: function(response) {
    //         console.log(response);
    //     }
    // });
  }

</script> 
</body>

</html>