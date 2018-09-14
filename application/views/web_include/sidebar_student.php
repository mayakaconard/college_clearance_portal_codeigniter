<?php
$page_link = pathinfo(curPageURL(),PATHINFO_FILENAME);
function curPageURL() {
    $pageURL = 'http';
    if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}
?>

  <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->


            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
               <li class="active">
                    <a href="<?php echo site_url();?>Student/Dashboard">
                        <i class="fa fa-home"></i> <span>Dashboard</span>

                    </a>
                </li>
                  <?php
                  if($clearance_dates==5){
                  ?>

                 <li class="treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>My Details</span>
                        <span class="pull-right-container">
                            <span class="fa fa-angle-left pull-right"></span>
                        </span>
                    </a>
                    <ul class="<?php if($page_link != '' && $page_link == 'StudentDetails'){echo 'active';}?>treeview-menu">
                        <li><a href="<?php echo site_url(); ?>Student/StudentDetails"><i class="fa fa-circle-o"></i>My Details</a></li>
                        <!--<li><a href="<?php echo site_url(); ?>Student/BankDetails"><i class="fa fa-circle-o"></i> My Bank Details</a></li> -->
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>View Sections</span>
                        <span class="pull-right-container">
                            <span class="fa fa-angle-left pull-right">
                            </span>
                        </span>
                    </a>
                    <ul class="<?php if($page_link != '' && $page_link == 'Departments_notclered'){echo 'active';}?>treeview-menu">

                        <li><a href="<?php echo site_url(); ?>Student/Departments_notclered"><i class="fa fa-circle-o"></i>Uncleared Sections
                               <span class="pull-right-container">
                                    <small class="label pull-right bg-red">
                                     <?php echo number_format($notCleared); ?>
                                    </small>
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>Clearance</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="<?php if($page_link != '' && $page_link == 'Clearance'){echo 'active';}?>treeview-menu">
                        <li><a href="<?php echo site_url(); ?>Student/Clearance"><i class="fa fa-circle-o"></i> Clear Me</a></li>
                    </ul>
                </li>

                 <?php
                  }
                  else if($clearance_dates==4){
                      ?>

                        <li class="treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>Sections Clearance</span>
                        <span class="pull-right-container">
                            <span class="fa fa-angle-left pull-right">
                            </span>
                        </span>
                    </a>
                    <ul class="<?php if($page_link != '' && $page_link == 'Departments_notclered'){echo 'active';}?>treeview-menu">

                        <li><a href="<?php echo site_url(); ?>Student/Departments_notclered"><i class="fa fa-circle-o"></i>Uncleared Sections
                               <span class="pull-right-container">
                                    <small class="label pull-right bg-red">
                                     <?php echo number_format($notCleared); ?>
                                    </small>
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                      <li class="treeview">
                    <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span>Notifications</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href=""><i class="fa fa-circle-o"></i> Clearance Closed</a></li>

                    </ul>
                </li>

                      <?php
                  }
                  ?>
                     <!--
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span>Notifications</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="student_view"><i class="fa fa-circle-o"></i> Clearance dates</a></li>
                        <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Gown Picking </a></li>


                    </ul>
                </li>
                -->
                <!--<li class="treeview">
                    <a href="#">
                        <i class="fa fa-edit"></i> <span>Sections Module</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo site_url(); ?>Student/print_sections"><i class="fa fa-circle-o"></i> Test pdf</a></li>
                      <li><a href="<?php echo site_url(); ?>Student/send_mail"><i class="fa fa-circle-o"></i> test_email</a></li>
                           <li><a href="<?php echo site_url(); ?>Admin/Student_ViewArares"><i class="fa fa-circle-o"></i> View Student arares</a></li>

                    </ul>
                </li>-->




            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>