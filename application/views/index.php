<!DOCTYPE html>
<html lang="en">
<!-- Copied from http://crm.thememinister.com/crmAdmin/login.html by Cyotek WebCopy 1.2.2.368, Wednesday, January 17, 2018, 10:18:21 AM -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Clearance Panel</title>

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href=<?php echo base_url();?>"clearance/logo.png" type="image/x-icon">
        <!-- Bootstrap -->
        <link href="<?php echo base_url('clearance/assets/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css">
        <!-- Bootstrap rtl -->
        <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
        <!-- Pe-icon-7-stroke -->
        <link href="<?php echo base_url('clearance/assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css');?>" rel="stylesheet" type="text/css">
        <!-- style css -->
        <link href="<?php echo base_url('clearance/stylecrm.css');?>" rel="stylesheet" type="text/css">
        <!-- Theme style rtl -->
        <!--<link href="assets/dist/css/stylecrm-rtl.css" rel="stylesheet" type="text/css"/>-->
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
        .inst-name
        {
            font-size:32px;
            font-weight:600;
        }
        </style>

    <body>
        <!-- Content Wrapper -->
        <div class="login-wrapper">

        <div class="row" style="background-color: #688ACC;">

        </div>


            <div class="container-center"  style="margin-top:20px;">
            <div class="login-area">
                <div class="panel panel-bd panel-custom">
                    <div class="panel-heading">
                        <div class="view-header">
                            <div class="container">
                                 <div class="header-logo">
                                        <img class="inst-logo" src="<?php echo base_url(); ?>clearance/logo.png" alt="">
                                        <div class="logo-title">
                                <small style="color: red;"><strong>The university of choice</strong></small>
                            </div>
                                 </div>
                                 </div>




                        </div>
                    </div>
                    <div class="panel-body">
                        <div id="info">
                            <?php
                              if(isset($message_display)){
                                  echo $message_display;
                              }
                            ?>
                        </div>
                        <form id="login-form" method="post" action= "<?php echo base_url('Admin/Login'); ?>">
                            <div class="form-group">
                                <label class="control-label" for="username">Email Address: <span class="required">*</span></label>
                                <input type="email" class="form-control" name="email" id="email" required="required" aria-describedby="emailHelp" placeholder="Enter email">

                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password: <span class="required">*</span></label>
                                <input type="password" class="form-control" name="password" id="password" required="required" aria-describedby="emailHelp" placeholder="Enter Password">

                            </div>
                            <div>
                                <button class="btn btn-add" type="submit" name="btn-login" id="btn-login"><span class="glyphicon glyphicon-log-in"> </span>&nbsp;Login</button>
                                <button type="reset" class="btn btn-danger"> <span class="glyphicon glyphicon-remove-circle"> </span>&nbsp;Reset</button>
                            </div>
                        </form>
                             <br><br>
                          <!--  <div class="row">
                                <div class="form-group">
                                   <div class="col-md-6">
                                   <a class="btn btn-primary" href="<?php echo site_url('Admin/Register'); ?>">Create Account </a>
                               </div>
                               <div class="col-md-4">
                                    <a class="btn btn-warning" href="<?php echo site_url('Admin/Password_reset'); ?>">Forgot Password </a>
                               </div>
                                </div>
                             </div>-->


                        </div>
                        </div>
                </div>
            </div>


        </div>
        <footer class="main-footer" style="margin-top: 100px">
            <strong>Copyright &copy;<?php echo date('Y'); ?> <br>
            Incase of any queries please Email to <a href="mailto:clearance@mmust.ac.ke">clearance@mmust.ac.ke</a>.</strong><br> Phone numbers: <strong> +254720875292 / 0782875292</strong><br> All rights reserved.
         </footer>
        <!-- /.content-wrapper -->
        <!-- jQuery -->
        <script src="<?php echo base_url();?>clearance/jquery-1.12.4.min.js" type="text/javascript"></script>
        <!-- bootstrap js -->
        <script src="<?php echo base_url();?>clearance/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
         <script  src="<?php echo base_url();?>clearance/jquery.validate.js"></script>
            <script  src="<?php echo base_url();?>clearence/additional-methods.js"></script>
            <script src="<?php echo base_url();?>clearance/validator.js" type="text/javascript"></script>
    </body>
<!-- Copied from http://crm.thememinister.com/crmAdmin/login.html by Cyotek WebCopy 1.2.2.368, Wednesday, January 17, 2018, 10:18:21 AM -->
</html>