
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Clearance Zone</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Clearance Zone</a></li>
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
                  <h3 class="box-title">Clearance</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->

                 <?php

                                 if($student){
                                     ?>
        <div class="">
            <!-- /.box-header -->
            <div class="box-body">
                  <div class="callout callout-danger">
                    <h4>Clearance Alert! </h4>
                                 <?php

                                 foreach($user as $reg){
                                     ?>


                    <p>Dear <?php  echo strtoupper($reg['first_name'].' '.$reg['surname']);  ?>, We regret to Report to you that you can not be cleared Here Unless you Clear from All the required Sections!</p>
                  </div>


            </div>
            <!-- /.box-body -->
        </div>
          <!-- /.box -->
                                     <?php
                                 }
                                 }
                                 else{

                                 if($check_clear){
                                     ?>


        <div class="col-md-12">
            <!-- /.box-header -->
            <div class="box-body">
                  <div class="callout callout-success">
                    <h4>Clearance Alert! </h4>
                    <p style="font-size: 20px;">We are glad to Report that you are cleared.Please <b style="font-size: 24px;"><i>Check your email for your clearance Certificate</i></b>. Proceed with Graduation.  </p>
                  </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.col -->
       <div class="row">
               <?php
                  }
                  else{
               ?>

            <form action="<?php echo base_url('Student/Auto_Clearance');  ?>" method="post">

                <div class="col-md-4">
                    <button class="btn btn-warning" type="submit" name="clear_me" id="clear_me">Clear Me</button>
                    
                </div>
            </form>
        </div>

<!--
          <table class="table table-bordered">
             <thead>
             <tr>
                 <th>NO.</th>
                <th>SECTION</th>
                <th>REMARKS</th>
                <th>SIGN</th>

             </tr>
             </thead>
             <tbody>
                 <?php

                  foreach($clear as $row):
                   $id=$row['section_id'];
                   $section=$row['section'];
                   $comment=$row['comment'];

                 ?>

               <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $section; ?></td>
               <td><?php echo $comment; ?></td>
                <td><img src="<?php echo base_url();?>clearance/dist/stamps/clearance.PNG" alt="" width="70" height="70"/></td>


               </tr>
                    <?php
                    endforeach;
                    ?>
         </tbody>
                </table>
-->
                  <?php
                                 }
                                  }
                                 ?>
      <!-- Main row -->
              </div>
             </div>
        <!-- /.col -->
        </div>
      <!-- Main row -->




    </section>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->
