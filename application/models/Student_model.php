<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Student_model extends CI_Model
{
 //Clearance system Dashboard data management

           //Get Announcements to the Dashboard
    public function getAnnouncements()
    {
        $sql = "SELECT * FROM announcements";
        $query=$this->db->query($sql);
        return $query->result_array();
    }


 /*******************************GET STUDENT CLEARANCE DETAILS IN THE STUDENT DASHBOARD************************************************/

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

    //GET THE ACADEMIC DETAUILS OF A STUDENT AS PER HIS/HER SESSION
    /*****************************GET ACAADENIC DETAILS OF A STUDENT AS PER HIS/HER SESSION***********************************************/
    public function StudentDetails($user)
    {

        $this->db->select('*');
        $this->db->from('users u');
        $this->db->join('programmes p','p.prog_id=u.program');
        $this->db->join('departments d','d.dept_id=p.department_id','left');
        $this->db->join('schools s','s.sch_id=d.sch_id','left');


        $this->db->where('u.email',$user);
        $query=$this->db->get();
        return $query;
    }



/*****************************GET THE REGNO OF THE CLEARING STUDENT***********************************************/
    function get_regnumber($email)
{   $sql="SELECT * FROM users WHERE email=?";
    $query=$this->db->query($sql,$email);
    if($query->num_rows()==1){
        return $query->row('reg_number');
    }
    else{
        return false;
    }
    //return $query->result_array();
}


/*****************************GET DEPARTMENTS CLEARED BY A STUDENT AS PER HIS/HER SESSION***********************************************/
    public function Departments_notclered($user)
    {

        $this->db->select('*');
        $this->db->from('section_arares a');
        $this->db->join('sections s','s.section_id=a.section_id','left');
       // $this->db->join('departments d','d.dept_id=a.department_id','left');
        $this->db->join('users u','u.user_id=a.student','left');
        $this->db->join('status t','t.status_id=a.status_id');
        $this->db->where('u.email',$user ,'a.status_id',2);
        $this->db->where('a.status_id',2);
        $query=$this->db->get();
        return $query;
    }

               //count Departments not cleared
       public function UnclearedSections($email)
       {
              $sql="SELECT section_arares.student,section_arares.status_id,users.email,users.user_id FROM section_arares,users
                    WHERE section_arares.student=users.user_id AND users.email=? AND section_arares.status_id=2";
              $query=$this->db->query($sql,$email);
              return $query->num_rows();
       }
                //GET SECTIONS not cleared
                public function count_sections($email)
                {
                       $sql="SELECT * FROM sections";
                       $query=$this->db->query($sql,$email);
                       return $query->num_rows();
                }



    public function Check_Sections($user)
    {

        $this->db->select('*');
        $this->db->from('section_arares a');
        $this->db->join('users u','u.user_id=a.student');
        $this->db->where('u.email',$user);
        $this->db->where('a.status_id',2);
        $query=$this->db->get();
        $count=$query->num_rows();
       //$count=$this->db->count_all_results('section_arares');

            return $count;

    }

    //FUNCTION FOR PDF GENERATION USING THE MPDF LIBRARIES
    function print_sections()
{   $sql="SELECT * FROM sections";
    $query=$this->db->query($sql);
    return $query->result_array();
}
/*****************************INSERT SESSION DATA OF THE CLEARING STUDENT INTO THE CLEARANCE TABLE FOR CLEARANCE***********************************************/
public function Auto_Clearance($clearance)
{
    $qry = $this->db->insert('clearance', $clearance);
        if ($qry) {
            return true;
        } else {
            return false;
        }
}
/*****************************GET DETAILS OF THE CLEARING STUDENTS*************************************************************/
public function get_student($email)
{
    $this->db->select('*');
    $this->db->from('users u');
    $this->db->join('programmes p','p.prog_id=u.program','left');
    $this->db->join('departments d','d.dept_id=p.department_id','left');
    $this->db->join('schools s','s.sch_id=d.sch_id','left');
    $this->db->join('clearance c','u.reg_number=c.reg_number');
    $this->db->where('u.email',$email);

    $query=$this->db->get();
    return $query->result_array();
   // return $query;
}
/*****************************GET CLEARANCE DETAILS FROM DATABASE FOR PDF GENERATION***********************************************/
public function get_clearanceDetails($email)
{

    $sql="SELECT sections.*, clearance.*  FROM sections, clearance WHERE email=?" ;
        $qry=$this->db->query($sql,$email);
        return $qry->result_array();

}

/*****************************UPDATE THE CLEARANCE TABLE BU SETTING THE CLEARANCE TITLE OF THE CLEARING STUDENT INTO DATABASE FOR EMAIL ATTACHMENT**************************/
public function Update_certificate($output,$email)
{
    $sql="UPDATE clearance SET certificate='$output' WHERE email=?";
    $query=$this->db->query($sql,$email);
    return true;
}

/*****************************GET CLEARANCE CERTIFICATE TITLE FROM DATABASE FOR EMAIL ATTACHMENT***********************************************/
public function getCertificate($email)
{
    $sql="SELECT certificate FROM clearance WHERE email=?";
    $query=$this->db->query($sql,$email);
     if($query->num_rows()==1){
        return $query->row('certificate');
    }
}

/*****************************GET SCHOOL DEAN EMAIL IN WHICH THE STUDENT BELONG FOR CLEARANCE CERTIFICATE MAILING ***********************************************/
public function getDean_email($email)
{
    $sql="SELECT users.*, school_deans.email_address, programmes.department_id, departments.sch_id, schools.sch_id FROM users, school_deans, programmes, departments, schools WHERE users.program=programmes.prog_id AND programmes.department_id=departments.dept_id AND departments.sch_id=schools.sch_id AND users.email=? AND school_deans.school_id=departments.sch_id";
    $query=$this->db->query($sql,$email);
     if($query->num_rows()==1){
        return $query->row('email_address');
}
}


//check bank Details
public function BankCheck($email)
{
   //$sql="SELECT * FROM bank_details WHERE reg_number=?";
        $this->db->select('*');
        $this->db->from('bank_details d');
        $this->db->join('users u','u.reg_number=d.reg_number');
        $this->db->where('u.email',$email);
        $query=$this->db->get();
         $count=$query->num_rows();
    if($count>0){
        return true;
    }
    else{
        return false;
    }
}

/*****************************CHECK THE CLEARANCE STATUS OF THE STUDENT ***********************************************/
public function Check_clearance($email)
{
    $sql="SELECT * FROM clearance WHERE email=?";
    $query=$this->db->query($sql,$email);
    if($query->num_rows()==1){
        return true;
    }
    else{
        return false;
    }
}

public function Check_sectionClearance($email)
{
        $this->db->select('*');
        $this->db->from('section_arares a');
        $this->db->join('users u','u.user_id=a.student');
        $this->db->where('u.email',$email);
        $this->db->where('a.status_id',2);
        $query=$this->db->get();
        $count=$query->num_rows();
     if($count>0){
        return true;
    }
    else{
        return false;
    }
}

/* Control the clearance period  */
public function Clearance_controller()
{
 $this->db->select('status');
 $this->db->from('clearance_dates');
 $query=$this->db->get();
 return $query->row('status');


}
  /* Student bank details */
  public function Bank_details($bank){
      $qry = $this->db->insert('bank_details', $bank);
        if ($qry) {
            return true;
        } else {
            return false;
        }
  }
}

?>