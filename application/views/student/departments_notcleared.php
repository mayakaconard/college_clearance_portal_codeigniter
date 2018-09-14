


      <!-- =============================================== --><!-- Content Wrapper. Contains page content -->
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
                    <span style="visibility:visible;">   </span>
                    </div>

    <div class="row">
        <div class="col-md-12">
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Sections with Arrears</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /.box-tools -->
        </div><!-- /.box-header -->

                        <?php
                         if($check){
                        ?>
                        <div class="panel panel-primary">
                            <div class="panel-heading"><span class="glyphicon glyphicon-education"></span>&nbsp;&nbsp;Students with Arares per School per Department</div>
                                <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-condensed table-hover" id="example"  >
                                                <thead>
                                                    <tr>

                                                        <th>No.</th>
                                                        <th>SECTION</th>
                                                        <th>ARARE</th>
                                                        <th>STATUS</th>

                                                        <th style="width: 100px;">Action</th>


                                                      <!--       <th></th> -->

                                                    </tr>
                                                </thead>
                                                    <tbody>

                                                            <?php
                                                            $count=1;
                                                            foreach($student_sections->result_array() as $sa)
                                                            {
                                                                ?>


                                                              <tr>
                                                              <td><ol><?php echo $count;?></ol></td>
                                                              <td> <?php echo $sa['section'];?></td>
                                                              <td> <?php echo $sa['arares'];?></td>
                                                              <td> <?php echo $sa['status'];?></td>

                                                              <td style="width: 150px;">
                                                                    <div class="btn-group">
                                                                        <a data-toggle="modal" class="btn btn-success" data-target="#update<?php echo $sa['arares_id'];  ?>">Details</a> 
                                                                    </div>
                                                                    <!--============================DELETE RECORD MODAL-=====================================================-->


                                                            </td>
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
                    <?php
                    }
                    else{
                        ?>
        <div class="col-md-12">
            <!-- /.box-header -->
            <div class="box-body">
                  <div class="callout callout-success">
                    <h4>Clearance Alert! </h4>
                    <p style="font-size: 20px;">We are glad to Report that<b style="font-size: 24px;"><i>&nbsp;you are cleared from all sections</i></b>  .Please  proceed with getting your Clearance certificate</p>
                  </div>
            </div>
            <!-- /.box-body -->
        </div>
         <?php
            }
            ?>
             </div>
                    </div>
                    </div>
        <!--END PAGE CONTENT -->
            </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

