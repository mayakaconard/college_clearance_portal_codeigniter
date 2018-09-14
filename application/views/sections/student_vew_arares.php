 <?php
/* require_once('../config/dbconnect.php');
 //$sem = $_GET['intake'];
 $dept= $_GET['department'];
 $from = $_GET['sdate'];
 $to = $_GET['edate'];




   if(!empty(($from) &&($to)) ){
  $student=$conn->prepare("SELECT student.*, std_details.*,departments.*, institution.institution_name FROM student,std_details,departments,institution WHERE student.student_id=std_details.student_id AND student.department_id=departments.department_id AND student.department_id='$dept' AND std_details.institution_id=institution.institution_id
   AND std_details.start_date BETWEEN '$from' AND '$to'");

       $student->execute();

   }
   else{
       header('Location:department_filter.php');
   }
   */
?>
<?php include_once('../include/header');  ?>

      <!-- =============================================== --><!-- Left side column. contains the sidebar -->
    <?php include_once('../include/sidebar');  ?>         <!-- /.sidebar -->


      <!-- =============================================== --><!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       <section class="content-header">
          <h1><img src="../images/new1.png" alt=""/>
           MTRH Student Management System
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">


  <div class="row">
    <span style="visibility:visible;">   </span>
    </div>
    <div class="row"> <div class="col-lg-4">
      <a onclick="window.open(this.href); return false;" href="students_per_departmentpdf.php?department='<?php //echo $dept;?>'&sdate='<?php //echo $from;?>'&edate='<?php // echo $to;?>'" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-right"> </span>&nbsp;Export to PDF</a>
    </div> </div><br/>

                        <div class="panel panel-primary">
                            <div class="panel-heading"><span class="glyphicon glyphicon-education"></span>&nbsp;&nbsp;Students Per Department At Specified Date</div>
                            <div class="panel-body">

        <div class="table-responsive">
                                                <table class="table table-striped table-condensed table-hover dataTables"  >
                                                    <thead>
                                                        <tr>

                                                            <th>No.</th>
                                                            <th>REG.</th>
                                                            <th>Full Name</th>
                                                            <th>Email</th>
                                                            <th>Phone</th>
                                                            <th>Institution</th>
                                                            <th>Department</th>
                                                            <th>Start Date</th>
                                                            <th>Finish Date</th>
                                                            <th>Action</th>


                                                      <!--       <th></th> -->

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                       /*
                                                     for($i=1;$row=$student->fetch(PDO::FETCH_ASSOC);$i++)
                                                       {
                                                      ?>
                                                          <tr>
                                                          <td><ol><?php echo $i;   ?></ol></td>
                                                          <td>    <?php echo $row['first_name'];   ?>&nbsp; <?php echo $row['middle_name'];?>&nbsp;  <?php echo $row['surname'];   ?></td>
                                                          <td>    <?php echo $row['student_id'];   ?></td>
                                                          <td>    <?php echo $row['email'];   ?></td>
                                                          <td><?php echo $row['phone'];  ?></td>
                                                          <td>    <?php echo $row['institution_name'];   ?></td>
                                                          <td>    <?php echo $row['department_name'];   ?></td>
                                                          <td>    <?php echo $row['start_date'];   ?></td>
                                                          <td>    <?php echo $row['end_date'];   ?></td>
                                                          <td>    <?php //echo $row['phone'];   ?></td>

                                                          </tr>
                                                      <?php
                                                   }
                                                    */
                                                    ?>
                                                      </tbody>
                                                </table>
                                            </div>                            </div>
                        </div>
        <!--END PAGE CONTENT -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


<?php require_once('../include/footer'); ?>