<?php
  foreach($user as $details){
      $firstname = $details['first_name'];
      $surname = $details['surname'];
      $email= $details['email'];
      $reg_number=$details['reg_number'];

  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Clearance Portal | Students</title>
  <link rel="shortcut icon" href="<?php echo base_url();?>clearance/logo.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>clearance/clearance/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>clearance/clearance/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>clearance/clearance/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>clearance/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>clearance/dist/css/skins/_all-skins.min.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>clearance/clearance/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>clearance/clearance/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>clearance/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!--datatables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>clearance/clearance/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>clearance/clearance/datatables/jquery.dataTables.css">
 


        <!-- style css -->


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="dashboard"class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Portal</b></span>

      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>CL</b>Portal</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success"><?php echo number_format($notCleared); ?> </span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <b style="color: red;"><?php echo number_format($notCleared); ?> uncleared  Sections</b></li>
              <li>
                <!-- inner menu: contains the actual data -->

                <ul class="menu">
                     <?php
                        $count=1;
                        foreach($student_sections->result_array() as $sa)
                        {
                            ?>
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <?php echo $count;?>
                      </div>
                      <h4>
                        <?php echo $sa['section'];?>
                      </h4>
                      <p><?php echo $sa['arares'];?></p>
                    </a>
                  </li>
                  <?php
                  $count++;
                  }

                  ?>
                  <!-- end message -->
                </ul>
              </li>
              <li class="footer"><a href="<?php echo site_url(); ?>Student/Departments_notclered">See All Sections</a></li>
            </ul>
          </li>

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"><?php echo strtoupper($firstname.' '.$surname);  ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">

                <p>
                 <?php echo $reg_number;  ?>
                  <small><?php echo $email;  ?></small>
                </p>
              </li>
              <!-- Menu Body -->
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="" class="btn btn-default btn-flat">Profile</a>
                  <a data-toggle="modal" data-target="#update_profile<?php //echo $clear['date_id'];  ?>" class="btn btn-warning">Close</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('Student/logout');  ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->

        <!--Start modal to update student profile -->
                        <div class="row">
                            <div class="modal fade" id="update_profile" tabindex="-1" role="dialog" aria-labelledby="update_profile" aria-hidden="true">
                                <div class="modal-dialog" >
                                    <div class="modal-content" style="background-color: #6495ED;">
                                        <form name="update" id="update" action="<?php echo base_url('Admin/set_date');  ?>" method="post"   >
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title"> Clearance Date Set</h4>
                                            </div>
                                                <div class="modal-body">
                                                     <span id="respy3"> </span>
                                                         <div class="form-group">
                                                            <label for="title"> Academic Year: <span class="required">*</span></label>
                                                                <select name="acyear" id="acyear" class="form-control" required ="required">
                                                                    <option value="">Select Academic Year</option>
                                                                    <option value="2017/2018">2017/2018</option>
                                                                    <option value="2018/2019">2018/2019</option>
                                                                    <option value="2019/2020">2019/2020</option>
                                                                    <option value="2020/2021">2020/2021</option>
                                                                    <option value="2021/2022">2017/2018</option>

                                                                 </select>
                                                            </div>
                                                                 <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-end-date="0d" data-date-start-date = "0d">
                                                                        <label for="">From:  <span class="required">*</span></label>
                                                                            <input type="text" name="from" id="from" class="form-control" readonly="readonly" required="required"/>
                                                                                <span class="input-group-btn"><button class="btn default" type="button"> <i class="fa fa-calendar"></i></button>
                                                                                </span>
                                                                    </div>
                                                                        <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-end-date="" data-date-start-date = "30d">
                                                                            <label for="">To:  <span class="required">*</span></label>
                                                                                <input type="text" name="to" id="to" class="form-control" readonly="readonly" required="required"/>
                                                                                    <span class="input-group-btn"><button class="btn default" type="button"> <i class="fa fa-calendar"></i></button>
                                                                                    </span>
                                                                        </div>
                                                </div>
                                                      <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success" name = "update">Save changes</button>
                                                        </div>
                                        </form>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </div>



        <!--end modal to update student profile -->

        </ul>
      </div>
    </nav>
  </header>

