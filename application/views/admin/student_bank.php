

      <!-- =============================================== --><!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       <section class="content-header">
          <h1>
                Dashboard
                <small>Student Bank Details</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">


  <div class="row">
    <div class="col-md-3">
        <a  class="btn btn-success" href='<?php echo base_url()?>Admin/exportCSV'>Export <i class="glyphicon glyphicon-arrow-right"></i></a>
    </div>
    </div>
    <br>


                        <div class="panel panel-primary">
                            <div class="panel-heading"><span class="glyphicon glyphicon-education"></span>&nbsp;&nbsp;Student Bank Details</div>
                            <div class="panel-body">

                                            <div class="table-responsive">
                                                <table class="table table-striped table-condensed table-hover" id="example"  >
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Full Name</th>
                                                            <th>School</th>
                                                            <th>Department</th>
                                                            <th>Reg No.</th>
                                                            <th>Bank Name</th>
                                                            <th>Branch</th>
                                                            <th>Account no.</th>
                                                            <th>Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            <?php
                                                            $count=1;
                                                             foreach($bank as $det){
                                                                 ?>

                                                          <tr>
                                                              <td> <?php echo $count; ?></td>
                                                              <td> <?php echo $det['first_name'].' '.$det['middle_name'].' '.$det['surname']; ?></td>
                                                              <td><?php echo $det['school_name'];?></td>
                                                              <td><?php echo $det['department'];?></td>
                                                              <td><?php echo $det['reg_number'];?></td>
                                                              <td><?php echo $det['bank_name'];?></td>
                                                              <td><?php echo $det['bank_branch'];?></td>
                                                              <td><?php echo $det['bank_account'];?></td>
                                                              <td><?php echo $det['amount'];?></td>
                                                          </tr>
                                                                  <?php
                                                                  $count++;
                                                             }

                                                            ?>

                                                      </tbody>
                                                </table>
                                            </div>                            </div>
                        </div>
        <!--END PAGE CONTENT -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


