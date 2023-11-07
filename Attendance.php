<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends CI_Controller 
{
    public function __construct() {
        parent::__construct();
       $this->load->model("Attendancemodel","m");    
            
    }
	
	
    
        
public function attendancemarkjr()
    {
        $this->load->view('attendancemarkjr');
    }
 
     public  function attendancejr ()
        {
            $att="";
            if($this->input->post('ids')!=NULL)
          foreach ($this->input->post('ids') as $ids) {
                $att=$att.$ids.',';
            }
            $att=substr($att,0,-1);
           
          
            $att1="";
            if($this->input->post('ids1')!=NULL)
          foreach ($this->input->post('ids1') as $ids1) {
                $att1=$att1.$ids1.',';
            }
            $att1=substr($att1,0,-1);


            $att2="";
            if($this->input->post('ids2')!=NULL)
          foreach ($this->input->post('ids2') as $ids2) {
                $att2=$att2.$ids2.',';
            }
            $att2=substr($att2,0,-1);
           
     $data=array(
        'at_category'=>'junior',
        'date'=>  $this->input->post('date'),
        'month'=> $this->input->post('month'),
        'at_session_1'=>  $att
        
        );
     $this->db->insert('attendance',$data);
     redirect('Attendance/attendancemarkjr');
        }

 public function attendancereport()
    {
        $this->load->view('attendancereport');
    }
    public function delete($at_id){
       
       $query =  $this->db->get_where('attendance',array('at_id' => $at_id));
    if( $query->num_rows() > 0 )
    {
        $row = $query->row();
      
        $this->db->delete('attendance', array('at_id' => $at_id));
  redirect('Attendance/attendancereport');
       
        return true;
}

    return false;   
      
}

    public function attendancedetails($id)
    {
        $this->load->model('Attendancemodel');
$data['atdetails']=$this->Attendancemodel->getonerowb($id);
        $this->load->view('attendancedetails',$data);
    }

    public function attendancemarksr()
    {
        $this->load->view('attendancemarksr');
     }
     public  function attendancesr ()
        {
            $att="";
            if($this->input->post('ids')!=NULL)
          foreach ($this->input->post('ids') as $ids) {
                $att=$att.$ids.',';
            }
            $att=substr($att,0,-1);
           
          
            $att1="";
            if($this->input->post('ids1')!=NULL)
          foreach ($this->input->post('ids1') as $ids1) {
                $att1=$att1.$ids1.',';
            }
            $att1=substr($att1,0,-1);


            $att2="";
            if($this->input->post('ids2')!=NULL)
          foreach ($this->input->post('ids2') as $ids2) {
                $att2=$att2.$ids2.',';
            }
            $att2=substr($att2,0,-1);
           
     $data=array(
        'at_category'=>'senior',
        'date'=>  $this->input->post('date'),
        'month'=> $this->input->post('month'),
        'at_session_1'=>  $att
       
        );
     $this->db->insert('attendance',$data);
     redirect('Attendance/attendancemarksr');
        }
public function attendancereportsr()
    {
        $this->load->view('attendancereportsr');
    }

    public function attendancedetailsrs($id)
    {
        $this->load->model('Attendancemodel');
$data['atdetails']=$this->Attendancemodel->getonerowb($id);
        $this->load->view('attendancedetailssr',$data);
    }
    public function delete1($at_id){
       
       $query =  $this->db->get_where('attendance',array('at_id' => $at_id));
    if( $query->num_rows() > 0 )
    {
        $row = $query->row();
      
        $this->db->delete('attendance', array('at_id' => $at_id));
  redirect('Attendance/attendancereportsr');
       
        return true;
}

    return false;   
      
}


public function jrattendance()
    {
        if(!isset($_GET['month']))
$month="";
else
$month=$_GET['month'];
$data["month"]=$month;
        $this->load->view('jrattendance',$data);
    }
    
    public function srattendance()
    {
   /*    $data["total"]=$this->m->gettablef1();
       $data["absent"]=$this->m->getonestudleave1($id);
$data["present"]=$this->m-> getonestudpresent1($id);
$data["percent"]=$this->m->getonestudpercent1($id);*/
if(!isset($_GET['month']))
$month="";
else
$month=$_GET['month'];
$data["month"]=$month;
        $this->load->view('srattendance',$data);
    }


}
