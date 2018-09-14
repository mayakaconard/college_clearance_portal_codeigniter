

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Arares</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="dashboard"><i class="fa fa-dashboard"></i> System Status</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
                   <div class="panel panel-primary">
                            <div class="panel-heading">System Clearance Status</div>
                            <div class="panel-body">
                                <div class="register-box-body">
                                    <div class="row">

                                    </div>
                                     <?php
                                         if(isset($_SESSION['success'])){
                                             echo  $_SESSION['success'];

                                        }
                                         elseif(isset($_SESSION['error'])){
                                            echo $_SESSION['error'];
                                         }

                                    ?>
                                     <form id="arares" method="post" enctype="multipart/form-data" autocomplete="off" action = "<?php echo base_url('Sections/setArares'); ?>">
                                          <div class="col-md-4 col-lg-6">

                                          <div class="form-group">
                                            <label for="student">Student: <span class="required">*</span></label>
                                              <select class="form-control" required="required" id="student" name="student">

                                                     <option value=""   >-----SELECT STUDENT-----</option>
                                                      <?php
                                                  foreach($student as $st){
                                                   ?>
                                                <option value ="<?php echo $st["user_id"]; ?>"><?php echo $st["reg_number"]; ?></option>

                                                           <?php
                                                  }

                                                  ?>
                                                  </select>

                                          </div>
           <!--<div class="form-group">
                <label for="section">Section: <span class="required">*</span></label>
                  <select class="form-control" required="required" id="section" name="section">
                    <option value ="">----SELECT SECTION---</option>
                    <?php
                    foreach($sections as $sec){
                        ?>
                            <option value="<?php echo $sec['section_id']; ?>" ><?php echo $sec['section']; ?></option>
                             <?php
                    }
                    ?>
                      </select>

              </div>-->

              <div class="form-group has-feedback">
              <label>Student Arares:&nbsp;<span class="required">*</span></label>
                <input required name="st_arares" type="text" id = "st_arares" type="text"  class="form-control" placeholder="Arares" style="text-transform:uppercase">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
              </div>


                </div>
                <div class="col-md-4 col-lg-6">




            <!--  <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-end-date="0d" date-date-start-date="0d">
                <label for="">Date:  <span class="required">*</span></label>
                    <input type="text" name="date" id="date" class="form-control" readonly="readonly" value="<?php //echo $row['date_of_birth'];  ?>" required="required"/>
                        <span class="input-group-btn"><button class="btn default" type="button"> <i class="fa fa-calendar"></i></button>
                        </span>
        </div>-->


              </div>

                <div class="form-actions">
                <div class="row">
                <div class="col-md-12">
                <div class="row">
                <div class="col-md-offset-1 col-md-11">
                <button type="submit" name="newArare" class="btn btn-info">Submit</button>
                <button type="reset" class="btn btn-warning">Cancel</button>
                </div>
                </div>
                </div>
                <div class="col-md-6"> </div>
                </div>
                                                    </div>
              </form>

                                </div>
                            </div>



                        </div>
            <!-- /.row -->
                <div class="row">

                <!-- /.col -->
                </div>
            <!-- Main row -->



        </section>
        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
                       