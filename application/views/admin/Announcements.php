


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Announcements</small>
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">
              <div class="row">
                  <div class="col-lg-4" >
               <button type="button" class="btn btn-success" data-toggle="modal"<a data-target="#add_announcements"  data-toggle="modal" href="add_announcements"></a>Make Announcement</button>
                   </div>
            </div></br>



                    <div class="row">

       <!--MODAL TO ADD ANNOUNCEMENTS INTO THE DATABASE -->
 <div class="modal fade" id="add_announcements"  role="dialog" aria-labelledby="add_announcements" aria-hidden="true" >
            <div class="modal-dialog">
                    <div class="modal-content" style="background-color: #6495ED">
                        <form name="announcements" id="announcements" action="<?php echo base_url('Admin/post_Announcement');  ?>" method="post"   >
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title"> New Announcement</h4>
                                        </div>
                                            <div class="modal-body">
                                                <span id="respy3"> </span>
                                                    <div class="form-group">
                                                         <label for="title"> Title: <span class="required">*</span></label>
                                                         <input required type="text" name = "title" class="form-control" id="title" placeholder="Title of Announcement">
                                                             </div>
                                                             <div class="form-group">
                                                         <label for="Subject"> Subject: <span class="required">*</span></label>
                                                    <textarea class="form-control" id="subject" name="subject" placeholder="Subject"></textarea>

  </div>
                                               <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-end-date="0d" data-date-start-date = "0d">
                                                        <label for="">Date:  <span class="required">*</span></label>
                                                            <input type="text" name="date" id="date" class="form-control" readonly="readonly" value="<?php //echo $row['date_of_birth'];  ?>" required="required"/>
                                                                <span class="input-group-btn"><button class="btn default" type="button"> <i class="fa fa-calendar"></i></button>
                                                                </span>
                                                    </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" name = "announcement">Save changes</button>
      </div>
        </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
          <!-- /.modal-dialog -->
        </div>
        <!-- /.END OF ANNOUNCEMENT MODAL -->


            <!-- Small boxes (Stat box) -->
                   <div class="panel panel-primary">
                            <div class="panel-heading">Announcements</div>
                            <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-condensed table-hover">
                                              <thead>
                                                  <tr>
                                                  <th>No.</th>
                                                  <th>Title</th>
                                                  <th>Subject</th>
                                                  <th>Date</th>
                                                  <th style="width: 100px;">Action</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                  <tr>
                                                             <?php
                                                             $count=1;
                                                             foreach($announcement as $ann){
                                                                 ?>

                                                      <td><ol><?php echo $count; ?></ol></td>
                                                      <td><?php echo $ann['title'];?></td>
                                                      <td><?php echo $ann['subject'];?></td>
                                                      <td><?php echo $ann['date_issued'];?></td>

                                                               <td style="width: 150px;">
                                                            <div class="btn-group">
                                                            <a data-toggle="modal" data-target="#editAnnouncement<?php echo $ann['ann_id']; ?>" class="btn btn-success">Update</a>
                                                            <a data-toggle="modal" data-target="#delete<?php echo $ann['ann_id']; ?>" class="btn btn-danger">Delete</a></div>

                                     <!-- DELETE ANNOUNCEMENT-->
                            <div class="row">
                                 <div class="row">
                                        <div id="delete<?php echo $ann['ann_id']; ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Delete</h4>
                                                            </div>
      	                                                 <div class="modal-body">
                                                        <p><div style="font-size:larger;">Are you Sure you want Delete <b style="color:red;">This Announcement?</b> </p></div>
                                                 </div>
                                          	     <div class="modal-footer">
                                                    <button class="btn btn-info" data-dismiss="modal" aria-hidden="true">No</button>
                                                    <a href="<?php echo base_url('Admin/deleteAnnouncement/'.$ann['ann_id']); ?>" class="btn btn-danger">Yes</a>
                                                </div>
                                            </div>

                                        </div>
                                   </div>
                            </div>
                        <div class="row">
                                   <!--MODAL TO UPDATE ANNOUNCEMENTS INTO THE DATABASE -->
                             <div class="modal fade" id="editAnnouncement<?php echo $ann['ann_id']; ?>"  role="dialog" aria-labelledby="editAnnouncements" aria-hidden="true" >
                                        <div class="modal-dialog">
                                                <div class="modal-content" style="background-color: #6495ED">
                                                    <form name="editAnnouncements" id="Announcements" action="<?php echo base_url('Admin/updateAnnouncement/'.$ann['ann_id']);?>" method="post">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title"> Update Announcement</h4>
                                                                    </div>
                                                                        <div class="modal-body">
                                                                            <span id="respy3"> </span>
                                                                                <div class="form-group">
                                                                                     <label for="title"> Title: <span class="required">*</span></label>
                                                                                     <input required type="text" name = "title" class="form-control" id="title" value = "<?php echo $ann['title'];  ?>">
                                                                                      </div>
                                                                                         <div class="form-group">
                                                                                            <label for="Subject"> Subject: <span class="required">*</span></label>
                                                                                               <textarea class="form-control" id="subject" name="subject" ><?php echo $ann['subject'];  ?></textarea>
                                                                                          </div>
                                                                                         <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-end-date="0d" data-date-start-date = "0d">
                                                                                    <label for="">Date:  <span class="required">*</span></label>
                                                                                   <input type="text" name="date" id="date" class="form-control" readonly="readonly" value = "<?php echo $ann['date_issued'];  ?>" required="required"/>
                                                                                <span class="input-group-btn"><button class="btn default" type="button"> <i class="fa fa-calendar"></i></button>
                                                                               </span>
                                                                            </div>
                                                                        </div>
                                                                     <div class="modal-footer">
                                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-success" name = "announcement">Save changes</button>
                                                             </div>
                                                    </form>
                                                </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                                      <!-- /.modal-dialog -->
                        </div>
                                    <!-- /.END OF ANNOUNCEMENT UPDATE MODAL -->

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
