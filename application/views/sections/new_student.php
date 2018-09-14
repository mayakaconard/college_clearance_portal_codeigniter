<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Clearance</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="dashboard">
                    <i class="fa fa-dashboard"></i> System Status</a>
            </li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- UPLOAD CVS DATABASE TO THE SYSTEM -->
        <div class="panel panel-success">
            <div class="panel-heading">Upload CSV database</div>
            <div class="panel-body">
                 <?php
                                         if(isset($_SESSION['imported'])){
                                             echo  $_SESSION['imported'];

                                        }
                                         elseif(isset($_SESSION['failed'])){
                                            echo $_SESSION['failed'];
                                         }

                                    ?>
                <div class="register-box-body">
                    <div class="container-center lg">
                        <div class="message_display">

                        </div>
                        <form method="post" action="<?php echo base_url('Admin/import');?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Select CSV File</label>
                                <input type="file" name="csv_file" id="csv_file" required accept=".csv" />
                            </div>
                            <br />
                            <button type="submit" name="import_csv" class="btn btn-info" id="import_csv_btn">Import Student Details</button>
                        </form>
                        <div id="imported_csv_data"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Small boxes (Stat box) -->
        <div class="panel panel-primary">
            <div class="panel-heading"> Register Student </div>
            <div class="panel-body">
                <?php
                                 if(isset($_SESSION['success'])){
                                     echo  $_SESSION['success'];

                                }
                                 elseif(isset($_SESSION['error'])){
                                    echo $_SESSION['error'];
                                 }

                            ?>
                <div class="register-box-body">

                    <div class="container-center lg" style="margin-top:0px;">

                        <form id="register12" method="post" action="<?php echo base_url('Admin/registerStudent');  ?>">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>First Name:
                                        <span class="required">*</span>
                                    </label>
                                    <input name="fname" type="text" id="fname" class="form-control" placeholder="First Name">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Middle Name: </label>
                                    <input name="mname" type="text" id="mname" class="form-control" placeholder="Middle name">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Last Name:
                                        <span class="required">*</span>
                                    </label>
                                    <input name="lname" type="text" id="lname" required="required" class="form-control" placeholder="First name">
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>ID Number:
                                        <span class="required">*</span>
                                    </label>
                                    <input name="idnumber" type="text" id="idnumber" required="required" class="form-control" maxlength="13" placeholder="idnumber">
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Email Address:
                                        <span class="required">*</span>
                                    </label>
                                    <input name="email" type="email" id="email" required="required" class="form-control" placeholder="Email Address">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Registration No:
                                        <span class="required">*</span>
                                    </label>
                                    <input name="regno" type="text" id="regno" required="required" class="form-control" maxlength="13" placeholder="Reg Number">
                                </div>


                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>School:
                                        <span class="required">*</span>
                                    </label>
                                    <select class="form-control" name="school" id="school" required="required">
                                        <option value="">Select School</option>
                                        <?php
                                             foreach($schools as $sch){
                                                 ?>
                                        <option value="<?php echo $sch['sch_id']; ?>">
                                            <?php echo $sch['school_name']; ?>
                                        </option>
                                        <?php
                                             }
                                            ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Department:
                                        <span class="required">*</span>
                                    </label>
                                    <select class="form-control" name="department" id="department" required="required">
                                        <option selected disabled>Select Department form</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Programme:
                                        <span class="required">*</span>
                                    </label>
                                    <select class="form-control" name="program" id="program" required="required">
                                        <option selected disabled>Select Program</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Gender:
                                        <span class="required">*</span>
                                    </label>
                                    <select class="form-control" name="gender" id="gender" required="required">
                                        <option value="M">MALE</option>
                                        <option value="F">FEMALE</option>

                                    </select>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-4">
                                    <button class="btn btn-warning" type="submit" name="register" id="register">Register</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                </div>
                            </div>
                        </form>


                    </div>

                </div>
            </div>
        </div>

        <!-- /.row -->

        <!-- Main row -->



    </section>
    <!-- /.content -->
</div>

<!-- /.content-wrapper -->
