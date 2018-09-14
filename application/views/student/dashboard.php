


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Home</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
           <!-- NOTIFICATION WINDOW -->
       <div class="row">
           <div class="col-lg-12">
               <?php
               if($clearance_dates==5){
                   ?>
                   <div class="alert alert-success"><marquee><b><i>Dear Student, the portal is open for clearance. Make Sure that you clear from all sections specified to earn your clearance certificate</i></b></marquee> </div>
                   <?php
               }
               else if($clearance_dates==4){
                   ?>
                   <div class="alert alert-danger"><marquee>Dear Student, Our Clearance portal is now closed. For any Queries and enquiries, Please contact the Administration</marquee> </div>
                   <?php
               }
               ?>

           </div>
       </div>
    <!-- END OF NOTIFICATION -->
      <!-- /.row -->
        <div class="row">
        <div class="col-md-12">
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Student Portal</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->


                    <div style="display: block;" class="box-body">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                              <div class="inner">

                                <?php if($check_clear){
                                  ?>
                                  <h3>Cleared</h3>


                                <?php
                                }
                                else{
                                  ?> 
                                    <h3>Not Cleared</h3>   
                                  <?php
                                
                                }
                                ?>
                                <h4>Status</h4>
                              </div>
                              <div class="icon">
                                <i class="fa fa-registered"></i>
                              </div>
                              <a href="" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                              </a>
                            </div>
                        </div><!-- ./col -->


                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                              <div class="inner">
                              
                                <h3><?php echo number_format($sections);  ?></h3>
                                <h4>Expected Sections</h4>
                              </div>
                              <div class="icon">
                                <i class="fa fa-graduation-cap"></i>
                              </div>
                              <a href="" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                              </a>
                            </div>
                        </div><!-- ./col -->

                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-orange">
                              <div class="inner">
                                <h3><?php echo number_format($notCleared); ?></h3>
                                <h4>Uncleared Sections</h4>
                              </div>
                            
                              <div class="icon">
                                <i class="fa fa-remove"></i>
                              </div>
                              <a href="<?php echo site_url(); ?>Student/Departments_notclered" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                              </a>
                            </div>
                        </div><!-- ./col -->

                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                              <div class="inner">
                                <h3>0</h3>
                                <h4>Clearance Issues</h4>
                              </div>
                              <div class="icon">
                                <i class="fa fa-question"></i>
                              </div>
                              <a href="" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                              </a>
                            </div>
                        </div><!-- ./col -->
        </div>
      <!-- Main row -->
              </div>
             </div>
        <!-- /.col -->
        </div>
      <!-- Main row -->
        <!-- START ACCORDION & CAROUSEL-->
          <div class="row">
        <div class="col-md-12">
                <div class="box box-success">
                  <div class="box-header with-border">
                    <h3 class="box-title">Student Guide</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box-tools -->
                  </div><!-- /.box-header -->

             <div class="box box-solid">
            <!-- /.box-header -->
              <div class="box-body">
                <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                  <div class="panel box box-primary">
                    <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        Clearance Procedure
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="box-body">
                         <ol>
                           <li>
                             Check your <b>Clearance status. </b> The items on the dashboard Displays your status, expected sections, cleared sections 
                           </li>
                           <li>
                            On the left menu, you can view your  <b>Personal and academic details in "My details" link </b> 
                          </li>
                          <li>
                            Check your <b>Clearance Progess. </b> by visiting the "Uncleared sections" to know which section you have arares 
                          </li>
                          <li>
                            If no queries from the above, then visit the <b>Clearance me. </b> Link and press the button to clear
                          </li>
                          <li>
                            N/B: <b>Getting certificate. </b> On clicking the "Clear Me button", a clearance certificate 
                            is sent to your Email. visit the email and download it to present where required
                          </li>
                          </ol>
                         
                         

                    </div>
                  </div>
                </div>
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        Expected clearance Sections
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="box-body">
                    Note that <b>ALL SECTIONS ARE MANDATORY. YOU MUST BE CLEARED FOR YOU TO OBTAIN YOUR CERTIFICATE</b>
                    </div>
                  </div>
                </div>
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                        Disclaimer
                      </a>
                    </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse">
                    <div class="box-body">
                      Clearance is done within the specified period of time specified by the administration.
                       Immediately the period is over, the system will close all functionalities. 
                       <p>
                        Therefore you are adviced to ensure that all the arares are met to enable you clear in time. 
                       </p>
                       <p><b>Thank you for choosing MMUST,<em> The university of choice</em></b></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        <!-- /.col -->
      </div>
      </div>
          </div>          <!--End row-->



    </section>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->
