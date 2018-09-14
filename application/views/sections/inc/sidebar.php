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
                    <a href="<?php echo site_url();?>Sections/Dashboard">
                        <i class="fa fa-home"></i> <span>Dashboard</span>

                    </a>
                </li>






              
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-edit"></i> <span>Sections Module</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="<?php if($page_link != '' && $page_link=='Student_Arares'|| $page_link=='Student_ViewArares'){echo 'active';}?>treeview-menu">
                        <!--<li><a href="<?php echo site_url(); ?>Sections/Update_Arares"><i class="fa fa-circle-o"></i> Update Student Record</a></li> -->
                        <li><a href="<?php echo site_url(); ?>Sections/Student_Arares"><i class="fa fa-circle-o"></i> Input Student arrears</a></li>
                         <li><a href="<?php echo site_url(); ?>Sections/Student_ViewArares"><i class="fa fa-circle-o"></i> Manage Arrears</a></li>

                    </ul>
                </li>




            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>