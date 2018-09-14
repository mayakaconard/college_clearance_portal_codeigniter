

<!--  <div class="pull-left">
<img src=<?php echo base_url();?>"clearance/dist/stamps/stamp.PNG" class="img-circle">
</div>      -->


      <link rel="stylesheet" href="<?php echo base_url(); ?>clearance/assets/pdflayout.css">
    <body>
        <div class="container" >
              <div class="row-fluid " style="padding-left:10%; padding-right:-5%;" >
                  <div class="span6 pull-left" style="text-align:left;margin-top:-20px;">
                	<?php
                	if($img_url)
                	{
                	?>
                    <img src="<?php echo base_url('clearance/qr_images/'.$img_url); ?>" height="80px" width="80px" >
                	<?php
                	}
                	?>
                    </div>
            </div>
            <div class="row-fluid "  >
                <img src="clearance/dist/stamps/logo1.png" style="padding-left:39%" alt="School Logo" class="logo" width="120" height="100"/>
                <h3 style="padding-top:0px; padding-left:16%; ">MASINDE MULIRO UNIVERSITY OF SCIENCE & TECHNOLOGY </h3>
                <h4 style="padding-left:26%;">Office of the Registrar, Academics Affairs</h4>
            </div>
            <div class="row-fluid"  style="padding-left:10%; padding-right:-5%;">
               <div class="span6 pull-left" style="text-align:left;margin-top:-20px;"><br/>
                   Tel. No: 020-2063540 <br/>
                   Email: <u> info@mmust.ac.ke</u><br/>
                   Website: <u>www.mmust.ac.ke</u><br/>
                </div>

                 <div class="span6" style="text-align:left; padding-left:74%; margin-top:-65px; ">P.O Box 190 <br/>
                                               Kakamega-50100 <br/>
                                               Kenya.<br/>
                </div>
           </div>
           <div class=" row-fluid1"  style="padding-left:10%; padding-right:-5%;"><hr/>  </div>
           <div class=" row-fluid1"  style="padding-left:10%; padding-right:-5%;" style="text-align:center"><br/>
                <div style="padding-left:10%; padding-right:-5%;" >
                    <u><strong>CERTIFICATE OF CLEARANCE IN COMPLETION/TERMINATION OF STUDIES</strong></u>
                </div>
            </div>
            <br/>
               <div class=" row-fluid1"  style="padding-left:10%; padding-right:-5%;" style="text-align:left"><br/>
                            <div style="padding-left:10%; padding-right:-5%;" >
                                 <div style="padding-left:10%; padding-right:-5%;" >
                                        <?php
                                        foreach($details as $me):
                                                $firstname=$me['first_name'];
                                                $middlename=$me['middle_name'];
                                                $lastname=$me['surname'];
                                                $fullname=$firstname. ' '. $middlename.' '.$lastname;
                                                $reg_number=$me['reg_number'];
                                                $school=$me['school_name'];
                                                $department=$me['department'];
                                                $course=$me['programme'];


                                                ?>

                                        <strong>NAME:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u><?php echo strtoupper($fullname); ?></u></strong> <br/>
                                        <strong>REG.NO:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u><?php echo strtoupper($reg_number); ?></u></strong>  <br/>
                                        <strong>SCHOOL:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u><?php echo $school; ?></u></strong>  <br/>
                                        <strong>DEPARTMENT:&nbsp;&nbsp;&nbsp;<u><?php echo $department; ?></u></strong> <br/>
                                        <strong>CERT/DIPLOMA/DEGREE/MASTERS/Ph.D:&nbsp;&nbsp;<u><?php echo strtoupper($course); ?></u></strong>  <br/>
                                                    <?php endforeach ?>
                                </div>
                            </div>
                    </div>
            <br/>


           <div class="row-fluid " style="padding-left:10%; padding-right:-5%;">
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
        </div>
    </div>
</body>

