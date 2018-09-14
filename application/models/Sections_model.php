<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sections_model extends CI_Model
{
 //Clearance system Dashboard data management
   // Function to register A student into the system
    public function registerStudent($newStudent)
    {
        $qry = $this->db->insert('users', $newStudent);
        if ($qry) {
            return true;
        } else {
            return false;
        }
    }
    //Add new Announcement
    public function new_Announcement($newAnnouncement)
    {
       $query=$this->db->insert('announcements',$newAnnouncement);
           if ($query) {
            return true;
        } else {
            return false;
        }
    }
        //Get schools to selectmenu in Student view
   public function getSchools(){
       $sql="SELECT * FROM schools";
       $query=$this->db->query($sql);
       return $query->result_array();
   }
         //Get Departments to selectmenu in Student view
      public function getDepartments(){
       $sql="SELECT * FROM departments";
       $query=$this->db->query($sql);
       return $query->result_array();
   }
       //Get programmes to selectmenu in Student view
   public function getProgrammes()
   {
      $sql="SELECT * FROM programmes";
    $query=$this->db->query($sql);
    return $query->result_array();
        }
         //Get Clearance Sections to selectmenu in Sections view
     public function getSections()
    {
             $sql="SELECT * FROM sections";
             $query=$this->db->query($sql);
             return $query->result_array();
    }
           //Get Announcements to the Dashboard
    public function getAnnouncements()
    {
        $sql = "SELECT * FROM announcements";
        $query=$this->db->query($sql);
        return $query->result_array();
    }

        public function get_school()
            {
                $sql = "SELECT * FROM schools";
                $query = $this->db->query($sql);
                return $query->result_array();
            }
            public function get_department($sch_id)
            {
                $sql = "SELECT * FROM departments WHERE sch_id=?";
                $query = $this->db->query($sql,array($sch_id));
                return $query->result_array();
            }

            public function get_program($dept_id)
            {
                $sql = "SELECT * FROM programmes WHERE department_id=?";
                $query = $this->db->query($sql,$dept_id);
                return $query->result_array();
            }

            //New clearance dates function
            public function new_Clearance($date_id,$newdates)
            {

                 $this->db->where('date_id',$date_id);
                 $qry=$this->db->update("clearance_dates", $newdates);
                 
                 if ($qry)
                  {
                    return true;
                    }
                    else
                    {
                     return false;
                    }

            }
            //fetch clearance dates from db
            public function get_dates()
            {
                 $sql="SELECT clearance_dates.*, status.status FROM clearance_dates, status WHERE clearance_dates.status=status.status_id";
                 $query=$this->db->query($sql);
                 return $query->result_array();
            }

            //fetch student to the arares view
            public function getStudent()
            {
                $sql="SELECT * FROM users WHERE role_id=2";
                $query=$this->db->query($sql);
                return $query->result_array();
            }

        /*==================POST ARARES TO DB VIA THE MODEL=========================*/
        public function newArares($arares)
        {
           $qry = $this->db->insert('section_arares', $arares);
            if ($qry) {
                //$this->form_validation->set_message('New Student', 'New student successfully registered.');
                return '<div class="alert alert-success">New student details Captured! </div>';
        } else {
            return false;
        }
        }

        /*==================GET STUDENTS WITH ARARES IN VARIOUS SECTIONS OF THE INSTITUTION=========================*/
        public function getStudentArares($id)
        {

           $this->db->select('*');
           $this->db->from('section_arares a');
           $this->db->join('users u','u.user_id=a.student','left');
           $this->db->join('programmes p','p.prog_id=u.program','left');
           $this->db->join('departments d','d.dept_id=p.department_id','left');
           $this->db->join('schools s','s.sch_id=d.sch_id','left');
           $this->db->join('status t','t.status_id=a.status_id','left');
           $this->db->join('sections c','c.section_id=a.section_id');
           $this->db->where('a.status_id',2);
           $this->db->where('a.section_id',$id);
           $query=$this->db->get();
           return $query->result_array();
        }


public function Deleteid($arare_id)
{
  $this->db->where('arares_id',$arare_id);

    return $this->db->delete('section_arares');
}
         public function deleteArareSweet($id)
        {
            $sql="DELETE FROM section_arares WHERE arares_id=?";
            $qry = $this->db->query($sql,$id);
            if ($qry) {
                return true;
            } else {
                return false;
            }
        }


            // Deletes a STUDENT WITH ARARES FROM DATABASE
        public function deleteArare($id)
        {
            $this->db->where('arares_id', $id);
            $qry = $this->db->delete('section_arares');
            if ($qry) {
                return true;
            } else {
                return false;
            }
        }
          // UPDATES STUDENT WITH ARARES IN DATABASE
       public function updateArares($status){
           $sql="UPDATE section_arares SET status_id=1 WHERE arares_id=?";
           $query=$this->db->query($sql,$status);
           if($query){
               return true;
           }
           else{
               return false;
           }
       }

       // OPENS CLEARANCE PROCESS
       public function OpenClearance($status){
           $sql="UPDATE clearance_dates SET status=5 WHERE date_id=?";
           $query=$this->db->query($sql,$status);
           if($query){
               return '<div class="alert alert-success">New student details Captured! </div>';
               return true;
           }
           else{
               return false;
           }
       }

        // CLOSE CLEARANCE PROCESS
       public function CloseClearance($status){
           $sql="UPDATE clearance_dates SET status=4 WHERE date_id=?";
           $query=$this->db->query($sql,$status);
           if($query){
               return true;
           }
           else{
               return false;
           }
       }

        // Logs in the Administrator into the portal
    public function Login($params)
    {
        $data = array(
            'email' => $params['email'],
            'password' => $params['password']
        );
        $qry = $this->db->get_where('users', $data);
        if ($qry->num_rows() == 1) {
            return $qry->row('role_id');
        }
        else {
            return false;
        }
    }

     public function getUserName($email)
    {
        $data = array(
            'email' => $email
        );
        $qry = $this->db->get_where('users', $data);
        if ($qry) {
            return $qry->result_array();
        }
    }

    /* Return Section_id */
      public function getSectionId($email)

        {   $sql="SELECT * FROM users WHERE email=?";
            $query=$this->db->query($sql,$email);
            if($query->num_rows()==1){
                return $query->row('section_id');
            }
            else{
                return false;
            }
            //return $query->result_array();
        }

     // UPDATE ANNOUNCEMENTS
       public function updateAnnouncement($id,$edit){

          // $sql="UPDATE announcements SET title=?, subject=? WHERE date_id=?";
           //$id=$edit['ann_id'];
           $data = array(
           'title'=>$edit['title'],
           'subject'=>$edit['subject']
           );
           $this->db->where('ann_id',$id);
          $query= $this->db->update('announcements',$data);
           //$query=$this->db->query($sql,$status);
           if($query){
               return true;
           }
           else{
               return false;
           }
       }

       public function deleteAnnouncement($id)
       {
           $sql="DELETE FROM announcements WHERE ann_id=?";
           $query=$this->db->query($sql,$id);
           if($query){
               return true;
           }
           else
           {
               return false;
           }
       }

                 //count registered students
       public function CountStudents($id){
             $this->db->select('*')->from('section_arares')->where('section_id',$id)->count_all();
              $query=$this->db->get();
              return $query->num_rows();
              
       }
                //count students with arares
       public function UnclearedStudents($id){
              $this->db->select('*')->from('section_arares')->where('status_id',2)->where('section_id',$id)->count_all();
              $query=$this->db->get();
              return $query->num_rows();
       }

                 //count cleared students
       public function ClearedStudents($id)       {
              $this->db->select('*')->from('section_arares')->where('status_id',1)->where('section_id',$id)->count_all();
              $query=$this->db->get();
              return $query->num_rows();
            /*  $sql="SELECT * FROM clearance";
              $query=$this->db->query($sql);
              return $query->num_rows();*/
       }

       /************************************GET SCHOOL DEANS FROM THE DATABASE*****************************/

    public function Deans()
    {
        $sql="SELECT school_deans.*,schools.* FROM school_deans,schools WHERE school_deans.school_id=schools.sch_id";
        $query=$this->db->query($sql);
        return $query->result_array();

    }

     public function add_dean($dean)
    {
        $qry = $this->db->insert('school_deans', $dean);
        if ($qry) {
            return true;
        } else {
            return false;
        }
    }

        // upload passport
    public function upload_passport($pass, $email)
    {
        $this->db->where('email', $email);
        $qry = $this->db->update('users', $pass);
        if ($qry) {
            return true;
        } else {
            return false;
        }
    }
    public function get_passport($email)
    {
      $sql="SELECT passport FROM users WHERE email=?";
      $query=$this->db->query($sql,$email);
      return $query->result_array();

    }

    /* FETCH IMPORTED DATA */
    function select()
	{
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('students');
    }

    /* FUNCTION TO INSERT THE IMPORTED DATA FROM A CSV FILE TO THE DATABASE */
    function insert($data)
	{
		$this->db->insert_batch('users', $data);
	}
    /* get student bank details*/
    public function get_bankDetails()
    {
        $this->db->select('first_name,middle_name, surname, school_name, department,b.reg_number,bank_name,bank_branch, bank_account,amount');
        $this->db->from('users u', 'left');
        $this->db->join('programmes p','p.prog_id=u.program','left');
        $this->db->join('departments d','d.dept_id=p.department_id','left');
        $this->db->join('schools s','s.sch_id=d.sch_id','left');
        $this->db->join('bank_details b','b.reg_number=u.reg_number');
        $query=$this->db->get();
        return $query->result_array();
    }

}

?>