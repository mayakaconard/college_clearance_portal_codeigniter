<!-- =============================================== -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Bank Details</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">


        <div class="row">
            <span style="visibility:visible;"> </span>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-education"></span>&nbsp;&nbsp;MY BANK DETAILS</div>
            <div class="panel-body">
                <form id="mydetails" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="col-md-3 col-lg-4">
                        <div class="form-group has-feedback">
                            <label>First Name:
                                <span class="required">*</span>
                            </label>
                            <input required name="fname" value="<?php //echo $firstname; ?>" style="text-transform:uppercase" type="text" 
                                class="form-control" placeholder="First name">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>

                        <div class="form-group has-feedback">
                            <label>School:&nbsp;
                                <span class="required">*</span>
                            </label>
                            <input required name="school" type="text" id="school" value="<?php //echo $school; ?>" type="text" 
                                class="form-control" placeholder="Surname" style="text-transform:uppercase">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Department:&nbsp;
                                <span class="required">*</span>
                            </label>
                            <input required name="department" type="text" id="department" value="<?php //echo $department; ?>" type="text"
                                class="form-control" placeholder="Surname" style="text-transform:uppercase">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-4">
                        <div class="form-group has-feedback">
                            <label>Middle Name:
                                <span class="required">*</span>
                            </label>
                            <input name="middle_name" type="text" value="<?php //echo $middlename; ?>" type="text" class="form-control" 
                                placeholder="Middle name" style="text-transform:uppercase" required="required">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label>National ID/Passport:
                                <span class="required">*</span>
                            </label>
                            <input required name="id" type="text" id="id" class="form-control" maxlength="8" value="<?php //echo $id;  ?>"
                                placeholder="ID Number" required="required">
                        </div>

                    </div>
                    <div class="col-md-3 col-lg-4">
                        <div class="form-group has-feedback">
                            <label>Last Name:&nbsp;
                                <span class="required">*</span>
                            </label>
                            <input required name="surname" type="text" id="surname" value="<?php //echo $surname; ?>" type="text"
                                class="form-control" placeholder="Surname" style="text-transform:uppercase">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Email Address:
                                <span class="required">*</span>
                            </label>
                            <input required name="email" type="text" value="<?php //echo $email; ?>" class="form-control" placeholder="Email"
                                style="text-transform:uppercase">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-4">
                        <div class="form-group has-feedback">
                            <label>Program:&nbsp;
                                <span class="required">*</span>
                            </label>
                            <input required name="program" type="text" id="program" value="<?php //echo $program; ?>" type="text"
                                class="form-control" placeholder="Surname" style="text-transform:uppercase">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-4">
                        <div class="form-group has-feedback">
                            <label>Registration Number:&nbsp;
                                <span class="required">*</span>
                            </label>
                            <input required name="surname" type="text" id="surname" value="<?php //echo $reg; ?>" type="text" class="form-control"
                                placeholder="Surname" style="text-transform:uppercase">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                    </div>
                    <!--    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-offset-1 col-md-11">
                                        <button type="submit" name="updatedetails" class="btn btn-info">Submit</button>
                                        <button type="reset" class="btn btn-warning">Cancel</button>
                                        </div>
                                </div>
                                </div>
                        </div>
                    </div>   -->
                </form>

            </div>
        </div>
        <!--END PAGE CONTENT -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->