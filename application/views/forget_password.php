
<!DOCTYPE html>
<html lang="en">
<!-- Copied from http://crm.thememinister.com/crmAdmin/forget_password.html by Cyotek WebCopy 1.2.2.368, Wednesday, January 17, 2018, 10:18:21 AM -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Portal Password</title>
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
            <div class="container-center"  style="margin-top:35px;">
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
                        <form>
                            <p>Fill with your mail to receive instructions on how to reset your password.</p>
                            <div class="form-group">
                                <label class="control-label" for="username">Email</label>
                                <input type="text" placeholder="example@gmail.com" title="Please enter you email adress" required="" value="" name="username" id="username" class="form-control">
                                <span class="help-block small">Your registered email address</span>
                            </div>
                            <div>
                                <a class="btn btn-add btn-block" href="#">Reset password</a>
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
          <script src="<?php echo base_url(); ?>clearance/jquery-1.12.4.min.js" type="text/javascript"></script>

        <!-- bootstrap js -->
        <script src="<?php echo base_url();?>clearance/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
             <script  src="<?php echo base_url();?>clearance/jquery.validate.js"></script>
            <script  src="<?php echo base_url();?>clearence/additional-methods.js"></script>
            <script src="<?php echo base_url();?>clearance/validator.js" type="text/javascript"></script>
    </body>
<!-- Copied from http://crm.thememinister.com/crmAdmin/forget_password.html by Cyotek WebCopy 1.2.2.368, Wednesday, January 17, 2018, 10:18:21 AM -->
</html>