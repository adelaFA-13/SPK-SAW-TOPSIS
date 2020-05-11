<footer class="section-footer mt-5 mb-4 border-top">
      <div class="container pt-5 pb-5">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="row">
              <div class="col-12">
                <div class="row">
                  <!-- <div class="col-12 col-lg-3">
                    <h5>FEATURES</h5>
                    <ul class="list-unstyled">
                      <li>
                        <a href="#">Reviews</a>
                      </li>
                      <li>
                        <a href="#">Community</a>
                      </li>
                      <li>
                        <a href="#">Social Media Kit</a>
                      </li>
                      <li>
                        <a href="#">Affiliate</a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-12 col-lg-3">
                    <h5>ACCOUNT</h5>
                    <ul class="list-unstyled">
                      <li><a href="#">Refund</a></li>
                      <li><a href="#">Security</a></li>
                      <li><a href="#">Rewards</a></li>
                    </ul>
                  </div>
                  <div class="col-12 col-lg-3">
                    <h5>COMPANY</h5>
                    <ul class="list-unstyled">
                      <li><a href="#">Career</a></li>
                      <li><a href="#">Help Center</a></li>
                      <li><a href="#">Media</a></li>
                    </ul>
                  </div> -->
                  <div class="col-12 col-lg-3">
                    <h5>Get Contact</h5>
                    <ul class="list-unstyled">
                      <li>Adela Farah Aglia</li>
                      <li>Palembang</li>
                      <li>0899 - 9991 - 543</li>
                      <li>Ketanahsuci.spk@gmail.com</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div
          class="row border-top justify-content-center align-items-center pt-4"
        >
          <div class="col-auto text-gray-500 font-weight-light">
            2019 Copyright Adela Farah Aglia • All rights reserved • Made in Palembang
          </div>
        </div>
      </div>
    </footer>
 
    <script src="Asset3/libraries/retina/retina.js"></script>
    <script src="Asset3/libraries/jquery/jquery-3.4.1.min.js"></script>
    <script src="Asset3/libraries/bootstrap/js/bootstrap.js"></script>
    <script src="Asset3/libraries/xzoom/dist/xzoom.min.js"></script>
    
    <!-- source -->
     <!-- jQuery -->
     <script src="asset/bower_components/jquery/dist/jquery.min.js"></script>

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


<!-- Page level custom scripts -->
<script src="asset2/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="asset2/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- end of source -->

<!-- star -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
   <script src="Asset3/star/dist/starrr.js"></script>
   <script>
     var ratingElement = document.getElementById("rating");
     if(ratingElement){
      setRatingAgent(1);
     }
     $('#star1').starrr({
       change: function(e, value){
        if (value) {
          $('.your-choice-was').show();
          $('.choice').text(value);
        } else {
          $('.your-choice-was').hide();
          $('.choice').text('');
        }
      }
    });
 
     var $s2input = $('#star2_input');
     $('#star2').starrr({
       max: 10,
       rating: $s2input.val(),
       change: function(e, value){
         $s2input.val(value).trigger('input');
       }
     });
   </script>

<script>
  function setRatingAgent(isReloadPage=0){
    var value = $('.rating').text();
    var id = <?php echo json_encode($_GET['id'])?>;

    //gunakan ajax untuk mengirim data
    $.ajax({
      url: "config/testimoni/create.php",
      dataType: "json",
      data: { //data yang dikirim
        "nilai": value,
        "travel_id": id,
        "is_reload_page": isReloadPage
      },
      type: "post",
      success: function(response) {
        if(response.status){
          if(isReloadPage){
            var doc = document.getElementById("star1");
            doc.childNodes[parseInt(response.nilai)-1].click();
            $('star1').starrr(); //trigger fungsi starrr
          }else{
            alert('Berhasil submit rating!');
          }
        }
        else{
          alert(response.message);
        }
      },
      error: function(xhr, status, err) {
        alert(xhr.responseText+", "+status+", "+err);
      }
    });
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

<script type="text/javascript">
  $(document).ready(function(){
    $('.data').load("lihat.php");
    $('.cari').click(function(){
      var jenisPaket = $("#jenis_paket").val();
    $.ajax({
      type:'POST',
      url:"lihat.php",
      data: {jenisPaket: jenisPaket},
      success: function(hasil){
        $('.data').html(hasil);
      }
    });
    });
  });
</script>

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
  
  function btn_remove(argument) {
      var r = confirm("Are You Sure?");
      if (r == true) {
          argument.closest('.form-group').remove();
      }
      
  }
  </script>
</body>
</html>