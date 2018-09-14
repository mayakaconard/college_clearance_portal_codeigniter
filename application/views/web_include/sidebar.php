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
                    <a href="<?php echo site_url();?>Admin/Dashboard">
                        <i class="fa fa-home"></i> <span>Dashboard</span>

                    </a>
                </li>

                 <li class="treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>System</span>
                        <span class="pull-right-container">
                            <span class="fa fa-angle-left pull-right"></span>
                        </span>
                    </a>
                    <ul class="<?php if($page_link != '' && $page_link == 'Status' || $page_link=='Announcements'){echo 'active';}?>treeview-menu">
                        <li><a href="<?php echo site_url(); ?>Admin/Status"><i class="fa fa-circle-o"></i>Clearance status</a></li>
                        <li><a href="<?php echo site_url(); ?>Admin/Announcements"><i class="fa fa-circle-o"></i> Make Announcement</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                            <i class="fa fa-files-o"></i>
                            <span>Staff</span>
                            <span class="pull-right-container">
                                    <span class="fa fa-angle-left pull-right"></span>
                            </span>
                    </a>
                    <ul class="<?php if($page_link != '' && $page_link == 'Deans' ){echo 'active';}?>treeview-menu">
                            <li><a href="<?php echo site_url(); ?>Admin/Deans"><i class="fa fa-circle-o"></i>School Deans</a></li>
                            <li><a href="<?php echo site_url(); ?>Admin/Section_admins"><i class="fa fa-circle-o"></i>Section Admins</a></li> 
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>Students</span>
                        <span class="pull-right-container">
                            <span class="fa fa-angle-left pull-right"></span>
                        </span>
                    </a>
                    <ul class="<?php if($page_link != '' && $page_link == 'new_student'||$page_link == 'Bank_details' ){echo 'active';}?>treeview-menu">

                        <li><a href="<?php echo site_url(); ?>Admin/new_student"><i class="fa fa-circle-o"></i>  Add Student</a></li>
                        <li><a href="<?php echo site_url(); ?>Admin/Bank_details"><i class="fa fa-circle-o"></i>  Bank Details</a></li>


                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>Sections</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="<?php if($page_link != '' && $page_link == 'Sections'){echo 'active';}?>treeview-menu">
                        <li><a href="<?php echo site_url(); ?>Admin/Sections"><i class="fa fa-circle-o"></i> View Sections</a></li>
                              <!--
                        <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Add Section</a></li>
                        <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Add Section</a></li>
                        -->
                    </ul>
                </li>
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
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-edit"></i> <span>Sections Module</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="<?php if($page_link != '' && $page_link=='Student_Arares'|| $page_link=='Student_ViewArares'){echo 'active';}?>treeview-menu">
                        <!--<li><a href="<?php echo site_url(); ?>Admin/Update_Arares"><i class="fa fa-circle-o"></i> Update Student Record</a></li> -->
                        <li><a href="<?php echo site_url(); ?>Admin/Student_Arares"><i class="fa fa-circle-o"></i> Input Student arrears</a></li>
                         <li><a href="<?php echo site_url(); ?>Admin/Student_ViewArares"><i class="fa fa-circle-o"></i> Manage Arrears</a></li>

                    </ul>
                </li>




            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>