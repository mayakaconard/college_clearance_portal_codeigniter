

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Section Administrators</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="dashboard"><i class="fa fa-dashboard"></i> System Admins</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
                   <div class="panel panel-primary">
                            <div class="panel-heading">Create new Section Administrator</div>
                            <div class="panel-body">
                                <div class="register-box-body">
                                    <div class="row">

                                    </div>
                                     <?php
                                         if(isset($_SESSION['success'])){
                                             echo  $_SESSION['success'];

                                        }
                                         elseif(isset($_SESSION['error'])){
                                            echo $_SESSION['error'];
                                         }

                                    ?>
                                     <form id="section_admin" method="post" enctype="multipart/form-data"  action = "<?php echo base_url('Admin/add_admin'); ?>">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="first_name">First Name: <span class="required">*</span> </label>
                                                    <input type="text" class="form-control" required="required" placeholder="First Name" name="first_name" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="middle_name">Middle Name: <span class="required"></span> </label>
                                                    <input type="text" class="form-control"  placeholder="Middle Name" name="middle_name" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="middle_name">Surname: <span class="required">*</span> </label>
                                                    <input type="text" class="form-control" required="required" placeholder="Surname" name="surname" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="gender">Gender: <span class="required">*</span> </label>
                                                    <select class="form-control" required="required" id="gender" name="gender">
                                                    <option>----SELECT GENDER---</option>
                                                    <option value="M">Male</option>
                                                    <option value="F">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="email">Email: <span class="required">*</span> </label>
                                                        <input type="email" class="form-control" required="required" placeholder="Email" name="email" />
                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="id">Id Number: <span class="required">*</span> </label>
                                                    <input type="number" class="form-control" required="required" placeholder="ID Number" name="id" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                              <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="pfnumber">PF Number: <span class="required">*</span> </label>
                                                    <input type="text" class="form-control" required="required" placeholder="Pf Number" name="pfnumber" />
                                                </div>
                                            </div>
                                          <div class="col-md-4">
                                              <div class="form-group">
                                                <label for="section">Section: <span class="required">*</span></label>
                                                  <select class="form-control" required="required" id="section" name="section">
                                                    <option>----SELECT SECTION---</option>
                                                    <?php
                                                    foreach($sections as $sec){
                                                        ?>
                                                            <option value="<?php echo $sec['section_id']; ?>" ><?php echo $sec['section']; ?></option>
                                                             <?php
                                                    }
                                                    ?>
                                                      </select>

                                            </div>
                                          </div>
                                        </div>

                                        <div class="form-actions">
                                        <div class="row">
                                        <div class="col-md-12">
                                        <div class="row">
                                        <div class="col-md-offset-1 col-md-11">
                                        <button type="submit" name="new_admin" class="btn btn-info">Submit</button>
                                        <button type="reset" class="btn btn-warning">Cancel</button>
                                        </div>
                                        </div>
                                        </div>
                                        <div class="col-md-6"> </div>
                                        </div>
                                    </div>
              </form>

                                </div>
                            </div>



                        </div>
            <!-- /.row -->
                <div class="row">

                <!-- /.col -->
                </div>
            <!-- Main row -->



        </section>
        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
                       