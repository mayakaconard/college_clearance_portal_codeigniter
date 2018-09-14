
      <!-- =============================================== --><!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       <section class="content-header">
          <h1>
                Dashboard
                <small>Deans</small>

            </h1>
        </section>

        <!-- Main content -->
        <section class="content">


  <div class="row">
    <span style="visibility:visible;">   </span>
    </div>
    <div class="row"> <div class="col-lg-4">
    <a  type="button" class="btn btn-success" data-toggle="modal"<a data-target="#add_dean"  data-toggle="modal" href="add_dean"><span class="glyphicon glyphicon-arrow-right"> </span>&nbsp;New Dean</a>
    <!--<a onclick="window.open(this.href); return false;" href="students_per_departmentpdf.php?department='<?php //echo $dept;?>'&sdate='<?php //echo $from;?>'&edate='<?php // echo $to;?>'" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-right"> </span>&nbsp;Export to PDF</a>-->

   </div>
   <br/>
    <br/>
     <br/>
   <div class="col-lg-12">
                        <?php
                             if(isset($_SESSION['success'])){
                                 echo  $_SESSION['success'];

                            }
                             elseif(isset($_SESSION['error'])){
                                echo $_SESSION['error'];
                             }

                          ?>
   </div>

    </div>

                        <div class="panel panel-primary">
                            <div class="panel-heading"><span class="glyphicon glyphicon-education"></span>&nbsp;&nbsp;Students Per Department At Specified Date</div>
                            <div class="panel-body">

                                             <div class="table-responsive">
                                                <table class="table table-striped table-condensed table-hover dataTables" id="example"  >
                                                    <thead>
                                                        <tr>

                                                            <th>No.</th>
                                                            <th>PF Number</th>
                                                            <th>Full Name</th>
                                                            <th>Email</th>
                                                            <th>School</th>
                                                            <th>Action</th>


                                                      <!--       <th></th> -->

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $count=1;
                                                   foreach($get_dean as $row){


                                                      ?>
                                                          <tr>
                                                          <td><?php echo $count; ?></td>
                                                          <td><?php echo $row['pf_number'];   ?></td>
                                                          <td><?php echo $row['title'].' '.$row['surname'].' '.$row['fname'];   ?></td>
                                                          <td><?php echo $row['email_address'];   ?></td>
                                                          <td><?php echo $row['school_name'];  ?></td>
                                                          <td><?php //echo $row['phone'];   ?></td>

                                                          </tr>
                                                      <?php
                                                   }
                                                   $count++;

                                                    ?>
</tbody>
                                                </table>
                                            </div>                            </div>
                        </div>



                         <div class="row">
                                                              <!--MODAL TO ADD NEW DEAN TO THE SYSTEM -->
 <div class="modal fade" id="add_dean"  role="dialog" aria-labelledby="add_dean" aria-hidden="true" >
            <div class="modal-dialog">
                    <div class="modal-content" style="background-color: #6495ED">
                        <form name="dean" id="dean" action="<?php echo base_url('Admin/add_dean');  ?>" method="post">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title"> New Dean</h4>
                                        </div>
                                            <div class="modal-body">
                                                <span id="respy3"> </span>
                                                    <div class="form-group">
                                                         <label for="pf"> Pf Number: <span class="required">*</span></label>
                                                         <input required type="text" name = "pfnumber" class="form-control" id="title" placeholder="Pf Number">
                                                    </div>
                                                    <div class="form-group">
                                                         <label for="title"> Title: <span class="required">*</span></label>
                                                         <input required type="text" name = "title" class="form-control" id="title" placeholder="Dean Title">
                                                    </div>
                                                    <div class="form-group">
                                                         <label for="suname"> Surname: <span class="required">*</span></label>
                                                         <input required type="text" name = "surname" class="form-control" id="surname" placeholder="Surname">
                                                    </div>
                                                    <div class="form-group">
                                                         <label for="fname"> First NAme: <span class="required">*</span></label>
                                                         <input required type="text" name = "fname" class="form-control" id="fname" placeholder="First Name">
                                                    </div>
                                                    <div class="form-group">
                                                         <label for="email"> Email: <span class="required">*</span></label>
                                                         <input required type="text" name = "email" class="form-control" id="email" placeholder="Email">
                                                    </div>
                                                    <div class="form-group">
                                                         <label for="school"> School: <span class="required">*</span></label>
                                                         <select class="form-control" name="school" id="school">
                                                             <option value="blank">Select School</option>
                                                             <?php
                                                             foreach($schools as $s){
                                                                 $id=$s['sch_id'];
                                                                 $school=$s['school_name'];
                                                             ?>
                                                             <option value="<?php echo $id; ?>"><?php echo $school; ?></option>
                                                             <?php
                                                             }
                                                             ?>
                                                         </select>
                                                    </div>

                                                </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success" name = "dean">Save</button>
                                              </div>
                                                </form>
                                            </div><!-- /.modal-content -->
                                          </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                                  <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.END OF NEW DEAN MODAL MODAL -->
                                           </div>

        <!--END PAGE CONTENT -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
