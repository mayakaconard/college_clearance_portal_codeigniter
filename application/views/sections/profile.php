
      <!-- =============================================== --><!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       <section class="content-header">
          <h1>
                Dashboard
                <small>Profile</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">


  <div class="row">
    <span style="visibility:visible;">   </span>
    </div>
    <br/>


 <div class="col-lg-6">

    <div class="panel panel-primary">
     <div class="panel-heading">My Profile</div>
     <div class="panel-body">
    	<div class="register-box-body">
          <div class="row"></div>
                <?php foreach($user as $row){
                $firstname=$row['first_name'];
                $mname=$row['middle_name'];
                $surname=$row['surname'];
                $email=$row['email'];


                }
                ?>

            <form action="" method="post" enctype="multipart/form-data" >
            <input type="hidden" name="lu_id" value="1">
              <div class="form-group has-feedback">
                <input required name="fname" type="text" class="form-control" disabled placeholder="First name" value="<?php echo $firstname; ?>">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
              </div>
               <div class="form-group has-feedback">
                <input  name="mname" type="text" class="form-control" placeholder="Middle name" disabled  value="<?php echo $mname; ?>">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
              </div>
               <div class="form-group has-feedback">
                <input required name="lname" type="text" class="form-control" placeholder="Last name"  disabled  value="<?php echo $surname; ?>">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input required name="email" type="email" class="form-control" placeholder="Email"  disabled  value="<?php echo $email; ?>">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
              </div>

              <div class="form-group has-feedback">
              <label> Passport</label>
                <input required name="passport" type="file" class="form-control">
                <span class="glyphicon glyphicon-file form-control-feedback"></span>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  <input name="update" type="submit" class="btn btn-warning btn-block btn-flat" value="update" />
                </div><!-- /.col -->
              </div>
            </form>

      </div><!-- /.form-box -->

      </div>
      </div>
    </div><!--   end of first half -->


        <!--END PAGE CONTENT -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
