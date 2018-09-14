 <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.1.0
    </div>
    <strong>Copyright &copy; MMUST Clearance System <a href="#">Conardson</a>.</strong> All rights
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
    $('#school').on('change',function(){
            var sch_id = $(this).val();

            if(sch_id){
                $.ajax({
                    type:'POST',
                    url:'<?php echo base_url('Admin/ajax_request');?>',
                    data:'sch_id='+sch_id,
                    success:function(html){
                        $('#department').html(html);
                        $('#program').html('<option value="">Select Department first</option>');
                    }
                });
            } else{
                $('#department').html('<option value="">Select School first</option>');
                $('#program').html('<option value="">Select Department first</option>');
            }
        });

        $('#department').on('change',function(){
            var dept_id = $(this).val();
            if(dept_id){
                $.ajax({
                    type:'POST',
                    url:'<?php echo base_url('Admin/ajax_request'); ?>',
                    data:'dept_id='+dept_id,
                    success:function(opt){
                        $('#program').html(opt);
                    }
                });
            }else{
                $('#program').html('<option value="">Select Department first</option>');
            }
        });
  </script>
   <!-- ****************IMPORT STUDENT DETAILS IN A CSV FILE(EXCEL SPREADSHEET) ***************************************** -->
  <script type="text/javascript">
    $(document).ready(function(){

	load_data();

	function load_data()
	{
		$.ajax({
			url:"<?php echo base_url(); ?>Admin/load_data",
			method:"POST",
			success:function(data)
			{
				$('#imported_csv_data').html(data);
			}
		})
	}

	$('#import_csv').on('submit', function(event){
		event.preventDefault();
		$.ajax({
			url:"<?php echo base_url(); ?>Admin/import",
			method:"POST",
			data:new FormData(this),
			contentType:false,
			cache:false,
			processData:false,
			beforeSend:function(){
				$('#import_csv_btn').html('Importing...');
			},
			success:function(data)
			{
				$('#import_csv')[0].reset();
				$('#import_csv_btn').attr('disabled', false);
				$('#import_csv_btn').html('Import Done');
				load_data();
			}
		})
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

            <script  src="<?php echo base_url();?>clearance/assets/sweetalert2.min.js" ></script>


            <script>
 /* $(document).ready(function(){
		$('confirm_delete').on('click', function(e){

			var delete_url= $(this).attr('data-url');
			SwalDelete(delete_url);
			e.preventDefault();
		});

	});

	function SwalDelete(delete_url){

		swal({
			title: 'Are you sure?',
			text: "It will be deleted permanently!",
			type: 'question',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!',
			showLoaderOnConfirm: true,

			preConfirm: function() {
			  return new Promise(function(resolve) {

			     $.ajax({
			   		url: '<?php echo base_url("Admin/DeleteStudArares"); ?>',
			    	type: 'POST',
			       	data: "id":id,
			       	dataType: 'json'
			     })
			     .done(function(response){
			     	swal('Deleted!', response.message, response.status);

			     })
			     .fail(function(){
			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
			     });
			  });
		    },
			allowOutsideClick: false
		});

	}*/

 /*$(function(){ TablesDatatables.init(); });
function validate(a)
{
    var id= a.value;

    swal({
            title: "Are you sure?",
            text: "You want to delete this Menu Item!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, Delete it!",
            closeOnConfirm: false }, function()
        {
            swal("Deleted!", "Menu Item has been Deleted.", "success");
            $(location).attr('href','<?php echo base_url()?>Admin/DeleteStudentArares/'+id);
        }
    );
}*/
 </script>

</script>

</body>
</html>
