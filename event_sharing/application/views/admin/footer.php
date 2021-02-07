</section>

<footer id="footer">
  <?php echo $pengaturan['copyright']; ?>
</footer>

<!-- Page Loader -->
<div class="page-loader">
  <div class="preloader pls-blue">
    <svg class="pl-circular" viewBox="25 25 50 50">
      <circle class="plc-path" cx="50" cy="50" r="20"/>
    </svg>

    <p>Please wait...</p>
  </div>
</div>

<!-- Javascript Libraries -->
<script src="<?php echo base_url("assets/admin/js/jquery.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/admin/js/bootstrap.min.js"); ?>"></script>

<script src="<?php echo base_url("assets/admin/js/jquery.flot.js"); ?>"></script>
<script src="<?php echo base_url("assets/admin/js/jquery.flot.resize.js"); ?>"></script>
<script src="<?php echo base_url("assets/admin/js/curvedLines.js"); ?>"></script>
<script src="<?php echo base_url("assets/admin/js/jquery.sparkline.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/admin/js/jquery.easypiechart.min.js"); ?>"></script>

<script src="<?php echo base_url("assets/admin/js/moment.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/admin/js/bootstrap-select.js"); ?>"></script>
<script src="<?php echo base_url("assets/admin/js/fullcalendar.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/admin/js/jquery.simpleWeather.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/admin/js/waves.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/admin/js/bootstrap-growl.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/admin/js/jquery.mCustomScrollbar.concat.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/admin/js/bootstrap-notify.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/admin/js/chosen.jquery.js"); ?>"></script>

<script type="text/javascript">
  $(function () {
    $(".chosen").chosen();
  });
</script>

<script src="<?php echo base_url("assets/admin/js/app.min.js?1568650061"); ?>"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>

<script>
  ClassicEditor
  .create( document.querySelector( '#editor' ) )
  .catch( error => {
    console.error( error );
  } );
</script>

<script>
  ClassicEditor
  .create( document.querySelector( '#editor1' ) )
  .catch( error => {
    console.error( error );
  } );
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $("#balas-pesan").on('click',function(){
      var beri_visitor = $(this).data("id");
      var beri_email = $(this).data("email");
      $("#balas-email").modal('show');
      $("input[name=id_respon]").val(beri_visitor);
      $("input[name=email]").val(beri_email);
    })
  });
</script>

</body>

</html>