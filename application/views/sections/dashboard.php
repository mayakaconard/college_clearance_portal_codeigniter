


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

      <!-- /.row -->
        <div class="row">
             <div class="col-md-12">
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Admin Widget</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->


                    <div style="display: block;" class="box-body">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                              <div class="inner">

                                <h3><?php echo number_format($allStudents); ?></h3>
                                <h4>Registered Students</h4>
                              </div>
                              <div class="icon">
                                <div class="icon"> <img height="80" width="80" src="<?php echo base_url();?>clearance/img/comittee.png"></a> </div>
                              </div>
                              <a href="" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                              </a>
                            </div>
                        </div><!-- ./col -->


                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                              <div class="inner">
                                <h3><?php echo number_format($cleared); ?></h3>
                                <h4>Cleared Students</h4>
                              </div>
                              <div class="icon">
                                <div class="icon"> <img height="80" width="80" src="<?php echo base_url();?>clearance/img/room.png"></a> </div>
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
                                <h4>Students Not Cleared</h4>
                              </div>
                              <div class="icon">
                                <div class="icon"> <img height="80" width="80" src="<?php echo base_url();?>clearance/img/inquiry.png"></a> </div>
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
                                <h3>0</h3>
                                <h4>Clearance Issues</h4>
                              </div>
                              <div class="icon">
                                <div class="icon"> <img height="80" width="80" src="<?php echo base_url();?>clearance/img/symbol-error.png"></a> </div>
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
        </div>

    </section>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->
