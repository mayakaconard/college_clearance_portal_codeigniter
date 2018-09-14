<?php
require_once( '../library/mpdf.php');
$stylesheet = file_get_contents('../css/pdfLayout.css');
// Setup PDF
date_default_timezone_set('Africa/Nairobi');
$d=new DateTime();
$dat=$d->format('d/m/y  h:i:s a');
$sid="1234567";
//$mpdf = new mPDF('utf-8', 'A4',0,0,5,5,15,16,4,9,'P');
$mpdf = new mPDF('utf-8', 'A4',0,'',5,10,15,16,4,9,'P');
$mpdf->SetDisplayMode(real,'default');
require_once('../config/db_connect.php');
//require_once('../include/session2.php');
//require_once('include/functions.php');
$mpdf->showWatermarkImage=true;
//$mpdf->SetWatermarkImage('../images/logo1.png ');
//$mpdf->showWatermarkText = true;
//$mpdf->WriteHTML('<watermarktext content="MTRH SYSTEM" alpha="0.1" />');
$mpdf->setAutoTopMargin = 'stretch';
$mpdf->setAutoBottomMargin = 'stretch';
//$fullname= $row['first_name'];
$mpdf->SetHTMLFooter('<div class="pdf-footer">
<strong>Disclaimer :</strong> <i>This is a system generated report Form and does not require signature.</i>
<hr>
<i>Generated and Printed on '.$dat.' </i>
</div>');

$mpdf->WriteHTML($stylesheet,1);
$html='
  <html>
<body> <div class="container" >
<div class="row-fluid">
<div style="color:#fffff; text-align:left; padding:5px;padding-left:0%"><barcode code=" '.$sid.' " type="C128A" size="0.5" height="1.0"/></div>

</div>
     <div class="row-fluid "  >
              <img src="../images/logo1.png" style="padding-left:39%" alt="School Logo" class="logo" width="120" height="100"/>
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
           <div class=" row-fluid1"  style="padding-left:10%; padding-right:-5%;">
                      <hr/>  </div>
           <div class=" row-fluid1"  style="padding-left:10%; padding-right:-5%;" style="text-align:center">
           <br/>
           <div style="padding-left:10%; padding-right:-5%;" >
                     <u><strong>MMUSO PARLIAMENTARY RESULTS</strong></u>
                     <br/>
                     <u><strong>SCHOOL OF COMPUTING AND INFORMATICS REPRESENTATIVES</strong></u>
                      </div>
                      </div>
                         <br/>

           <div class="row-fluid " style="padding-left:10%; padding-right:-5%;">
                          <table class="table table-bordered">
                                     <thead>
                                     <tr>
                                         <th>NO.</th>
                                        <th>Reg Number</th>
                                        <th>Full Name</th>
                                        <th>School Name</th>
                                        <th>Position</th>
                                     </tr>
                                     </thead>
                                     <tbody>';
                                     //populate the table for SCHOOL OF COMPUTING AND INFORMATICS WINNERS
                                      $s="SELECT candidates.*, students.*, schools.*,positions.*,votes.candidate_id,votes.position_id,votes.school_id,
                                                                             COUNT(votes.candidate_id) AS kura
                                                                            FROM students,schools,candidates,positions,votes WHERE
                                                                            candidates.candidate_id=votes.candidate_id AND
                                                                            candidates.position = positions.position_id AND
                                                                            students.reg_number = candidates.reg_number AND
                                                                            students.school_id = schools.school_id    AND
                                                                            votes.position_id=8 AND votes.school_id=11

                                                                            GROUP BY votes.candidate_id
                                                                            ORDER BY kura DESC LIMIT 0,1";
                                                                        $q=mysqli_query($conn,$s);
                                                                        $count=1;
                                                                        while($r=mysqli_fetch_assoc($q)) {

                                       $html.= '<tr>
                                        <td>'.$count.'</td>
                                        <td>'. $r['reg_number'].'</td>
                                       <td>'.strtoupper($r['fname']).'&nbsp;'.strtoupper($r['mname']).'&nbsp;'.strtoupper($r['lname']).'</td>
                                        <td>'.$r['school_name'].'</td>
                                        <td>'.$r['position_name'].'</td>

                                       </tr>';
                                         $count++;
                                   }
                                $html .='</tbody>
                                     </table>


           <br/>

           <div style="padding-left:20%; padding-right:-5%;" >
                     <u><strong>SCHOOL OF COMPUTING AND INFORMATICS REPRESENTATIVES</strong></u>
                     </div>
                     <br/>
                          <table class="table table-bordered">
                                     <thead>
                                     <tr>
                                         <th>NO.</th>
                                        <th>Reg Number</th>
                                        <th>Full Name</th>
                                        <th>School Name</th>
                                        <th>Position</th>
                                     </tr>
                                     </thead>
                                     <tbody>';
                                     //populate the table for MMUSO PARLIAMENTARY CANDIDATES
                                      $s="SELECT candidates.*, students.*, schools.*,positions.*,votes.candidate_id,votes.position_id,votes.school_id,
                                                                         COUNT(votes.candidate_id) AS kura
                                                                        FROM students,schools,candidates,positions,votes WHERE
                                                                        candidates.candidate_id=votes.candidate_id AND
                                                                        candidates.reg_number=students.reg_number AND
                                                                        candidates.position = positions.position_id AND
                                                                        students.reg_number = candidates.reg_number AND
                                                                        students.school_id = schools.school_id    AND
                                                                        votes.position_id=9 AND votes.school_id=11

                                                                        GROUP BY votes.candidate_id
                                                                        ORDER BY kura DESC LIMIT 0,1";
                                                                    $q=mysqli_query($conn,$s);
                                                                    $count=1;
                                                                    while($r=mysqli_fetch_assoc($q)) {

                                       $html.= '<tr>
                                        <td>'.$count.'</td>
                                        <td>'. $r['reg_number'].'</td>
                                       <td>'.strtoupper($r['fname']).'&nbsp;'.strtoupper($r['mname']).'&nbsp;'.strtoupper($r['lname']).'</td>
                                        <td>'.$r['school_name'].'</td>
                                        <td>'.$r['position_name'].'</td>

                                       </tr>';
                                         $count++;
                                   }
                                $html .='</tbody>
                                     </table>

                                    <div style="padding-left:20%; padding-right:-5%;" >
                                        <u><strong>SCHOOL OF EDUCATION</strong></u>
                                     </div>
                                        <br/>
                                    <table class="table table-bordered">
                                     <thead>
                                     <tr>
                                         <th>NO.</th>
                                        <th>Reg Number</th>
                                        <th>Full Name</th>
                                        <th>School Name</th>
                                        <th>Position</th>
                                     </tr>
                                     </thead>
                                     <tbody>';
                                     //populate the table for MMUSO PARLIAMENTARY CANDIDATES
                                      $s="SELECT candidates.*, students.*, schools.*,positions.*,votes.candidate_id,votes.position_id,votes.school_id,
                                                                     COUNT(votes.candidate_id) AS kura
                                                                    FROM students,schools,candidates,positions,votes WHERE
                                                                    candidates.candidate_id=votes.candidate_id AND
                                                                    candidates.position = positions.position_id AND
                                                                    students.reg_number = candidates.reg_number AND
                                                                    students.school_id = schools.school_id    AND
                                                                    votes.position_id=8 AND votes.school_id=2

                                                                    GROUP BY votes.candidate_id
                                                                    ORDER BY kura DESC LIMIT 0,2";
                                                                $q=mysqli_query($conn,$s);
                                                                $count=1;
                                                                while($r=mysqli_fetch_assoc($q)) {

                                       $html.= '<tr>
                                        <td>'.$count.'</td>
                                        <td>'. $r['reg_number'].'</td>
                                       <td>'.strtoupper($r['fname']).'&nbsp;'.strtoupper($r['mname']).'&nbsp;'.strtoupper($r['lname']).'</td>
                                        <td>'.$r['school_name'].'</td>
                                        <td>'.$r['position_name'].'</td>

                                       </tr>';
                                         $count++;
                                   }
                                $html .='</tbody>
                                     </table>

                                     <table class="table table-bordered">
                                     <thead>
                                     <tr>
                                         <th>NO.</th>
                                        <th>Reg Number</th>
                                        <th>Full Name</th>
                                        <th>School Name</th>
                                        <th>Position</th>
                                     </tr>
                                     </thead>
                                     <tbody>';
                                     //populate the table for MMUSO PARLIAMENTARY CANDIDATES
                                      $s="SELECT candidates.*, students.*, schools.*,positions.*,votes.candidate_id,votes.position_id,votes.school_id,
                                                                     COUNT(votes.candidate_id) AS kura
                                                                    FROM students,schools,candidates,positions,votes WHERE
                                                                    candidates.candidate_id=votes.candidate_id AND
                                                                    candidates.position = positions.position_id AND
                                                                    students.reg_number = candidates.reg_number AND
                                                                    students.school_id = schools.school_id    AND
                                                                    votes.position_id=9 AND votes.school_id=2

                                                                    GROUP BY votes.candidate_id
                                                                    ORDER BY kura DESC LIMIT 0,2";
                                                                $q=mysqli_query($conn,$s);
                                                                $count=1;
                                                                while($r=mysqli_fetch_assoc($q)) {

                                       $html.= '<tr>
                                        <td>'.$count.'</td>
                                        <td>'. $r['reg_number'].'</td>
                                       <td>'.strtoupper($r['fname']).'&nbsp;'.strtoupper($r['mname']).'&nbsp;'.strtoupper($r['lname']).'</td>
                                        <td>'.$r['school_name'].'</td>
                                        <td>'.$r['position_name'].'</td>

                                       </tr>';
                                         $count++;
                                   }
                                $html .='</tbody>
                                     </table>


                                      <div style="padding-left:20%; padding-right:-5%;" >
                                        <u><strong>SCHOOL OF ENGINEERING</strong></u>
                                     </div>
                                        <br/>
                                    <table class="table table-bordered">
                                     <thead>
                                     <tr>
                                         <th>NO.</th>
                                        <th>Reg Number</th>
                                        <th>Full Name</th>
                                        <th>School Name</th>
                                        <th>Position</th>
                                     </tr>
                                     </thead>
                                     <tbody>';
                                     //populate the table for MMUSO PARLIAMENTARY CANDIDATES
                                      $s="SELECT candidates.*, students.*, schools.*,positions.*,votes.candidate_id,votes.position_id,votes.school_id,
                                                                     COUNT(votes.candidate_id) AS kura
                                                                    FROM students,schools,candidates,positions,votes WHERE
                                                                    candidates.candidate_id=votes.candidate_id AND
                                                                    candidates.position = positions.position_id AND
                                                                    students.reg_number = candidates.reg_number AND
                                                                    students.school_id = schools.school_id    AND
                                                                    votes.position_id=8 AND votes.school_id=4

                                                                    GROUP BY votes.candidate_id
                                                                    ORDER BY kura DESC LIMIT 0,2";
                                                                $q=mysqli_query($conn,$s);
                                                                $count=1;
                                                                while($r=mysqli_fetch_assoc($q)) {

                                       $html.= '<tr>
                                        <td>'.$count.'</td>
                                        <td>'. $r['reg_number'].'</td>
                                       <td>'.strtoupper($r['fname']).'&nbsp;'.strtoupper($r['mname']).'&nbsp;'.strtoupper($r['lname']).'</td>
                                        <td>'.$r['school_name'].'</td>
                                        <td>'.$r['position_name'].'</td>

                                       </tr>';
                                         $count++;
                                   }
                                $html .='</tbody>
                                     </table>

                                     <table class="table table-bordered">
                                     <thead>
                                     <tr>
                                         <th>NO.</th>
                                        <th>Reg Number</th>
                                        <th>Full Name</th>
                                        <th>School Name</th>
                                        <th>Position</th>
                                     </tr>
                                     </thead>
                                     <tbody>';
                                     //populate the table for MMUSO PARLIAMENTARY CANDIDATES
                                      $s="SELECT candidates.*, students.*, schools.*,positions.*,votes.candidate_id,votes.position_id,votes.school_id,
                                                                     COUNT(votes.candidate_id) AS kura
                                                                    FROM students,schools,candidates,positions,votes WHERE
                                                                    candidates.candidate_id=votes.candidate_id AND
                                                                    candidates.position = positions.position_id AND
                                                                    students.reg_number = candidates.reg_number AND
                                                                    students.school_id = schools.school_id    AND
                                                                    votes.position_id=9 AND votes.school_id=4

                                                                    GROUP BY votes.candidate_id
                                                                    ORDER BY kura DESC LIMIT 0,2";
                                                                $q=mysqli_query($conn,$s);
                                                                $count=1;
                                                                while($r=mysqli_fetch_assoc($q)) {

                                       $html.= '<tr>
                                        <td>'.$count.'</td>
                                        <td>'. $r['reg_number'].'</td>
                                       <td>'.strtoupper($r['fname']).'&nbsp;'.strtoupper($r['mname']).'&nbsp;'.strtoupper($r['lname']).'</td>
                                        <td>'.$r['school_name'].'</td>
                                        <td>'.$r['position_name'].'</td>

                                       </tr>';
                                         $count++;
                                   }
                                $html .='</tbody>
                                     </table>


                                      <div style="padding-left:20%; padding-right:-5%;" >
                        <u><strong>SCHOOL OF NATURAL SCIENCES</strong></u>
                     </div>
                     <br/>
                          <table class="table table-bordered">
                                     <thead>
                                     <tr>
                                         <th>NO.</th>
                                        <th>Reg Number</th>
                                        <th>Full Name</th>
                                        <th>School Name</th>
                                        <th>Position</th>
                                     </tr>
                                     </thead>
                                     <tbody>';
                                     //populate the table for MMUSO PARLIAMENTARY CANDIDATES
                                      $s="SELECT candidates.*, students.*, schools.*,positions.*,votes.candidate_id,votes.position_id,votes.school_id,
                                                                     COUNT(votes.candidate_id) AS kura
                                                                    FROM students,schools,candidates,positions,votes WHERE
                                                                    candidates.candidate_id=votes.candidate_id AND
                                                                    candidates.position = positions.position_id AND
                                                                    students.reg_number = candidates.reg_number AND
                                                                    students.school_id = schools.school_id    AND
                                                                    votes.position_id=8 AND votes.school_id=3

                                                                    GROUP BY votes.candidate_id
                                                                    ORDER BY kura DESC LIMIT 0,2";
                                                                $q=mysqli_query($conn,$s);
                                                                $count=1;
                                                                while($r=mysqli_fetch_assoc($q)) {

                                       $html.= '<tr>
                                        <td>'.$count.'</td>
                                        <td>'. $r['reg_number'].'</td>
                                       <td>'.strtoupper($r['fname']).'&nbsp;'.strtoupper($r['mname']).'&nbsp;'.strtoupper($r['lname']).'</td>
                                        <td>'.$r['school_name'].'</td>
                                        <td>'.$r['position_name'].'</td>

                                       </tr>';
                                         $count++;
                                   }
                                $html .='</tbody>
                                     </table>

                                     <table class="table table-bordered">
                                     <thead>
                                     <tr>
                                         <th>NO.</th>
                                        <th>Reg Number</th>
                                        <th>Full Name</th>
                                        <th>School Name</th>
                                        <th>Position</th>
                                     </tr>
                                     </thead>
                                     <tbody>';
                                     //populate the table for MMUSO PARLIAMENTARY CANDIDATES
                                      $s="SELECT candidates.*, students.*, schools.*,positions.*,votes.candidate_id,votes.position_id,votes.school_id,
                                                                     COUNT(votes.candidate_id) AS kura
                                                                    FROM students,schools,candidates,positions,votes WHERE
                                                                    candidates.candidate_id=votes.candidate_id AND
                                                                    candidates.position = positions.position_id AND
                                                                    students.reg_number = candidates.reg_number AND
                                                                    students.school_id = schools.school_id    AND
                                                                    votes.position_id=9 AND votes.school_id=3

                                                                    GROUP BY votes.candidate_id
                                                                    ORDER BY kura DESC LIMIT 0,2";
                                                                $q=mysqli_query($conn,$s);
                                                                $count=1;
                                                                while($r=mysqli_fetch_assoc($q)) {

                                       $html.= '<tr>
                                        <td>'.$count.'</td>
                                        <td>'. $r['reg_number'].'</td>
                                       <td>'.strtoupper($r['fname']).'&nbsp;'.strtoupper($r['mname']).'&nbsp;'.strtoupper($r['lname']).'</td>
                                        <td>'.$r['school_name'].'</td>
                                        <td>'.$r['position_name'].'</td>

                                       </tr>';
                                         $count++;
                                   }
                                $html .='</tbody>
                                     </table>

                                      <div style="padding-left:20%; padding-right:-5%;" >
                        <u><strong>SCHOOL OF EDUCATION</strong></u>
                     </div>
                     <br/>
                          <table class="table table-bordered">
                                     <thead>
                                     <tr>
                                         <th>NO.</th>
                                        <th>Reg Number</th>
                                        <th>Full Name</th>
                                        <th>School Name</th>
                                        <th>Position</th>
                                     </tr>
                                     </thead>
                                     <tbody>';
                                     //populate the table for MMUSO PARLIAMENTARY CANDIDATES
                                      $s="SELECT candidates.*, students.*, schools.*,positions.*,votes.candidate_id,votes.position_id,votes.school_id,
                                                                     COUNT(votes.candidate_id) AS kura
                                                                    FROM students,schools,candidates,positions,votes WHERE
                                                                    candidates.candidate_id=votes.candidate_id AND
                                                                    candidates.position = positions.position_id AND
                                                                    students.reg_number = candidates.reg_number AND
                                                                    students.school_id = schools.school_id    AND
                                                                    votes.position_id=8 AND votes.school_id=5

                                                                    GROUP BY votes.candidate_id
                                                                    ORDER BY kura DESC LIMIT 0,2";
                                                                $q=mysqli_query($conn,$s);
                                                                $count=1;
                                                                while($r=mysqli_fetch_assoc($q)) {

                                       $html.= '<tr>
                                        <td>'.$count.'</td>
                                        <td>'. $r['reg_number'].'</td>
                                       <td>'.strtoupper($r['fname']).'&nbsp;'.strtoupper($r['mname']).'&nbsp;'.strtoupper($r['lname']).'</td>
                                        <td>'.$r['school_name'].'</td>
                                        <td>'.$r['position_name'].'</td>

                                       </tr>';
                                         $count++;
                                   }
                                $html .='</tbody>
                                     </table>

                                     <table class="table table-bordered">
                                     <thead>
                                     <tr>
                                         <th>NO.</th>
                                        <th>Reg Number</th>
                                        <th>Full Name</th>
                                        <th>School Name</th>
                                        <th>Position</th>
                                     </tr>
                                     </thead>
                                     <tbody>';
                                     //populate the table for MMUSO PARLIAMENTARY CANDIDATES
                                      $s="SELECT candidates.*, students.*, schools.*,positions.*,votes.candidate_id,votes.position_id,votes.school_id,
                                                                     COUNT(votes.candidate_id) AS kura
                                                                    FROM students,schools,candidates,positions,votes WHERE
                                                                    candidates.candidate_id=votes.candidate_id AND
                                                                    candidates.position = positions.position_id AND
                                                                    students.reg_number = candidates.reg_number AND
                                                                    students.school_id = schools.school_id    AND
                                                                    votes.position_id=9 AND votes.school_id=5

                                                                    GROUP BY votes.candidate_id
                                                                    ORDER BY kura DESC LIMIT 0,2";
                                                                $q=mysqli_query($conn,$s);
                                                                $count=1;
                                                                while($r=mysqli_fetch_assoc($q)) {

                                       $html.= '<tr>
                                        <td>'.$count.'</td>
                                        <td>'. $r['reg_number'].'</td>
                                       <td>'.strtoupper($r['fname']).'&nbsp;'.strtoupper($r['mname']).'&nbsp;'.strtoupper($r['lname']).'</td>
                                        <td>'.$r['school_name'].'</td>
                                        <td>'.$r['position_name'].'</td>

                                       </tr>';
                                         $count++;
                                   }
                                $html .='</tbody>
                                     </table>


                                      <div style="padding-left:20%; padding-right:-5%;" >
                        <u><strong>SCHOOL OF NURSING AND MIDWIFRY</strong></u>
                     </div>
                     <br/>
                          <table class="table table-bordered">
                                     <thead>
                                     <tr>
                                         <th>NO.</th>
                                        <th>Reg Number</th>
                                        <th>Full Name</th>
                                        <th>School Name</th>
                                        <th>Position</th>
                                     </tr>
                                     </thead>
                                     <tbody>';
                                     //populate the table for MMUSO PARLIAMENTARY CANDIDATES
                                      $s="SELECT candidates.*, students.*, schools.*,positions.*,votes.candidate_id,votes.position_id,votes.school_id,
                                                                     COUNT(votes.candidate_id) AS kura
                                                                    FROM students,schools,candidates,positions,votes WHERE
                                                                    candidates.candidate_id=votes.candidate_id AND
                                                                    candidates.position = positions.position_id AND
                                                                    students.reg_number = candidates.reg_number AND
                                                                    students.school_id = schools.school_id    AND
                                                                    votes.position_id=8 AND votes.school_id=2

                                                                    GROUP BY votes.candidate_id
                                                                    ORDER BY kura DESC LIMIT 0,2";
                                                                $q=mysqli_query($conn,$s);
                                                                $count=1;
                                                                while($r=mysqli_fetch_assoc($q)) {

                                       $html.= '<tr>
                                        <td>'.$count.'</td>
                                        <td>'. $r['reg_number'].'</td>
                                       <td>'.strtoupper($r['fname']).'&nbsp;'.strtoupper($r['mname']).'&nbsp;'.strtoupper($r['lname']).'</td>
                                        <td>'.$r['school_name'].'</td>
                                        <td>'.$r['position_name'].'</td>

                                       </tr>';
                                         $count++;
                                   }
                                $html .='</tbody>
                                     </table>

                                     <table class="table table-bordered">
                                     <thead>
                                     <tr>
                                         <th>NO.</th>
                                        <th>Reg Number</th>
                                        <th>Full Name</th>
                                        <th>School Name</th>
                                        <th>Position</th>
                                     </tr>
                                     </thead>
                                     <tbody>';
                                     //populate the table for MMUSO PARLIAMENTARY CANDIDATES
                                      $s="SELECT candidates.*, students.*, schools.*,positions.*,votes.candidate_id,votes.position_id,votes.school_id,
                                                                     COUNT(votes.candidate_id) AS kura
                                                                    FROM students,schools,candidates,positions,votes WHERE
                                                                    candidates.candidate_id=votes.candidate_id AND
                                                                    candidates.position = positions.position_id AND
                                                                    students.reg_number = candidates.reg_number AND
                                                                    students.school_id = schools.school_id    AND
                                                                    votes.position_id=9 AND votes.school_id=2

                                                                    GROUP BY votes.candidate_id
                                                                    ORDER BY kura DESC LIMIT 0,2";
                                                                $q=mysqli_query($conn,$s);
                                                                $count=1;
                                                                while($r=mysqli_fetch_assoc($q)) {

                                       $html.= '<tr>
                                        <td>'.$count.'</td>
                                        <td>'. $r['reg_number'].'</td>
                                       <td>'.strtoupper($r['fname']).'&nbsp;'.strtoupper($r['mname']).'&nbsp;'.strtoupper($r['lname']).'</td>
                                        <td>'.$r['school_name'].'</td>
                                        <td>'.$r['position_name'].'</td>

                                       </tr>';
                                         $count++;
                                   }
                                $html .='</tbody>
                                     </table>

                                      <div style="padding-left:20%; padding-right:-5%;" >
                        <u><strong>SCHOOL OF PUBLIC HEALTH AND BIOMEDICAL SCIENCES</strong></u>
                     </div>
                     <br/>
                          <table class="table table-bordered">
                                     <thead>
                                     <tr>
                                         <th>NO.</th>
                                        <th>Reg Number</th>
                                        <th>Full Name</th>
                                        <th>School Name</th>
                                        <th>Position</th>
                                     </tr>
                                     </thead>
                                     <tbody>';
                                     //populate the table for MMUSO PARLIAMENTARY CANDIDATES
                                      $s="SELECT candidates.*, students.*, schools.*,positions.*,votes.candidate_id,votes.position_id,votes.school_id,
                                                                     COUNT(votes.candidate_id) AS kura
                                                                    FROM students,schools,candidates,positions,votes WHERE
                                                                    candidates.candidate_id=votes.candidate_id AND
                                                                    candidates.position = positions.position_id AND
                                                                    students.reg_number = candidates.reg_number AND
                                                                    students.school_id = schools.school_id    AND
                                                                    votes.position_id=8 AND votes.school_id=6

                                                                    GROUP BY votes.candidate_id
                                                                    ORDER BY kura DESC LIMIT 0,2";
                                                                $q=mysqli_query($conn,$s);
                                                                $count=1;
                                                                while($r=mysqli_fetch_assoc($q)) {

                                       $html.= '<tr>
                                        <td>'.$count.'</td>
                                        <td>'. $r['reg_number'].'</td>
                                       <td>'.strtoupper($r['fname']).'&nbsp;'.strtoupper($r['mname']).'&nbsp;'.strtoupper($r['lname']).'</td>
                                        <td>'.$r['school_name'].'</td>
                                        <td>'.$r['position_name'].'</td>

                                       </tr>';
                                         $count++;
                                   }
                                $html .='</tbody>
                                     </table>

                                     <table class="table table-bordered">
                                     <thead>
                                     <tr>
                                         <th>NO.</th>
                                        <th>Reg Number</th>
                                        <th>Full Name</th>
                                        <th>School Name</th>
                                        <th>Position</th>
                                     </tr>
                                     </thead>
                                     <tbody>';
                                     //populate the table for MMUSO PARLIAMENTARY CANDIDATES
                                      $s="SELECT candidates.*, students.*, schools.*,positions.*,votes.candidate_id,votes.position_id,votes.school_id,
                                                                     COUNT(votes.candidate_id) AS kura
                                                                    FROM students,schools,candidates,positions,votes WHERE
                                                                    candidates.candidate_id=votes.candidate_id AND
                                                                    candidates.position = positions.position_id AND
                                                                    students.reg_number = candidates.reg_number AND
                                                                    students.school_id = schools.school_id    AND
                                                                    votes.position_id=9 AND votes.school_id=6

                                                                    GROUP BY votes.candidate_id
                                                                    ORDER BY kura DESC LIMIT 0,2";
                                                                $q=mysqli_query($conn,$s);
                                                                $count=1;
                                                                while($r=mysqli_fetch_assoc($q)) {

                                       $html.= '<tr>
                                        <td>'.$count.'</td>
                                        <td>'. $r['reg_number'].'</td>
                                       <td>'.strtoupper($r['fname']).'&nbsp;'.strtoupper($r['mname']).'&nbsp;'.strtoupper($r['lname']).'</td>
                                        <td>'.$r['school_name'].'</td>
                                        <td>'.$r['position_name'].'</td>

                                       </tr>';
                                         $count++;
                                   }
                                $html .='</tbody>
                                     </table>

                                      <div style="padding-left:20%; padding-right:-5%;" >
                        <u><strong>SCHOOL OF BUSINESS AND ECONOMICS</strong></u>
                     </div>
                     <br/>
                          <table class="table table-bordered">
                                     <thead>
                                     <tr>
                                         <th>NO.</th>
                                        <th>Reg Number</th>
                                        <th>Full Name</th>
                                        <th>School Name</th>
                                        <th>Position</th>
                                     </tr>
                                     </thead>
                                     <tbody>';
                                     //populate the table for MMUSO PARLIAMENTARY CANDIDATES
                                      $s="SELECT candidates.*, students.*, schools.*,positions.*,votes.candidate_id,votes.position_id,votes.school_id,
                                                                     COUNT(votes.candidate_id) AS kura
                                                                    FROM students,schools,candidates,positions,votes WHERE
                                                                    candidates.candidate_id=votes.candidate_id AND
                                                                    candidates.position = positions.position_id AND
                                                                    students.reg_number = candidates.reg_number AND
                                                                    students.school_id = schools.school_id    AND
                                                                    votes.position_id=8 AND votes.school_id=9

                                                                    GROUP BY votes.candidate_id
                                                                    ORDER BY kura DESC LIMIT 0,2";
                                                                $q=mysqli_query($conn,$s);
                                                                $count=1;
                                                                while($r=mysqli_fetch_assoc($q)) {

                                       $html.= '<tr>
                                        <td>'.$count.'</td>
                                        <td>'. $r['reg_number'].'</td>
                                       <td>'.strtoupper($r['fname']).'&nbsp;'.strtoupper($r['mname']).'&nbsp;'.strtoupper($r['lname']).'</td>
                                        <td>'.$r['school_name'].'</td>
                                        <td>'.$r['position_name'].'</td>

                                       </tr>';
                                         $count++;
                                   }
                                $html .='</tbody>
                                     </table>

                                     <table class="table table-bordered">
                                     <thead>
                                     <tr>
                                         <th>NO.</th>
                                        <th>Reg Number</th>
                                        <th>Full Name</th>
                                        <th>School Name</th>
                                        <th>Position</th>
                                     </tr>
                                     </thead>
                                     <tbody>';
                                     //populate the table for MMUSO PARLIAMENTARY CANDIDATES
                                      $s="SELECT candidates.*, students.*, schools.*,positions.*,votes.candidate_id,votes.position_id,votes.school_id,
                                                                     COUNT(votes.candidate_id) AS kura
                                                                    FROM students,schools,candidates,positions,votes WHERE
                                                                    candidates.candidate_id=votes.candidate_id AND
                                                                    candidates.position = positions.position_id AND
                                                                    students.reg_number = candidates.reg_number AND
                                                                    students.school_id = schools.school_id    AND
                                                                    votes.position_id=9 AND votes.school_id=9

                                                                    GROUP BY votes.candidate_id
                                                                    ORDER BY kura DESC LIMIT 0,2";
                                                                $q=mysqli_query($conn,$s);
                                                                $count=1;
                                                                while($r=mysqli_fetch_assoc($q)) {

                                       $html.= '<tr>
                                        <td>'.$count.'</td>
                                        <td>'. $r['reg_number'].'</td>
                                       <td>'.strtoupper($r['fname']).'&nbsp;'.strtoupper($r['mname']).'&nbsp;'.strtoupper($r['lname']).'</td>
                                        <td>'.$r['school_name'].'</td>
                                        <td>'.$r['position_name'].'</td>

                                       </tr>';
                                         $count++;
                                   }
                                $html .='</tbody>
                                     </table>

                                      <div style="padding-left:20%; padding-right:-5%;" >
                        <u><strong>SCHOOL OF AGRICULTURE AND VETERINARY SCIENCES</strong></u>
                     </div>
                     <br/>
                          <table class="table table-bordered">
                                     <thead>
                                     <tr>
                                         <th>NO.</th>
                                        <th>Reg Number</th>
                                        <th>Full Name</th>
                                        <th>School Name</th>
                                        <th>Position</th>
                                     </tr>
                                     </thead>
                                     <tbody>';
                                     //populate the table for MMUSO PARLIAMENTARY CANDIDATES
                                      $s="SELECT candidates.*, students.*, schools.*,positions.*,votes.candidate_id,votes.position_id,votes.school_id,
                                                                     COUNT(votes.candidate_id) AS kura
                                                                    FROM students,schools,candidates,positions,votes WHERE
                                                                    candidates.candidate_id=votes.candidate_id AND
                                                                    candidates.position = positions.position_id AND
                                                                    students.reg_number = candidates.reg_number AND
                                                                    students.school_id = schools.school_id    AND
                                                                    votes.position_id=8 AND votes.school_id=7

                                                                    GROUP BY votes.candidate_id
                                                                    ORDER BY kura DESC LIMIT 0,2";
                                                                $q=mysqli_query($conn,$s);
                                                                $count=1;
                                                                while($r=mysqli_fetch_assoc($q)) {

                                       $html.= '<tr>
                                        <td>'.$count.'</td>
                                        <td>'. $r['reg_number'].'</td>
                                       <td>'.strtoupper($r['fname']).'&nbsp;'.strtoupper($r['mname']).'&nbsp;'.strtoupper($r['lname']).'</td>
                                        <td>'.$r['school_name'].'</td>
                                        <td>'.$r['position_name'].'</td>

                                       </tr>';
                                         $count++;
                                   }
                                $html .='</tbody>
                                     </table>

                                     <table class="table table-bordered">
                                     <thead>
                                     <tr>
                                         <th>NO.</th>
                                        <th>Reg Number</th>
                                        <th>Full Name</th>
                                        <th>School Name</th>
                                        <th>Position</th>
                                     </tr>
                                     </thead>
                                     <tbody>';
                                     //populate the table for MMUSO PARLIAMENTARY CANDIDATES
                                      $s="SELECT candidates.*, students.*, schools.*,positions.*,votes.candidate_id,votes.position_id,votes.school_id,
                                                                     COUNT(votes.candidate_id) AS kura
                                                                    FROM students,schools,candidates,positions,votes WHERE
                                                                    candidates.candidate_id=votes.candidate_id AND
                                                                    candidates.position = positions.position_id AND
                                                                    students.reg_number = candidates.reg_number AND
                                                                    students.school_id = schools.school_id    AND
                                                                    votes.position_id=9 AND votes.school_id=7

                                                                    GROUP BY votes.candidate_id
                                                                    ORDER BY kura DESC LIMIT 0,2";
                                                                $q=mysqli_query($conn,$s);
                                                                $count=1;
                                                                while($r=mysqli_fetch_assoc($q)) {

                                       $html.= '<tr>
                                        <td>'.$count.'</td>
                                        <td>'. $r['reg_number'].'</td>
                                       <td>'.strtoupper($r['fname']).'&nbsp;'.strtoupper($r['mname']).'&nbsp;'.strtoupper($r['lname']).'</td>
                                        <td>'.$r['school_name'].'</td>
                                        <td>'.$r['position_name'].'</td>

                                       </tr>';
                                         $count++;
                                   }
                                $html .='</tbody>
                                     </table>


                                      <div style="padding-left:20%; padding-right:-5%;" >
                        <u><strong>SCHOOL OF ARTS AND SOCIAL SCIENCES</strong></u>
                     </div>
                     <br/>
                          <table class="table table-bordered">
                                     <thead>
                                     <tr>
                                         <th>NO.</th>
                                        <th>Reg Number</th>
                                        <th>Full Name</th>
                                        <th>School Name</th>
                                        <th>Position</th>
                                     </tr>
                                     </thead>
                                     <tbody>';
                                     //populate the table for MMUSO PARLIAMENTARY CANDIDATES
                                      $s="SELECT candidates.*, students.*, schools.*,positions.*,votes.candidate_id,votes.position_id,votes.school_id,
                                                                     COUNT(votes.candidate_id) AS kura
                                                                    FROM students,schools,candidates,positions,votes WHERE
                                                                    candidates.candidate_id=votes.candidate_id AND
                                                                    candidates.position = positions.position_id AND
                                                                    students.reg_number = candidates.reg_number AND
                                                                    students.school_id = schools.school_id    AND
                                                                    votes.position_id=8 AND votes.school_id=13

                                                                    GROUP BY votes.candidate_id
                                                                    ORDER BY kura DESC LIMIT 0,2";
                                                                $q=mysqli_query($conn,$s);
                                                                $count=1;
                                                                while($r=mysqli_fetch_assoc($q)) {

                                       $html.= '<tr>
                                        <td>'.$count.'</td>
                                        <td>'. $r['reg_number'].'</td>
                                       <td>'.strtoupper($r['fname']).'&nbsp;'.strtoupper($r['mname']).'&nbsp;'.strtoupper($r['lname']).'</td>
                                        <td>'.$r['school_name'].'</td>
                                        <td>'.$r['position_name'].'</td>

                                       </tr>';
                                         $count++;
                                   }
                                $html .='</tbody>
                                     </table>

                                     <table class="table table-bordered">
                                     <thead>
                                     <tr>
                                         <th>NO.</th>
                                        <th>Reg Number</th>
                                        <th>Full Name</th>
                                        <th>School Name</th>
                                        <th>Position</th>
                                     </tr>
                                     </thead>
                                     <tbody>';
                                     //populate the table for MMUSO PARLIAMENTARY CANDIDATES
                                      $s="SELECT candidates.*, students.*, schools.*,positions.*,votes.candidate_id,votes.position_id,votes.school_id,
                                                                     COUNT(votes.candidate_id) AS kura
                                                                    FROM students,schools,candidates,positions,votes WHERE
                                                                    candidates.candidate_id=votes.candidate_id AND
                                                                    candidates.position = positions.position_id AND
                                                                    students.reg_number = candidates.reg_number AND
                                                                    students.school_id = schools.school_id    AND
                                                                    votes.position_id=9 AND votes.school_id=13

                                                                    GROUP BY votes.candidate_id
                                                                    ORDER BY kura DESC LIMIT 0,2";
                                                                $q=mysqli_query($conn,$s);
                                                                $count=1;
                                                                while($r=mysqli_fetch_assoc($q)) {

                                       $html.= '<tr>
                                        <td>'.$count.'</td>
                                        <td>'. $r['reg_number'].'</td>
                                       <td>'.strtoupper($r['fname']).'&nbsp;'.strtoupper($r['mname']).'&nbsp;'.strtoupper($r['lname']).'</td>
                                        <td>'.$r['school_name'].'</td>
                                        <td>'.$r['position_name'].'</td>

                                       </tr>';
                                         $count++;
                                   }
                                $html .='</tbody>
                                     </table>

                                      <div style="padding-left:20%; padding-right:-5%;" >
                        <u><strong>SCHOOL OF DISASTER MANAGEMENT AND HUMANITARIAN ASSISTANCE</strong></u>
                     </div>
                     <br/>
                          <table class="table table-bordered">
                                     <thead>
                                     <tr>
                                         <th>NO.</th>
                                        <th>Reg Number</th>
                                        <th>Full Name</th>
                                        <th>School Name</th>
                                        <th>Position</th>
                                     </tr>
                                     </thead>
                                     <tbody>';
                                     //populate the table for MMUSO PARLIAMENTARY CANDIDATES
                                      $s="SELECT candidates.*, students.*, schools.*,positions.*,votes.candidate_id,votes.position_id,votes.school_id,
                                                                     COUNT(votes.candidate_id) AS kura
                                                                    FROM students,schools,candidates,positions,votes WHERE
                                                                    candidates.candidate_id=votes.candidate_id AND
                                                                    candidates.position = positions.position_id AND
                                                                    students.reg_number = candidates.reg_number AND
                                                                    students.school_id = schools.school_id    AND
                                                                    votes.position_id=8 AND votes.school_id=8

                                                                    GROUP BY votes.candidate_id
                                                                    ORDER BY kura DESC LIMIT 0,2";
                                                                $q=mysqli_query($conn,$s);
                                                                $count=1;
                                                                while($r=mysqli_fetch_assoc($q)) {

                                       $html.= '<tr>
                                        <td>'.$count.'</td>
                                        <td>'. $r['reg_number'].'</td>
                                       <td>'.strtoupper($r['fname']).'&nbsp;'.strtoupper($r['mname']).'&nbsp;'.strtoupper($r['lname']).'</td>
                                        <td>'.$r['school_name'].'</td>
                                        <td>'.$r['position_name'].'</td>

                                       </tr>';
                                         $count++;
                                   }
                                $html .='</tbody>
                                     </table>

                                     <table class="table table-bordered">
                                     <thead>
                                     <tr>
                                         <th>NO.</th>
                                        <th>Reg Number</th>
                                        <th>Full Name</th>
                                        <th>School Name</th>
                                        <th>Position</th>
                                     </tr>
                                     </thead>
                                     <tbody>';
                                     //populate the table for MMUSO PARLIAMENTARY CANDIDATES
                                      $s="SELECT candidates.*, students.*, schools.*,positions.*,votes.candidate_id,votes.position_id,votes.school_id,
                                                                     COUNT(votes.candidate_id) AS kura
                                                                    FROM students,schools,candidates,positions,votes WHERE
                                                                    candidates.candidate_id=votes.candidate_id AND
                                                                    candidates.position = positions.position_id AND
                                                                    students.reg_number = candidates.reg_number AND
                                                                    students.school_id = schools.school_id    AND
                                                                    votes.position_id=9 AND votes.school_id=8

                                                                    GROUP BY votes.candidate_id
                                                                    ORDER BY kura DESC LIMIT 0,2";
                                                                $q=mysqli_query($conn,$s);
                                                                $count=1;
                                                                while($r=mysqli_fetch_assoc($q)) {

                                       $html.= '<tr>
                                        <td>'.$count.'</td>
                                        <td>'. $r['reg_number'].'</td>
                                       <td>'.strtoupper($r['fname']).'&nbsp;'.strtoupper($r['mname']).'&nbsp;'.strtoupper($r['lname']).'</td>
                                        <td>'.$r['school_name'].'</td>
                                        <td>'.$r['position_name'].'</td>

                                       </tr>';
                                         $count++;
                                   }
                                $html .='</tbody>
                                     </table>
                                       <br/>
                                     <br/>
                                      <br/>
                            <div style="content-align:center;">
                          <img src="../images/stamp.png"alt=""  style="background-color: #FFFFFF; border: none;"  width="150" height="150"/> <br/>
                        <strong>Smartvoter System
                         <br/>
                        <u>The MMUSO Returning Officer </u>
                        </strong>
                          </div>





           </div>
        </div>
    </body>
           </html>';

$mpdf->WriteHTML($html,2); // Writing html to pdf

//$mpdf->Output(); // For sending Output to browser
$mpdf->Output('MMUSO CANDIDATES.pdf','I'); // For Download
exit;
?>