

      <!-- =============================================== --><!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       <section class="content-header">
          <h1>
                Dashboard
                <small>Clearance Sections</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">


  <div class="row">
    <span style="visibility:visible;">   </span>
    </div>


                        <div class="panel panel-primary">
                            <div class="panel-heading"><span class="glyphicon glyphicon-education"></span>&nbsp;&nbsp;Clearance Sections</div>
                            <div class="panel-body">

                                            <div class="table-responsive">
                                                <table class="table table-striped table-condensed table-hover" id="example"  >
                                                    <thead>
                                                        <tr>
                                                            <th>Section ID</th>
                                                            <th>Full Name</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            <?php
                                                             foreach($sections as $sect){
                                                                 ?>

                                                          <tr>
                                                          <td> <?php echo $sect['section_id']; ?></td>
                                                          <td><?php echo $sect['section'];?></td>
                                                          </tr>
                                                                  <?php
                                                             }

                                                            ?>

                                                      </tbody>
                                                </table>
                                            </div>                            </div>
                        </div>
        <!--END PAGE CONTENT -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


