<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Clearance</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="dashboard">
                    <i class="fa fa-dashboard"></i> System Status</a>
            </li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->

        <!--START OF DISPLAY CLEARANCE DATES  -->
        <div class="panel panel-primary">
            <div class="panel-heading"><i class="fa fa-calendar"></i>&nbsp;&nbsp;System Clearance Status</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Academic Year</th>
                                <th>Open Date</th>
                                <th>Close Date</th>
                                <th>Status</th>
                                <th style="width: 100px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <?php
                                    $count=1;
                                    foreach($clearance as $clear)
                                    {
                                        ?>
                                <td>
                                    <?php echo $count; ?>
                                </td>
                                <td>
                                    <?php echo $clear['academic_year']; ?>
                                </td>
                                <td>
                                    <?php echo $clear['start_date']; ?>
                                </td>
                                <td>
                                    <?php echo $clear['end_date']; ?>
                                </td>
                                <td>
                                    <?php echo $clear['status']; ?>
                                </td>

                                <td style="width: 150px;">
                                    <div class="btn-group">
                                        <?php
                                        if($clear['status']=="Open"){
                                            ?>
                                        <a data-toggle="modal" data-target="#close<?php echo $clear['date_id'];  ?>" class="btn btn-danger">Close&nbsp;<i class="glyphicon glyphicon-lock"></i></a>
                                            <?php
                                               }
                                            else if($clear['status']=="Closed") {
                                                ?>

                                             <a data-toggle="modal" data-target="#open<?php echo $clear['date_id'];  ?>" class="btn btn-success">Open &nbsp;<i class="glyphicon glyphicon-check"></i></a>
                                             <a data-toggle="modal" data-target="#update<?php echo $clear['date_id'];  ?>" class="btn btn-warning">Update&nbsp;<i class="glyphicon glyphicon-edit"></i></a>
                                                <?php

                                        }
                                        ?>


                                    </div>


                                    <!-- ===========================CLOSE CLEARANCE==============================-->
                                    <div class="row">
                                        <div id="close<?php echo $clear['date_id'];?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">CLOSE Clearance</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>
                                                            <div style="font-size:larger;">Are you Sure you want to CLOSE
                                                                <b style="color:red;">Clearance</b> Process?</p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-info" data-dismiss="modal" aria-hidden="true">No</button>
                                                        <a href="<?php echo base_url('Admin/CloseClearance/'.$clear['date_id']);?>" class="btn btn-danger">Yes</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">

                                            <!-- ===============OPEN CLEARANCE SESSION=========================-->
                                            <div id="open<?php echo $clear['date_id'];?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">OPEN Clearance</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>
                                                                <div style="font-size:larger;">Are you Sure you want to OPEN
                                                                    <b style="color:red;">Clearance </b> Process?</p>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-info" data-dismiss="modal" aria-hidden="true">No</button>
                                                            <a href="<?php echo base_url('Admin/OpenClearance/'.$clear['date_id']);?>" class="btn btn-danger">Yes</a>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <!-- START UPDATE THE CLEARANCE DATES -->
                                            <div class="row">
                                                <div class="modal fade" id="update<?php echo $clear['date_id'];?>" tabindex="-1" role="dialog" aria-labelledby="update" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content" style="background-color: #6495ED;">
                                                            <form name="add_date" id="add_date" action="<?php echo base_url('Admin/set_date/'.$clear['date_id']);  ?>" method="post">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                    <h4 class="modal-title"> Clearance Date Set</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <span id="respy3"> </span>
                                                                    <div class="form-group">
                                                                        <label for="title"> Academic Year:
                                                                            <span class="required">*</span>
                                                                        </label>
                                                                        <?php
                                                                        $count=1;
                                                                        foreach($clearance as $clear)
                                                                        {
                                                                            ?>
                                                                        <select name="acyear" id="acyear" class="form-control" required="required">
                                                                            <option value=""><?php echo $clear['academic_year']; ?></option>
                                                                            <option value="2017/2018">2017/2018</option>
                                                                            <option value="2018/2019">2018/2019</option>
                                                                            <option value="2019/2020">2019/2020</option>
                                                                            <option value="2020/2021">2020/2021</option>
                                                                            <option value="2021/2022">2017/2018</option>

                                                                        </select>
                                                                    </div>
                                                                    <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-end-date="0d" data-date-start-date="0d">
                                                                        <label for="">From:
                                                                            <span class="required">*</span>
                                                                        </label>
                                                                        <input type="text" name="from" id="from" class="form-control" readonly="readonly" required="required" value="<?php echo $clear['start_date'];?>"/>
                                                                        <span class="input-group-btn">
                                                                            <button class="btn default" type="button">
                                                                                <i class="fa fa-calendar"></i>
                                                                            </button>
                                                                        </span>
                                                                    </div>
                                                                    <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-end-date="" data-date-start-date="30d">
                                                                        <label for="">To:
                                                                            <span class="required">*</span>
                                                                        </label>
                                                                        <input type="text" name="to" id="to" class="form-control" readonly="readonly" required="required"  value="<?php echo $clear['end_date'];?>"/>
                                                                        <span class="input-group-btn">
                                                                            <button class="btn default" type="button">
                                                                                <i class="fa fa-calendar"></i>
                                                                            </button>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <?php }?>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-success" name="add_date">Save changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->
                                            </div>
                                            <!-- /row -->

                                            <!-- END OF UPDATING CLEARANCE DATES -->




                                </td>

                            </tr>
                            <?php
                                                   $count++;
                                                      }


                                                      ?>

                        </tbody>
                    </table>

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