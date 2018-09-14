<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {
           public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Student_model'));
    }

/*=========================STUDENT DASHBOARD FUNCTIONS===========================*/
    public function Dashboard()
    {
         if ($this->session->userdata('is_logged_in')) {
         $data['sections']=$this->Student_model->count_sections($this->session->userdata('email'));
         $data['clearance_dates']=$this->Student_model->Clearance_controller();
         $data['user'] = $this->Student_model->getUserName($this->session->userdata('email'));
         $data['notCleared']=$this->Student_model->UnclearedSections($this->session->userdata('email'));
         $data['check']=$this->Student_model->Check_sectionClearance($this->session->userdata('email'));
         $data['student']=$this->Student_model->StudentDetails($this->session->userdata('email'));
         //$data['check_status']=$this->Student_model->Check_Sections($this->session->userdata('email'));
         $data['check_clear']=$this->Student_model->Check_clearance($this->session->userdata('email'));
         $data['student_sections']=$this->Student_model->Departments_notclered($this->session->userdata('email'));
         $this->load->view('web_include/header_student',$data);
        $this->load->view('web_include/sidebar_student',$data);
        $this->load->view('student/dashboard',$data);
        $this->load->view('web_include/footer_student');
          }
          else{
              redirect('Admin/index');
          }

    }


    //===================GET THE ACADEMIC DETAILS OF A STUDENT AS PER HIS/HER SESSION===============================
    public function StudentDetails()
    {
        if ($this->session->userdata('is_logged_in')) {
            $data['user'] = $this->Student_model->getUserName($this->session->userdata('email'));
            $data['student']=$this->Student_model->StudentDetails($this->session->userdata('email'));
            $data['clearance_dates']=$this->Student_model->Clearance_controller();
            $data['student_sections']=$this->Student_model->Departments_notclered($this->session->userdata('email'));
            $data['check']=$this->Student_model->Check_sectionClearance($this->session->userdata('email'));
            $data['notCleared']=$this->Student_model->UnclearedSections($this->session->userdata('email'));
            $data['bank_check']=$this->Student_model->BankCheck($this->session->userdata('email')); 
            $this->load->view('web_include/header_student',$data);
            $this->load->view('web_include/sidebar_student',$data);
            $this->load->view('student/student_details',$data);
            $this->load->view('web_include/footer_student');
        }
        else{
            redirect('Admin/index');
        }
    }

        //=================== CAPTURE STUDENT BANK DETAILS FOR FINANCE OFFICE CONSUMPTION===============================
        public function BankDetails()
        {
            if ($this->session->userdata('is_logged_in')) {
                $data['user'] = $this->Student_model->getUserName($this->session->userdata('email'));
                //$data['student']=$this->Student_model->BankDetails($this->session->userdata('email'));
                $data['student_sections']=$this->Student_model->Departments_notclered($this->session->userdata('email'));
                $data['check']=$this->Student_model->Check_sectionClearance($this->session->userdata('email'));
                $data['notCleared']=$this->Student_model->UnclearedSections($this->session->userdata('email'));
                $data['clearance_dates']=$this->Student_model->Clearance_controller();
                $this->load->view('web_include/header_student',$data);
                $this->load->view('web_include/sidebar_student',$data);
                $this->load->view('student/bank_details',$data);
                $this->load->view('web_include/footer_student');
            }
            else{
                redirect('Admin/index');
            }
        }

        //================GET  STUDENT CLEARED DEPARTMENTS AS PER HIS/HER SESSION=====================================
    public function Departments_notclered()
    {
        if ($this->session->userdata('is_logged_in')) {
            $data['user'] = $this->Student_model->getUserName($this->session->userdata('email'));
            $data['student_sections']=$this->Student_model->Departments_notclered($this->session->userdata('email'));
            $data['notCleared']=$this->Student_model->UnclearedSections($this->session->userdata('email'));
            $data['check']=$this->Student_model->Check_sectionClearance($this->session->userdata('email'));
            $data['clearance_dates']=$this->Student_model->Clearance_controller();
            $this->load->view('web_include/header_student',$data);
            $this->load->view('web_include/sidebar_student',$data);
            $this->load->view('student/departments_notcleared',$data);
            $this->load->view('web_include/footer_student');
        }
        else{
            redirect('Admin/index');
        }
    }

            //========================CLEARANCE AUTOMATION view    =======================================================
    public function Clearance()
    {
        if ($this->session->userdata('is_logged_in')) {
            $data['user'] = $this->Student_model->getUserName($this->session->userdata('email'));
            $data['student']=$this->Student_model->Check_Sections($this->session->userdata('email'));
            $data['clear'] =$this->Student_model->get_clearanceDetails($this->session->userdata('email'));
            $data['check_clear']=$this->Student_model->Check_clearance($this->session->userdata('email'));
            $data['student_sections']=$this->Student_model->Departments_notclered($this->session->userdata('email'));
            $data['notCleared']=$this->Student_model->UnclearedSections($this->session->userdata('email'));
            $data['check']=$this->Student_model->Check_sectionClearance($this->session->userdata('email'));
            $data['clearance_dates']=$this->Student_model->Clearance_controller(); 
            $data['student_mail']= $this->session->userdata('email');
            $this->load->view('web_include/header_student',$data);
            $this->load->view('web_include/sidebar_student',$data);
            $this->load->view('student/clearance',$data);
            $this->load->view('web_include/footer_student');
        }
        else{
            redirect('Admin/index');
        }
    }


    /*=====function to login into the dashboard as ADMIN======*/
    function Login()
        {
                if (isset($_POST['btn-login'])) {
                        $params = array(
                                'email' => $this->input->post('email'),
                                'password' => $this->input->post('password')
                        );
                        $results = $this->Admin_model->Login($params);

                       if (!$results) {
                          $data['message_display'] = '<div class="alert alert-danger"><strong>Sorry!! </strong>Wrong credetials provided!</div>';
                          $this->load->view('index',$data);
                       }
                        else {
                if ($results == 2) {
                    $session_data1 = array(
                        'email' => $this->input->post('email'),
                        'is_logged_in' => 1
                    );
                    echo "success";
                    $this->session->set_userdata($session_data1);
                    redirect('Student/dashboard');
                }
                else if ($results == 1) {
                    $session_dataA = array(
                        'admin_email' => $this->input->post('email'),
                        'is_logged_in_a' => 1
                    );
                    $this->session->set_userdata($session_dataA);
                    redirect('Admin/Dashboard');
                }
            }

                }
        }
       /* SUBMIT STUDENT  BANK DETAILS */

       public function Bank_details()
       {
           if ($this->session->userdata('is_logged_in')) {
              // $amount=1000;
             $regnumber=$this->Student_model->get_regnumber($this->session->userdata('email'));
         if(isset($_POST['submit'])){

             $bank=array(
             'reg_number'=>$regnumber,
             'bank_name'=>$this->input->post('bank_name'),
             'bank_branch'=>$this->input->post('bank_branch'),
             'bank_account'=>$this->input->post('account'),
             'amount'=>$this->input->post('level')
             );

             $mydet=$this->Student_model->Bank_details($bank);
             if($mydet) {
                 $this->session->set_flashdata('success', ' <div class="alert alert-success">Details Catpured Successfully.<button class="close" data-dismiss="alert" >&times;</button></div>');
                redirect('Student/StudentDetails');
             }
            $this->session->set_flashdata('error', '<div class="alert alert-danger">Error occurred while processing the request.<button class="close" data-dismiss="alert" >&times;</button></div>');
                redirect('Student/StudentDetails');

         }
         redirect('Student/StudentDetails');
       }
       }
       /* END OF BANK DETAILS SUBMISSION FUNCTION */

    //FUNCTION TO GENERATE PDF USING MPDF LIBRARIES
    function print_sections()
    {
       //     load library
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
       // retrieve data from model
        $data['sections'] = $this->Student_model->print_sections();
        //$data['title'] = "sections";
        ini_set('memory_limit', '256M');
       // boost the memory limit if it's low ;)
        $html = $this->load->view('Student/test', $data,true);
       // render the view into HTML
        $pdf->WriteHTML($html); // write the HTML into the PDF
        $output = 'Clearance Sections'.date('Y_m_d_H_i_s') . '_.pdf';

         $pdf->Output($this->config->item('file_path').$output,'F');
        //$pdf->Output("$output", 'I'); // save to file because we can
        exit();
    }



    //TEST EMAIL SENDING
    public function send_mail()
   {
           if ($this->session->userdata('is_logged_in')) {
            // Configure email library
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://smtp.googlemail.com';
            $config['smtp_port'] = 465;
            $config['smtp_user'] = 'mmustsystem@gmail.com';
            $config['smtp_pass'] = '@mmust2017';   

            $this->load->library('email'); // load email library
            // Load email library and passing configured values to email library
            $config['mailtype'] = 'html';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
            $config['newline'] = "\r\n"; //use double quotes

            $this->email->initialize($config);

            // Sender email address
            $this->email->from('mmustsystem@gmail.com', 'MMUST Clearance');
            // Receiver email address
            $email=$this->session->userdata('email');
           // $recipients= ('')
           //The student Email to which the certificate is sent
            $this->email->to($email);
             // Subject of email
            $subject = 'Clearance';
            $message = 'Congratulations!! Your Clearance has been Approved. Proceed with Graduation!';
            $this->email->subject($subject);
            // Message in email
            $this->email->message($message);
            $cert=$this->Student_model->getCertificate($this->session->userdata('email'));
             if($cert){
                $this->email->attach('clearance/certificates/'.$cert);
            }

            $this->email->send();
                $this->email->from('mmustsystem@gmail.com', 'MMUST Clearance');
            // $this->email->ClearAddresses();
            //The corresponding school email for the student  and the registrar email
            $dean_email=$this->Student_model->getDean_email($this->session->userdata('email'));
            $this->email->to($dean_email);
            $deansubject='Clearance Certificate';
            $regnumber=$this->Student_model->get_regnumber($this->session->userdata('email'));
            $deanmessage='Kindly find attached clearance certificate for '.$regnumber.' graduation group of '. date('Y');
            $this->email->subject($deansubject);
            $this->email->message($deanmessage);


             $this->email->send();

            //END OF EMAIL ATTACHMENT
                  //SEND MAIL TO THE REGISTRAR
                $this->email->from('mmustsystem@gmail.com', 'MMUST Clearance');
            // $this->email->ClearAddresses();
            //The corresponding school email for the student  and the registrar email

            $this->email->to('limocheburet@gmail.com');
            $regsubject='Clearance Certificate';
            $regnumber=$this->Student_model->get_regnumber($this->session->userdata('email'));
            $regmessage='Kindly find attached clearance certificate for '.$regnumber.' graduation group of '. date('Y');
            $this->email->subject($regsubject);
            $this->email->message($regmessage);

            //GET THE CERTIFICATE TITLE FROM DATABASE FOR EMAIL ATTACHMENT
            $cert=$this->Student_model->getCertificate($this->session->userdata('email'));
            if($cert){
                $this->email->attach('clearance/certificates/'.$cert);             }


           // $this->email->attach('clearance/certificates/Conard_Ototo_2018_04_13_11_54.pdf');
            if ($this->email->send()) {
                $data['message_display'] = '<div class="alert alert-success">Thanks for registering with us. Kindly check your email for further instructions. </div>';
            }
            else {
                //$data['message_display'] = '<div class="alert alert-danger"> Invalid Gmail Account or Password !</div>';
                show_error($this->email->print_debugger());
            }
            }

         }


         // ======================CLEARANCE AUTOMATION FUNCTION ===========================================================
         //=================INSERT SESSION DETAILS, AND CLEARANCE COMMENT==================================================
     public function Auto_Clearance()
   {

             if ($this->session->userdata('is_logged_in')) {
             $regnumber=$this->Student_model->get_regnumber($this->session->userdata('email'));
             $email=$this->session->userdata('email');
             $comment="Cleared";

              //Auto clearance Step 1: insert data of the student into clearance table
             if(isset($_POST['clear_me'])){
              $clearance=array(
               'reg_number'=>$regnumber,
               'email'=>  $email,
               'comment'=>$comment

              );


                 //STEP 2: Generate pdf certificate on successful data insertion to the clearance table in the system database
              if($this->Student_model->Auto_Clearance($clearance)){
                     //     load MPDF library and Generate PDF for cleared Student
                $this->load->library('pdf');
                $pdf = $this->pdf->load();
               //$this->load->library('mPDF');
               //$mpdf = new mPDF('utf-8', 'A4',0,'',5,10,15,16,4,9,'P');
               // retrieve data from model

               //================GET DATA STUDENT DATA AND STUDENT CLEARANCE DETAILS FROM DATABASE TO THE PDF GENERATION VIEW =========================
                $data['details'] = $this->Student_model->get_student($this->session->userdata('email'));
                $data['clear'] =$this->Student_model->get_clearanceDetails($this->session->userdata('email'));


              //========================== QRCODE GENERATION ==========================================================================================
              	    $data['img_url']="";
        			$this->load->library('ciqrcode');
        			$qr_image=rand().'.png';
        			$params['data'] =$this->Student_model->get_regnumber($this->session->userdata('email'));
        			$params['level'] = 'H';
        			$params['size'] = 8;
        			$params['savename'] =FCPATH."clearance/qr_images/".$qr_image;
        			if($this->ciqrcode->generate($params))
        			{
        				$data['img_url']=$qr_image;
        			}
             //==========================END OF QRCODE GENERATION=====================================================================================
                ini_set('memory_limit', '256M');
               // boost the memory limit if it's low ;)
               // $html = $this->load->view('Student/test',$data, true);
                $html=$this->load->view('student/test',$data,true);
               // render the view into HTML
                $pdf->WriteHTML($html); // write the HTML into the PDF
                //$pdf->WriteHTML($html,2);
                $d=new DateTime();
                $dat=$d->format('d/m/y  h:i:s a');
                $pdf->SetHTMLFooter('<div class="pdf-footer">
                <strong>Disclaimer :</strong> <i>This Document is invalid if it does not bear the Unique QRCode At the Top Left .</i>
                <hr>
                <i>Generated and Printed on '.$dat.' </i>
                </div>');
                //$regnumber=$this->Student_model->get_regnumber($this->session->userdata('email'));
               //$output =$regnumber.date('Y_m_d_H_i_s').'.pdf';

               $user=$this->Student_model->getUserName($this->session->userdata('email'));
               foreach($user as $me){
                 $output =$me['first_name'].'_'.$me['surname'].'_'.date('Y_m_d_H_i').'.pdf';
               }

               //$pdfFilePath = FCPATH."clearance/certificates/";
               // $pdf->Output(realpath($pdfFilePath).$output,"F"); // save to files
                //$cert= $pdf->Output($output,'F');

                //========================SAVE THE GENERATED PDF TO A CERTIFICATE FOLDER===============================================
               $pdf->Output($this->config->item('file_path').$output,'F');
                 //$attachment=$pdf->Output($this->config->item('file_path').$output);
                //exit();

                //End step 2

                //=======================UPDATE CLEARANCE BY UPDATING THE CLEARANCE CERTIFICATE FIELD=============================
                $certificate=array(
                   'certificate'=>$output
                  );

                  if($this->Student_model->Update_certificate($output,$this->session->userdata('email'))) {


                    //step 3: send email to the student with attached clearance certificste
                    //====================CALL THE EMAIL THE SENDING FUNCTION TO SEND PDF TO THE STUDENT ON CLEARANCE=======================
                     if($this->send_mail()){

                   echo "Success";
                  }
                  }

              }

            }


              redirect('Student/Clearance');

             }

             else{
              redirect('Admin/index');
          }

          //IMPLEMENT&nbsp;SWAL2
function DeleteStudArares()
{
     header('Content-type: application/json; charset=UTF-8');
    $response = array();
    if ($_POST['delete']) {
    $pid = $_POST['delete'];
    $sql="DELETE FROM section_arares WHERE arares_id=?";
    $result = $this->db->query($sql,$pid);

    if($result){
        	$response['status']  = 'success';
    $response['message'] = 'Product Deleted Successfully ...';
    }
    else{
        	$response['status']  = 'error';
    $response['message'] = 'Unable to delete product ...';
    }

    	echo json_encode($response);
    }

}
    }
         // =============LOGOUT FROM THE SYSTEM BY ADMIN========================
     function logout()
    {
        $this->session->unset_userdata('is_logged_in');
        $this->session->unset_userdata('email');
        $this->session->sess_destroy();
        redirect('Admin/index');
    }
         public function Clearance_controller()
         {
             $clearance_dates=$this->Student_model->Clearance_controller();
         }
}
?>