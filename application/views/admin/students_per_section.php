

      <!-- =============================================== --><!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       <section class="content-header">
          <h1>
                Dashboard
                <small>Student/school/section</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

  <div class="row">
    <span id="news_scroller" style="visibility:visible;"><marquee>  Filter Students per Section And School For Update </marquee> </span>
    </div>

    	<br/>

<div class="row">
 <div class="col-md-12">
              <div class="panel panel-primary">
                 <div class="panel-heading"><span class="glyphicon glyphicon-education"></span>&nbsp;STUDENTS FILTER PER SCHOOL AND SECTION</div>
     <div class="panel-body">
                <div style="display: block;" class="box-body">
                       <h4 class="form-section">Stuednts Filter</h4>
                       <hr>
              <form class="form-vertical" action="student_vew" method="get" enctype="multipart/form-data">
             <div class="col-md-6">
                   <div class="form-group has-feedback">
                  <label for="">School Name:</label>
                   <select class="form-control" required="required" id="campus" name="campus">
                    <option value="">~~Select School~~</option>
                 <?php  /*
                     $campus = $conn->prepare("SELECT * FROM institution");
                     $campus->execute();
                     while($row = $campus->fetch(PDO::FETCH_ASSOC)) {

                     */
                      ?>
                    <option value="<?php // echo $row['institution_id']; ?>"><?php //echo $row['institution_name']; ?></option>
                    <?php //} ?>
                </select>
              </div>
              </div>

                    <div class="col-md-6">
                   <div class="form-group has-feedback">
                  <label for="">Section Name</label>
                   <select class="form-control" required="required" id="campus" name="campus">
                    <option value="">~~Select Section~~</option>
                 <?php  /*
                     $campus = $conn->prepare("SELECT * FROM institution");
                     $campus->execute();
                     while($row = $campus->fetch(PDO::FETCH_ASSOC)) {

                     */
                      ?>
                    <option value="<?php // echo $row['institution_id']; ?>"><?php //echo $row['institution_name']; ?></option>
                    <?php //} ?>
                </select>
              </div>
              </div>

               <div class="col-md-12">
               <div class="form-actions">
                <div class="row">
                <div class="col-md-6">
                <div class="row">
                <div class="col-md-offset-3 col-md-9">
                <button type="submit" class="btn btn-info">Submit</button>
                <button type="reset" class="btn btn-warning">Cancel</button>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
              </form>

                    </div><!-- ./col -->

                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->

</div>


        <!--END PAGE CONTENT -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->  
