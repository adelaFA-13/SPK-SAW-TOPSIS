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

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
        $('#dataTables-result').DataTable({
                responsive: true,
                order : []
        });
        $('#dataTables-ranking').DataTable({
                responsive: true,
                order : []
        });
        $('#dataTables-kecocokan').DataTable({
                responsive: true,
                order : []
        });
        
    });
    </script>
<script>
    $('#add_sub').change(function(e) {
        var pilihan = $('#add_sub').val();
        if(pilihan == "Punya"){
            $('#sub').after('<div class="row form-group" id="sub_comp">                                        <div class="col-lg-3 col-lg-offset-3">                                            <button type="button" id="btn_add_sub" class="btn btn-md btn-success">                                                <i class="fa fa-plus"></i>                                                Tambah Subkriteria                                            </button>                                        </div>                                        <div class="col-lg-6" id="sub_form">                                                                                    </div>                                    </div>');
            $('#btn_add_sub').click(function(e) {
                 $('#sub_form').append('<div class="row form-group"><div class="col-lg-5"><input class="form-control" type="text" name="sub_nama[]" placeholder="Nama SubKriteria"></div><div class="col-lg-5"><input class="form-control" type="number" name="sub_bobot[]" placeholder="Bobot SubKriteria"></div><div class="col-lg-2"><button onclick="btn_remove(this)" type="button" class="btn btn-md btn-danger"><i class="fa fa-remove"></i></button></div></div>');
            });
        }else{
            $('#sub_comp').remove();
        }   
  });
</script>
<script type="text/javascript">
    function btn_remove(argument) {
        var r = confirm("Are You Sure?");
        if (r == true) {
            argument.parentElement.parentElement.remove();
        }
        
    }
</script>

</body>

</html>
