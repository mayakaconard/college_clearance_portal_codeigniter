    <div class=" row-fluid1"  style="padding-left:10%; padding-right:-5%;" style="text-align:left"><br/>
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











                        <div class="row-fluid " style="padding-left:10%; padding-right:-5%;">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>NO.</th>
                            <th>SECTION</th>
                            <th>REMARKS</th>
                            <th>SIGN AND STAMP</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php foreach ($clearance as $row){

                             ?>
                        <tr>
                        <td><?php echo $row['section_id']; ?></td>
                        <td><?php echo $row['section']; ?></td>
                        <td><?php echo $row['comment']; ?></td>
                        <td><img src="clearance/dist/stamps/logo1.png" style="padding-left:39%" alt="School Logo" class="logo" width="100" height="100"/></td>
                       </tr>
                           <?php
                           }
                        // endforeach
                         ?>
                    </tbody>
                </table>
            </div>