    <!-- Footer -->
    <?php if($_SESSION['login_view_folder'] == 'manager/'):?>
      <footer class="footer">
        <div class="foot_container">
          <span class="text-muted">VSU Pasalubong Center Business Management System </span>
          <span class="year text-muted text-right">&nbsp;|&nbsp;&nbsp;&nbsp;&copy; <?php echo date("Y"); ?> </span>
        </div>
      </footer>
    <?php endif?>
  <!-- End Footer -->
<script type="text/javascript" src="./assets/dist/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->
<script src="http://code.jquery.com/jquery.min.js"></script>

<script type="text/javascript" src="./assets/dist/js/time.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js" integrity="sha512-rMGGF4wg1R73ehtnxXBt5mbUfN9JUJwbk21KMlnLZDJh7BkPmeovBuddZCENJddHYYMkCh9hPFnPmS9sspki8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="./assets/dist/js/sweetalert.min.js"></script>
    <script src="./assets/dist/js/accounting.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script src="./assets/dist/js/toastr.min.js"> </script>
<script src="assets/dist/js/city.js"></script> 
<script>  
window.onload = function() {  

  // ---------------
  // basic usage
  // ---------------
  var $ = new City();
  $.showProvinces("#province");
  $.showCities("#city");

  var $ = new City();
  $.showProvinces("#province1");
  $.showCities("#city1");

  // ------------------
  // additional methods 
  // -------------------

  // will return all provinces 
  console.log($.getProvinces());
  
  // will return all cities 
  console.log($.getAllCities());
  
  // will return all cities under specific province (e.g Batangas)
  console.log($.getCities("Batangas")); 
  
}
</script>
<script>
  $(document).ready(function() {
    $('#datatableid').DataTable({
      "pagingType": "full_numbers", 
      "length_menu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"],
      ],
      responsive: true,
      language: {
        search: "_INPUT_",
        searchPlaceholder: "Search",
      }
    });
    $('#datatableid2').DataTable({
      "pagingType": "full_numbers", 
      "length_menu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"],
      ],
      responsive: true,
      language: {
        search: "_INPUT_",
        searchPlaceholder: "Search",
      }
    });
 } );
</script>
<script>
    window.start_load = function(){
    $('body').prepend('<div id="preloader2"></div>')
    }
    window.end_load = function(){
    $('#preloader2').fadeOut('fast', function() {
        $(this).remove();
        })
    }
</script>
<script type="text/javascript">
  $(document).ready(function () {
  $('.content select').chosen();
  $(".chosen-container-single .chosen-single").css("border","1px solid #05300e");
  $(".chosen-container-single .chosen-single").css("line-height","30px");
  $(".chosen-container-single .chosen-single").css("height","30px");
  $(".chosen-container-single .chosen-single").css("font-size","16px");
  $(".chosen-container-single .chosen-single").css("color","#05300e");
  $(".chosen-container-single .chosen-single").css("border-radius","5px");
});
</script>
<script>
  toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": true,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "3000",
    "extendedTimeOut": "5000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
  function invalid_login(){
    toastr.error("Invalid Username or Password");
  }
  function success_login(){
    toastr.success("Welcome to VSU Pasalubong Center Business Management System");
  }
  function success_update(){
    swal("","Successfully Updated!","success");
  }
  function fail_update(){
    swal("","Updating Data Failed!","warning");
  }
  function success_add(){
    swal("","Successfully Added!","success");
  }
  function fail_add(){
    swal("","Adding Data Failed!","warning");
  }
  function success_delete(){
    swal("","Successfully Deleted!","success");
  }
  function fail_delete(){
    swal("","Deleting Data Failed!","warning");
  }
</script>