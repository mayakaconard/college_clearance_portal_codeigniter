

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Arares</small>
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
                   <div class="panel panel-primary">
                            <div class="panel-heading">Add Section</div>
                            <div class="panel-body">
                                <div class="register-box-body">
                                    <div class="row">

                                    </div>
                                    <div class="error">


                                    </div>
                                     <form id="register" method="post" enctype="multipart/form-data" autocomplete="off">
                                          <div class="col-md-4 col-lg-6">
                                          <div class="form-group">
                                            <label for="county"><span class="required">*</span></label>
                                              <select class="form-control" required="required" id="county" name="county">
                                                <option value=""><?php //echo $c['county_name'];  ?></option>
                                                                  <?php /*
                                                                  //populate the county SELECT option
                                                      $county = $conn->prepare("SELECT * FROM county");
                                                      $county->execute();
                                                      for($i=1;$rows=$county->fetch(PDO::FETCH_ASSOC);$i++)
                                                                                   {
                                                           */
                                           ?>
                                           <option value="<?php //echo $rows['county_number'];?>"><?php //echo $rows['county_name'];?></option>
                                               <?php// }?>


                      </select>
              </div>
                 <div class="form-group">
                <label for="gender">Department: <span class="required">*</span></label>
                  <select class="form-control" required="required" id="gender" name="gender">
                    <option value =""><?php //echo $row["gender"]; ?></option>
                           <option value="MALE"   >Comp</option>
                         <option value="FEMALE" >IT</option>
                      </select>

              </div>
                      <div class="form-group">
                <label for="gender">Section: <span class="required">*</span></label>
                  <select class="form-control" required="required" id="gender" name="gender">
                    <option value =""><?php //echo $row["gender"]; ?></option>
                           <option value="MALE"   >LIB</option>
                         <option value="FEMALE" >ICT</option>
                      </select>

              </div>


                </div>
                <div class="col-md-4 col-lg-6">
              <div class="form-group">
                <label for="student">Student: <span class="required">*</span></label>
                  <select class="form-control" required="required" id="gender" name="gender">
                    <option value =""><?php //echo $row["gender"]; ?></option>
                           <option value="MALE"   >COM/0038/14</option>

                      </select>

              </div>

              <div class="form-group has-feedback">
              <label>Student Arares:&nbsp;<span class="required">*</span></label>
                <input required name="surname" type="text" id = "arares"value="<?php //echo $row['surname']; ?>" type="text"  class="form-control" placeholder="Arares" style="text-transform:uppercase">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
              </div>

              <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-end-date="0d">
                <label for="">Date:  <span class="required">*</span></label>
                    <input type="text" name="arares" id="arares" class="form-control" readonly="readonly" value="<?php //echo $row['date_of_birth'];  ?>" required="required"/>
                        <span class="input-group-btn"><button class="btn default" type="button"> <i class="fa fa-calendar"></i></button>
                        </span>
        </div>


              </div>

                <div class="form-actions">
                <div class="row">
                <div class="col-md-12">
                <div class="row">
                <div class="col-md-offset-1 col-md-11">
                <button type="submit" name="updatedetails" class="btn btn-info">Submit</button>
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
