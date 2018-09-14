 <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.1.0
    </div>
    <strong>Copyright &copy; <?php echo date('Y'); ?> MMUST Clearance System <a href="#">Conardson</a>.</strong> All rights
    reserved.
  </footer>
<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>clearance/clearance/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>clearance/clearance/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->

 <!-- DEPENDENT SELECT SCRIPT FOR STUDENT REGISTRATION IN THE ADMIN PORTAL -->
  <script type="text/javascript">
  $(document).ready(function(){
      $('#level').on("change", function(){
       $('#amount').val($(this).val());
       $()
      });

  });

  </script>
<script src="<?php echo base_url(); ?>clearance/clearance/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>clearance/clearance/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>clearance/clearance/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>clearance/clearance/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url(); ?>clearance/clearance/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url(); ?>clearance/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url(); ?>clearance/clearance/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>clearance/clearance/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>clearance/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src = "<?php echo base_url(); ?>clearance/clearance/datatables/jquery.dataTables.js"></script>
  <script  src = "<?php echo base_url(); ?>clearance/clearance/datatables/dataTables.bootstrap.js"></script>
<script>
                 $(document).ready(function () {
                    $('#example').dataTable();
                 });

            </script>

<script>
    $(document).ajaxStart(function() { Pace.restart(); });
</script>

            <script  src="<?php echo base_url();?>clearance/dist/jquery.validate.js" ></script>
            <script  src="<?php echo base_url();?>clearence/dist/additional-methods.js"></script>
            <script src="<?php echo base_url();?>clearance/dist/validator.js" type="text/javascript"></script>



 <script>
    var timer = 0;
    function set_interval() {
        timer = setInterval("auto_logout()", 100000);
        // the figure '10000' above indicates how many milliseconds the timer be set to.
        // Eg: to set it to 5 mins, calculate 5min = 5x60 = 300 sec = 300,000 millisec.
        // 1min 1x60=60000
        // So set it to 300000
    }
    function reset_interval() {
        if (timer != 0) {
            clearInterval(timer);
            timer = 0;
            timer = setInterval("auto_logout()", 100000);
        }
    }
    function auto_logout() {
        window.location = "<?php echo base_url();?>Admin/index";
    }


</script>

</body>
</html>
