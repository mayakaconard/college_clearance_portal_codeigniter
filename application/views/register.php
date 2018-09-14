<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>New Login</title>
        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="<?php echo base_url();?>clearance/logo.png" type="image/x-icon">
       <link href="<?php echo base_url();?>clearance/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <!-- Bootstrap rtl -->
        <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
        <!-- Pe-icon-7-stroke -->
        <link href="<?php echo base_url();?>clearance/assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css">
        <!-- style css -->
        <link href="<?php echo base_url();?>clearance/stylecrm.css" rel="stylesheet" type="text/css">
    </head>
    <style>
    .error,.required{
        color: #CC0000;
    }
      .inst-logo {
    width:120px;
    height:90px;
    margin-top: 2px;
    margin-bottom: 3px;
    margin-left: 90px;
}
.inst-name {
    font-size:32px;
    font-weight:600;
}
    </style>
    <body>
        <!-- Content Wrapper -->
        <div class="login-wrapper">
            <div class="row" style="background-color: #688ACC;">

             </div>

            <div class="container-center" style="margin-top:0px;">
             <div class="login-area">
                <div class="panel panel-bd panel-custom">
                    <div class="panel-heading">
                        <div class="view-header">
                            <div class="header-logo">
                                        <img class="inst-logo" src="<?php echo base_url(); ?>clearance/logo.png" alt="">
                                        <div class="logo-title">
                                <small style="color: red;"><strong><i>The university of choice</i></strong></small>
                            </div>
                                 </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form id="register12" method="post" >
                             <div class="form-group">
                                <label class="control-label" for="username">Student Email Address: <span class="required">*</span></label>
                                <input type="email" class="form-control" name="email" id="email" required="required" aria-describedby="emailHelp" placeholder="Enter email">

                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Reg. Number: <span class="required">*</span></label>
                                <input type="password" class="form-control" name="regno" id="regno" required="required" aria-describedby="emailHelp" placeholder="Enter Registraion Number">

                            </div>
                            <div class="form-group">
                                <label>Password: <span class="required">*</span></label>
                                    <input name="password" type="password" id="password" required="required" class="form-control" placeholder="Enter Password">
                            </div>

                            <div class="form-group">
                                <label>Confirm Password: <span class="required">*</span></label>
                                    <input name="password2" type="password" id="password2" required="required" class="form-control" placeholder="Retype password">
                            </div>
                            <hr/>

                            <div>
                                <button class="btn btn-warning" type="submit" name="create_account" id="register">Register</button>
                                <button type="reset" class="btn btn-danger"> <span class="glyphicon glyphicon-remove-circle"> </span>&nbsp;Reset</button>
                                 <a class="btn btn-add" href="<?php echo site_url('Admin/index'); ?>"><span class="glyphicon glyphicon-log-in"> </span>&nbsp;Login </a>
                            </div>

                        </form>
                        </div>
                    </div>
                </div>
            </div>
             <footer class="main-footer">
            <strong>Copyright &copy; 2017-<?php echo date('Y'); ?> <br>
            Incase of any queries please Email to <a href="mailto:clearance@mmust.ac.ke">clearance@mmust.ac.ke</a>.</strong><br> Phone numbers: <strong> +25472505222 / 072505223</strong><br> All rights reserved.
         </footer>
        </div>
                <!-- /.content-wrapper -->

             <!-- bootstrap js -->
             <script src="<?php echo base_url(); ?>clearance/jquery-1.12.4.min.js" type="text/javascript"></script>

        <!-- bootstrap js -->
        <script src="<?php echo base_url();?>clearance/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
             <script  src="<?php echo base_url();?>clearance/jquery.validate.js"></script>
            <script  src="<?php echo base_url();?>clearence/additional-methods.js"></script>
            <script src="<?php echo base_url();?>clearance/validator.js" type="text/javascript"></script>
    </body>
</html>