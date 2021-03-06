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

        <!-- Start of the student registration panel -->
        <div class="panel panel-primary">
            <div class="panel-heading"> Register Student </div>
            <div class="panel-body">
                <div class="register-box-body">

                    <div class="container-center lg" style="margin-top:0px;">
                        <div class="message_display">

                        </div>

                        <form id="student" method="post" action="<?php echo base_url('Admin/registerStudent');  ?>">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="fname">First Name:
                                        <span class="required">*</span>
                                    </label>
                                    <input name="fname" type="text" id="fname" required="required" class="form-control" placeholder="First Name">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="lname">Middle Name: </label>
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
                                        <option value="">Select Departments</option>
                                        <?php
                                             foreach($departments as $dept){
                                                 ?>
                                        <option value="<?php echo $dept['dept_id']; ?>">
                                            <?php echo $dept['department']; ?>
                                        </option>
                                        <?php
                                             }
                                            ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Programme:
                                        <span class="required">*</span>
                                    </label>
                                    <select class="form-control" name="programme" id="programme" required="required">
                                        <option value="">Programme</option>
                                        <?php
                                             foreach($programmes as $prog){
                                                 ?>
                                        <option value="<?php echo $prog['prog_id']; ?>">
                                            <?php echo $prog['programme']; ?>
                                        </option>
                                        <?php
                                             }
                                            ?>

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
                                    <button class="btn btn-warning" type="submit" name="register" id="registerstudent">Register</button>
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