<!-- =============================================== -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Student Arares</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">


    <div class="row">
      <span style="visibility:visible;"> </span>
    </div>


    <div class="panel panel-primary">
      <div class="panel-heading">
        <span class="glyphicon glyphicon-education"></span>&nbsp;&nbsp;Students with Arrears</div>
      <div class="panel-body">
        <?php
                                         if(isset($_SESSION['success'])){
                                             echo  $_SESSION['success'];

                                        }
                                         elseif(isset($_SESSION['error'])){
                                            echo $_SESSION['error'];
                                         }

                                    ?>

        <div class="table-responsive">
          <table class="table table-striped table-condensed table-hover" id="example">
            <thead>
              <tr>

                <th>No.</th>
                <th>REG.</th>
                <th>NAME</th>
                <th>ID NUMBER</th>
                <th>SCHOOL</th>
                <th>DEPARTMENT</th>
                <th>SECTION</th>
                <th>ARARES</th>
                <th>STATUS</th>

                <th style="width: 100px;">Action</th>


                <!--       <th></th> -->

              </tr>
            </thead>
            <tbody>

              <?php
                                                            $count=1;
                                                            foreach($student_arares as $sa)
                                                            {
                                                                ?>


              <tr>
                <td>
                  <ol>
                    <?php echo $count;?>
                  </ol>
                </td>
                <td>
                  <?php echo $sa['reg_number'];?>
                </td>
                <td>
                  <?php echo $sa['first_name'];?>&nbsp;
                  <?php echo $sa['surname'];?>
                </td>
                <td>
                  <?php echo $sa['id_number'];?>
                </td>
                <td>
                  <?php echo $sa['school_name'];?>
                </td>
                <td>
                  <?php echo $sa['department'];?>
                </td>
                <td>
                  <?php echo $sa['section'];?>
                </td>
                <td>
                  <?php echo $sa['arares'];?>
                </td>
                <td>
                  <?php echo $sa['status'];?>
                </td>

                <td style="width: 150px;">
                  <div class="btn-group">
                    <a data-toggle="modal" class="btn btn-success" data-target="#update<?php echo $sa['arares_id'];  ?>">Clear</a>
                    <a data-toggle="modal" data-target="#delete<?php echo $sa['arares_id'];  ?>" class="btn btn-danger">
                      <i class="glyphicon glyphicon-trash"></i>
                    </a>
                  </div>
                </td>

                <!--============================UPDATE RECORD MODAL-=====================================================-->
                <div>
                  <div id="update<?php echo $sa['arares_id'];  ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                      <form action="<?php echo base_url('Sections/updateArares/'.$sa['arares_id']);?>" method="post">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Update Record</h4>
                          </div>
                          <div class="modal-body">
                            <p>
                              <div style="font-size:larger;">Are you Sure you want to CLEAR
                                <b>
                                  <?php echo $sa['first_name'];?>&nbsp;
                                  <?php echo $sa['surname'];?>
                                </b>?</p>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-info" data-dismiss="modal" aria-hidden="true">No</button>
                            <button type="submit" name="update" class="btn btn-danger">Yes</button>
                          </div>

                      </form>
                      </div>

                    </div>
                  </div>
                  <!--============================DELETE RECORD MODAL-=====================================================-->
                  <div id="delete<?php echo $sa['arares_id'];  ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Delete Record?</h4>
                        </div>
                        <div class="modal-body">
                          <p>
                            <div style="font-size:larger;">Are you Sure you want Delete
                              <b>
                                <?php echo $sa['first_name'];?>&nbsp;
                                <?php echo $sa['surname'];?>
                              </b> Record?</p>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-info" data-dismiss="modal" aria-hidden="true">No</button>
                          <a href="<?php echo base_url('Sections/DeleteStudentArares/'.$sa['arares_id']);?>" class="btn btn-danger">Yes</a>
                        </div>
                      </div>

                    </div>

                  
                    <?php
                     $count++;
                      }
                     ?>

              </tr>
            </tbody>
          </table>
          </div>
          </div>
        </div>
        <!--END PAGE CONTENT -->
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->