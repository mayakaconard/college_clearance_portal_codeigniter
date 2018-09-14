<!-- =============================================== -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Student Details</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php
                                 if(isset($_SESSION['success'])){
                                     echo  $_SESSION['success'];

                                }
                                 elseif(isset($_SESSION['error'])){
                                    echo $_SESSION['error'];
                                 }

                            ?>
        </div>
       <!-- <div class="col-md-4">
            <a  class="btn btn-success mybank" >Bank Details</a>
        </div>-->
        <br/>
        <br/>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-education"></span>&nbsp;&nbsp;MY DETAILS</div>
            <div class="panel-body">

                <?php
            foreach($student->result_array() as $st){
            $firstname=strtoupper($st['first_name']);
            $middlename=strtoupper($st['middle_name']);
            $surname=strtoupper($st['surname']);
            $email=strtoupper($st['email']);
            $gender=strtoupper($st['gender']);
            $id=$st['id_number'];
            $school=strtoupper($st['school_name']);
            $department=strtoupper($st['department']);
            $program=strtoupper($st['programme']);
            $reg=strtoupper($st['reg_number']);
        }
        ?>

                <form id="mydetails" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="col-md-3 col-lg-4">
                        <div class="form-group has-feedback">
                            <label>First Name:
                                <span class="required">*</span>
                            </label>
                            <input required name="fname" value="<?php echo $firstname; ?>" style="text-transform:uppercase" type="text" readonly="readonly"
                                class="form-control" placeholder="First name">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <!-- <div class="form-group has-feedback">
                        <label>Gender: <span class="required">*</span></label>
                        <input name="gender" type="text" value="<?php echo $gender; ?>" type="text"  class="form-control" placeholder="Middle name" style="text-transform:uppercase" required="required">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div> -->

                        <div class="form-group has-feedback">
                            <label>School:&nbsp;
                                <span class="required">*</span>
                            </label>
                            <input required name="school" type="text" id="school" value="<?php echo $school; ?>" type="text" disabled readonly="readonly"
                                class="form-control" placeholder="Surname" style="text-transform:uppercase">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Department:&nbsp;
                                <span class="required">*</span>
                            </label>
                            <input required name="department" type="text" id="department" value="<?php echo $department; ?>" type="text" readonly="readonly"
                                class="form-control" placeholder="Surname" style="text-transform:uppercase">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-4">
                        <div class="form-group has-feedback">
                            <label>Middle Name:
                                <span class="required">*</span>
                            </label>
                            <input name="middle_name" type="text" value="<?php echo $middlename; ?>" type="text" class="form-control" disabled="disabled"
                                placeholder="Middle name" style="text-transform:uppercase" required="required">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label>National ID/Passport:
                                <span class="required">*</span>
                            </label>
                            <input required name="id" type="text" disabled="disabled" id="id" class="form-control" maxlength="8" value="<?php echo $id;  ?>"
                                placeholder="ID Number" required="required">
                        </div>

                    </div>
                    <div class="col-md-3 col-lg-4">
                        <div class="form-group has-feedback">
                            <label>Last Name:&nbsp;
                                <span class="required">*</span>
                            </label>
                            <input required name="surname" type="text" id="surname" value="<?php echo $surname; ?>" type="text" readonly="readonly" class="form-control"
                                placeholder="Surname" style="text-transform:uppercase">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Email Address:
                                <span class="required">*</span>
                            </label>
                            <input required name="email" type="text" value="<?php echo $email; ?>" disabled="disabled" class="form-control" placeholder="Email"
                                style="text-transform:uppercase">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-4">
                        <div class="form-group has-feedback">
                            <label>Program:&nbsp;
                                <span class="required">*</span>
                            </label>
                            <input required name="program" type="text" id="program" value="<?php echo $program; ?>" type="text" readonly="readonly" class="form-control"
                                placeholder="Surname" style="text-transform:uppercase">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-4">
                        <div class="form-group has-feedback">
                            <label>Registration Number:&nbsp;
                                <span class="required">*</span>
                            </label>
                            <input required name="surname" type="text" id="surname" value="<?php echo $reg; ?>" type="text" readonly="readonly" class="form-control"
                                placeholder="Surname" style="text-transform:uppercase">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                    </div>
                    <!--    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-offset-1 col-md-11">
                                        <button type="submit" name="updatedetails" class="btn btn-info">Submit</button>
                                        <button type="reset" class="btn btn-warning">Cancel</button>
                                        </div>
                                </div>
                                </div>
                        </div>
                    </div>   -->



                </form>



            </div>
        </div>
        <!--END PAGE CONTENT -->


        <!-- Bank Details -->
        <?php
        if($bank_check){
           ?>

           <?php
        }
        else{

        ?>

             <div class="panel panel-primary">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-education"></span>&nbsp;&nbsp;MY BANK DETAILS</div>
            <div class="panel-body">
                <form action="<?php echo base_url('Student/Bank_Details')?>" method="post" class="bank_details">
                            <div class="bank">
                                <div class="row">
                           <div class="col-md-3 col-lg-4">
                        <div class="form-group has-feedback">
                            <label>Bank Name:&nbsp;
                                <span class="required">*</span>
                            </label>
                            <input required name="bank_name" type="text" id="Bank_name" value="<?php //echo $program; ?>" type="text" class="form-control"
                                placeholder="Bank Name" style="text-transform:uppercase">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                    </div>
                        <div class="col-md-3 col-lg-4">
                                                <div class="form-group has-feedback">
                                                        <label>Bank Branch:&nbsp;
                                                                <span class="required">*</span>
                                                        </label>
                                                        <input required name="bank_branch" type="text" id="bank_branch" value="<?php //echo $program; ?>" type="text"  class="form-control"
                                                                placeholder="Bank Branch " style="text-transform:uppercase">
                                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                </div>
                                        </div>
                                            <div class="col-md-3 col-lg-4">
                                                <div class="form-group has-feedback">
                                                        <label>Bank Account No. :&nbsp;
                                                                <span class="required">*</span>
                                                        </label>
                                                        <input required name="account" type="number" id="account" value="" type="text"  class="form-control"
                                                                placeholder="Account Number" style="text-transform:uppercase">
                                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                </div>
                                        </div>

                                        </div>
                                        </div>

                                        <div class="row">
                                          <div class="col-md-3 col-lg-4">
                                                <div class="form-group has-feedback">
                                                        <label>Level :&nbsp;
                                                            <span class="required">*</span>
                                                        </label>
                                                        <select class="form-control" name="level" id="level">
                                                            <option>SELECT LEVEL</option>
                                                            <option value="1000" id="under">DEGREE/DIPLOMA</option>
                                                            <option value="3000" id="post">MASTERS</option>
                                                        </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-lg-4">
                                                <div class="form-group has-feedback">

                                                        <label>Amount :&nbsp;
                                                            <span class="required">*</span>
                                                        </label>

                                                        <input required name="amount" type="number" id="amount" value="" type="text" disabled="disabled"  class="form-control"
                                                            placeholder="Amount" style="text-transform:uppercase">
                                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="row">
                                <div class="col-md-4">
                                    <button class="btn btn-warning" type="submit" name="submit" id="submit">Save</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                </div>
                            </div>



                </form>

            </div>
        </div>
        <!-- Bank Details end -->
        <?php


        }
        ?>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script >
   $('#level select').change(function () {
    $("#under select:selected").each(function(){
        if ($(this).val() == "undergraduate")
        {
            $('#amount input').val('See Prior Filing');
            $('#q304').hide(); //this hides the add button
        }
        else if ($('#q306 input').val() === 'See Prior Filing')
            $('#q306 input').val('')
        $('#q304').show(); //this shows the add button
    });
}) ;
</script>