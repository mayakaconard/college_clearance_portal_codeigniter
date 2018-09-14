<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(array('Admin_model'));
        $this->load->library('csvimport');
    }
    public function index() {
        $this->load->view('index');
    }
    public function Register() {
        $this->load->view('register');
    }
    public function Password_reset() {
        $this->load->view('forget_password');
    }
/*=========================ADMIN DASHBOARD FUNCTIONS===========================*/
    public function Dashboard() {
        if ($this->session->userdata('is_logged_in_a')) {
            $data['user'] = $this->Admin_model->getUserName($this->session->userdata('admin_email'));
            $data['allStudents'] = $this->Admin_model->CountStudents($this->session->userdata('admin_email'));
            $data['notCleared'] = $this->Admin_model->UnclearedStudents($this->session->userdata('admin_email'));
            $data['cleared'] = $this->Admin_model->ClearedStudents();
            $this->load->view('web_include/header', $data);
            $this->load->view('web_include/sidebar');
            $this->load->view('admin/dashboard');
            $this->load->view('web_include/footer');
        } else {
            redirect('Admin/index');
        }

    }
    public function Status() {
        if ($this->session->userdata('is_logged_in_a')) {
            $data['user'] = $this->Admin_model->getUserName($this->session->userdata('admin_email'));
            $data['clearance'] = $this->Admin_model->get_dates();
            $this->load->view('web_include/header', $data);
            $this->load->view('web_include/sidebar');
            $this->load->view('admin/clearance_status', $data);
            $this->load->view('web_include/footer');
        } else {
            redirect('Admin/index');
        }
    }
    /*
    public function Register_Student()
    {       // get schools from database
    $data['schools']=$this->Admin_model->getSchools();
    // get departments from database
    $data['departments']=$this->Admin_model->getDepartments();
    //get programmes
    $data['programmes']=$this->Admin_model->getProgrammes();

    //autoload select dropdown menu

    $this->load->view('web_include/header');
    $this->load->view('web_include/sidebar');
    $this->load->view('admin/student',$data);
    $this->load->view('web_include/footer');
    }
     */
    /* register new student */
    public function new_student() {
        if ($this->session->userdata('is_logged_in_a')) {
            $data['user'] = $this->Admin_model->getUserName($this->session->userdata('admin_email'));
            $data['schools'] = $this->Admin_model->get_school();
            $this->load->view('web_include/header', $data);
            $this->load->view('web_include/sidebar');
            $this->load->view('admin/new_student', $data);
            $this->load->view('web_include/footer');
        } else {
            redirect('Admin/index');
        }
    }

    /* display student bank details */
    public function Bank_details() {
        if ($this->session->userdata('is_logged_in_a')) {
            $data['user'] = $this->Admin_model->getUserName($this->session->userdata('admin_email'));
            $data['bank'] = $this->Admin_model->get_bankDetails();
            $this->load->view('web_include/header', $data);
            $this->load->view('web_include/sidebar');
            $this->load->view('admin/student_bank', $data);
            $this->load->view('web_include/footer');
        } else {
            redirect('Admin/index');
        }
    }

    /* Export student Bank Details to csv file */
    // Export data in CSV format
    public function exportCSV() {

        // file name
        $filename = 'bankDetails_' . date('Ymd') . '.csv';

        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");

        // get data
        $usersData = $this->Admin_model->get_bankDetails();

        // file creation
        $file = fopen('php://output', 'w');

        $header = array("First Name", "Middle Name", "Surname", "School", "Department", "Reg_no", "Bank Name", "Bank Branch", "Bank Account", "Amount");
        fputcsv($file, $header);

        foreach ($usersData as $key => $line) {
            fputcsv($file, $line);
        }

        fclose($file);
        exit;
    }

    /*  DEPENDENCY ON REGISTRATION OF STUDENT. (SELECTING A SCHOOL, ONLY DEPARTMENTS IN THE SCHOOL ARE AVAILED, SAME TO SELECTING DEPT IN THE SCHOOL TO DISPLAY PROGRAMME) */
    public function ajax_request($sch_id) {
        if (isset($_POST['sch_id'])) {
            $sch_id = $_POST['sch_id'];
            $department = $this->Admin_model->get_department($sch_id);
            $option = '<option selected disabled>Select Department</option>';
            foreach ($department as $value) {
                $option .= "<option value='" . $value['dept_id'] . "'";
                $option .= " > ";
                $option .= $value['department'] . "</option>";
            }

            echo $option;
        }

        if (isset($_POST['dept_id'])) {
            $dept_id = $_POST['dept_id'];
            $program = $this->Admin_model->get_program($dept_id);
            $option = '<option selected disabled>Select Programme</option>';

            foreach ($program as $prog) {
                $option .= "<option value='" . $prog['prog_id'] . "'";
                $option .= " > ";
                $option .= $prog['programme'] . "</option>";
            }
            echo $option;
        }

    }

    /* DISPLAY CLEARANCE SECTIONS */
    public function Sections() {
        if ($this->session->userdata('is_logged_in_a')) {
            $data['user'] = $this->Admin_model->getUserName($this->session->userdata('admin_email'));
            $data['sections'] = $this->Admin_model->getSections();
            $this->load->view('web_include/header', $data);
            $this->load->view('web_include/sidebar');
            $this->load->view('admin/sections', $data);
            $this->load->view('web_include/footer');
        } else {
            redirect('Admin/index');
        }
    }

    /* SECTIONS personnel Display*/
    public function Section_admins() {
        if ($this->session->userdata('is_logged_in_a')) {
            $data['user'] = $this->Admin_model->getUserName($this->session->userdata('admin_email'));
            $data['sections'] = $this->Admin_model->getSections();
            $this->load->view('web_include/header', $data);
            $this->load->view('web_include/sidebar');
            $this->load->view('admin/section_admins', $data);
            $this->load->view('web_include/footer');
        } else {
            redirect('Admin/index');
        }
    }

    /* Add Section Administrators to the system */
    public function add_admin() {
        if (isset($_POST['new_admin'])) {
            $role = 3;
            $password = "admin";
            $admin = array(
                'first_name' => $this->input->post('first_name'),
                'middle_name' => $this->input->post('middle_name'),
                'surname' => $this->input->post('surname'),
                'gender' => $this->input->post('gender'),
                'email' => $this->input->post('email'),
                'id_number' => $this->input->post('id'),
                'reg_number' => $this->input->post('pfnumber'),
                'section_id' => $this->input->post('section'),
                'role_id' => $role,
                'password' => $password
            );
        }
        $new_admin = $this->Admin_model->add_admin($admin);
        if ($new_admin) {
            $this->session->set_flashdata('success', ' <div class="alert alert-success">Registration Successful.<button class="close" data-dismiss="alert" >&times;</button></div>');
            redirect('Admin/Section_admins');
        } else {
            $this->session->set_flashdata('error', '<div class="alert alert-danger">Error occurred while processing the request.<button class="close" data-dismiss="alert" >&times;</button></div>');
            redirect('Admin/Section_admins');

        }
    }
    public function Update_Arares() {
        if ($this->session->userdata('is_logged_in_a')) {
            $data['user'] = $this->Admin_model->getUserName($this->session->userdata('admin_email'));
            $this->load->view('web_include/header', $data);
            $this->load->view('web_include/sidebar');
            $this->load->view('admin/students_per_section');
            $this->load->view('web_include/footer');
        } else {
            redirect('Admin/index');
        }
    }
    public function Student_Arares() {
        if ($this->session->userdata('is_logged_in_a')) {
            $data['user'] = $this->Admin_model->getUserName($this->session->userdata('admin_email'));
            $data['student'] = $this->Admin_model->getStudent();
            $data['sections'] = $this->Admin_model->getSections();
            $this->load->view('web_include/header', $data);
            $this->load->view('web_include/sidebar');
            $this->load->view('admin/student_arares', $data);
            $this->load->view('web_include/footer');
        } else {
            redirect('Admin/index');
        }
    }
    public function Student_ViewArares() {
        if ($this->session->userdata('is_logged_in_a')) {
            $data['user'] = $this->Admin_model->getUserName($this->session->userdata('admin_email'));
            $data['student_arares'] = $this->Admin_model->getStudentArares();
            $this->load->view('web_include/header', $data);
            $this->load->view('web_include/sidebar');
            $this->load->view('admin/student_view', $data);
            $this->load->view('web_include/footer');
        } else {
            redirect('Admin/index');
        }
    }
    public function Announcements() {
        if ($this->session->userdata('is_logged_in_a')) {
            $data['user'] = $this->Admin_model->getUserName($this->session->userdata('admin_email'));
            $data['announcement'] = $this->Admin_model->getAnnouncements();
            $this->load->view('web_include/header', $data);
            $this->load->view('web_include/sidebar');
            $this->load->view('admin/announcements', $data);
            $this->load->view('web_include/footer');
        } else {
            redirect('Admin/index');
        }

    }

    public function Profile() {
        if ($this->session->userdata('is_logged_in_a')) {
            $data['user'] = $this->Admin_model->getUserName($this->session->userdata('admin_email'));
            //$data['photo']=$this->Admin_model->get_passport($this->session->userdata('admin_email'));
            $file_name = 'passport';
            $image = $this->upload_passport($file_name);
            if (!empty($_POST['update'])) {
                $pass = array(
                    'passport' => $image
                );

                $update = $this->Admin_model->upload_passport($pass, $this->session->userdata('admin_email'));
            }
            //$data['announcement']=$this->Admin_model->getAnnouncements();
            $this->load->view('web_include/header', $data);
            $this->load->view('web_include/sidebar');
            $this->load->view('admin/profile', $data);
            $this->load->view('web_include/footer');
        } else {
            redirect('Admin/index');
        }

    }

    //function to upload the profile passport
    public function upload_passport($passport) {
        $field_name = $passport;
        $config['upload_path'] = 'clearance/profiles/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['max_width'] = '3000';
        $config['max_height'] = '2900';
        $config['encrypt_name'] = true;

        // $this->load->library('upload',$config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($field_name)) {
            //$ok_url = "Profile";
            // $message = urlencode("A problem was encountered while uploading the passport. Only images of type GIF, PNG and JPEG not more than 2MB are allowed. Check the image then try again.");
            //redirect('Admin/Profile');
            //redirect('Admin/Profile'.$ok_url.'/'. $message);
        } else {
            $file_data = $this->upload->data();
            $filename = $file_data['file_name'];
            return $filename;
        }

    }

    /******************* SCHOOL DEANS VIEW*******************************/
    public function Deans() {
        if ($this->session->userdata('is_logged_in_a')) {
            $data['user'] = $this->Admin_model->getUserName($this->session->userdata('admin_email'));
            $data['schools'] = $this->Admin_model->get_school();
            $data['get_dean'] = $this->Admin_model->Deans();
            $this->load->view('web_include/header', $data);
            $this->load->view('web_include/sidebar');
            $this->load->view('admin/school_deans', $data);
            $this->load->view('web_include/footer');
        } else {
            redirect('Admin/index');
        }
    }

    public function add_dean() {
        if (isset($_POST['dean'])) {
            $dean = array(
                'title' => $this->input->post('title'),
                'surname' => $this->input->post('surname'),
                'fname' => $this->input->post('fname'),
                'pf_number' => $this->input->post('pfnumber'),
                'school_id' => $this->input->post('school'),
                'email_address' => $this->input->post('email')
            );
        }
        $new_dean = $this->Admin_model->add_dean($dean);
        if ($new_dean) {
            $this->session->set_flashdata('success', ' <div class="alert alert-success">Registration Successful.<button class="close" data-dismiss="alert" >&times;</button></div>');
            redirect('Admin/Deans');
        } else {
            $this->session->set_flashdata('error', '<div class="alert alert-danger">Error occurred while processing the request.<button class="close" data-dismiss="alert" >&times;</button></div>');
            redirect('Admin/Deans');

        }
    }

    //REGISTER A STUDENT INTO DATABASE
    public function registerStudent() {

        $role = 2;
        //$password = random_string('numeric',8);
        $password = 12345;
        if (isset($_POST['register'])) {
            $newStudent = array(
                'first_name' => $this->input->post('fname'),
                'middle_name' => $this->input->post('mname'),
                'surname' => $this->input->post('lname'),
                'gender' => $this->input->post('gender'),
                'id_number' => $this->input->post('idnumber'),
                'email' => $this->input->post('email'),
                'reg_number' => $this->input->post('regno'),
                'program' => $this->input->post('program'),
                'role_id' => $this->input->post('idnumber'),
                'role_id' => $role,
                'password' => $password
            );
        }
        $student = $this->Admin_model->registerStudent($newStudent);
        //$this->new_student();
        if ($student) {
            $this->session->set_flashdata('success', ' <div class="alert alert-success">Registration Successful.<button class="close" data-dismiss="alert" >&times;</button></div>');
            redirect('Admin/new_student');
        } else {
            $this->session->set_flashdata('error', '<div class="alert alert-danger">Error occurred while processing the request.<button class="close" data-dismiss="alert" >&times;</button></div>');
            redirect('Admin/new_student');

        }
    }

    // POST ANNOUNCEMENTS IN THE STUDENT PORTAL
    public function post_Announcement() {
        if (isset($_POST['announcement'])) {
            $newAnnouncement = array(
                'title' => $this->input->post('title'),
                'subject' => $this->input->post('subject'),
                'date_issued' => $this->input->post('date')
            );
            $announce = $this->Admin_model->new_Announcement($newAnnouncement);
            $this->Announcements();
        }
    }
    //POST CLEARANCE DATES/ RANGE FOR THE CLEARANCE PROCESS
    public function set_date($date_id) {

        if (isset($_POST['add_date'])) {
            $newdate = array(
                'start_date' => $this->input->post('from'),
                'end_date' => $this->input->post('to'),
                'academic_year' => $this->input->post('acyear')
            );

            $newdate = $this->Admin_model->new_Clearance($date_id, $newdate);
            $this->Status();
        }
    }
    //===============POST ARARES TO THE ARARES TABLE=============================
    public function setArares() {
        $status = 2;
        if (isset($_POST['newArare'])) {
            $arares = array(
                'student' => $this->input->post('student'),
                'section_id' => $this->input->post('section'),
                'arares' => $this->input->post('st_arares'),
                'date' => date('Y-m-d'),
                'status_id' => $status
            );
            $arares = $this->Admin_model->newArares($arares);
            //$this->Student_Arares();
            if ($arares) {
                $this->session->set_flashdata('success', ' <div class="alert alert-success">Student Arare Capturered Successfully.<button class="close" data-dismiss="alert" >&times;</button></div>');
                redirect('Admin/Student_Arares');
            } else {
                $this->session->set_flashdata('error', '<div class="alert alert-danger">Error occurred while processing the request.<button class="close" data-dismiss="alert" >&times;</button></div>');
                redirect('Admin/Student_Arares');

            }
        }
    }

    public function Deleteid($arare_id) {
        if ($this->Admin_model->Deleteid($arare_id)) {
            return redirect('Admin/Student_ViewArares');
        }
    }

    function DeleteStudArares() {
        $response = array();
        if ($_POST['delete']) {
            $pid = intval($_POST['delete']);
            $sql = "DELETE FROM section_arares WHERE arares_id=?";
            $result = $this->db->query($sql, $pid);

            if ($result) {
                $response['status'] = 'success';
                $response['message'] = 'Product Deleted Successfully ...';
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Unable to delete product ...';
            }

            echo json_encode($response);
        }

    }

    /*=====function to delete STUDENT ARARE FROM DATABASE======*/
    function DeleteStudentArares($id) {

        $results = $this->Admin_model->deleteArare($id);
        if ($results) {
            $this->session->set_flashdata('success', ' <div class="alert alert-success">Student Arare Deleted.<button class="close" data-dismiss="alert" >&times;</button></div>');
            redirect('Admin/Student_ViewArares');
        } else {
            $this->session->set_flashdata('error', '<div class="alert alert-danger">Error occurred while processing the request.<button class="close" data-dismiss="alert" >&times;</button></div>');
            redirect('Admin/Student_ViewArares');

        }
    }

    /*================UPDATE THE  STUDENT ARARES====================================*/
    public function updateArares($status) {
        $results = $this->Admin_model->updateArares($status);
        if ($results) {
            $this->session->set_flashdata('success', ' <div class="alert alert-success">Student Cleared Successfully.<button class="close" data-dismiss="alert" >&times;</button></div>');
            redirect('Admin/Student_ViewArares');
        } else {
            $this->session->set_flashdata('error', '<div class="alert alert-danger">Error occurred while processing the request.<button class="close" data-dismiss="alert" >&times;</button></div>');
            redirect('Admin/Student_ViewArares');

        }

    }

    /*================OPEN CLEARANCE PROCESS====================================*/
    public function OpenClearance($status) {
        $results = $this->Admin_model->OpenClearance($status);
        if ($results) {

            echo "Clearance Process Opened Successfully!";
            redirect('Admin/Status');
        } else {

            echo "Problem Encountered!!. Try again!";
            redirect('Admin / Status');
        }

    }

    /*================CLOSE CLEARANCE PROCESS====================================*/
    public function CloseClearance($status) {
        $results = $this->Admin_model->CloseClearance($status);
        if ($results) {
            echo "Clearance Process CLOSED Successfully!";
            redirect('Admin/Status');

        } else {

            alert('Problem Encountered!!. Try again!');
            redirect('Admin/Status');

        }

    }

    /*================UPDATE ANNOUNCEMENTS====================================*/
    public function updateAnnouncement($id) {
        if (isset($_POST['announcement'])) {
            $edit = array(
                //'ann_id'=>$this->input->post('ann_id'),
                'title' => $this->input->post('title'),
                'subject' => $this->input->post('subject')
            );

            $results = $this->Admin_model->updateAnnouncement($id, $edit);

            redirect('Admin/Announcements');
            /*if ($results) {
        ?>
        <script>
        alert('Record Updated Successfully!');
        window.location.href = '<?php echo site_url('Admin / Announcements'); ?>';
        </script>
        <?php
        } else {
        ?>
        <script>
        alert('Problem perfoming Update operation. Try again!');
        window.location.href = '<?php echo site_url('Admin / Announcements'); ?>';
        </script>
        <?php
        }*/

        }
    }

    public function deleteAnnouncement($id) {
        $delete = $this->Admin_model->deleteAnnouncement($id);
        $this->Announcements();
    }
    /*=====function to login into the dashboard as ADMIN======*/
    /*public function dashboard(){
    if ($this->session->userdata('is_logged_in_a')) {
    $data['allStudents']=$this->Admin_model->CountStudents($role_id,$this->userdata('email'));
    //$data['clearedStudents']=$this->Admin_model->CountClearedStudents($role_id,$this->userdata('email'));

    }
    else {
    redirect('Admin/index');
    }
    }
     */

    /* LOAD THE IMPORTED STUDENT DATA */
    function load_data() {
        $result = $this->Admin_model->select();
        $output = '
         <h3 align="center">Imported User Details from CSV File</h3>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Sr. No</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Email Address</th>
                </tr>
        ';
        $count = 0;
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
                $count = $count + 1;
                $output .= '
                <tr>
                    <td>' . $count . '</td>
                    <td>' . $row->first_name . '</td>
                    <td>' . $row->last_name . '</td>
                    <td>' . $row->phone . '</td>
                    <td>' . $row->email . '</td>
                </tr>
                ';
            }
        } else {
            $output .= '
            <tr>
                <td colspan="5" align="center">Data not Available</td>
            </tr>
            ';
        }
        $output .= '</table></div>';
        echo $output;
    }

    public function CSV() {

        $file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
        foreach ($file_data as $row) {

            $data[] = array(
                'firstname' => $row['firstname'],
                'lastname' => $row['lastname'],
                'email' => $row['email'],
                'phone' => $row['phone']
            );
        }
        $import = $this->Admin_model->insert($data);
        if ($import) {
            $this->session->set_flashdata('success', ' <div class="alert alert-success">Students record Successfully Updated.<button class="close" data-dismiss="alert" >&times;</button></div>');
            redirect('Admin/new_student');
        } else {
            $this->session->set_flashdata('error', ' <div class="alert alert-danger">Sorry! an error Occured.<button class="close" data-dismiss="alert" >&times;</button></div>');
            redirect('Admin/new_student');
        }

    }

    /* FUNCTION TO IMPORT STUDENT RECORDS IN FOR OF EXCEL SPREADSHEET TO THE SYSTEM DATABASE */
    public function import() {
        $file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
        foreach ($file_data as $row) {
            $role = 2;
            $password = 12345;
            $data[] = array(
                'first_name' => $row['First Name'],
                'middle_name' => $row['Middle Name'],
                'surname' => $row['Surname'],
                'gender' => $row['Gender'],
                'id_number' => $row['Id Number'],
                'email' => $row['Email'],
                'reg_number' => $row['Registration Number'],
                'program' => $row['Program'],
                'role_id' => $role,
                'password' => $password
            );

        }
        $import = $this->Admin_model->insert($data);
        if ($import) {
            $this->session->set_flashdata('failed', ' <div class="alert alert-danger">Sorry! an error Occured.<button class="close" data-dismiss="alert" >&times;</button></div>');
            redirect('Admin/new_student');
        } else {

            $this->session->set_flashdata('imported', ' <div class="alert alert-success">Students record Successfully Updated.<button class="close" data-dismiss="alert" >&times;</button></div>');
            redirect('Admin/new_student');
        }

    }

    /*=====function to login into the dashboard as ADMIN======*/
    function Login() {
        if (isset($_POST['btn-login'])) {
            $params = array(
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );
            $results = $this->Admin_model->Login($params);

            if (!$results) {
                $data['message_display'] = '<div class="alert alert-danger"><strong>Sorry!! </strong>Wrong credetials provided!</div>';
                $this->load->view('index', $data);
            } else {
                if ($results == 2) {
                    $session_data1 = array(
                        'email' => $this->input->post('email'),
                        'is_logged_in' => 1
                    );
                    echo "success";
                    $this->session->set_userdata($session_data1);
                    redirect('Student/Dashboard');
                } else if ($results == 1) {
                    $session_dataA = array(
                        'admin_email' => $this->input->post('email'),
                        'is_logged_in_a' => 1
                    );
                    $this->session->set_userdata($session_dataA);
                    redirect('Admin/Dashboard');
                } else if ($results == 3) {
                    $session_dataA = array(
                        'section_email' => $this->input->post('email'),
                        'is_logged_in_s' => 1
                    );
                    $this->session->set_userdata($session_dataA);
                    redirect('Sections/Dashboard');
                }

            }

        }
    }

    // =============LOGOUT FROM THE SYSTEM BY ADMIN========================
    function logout() {
        $this->session->unset_userdata('is_logged_in');
        $this->session->unset_userdata('email');
        $this->session->sess_destroy();
        redirect('Admin/index');
    }

}

?>
