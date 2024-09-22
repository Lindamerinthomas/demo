<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends CI_Controller 
{
    public function __construct() {
        parent::__construct();
     $this->load->model("Activitymodel","m");     
            
    }


  //indoor projects  
        
public function indoorprojects()
    {
        $this->load->view('indoorprojects');
    }
     public  function saveind()
        {
            
     $data=array(
        'date'=>  $this->input->post('date'),
        'ind_subject'=>  $this->input->post('ind_subject'),
        'ind_subject_details'=>  $this->input->post('ind_subject_details'),
        'ind_conductor'=>  $this->input->post('ind_conductor'),
        'ind_no_student'=>  $this->input->post('ind_no_student'),
        'ind_program_coordinater'=>  $this->input->post('ind_program_coordinater'),
        'ind_remarks'=>  $this->input->post('ind_remarks')
        );
     $this->db->insert('act_indoorclass',$data);
     redirect('Activity/indoorprojects');
        }

        public function indoorreport()
    {
        $this->load->view('indoorreport');
    }

  public function indoordetails($id)
    {
       {
        $this->load->model('Activitymodel');
$data['inddetails']=$this->Activitymodel->getonerow($id);
        $this->load->view('indoordetails',$data);
    }
    }

public function delete($ind_id){
       
       $query =  $this->db->get_where('act_indoorclass',array('ind_id' => $ind_id));
    if( $query->num_rows() > 0 )
    {
        $row = $query->row();
       
        $this->db->delete('act_indoorclass', array('ind_id' => $ind_id));
  redirect('Activity/indoorreport');
       
        return true;
}

    return false;   
      
}
  public function indooredit($id)
    {
    {
       {
        $this->load->model('Activitymodel');
$data['inddetails']=$this->Activitymodel->getonerow($id);
        $this->load->view('indooredit',$data);
    }
    }
    }
public  function updateind($id)
        {

  $id=$this->input->post('ind_id');
            
     $data=array(
        'date'=>  $this->input->post('date'),
        'ind_subject'=>  $this->input->post('ind_subject'),
        'ind_subject_details'=>  $this->input->post('ind_subject_details'),
        'ind_conductor'=>  $this->input->post('ind_conductor'),
        'ind_no_student'=>  $this->input->post('ind_no_student'),
        'ind_program_coordinater'=>  $this->input->post('ind_program_coordinater'),
        'ind_remarks'=>  $this->input->post('ind_remarks')
        );

    $this->db->where('ind_id',$id);
     $this->db->update('act_indoorclass',$data);
     redirect('Activity/indoordetails/'.$id);
        }


     public function spcminiprojects()
    {
        $this->load->view('spcminiprojects');
    }

    public  function savemini()
        {
            
     $data=array(
        'date'=>  $this->input->post('date'),
        'mini_project'=>  $this->input->post('mini_project'),
        'mini_project_details'=>  $this->input->post('mini_project_details'),
        'mini_conductor'=>  $this->input->post('mini_conductor'),
        'mini_no_students'=>  $this->input->post('mini_no_students'),
        'mini_program_coordinater'=>  $this->input->post('mini_program_coordinater'),
        'mini_remarks'=>  $this->input->post('mini_remarks')
        );
     $this->db->insert('act_spcmini',$data);
     redirect('Activity/spcminiprojects');
        }
        

        public function spcminireport()
    {
        $this->load->view('spcminireport');
    }
    public function spcminidetails($id)
    {
           {
       {
        $this->load->model('Activitymodel');
$data['mindetails']=$this->Activitymodel->getonerowa($id);
        $this->load->view('spcminidetails',$data);
    }
    }
    }

public function delete1($mini_id){
       
       $query =  $this->db->get_where('act_spcmini',array('mini_id' => $mini_id));
    if( $query->num_rows() > 0 )
    {
        $row = $query->row();
       
        $this->db->delete('act_spcmini', array('mini_id' => $mini_id));
  redirect('Activity/spcminireport');
       
        return true;
}

    return false;   
      
}

 public function spcminiedit($id)
    {
    {
       {
        $this->load->model('Activitymodel');
$data['mindetails']=$this->Activitymodel->getonerowa($id);
        $this->load->view('spcminiedit',$data);
    }
    }
    }
public  function updatespcmini($id)
        {

  $id=$this->input->post('mini_id');
            
     $data=array(
        'date'=>  $this->input->post('date'),
        'mini_project'=>  $this->input->post('mini_project'),
        'mini_project_details'=>  $this->input->post('mini_project_details'),
        'mini_conductor'=>  $this->input->post('mini_conductor'),
        'mini_no_students'=>  $this->input->post('mini_no_students'),
        'mini_program_coordinater'=>  $this->input->post('mini_program_coordinater'),
        'mini_remarks'=>  $this->input->post('mini_remarks')
        );

    $this->db->where('mini_id',$id);
     $this->db->update('act_spcmini',$data);
     redirect('Activity/spcminidetails/'.$id);
        }

    //field visit
         public function fieldvisit()
    {
        $this->load->view('fieldvisit');
    }

    public  function savefield()
        {
            
     $data=array(
        'date'=>  $this->input->post('date'),
        'fld_place'=>  $this->input->post('fld_place'),
        'fld_details'=>  $this->input->post('fld_details'),
        'fld_no_students'=>  $this->input->post('fld_no_students'),
        'fld_program_coordinator'=>  $this->input->post('fld_program_coordinator'),
        'fld_remarks'=>  $this->input->post('fld_remarks')
        );
     $this->db->insert('act_field',$data);
     redirect('Activity/fieldvisit');
        }
        
       

       public function fieldvisitreport()
    {
        $this->load->view('fieldvisitreport');
    }
      public function fvdetails($id)
    {
           {
       {
        $this->load->model('Activitymodel');
$data['fvdetails']=$this->Activitymodel->getonerowb($id);
        $this->load->view('fvdetails',$data);
    }
    }
    }
public function delete2($fld_id){
       
       $query =  $this->db->get_where('act_field',array('fld_id' => $fld_id));
    if( $query->num_rows() > 0 )
    {
        $row = $query->row();
       
        $this->db->delete('act_field', array('fld_id' => $fld_id));
  redirect('Activity/fieldvisitreport');
       
        return true;
}

    return false;   
      
}

 public function fvedit($id)
    {
    {
       {
        $this->load->model('Activitymodel');
$data['fvdetails']=$this->Activitymodel->getonerowb($id);
        $this->load->view('fvedit',$data);
    }
    }
    }
    public  function updatefield($id)
        {

  $id=$this->input->post('fld_id');
            
     $data=array(
        'date'=>  $this->input->post('date'),
        'fld_place'=>  $this->input->post('fld_place'),
        'fld_details'=>  $this->input->post('fld_details'),
        'fld_no_students'=>  $this->input->post('fld_no_students'),
        'fld_program_coordinator'=>  $this->input->post('fld_program_coordinator'),
        'fld_remarks'=>  $this->input->post('fld_remarks')
        );

    $this->db->where('fld_id',$id);
     $this->db->update('act_field',$data);
     redirect('Activity/fvdetails/'.$id);
        }


//meeting

       public function meeting()
    {
        $this->load->view('meeting');
    }

    public  function savemeeting()
        {
            
     $data=array(
        'date'=>  $this->input->post('date'),
        'met_name'=>  $this->input->post('met_name'),
        'met_no_parent'=>  $this->input->post('met_no_parent'),
        'met_officials'=>  $this->input->post('met_officials'),
        'met_program_coordinater'=>  $this->input->post('met_program_coordinater'),
        'met_remarks'=>  $this->input->post('met_remarks')
        );
     $this->db->insert('act_met',$data);
     redirect('Activity/meeting');
        }

        public function meetingreport()
    {
        $this->load->view('meetingreport');
    }
     public function meetingdetails($id)
     
    {
           {
       {
        $this->load->model('Activitymodel');
$data['metdetails']=$this->Activitymodel->getonerowd($id);
        $this->load->view('meetingdetails',$data);
    }
    }
    }
public function delete3($met_id){
       
       $query =  $this->db->get_where('act_met',array('met_id' => $met_id));
    if( $query->num_rows() > 0 )
    {
        $row = $query->row();
       
        $this->db->delete('act_met', array('met_id' => $met_id));
  redirect('Activity/meetingreport');
       
        return true;
}

    return false;   
      
}
public function meetingedit($id)
    {
    {
       {
        $this->load->model('Activitymodel');
$data['metdetails']=$this->Activitymodel->getonerowd($id);
        $this->load->view('meetingedit',$data);
    }
    }
    }
    public  function updatemet($id)
        {

  $id=$this->input->post('met_id');
            
      $data=array(
        'date'=>  $this->input->post('date'),
        'met_name'=>  $this->input->post('met_name'),
        'met_no_parent'=>  $this->input->post('met_no_parent'),
        'met_officials'=>  $this->input->post('met_officials'),
        'met_program_coordinater'=>  $this->input->post('met_program_coordinater'),
        'met_remarks'=>  $this->input->post('met_remarks')
        );

    $this->db->where('met_id',$id);
     $this->db->update('act_met',$data);
     redirect('Activity/meetingdetails/'.$id);
        }

 //adviory committees
  
 public function advisorycommittees()
    {
        $this->load->view('advisorycommittees');
    }

      public  function savecmt()
        {
            
     $data=array(
        'date'=>  $this->input->post('date'),
        'cmt_reason'=>  $this->input->post('cmt_reason'),
        'cmt_no_person'=>  $this->input->post('cmt_no_person'),
        'cmt_oficials'=>  $this->input->post('cmt_oficials'),
        
        'cmt_program_coordinator'=>  $this->input->post('cmt_program_coordinator'),
        'cmt_decisions'=>  $this->input->post('cmt_decisions'),
        'cmt_remarks'=>  $this->input->post('cmt_remarks')
        );
     $this->db->insert('act_committees',$data);
     redirect('Activity/advisorycommittees');
        }

public function advisoryreport()
    {
        $this->load->view('advisoryreport');
    }
      public function advcdetails($id)
     
    {
           {
       {
        $this->load->model('Activitymodel');
$data['advcdetails']=$this->Activitymodel->getonerowc($id);
        $this->load->view('advcdetails',$data);
    }
    }
    }
public function delete4($cmt_id){
       
       $query =  $this->db->get_where('act_committees',array('cmt_id' => $cmt_id));
    if( $query->num_rows() > 0 )
    {
        $row = $query->row();
       
        $this->db->delete('act_committees', array('cmt_id' => $cmt_id));
  redirect('Activity/advisoryreport');
       
        return true;
}

    return false;   
      
}
public function advcedit($id)
    {
    {
       {
        $this->load->model('Activitymodel');
$data['advcdetails']=$this->Activitymodel->getonerowc($id);
        $this->load->view('advcedit',$data);
    }
    }
    }
    public  function updateadvc($id)
        {

  $id=$this->input->post('cmt_id');
            
       $data=array(
        'date'=>  $this->input->post('date'),
        'cmt_reason'=>  $this->input->post('cmt_reason'),
        'cmt_no_person'=>  $this->input->post('cmt_no_person'),
        'cmt_oficials'=>  $this->input->post('cmt_oficials'),
        
        'cmt_program_coordinator'=>  $this->input->post('cmt_program_coordinator'),
        'cmt_decisions'=>  $this->input->post('cmt_decisions'),
        'cmt_remarks'=>  $this->input->post('cmt_remarks')
        );

    $this->db->where('cmt_id',$id);
     $this->db->update('act_committees',$data);
     redirect('Activity/advcdetails/'.$id);
        }


        //tenth class
  
    public function tenthclass()
    {
        $this->load->view('tenthclass');
    }

public  function savetenth()
        {
            
     $data=array(
        'date'=>  $this->input->post('date'),
        'tnt_name'=>  $this->input->post('tnt_name'),
        'tnt_activity'=>  $this->input->post('tnt_activity'),
        'tnt_no_students'=>  $this->input->post('tnt_no_students'),
        'tnt_program_coordinator'=>  $this->input->post('tnt_program_coordinator'),
        'tnt_remarks'=>  $this->input->post('tnt_remarks')
       
        );
     $this->db->insert('act_tenth',$data);
     redirect('Activity/tenthclass');
        }

        public function tenthreport()
    {
        $this->load->view('tenthreport');
    }
     public function tenthdetails($id)
     
    {
           {
       {
        $this->load->model('Activitymodel');
$data['tenthdetails']=$this->Activitymodel->getonerowe($id);
        $this->load->view('tenthdetails',$data);
    }
    }
    }
public function delete5($tnt_id){
       
       $query =  $this->db->get_where('act_tenth',array('tnt_id' => $tnt_id));
    if( $query->num_rows() > 0 )
    {
        $row = $query->row();
       
        $this->db->delete('act_tenth', array('tnt_id' => $tnt_id));
  redirect('Activity/tenthreport');
       
        return true;
}

    return false;   
      
}
public function tenthedit($id)
    {
    {
       {
        $this->load->model('Activitymodel');
$data['tenthdetails']=$this->Activitymodel->getonerowe($id);
        $this->load->view('tenthedit',$data);
    }
    }
    }
    public  function updatetenth($id)
        {

  $id=$this->input->post('tnt_id');
            
       $data=array(
        'date'=>  $this->input->post('date'),
        'tnt_name'=>  $this->input->post('tnt_name'),
        'tnt_activity'=>  $this->input->post('tnt_activity'),
        'tnt_no_students'=>  $this->input->post('tnt_no_students'),
        'tnt_program_coordinator'=>  $this->input->post('tnt_program_coordinator'),
        'tnt_remarks'=>  $this->input->post('tnt_remarks')
        );

    $this->db->where('tnt_id',$id);
     $this->db->update('act_tenth',$data);
     redirect('Activity/tenthdetails/'.$id);
        }


//Special Days

     public function specialdays()
    {
        $this->load->view('specialdays');
    }

    public  function savespecial()
        {
            
     $data=array(
        'date'=>  $this->input->post('date'),
        'spl_name'=>  $this->input->post('spl_name'),
        'spl_speciality'=>  $this->input->post('spl_speciality'),
        'spl_activity'=>  $this->input->post('spl_activity'),
        'spl_no_students'=>  $this->input->post('spl_no_students'),
        'spl_program_coordinator'=>  $this->input->post('spl_program_coordinator'),
        'spl_remarks'=>  $this->input->post('spl_remarks')
       
        );
     $this->db->insert('act_special',$data);
     redirect('Activity/specialdays');
        }


 public function specialdayreport()
    {
        $this->load->view('specialdayreport');
    }
      public function spldetails($id)
     
    {
           {
       {
        $this->load->model('Activitymodel');
$data['specialdetails']=$this->Activitymodel->getonerowf($id);
        $this->load->view('spldetails',$data);
    }
    }
    }
public function delete6($spl_id){
       
       $query =  $this->db->get_where('act_special',array('spl_id' => $spl_id));
    if( $query->num_rows() > 0 )
    {
        $row = $query->row();
       
        $this->db->delete('act_special', array('spl_id' => $spl_id));
  redirect('Activity/specialdayreport');
       
        return true;
}

    return false;   
      
}
public function specialedit($id)
    {
    {
       {
        $this->load->model('Activitymodel');
$data['specialdetails']=$this->Activitymodel->getonerowf($id);
        $this->load->view('specialedit',$data);
    }
    }
    }
    public  function updatespecial($id)
        {

  $id=$this->input->post('spl_id');
            
       $data=array(
        'date'=>  $this->input->post('date'),
        'spl_name'=>  $this->input->post('spl_name'),
        'spl_speciality'=>  $this->input->post('spl_speciality'),
        'spl_activity'=>  $this->input->post('spl_activity'),
        'spl_no_students'=>  $this->input->post('spl_no_students'),
        'spl_program_coordinator'=>  $this->input->post('spl_program_coordinator'),
        'spl_remarks'=>  $this->input->post('spl_remarks')
        );

    $this->db->where('spl_id',$id);
     $this->db->update('act_special',$data);
     redirect('Activity/spldetails/'.$id);
        }


//official visit

     public function officialvisit()
    {
        $this->load->view('officialvisit');
    }

    public  function saveofl()
        {
            
     $data=array(
        'date'=>  $this->input->post('date'),
        'ofl_name'=>  $this->input->post('ofl_name'),
        'ofl_designation'=>  $this->input->post('ofl_designation'),
        'ofl_reason'=>  $this->input->post('ofl_reason'),
        'ofl_instruction'=>  $this->input->post('ofl_instruction')
        );
     $this->db->insert('act_official',$data);
     redirect('Activity/officialvisit');
        }



     public function officialvisitreports()
    {
        $this->load->view('officialvisitreports');
    }
     public function ofldetails($id)
     
    {
           {
       {
        $this->load->model('Activitymodel');
$data['ofldetails']=$this->Activitymodel->getonerowg($id);
        $this->load->view('ofldetails',$data);
    }
    }
    }
public function delete7($ofl_id){
       
       $query =  $this->db->get_where('act_official',array('ofl_id' => $ofl_id));
    if( $query->num_rows() > 0 )
    {
        $row = $query->row();
       
        $this->db->delete('act_official', array('ofl_id' => $ofl_id));
  redirect('Activity/officialvisitreports');
       
        return true;
}

    return false;   
      
}
public function ofledit($id)
    {
    {
       {
        $this->load->model('Activitymodel');
$data['ofldetails']=$this->Activitymodel->getonerowg($id);
        $this->load->view('ofledit',$data);
    }
    }
    }
    public  function updateofficial($id)
        {

  $id=$this->input->post('ofl_id');
            
       $data=array(
      'date'=>  $this->input->post('date'),
        'ofl_name'=>  $this->input->post('ofl_name'),
        'ofl_designation'=>  $this->input->post('ofl_designation'),
        'ofl_reason'=>  $this->input->post('ofl_reason'),
        'ofl_instruction'=>  $this->input->post('ofl_instruction')
        );

    $this->db->where('ofl_id',$id);
     $this->db->update('act_official',$data);
     redirect('Activity/ofldetails/'.$id);
        }




 public function drishyapadam()
    {
        $this->load->view('drishyapadam');
    }

    public  function savedp()
        {
            
     $data=array(
        'date'=>  $this->input->post('date'),
        'dp_name'=>  $this->input->post('dp_name'),
         'dp_description'=>  $this->input->post('dp_description'),
        'dp_no_students'=>  $this->input->post('dp_no_students'),
        'dp_program_cordinator'=>  $this->input->post('dp_program_cordinator'),
        'dp_conclusions'=>  $this->input->post('dp_conclusions'),
        'dp_remarks'=>  $this->input->post('dp_remarks')
        );
     $this->db->insert('act_drishyam',$data);
     redirect('Activity/drishyapadam');
        }



     public function drishyamreports()
    {
        $this->load->view('drishyamreports');
    }
     public function drishyamdetails($id)
     
    {
           {
       {
        $this->load->model('Activitymodel');
$data['dpdetails']=$this->Activitymodel->getonerowh($id);
        $this->load->view('drishyamdetails',$data);
    }
    }
    }
public function delete8($dp_id){
       
       $query =  $this->db->get_where('act_drishyam',array('dp_id' => $dp_id));
    if( $query->num_rows() > 0 )
    {
        $row = $query->row();
       
        $this->db->delete('act_drishyam', array('dp_id' => $dp_id));
  redirect('Activity/drishyamreports');
       
        return true;
}

    return false;   
      
}
public function drishyamedit($id)
    {
    {
       {
        $this->load->model('Activitymodel');
$data['dpdetails']=$this->Activitymodel->getonerowh($id);
        $this->load->view('drishyamedit',$data);
    }
    }
    }
    public  function updatedrishyam($id)
        {

  $id=$this->input->post('dp_id');
            
       $data=array(
     'date'=>  $this->input->post('date'),
        'dp_name'=>  $this->input->post('dp_name'),
         'dp_description'=>  $this->input->post('dp_description'),
        'dp_no_students'=>  $this->input->post('dp_no_students'),
        'dp_program_cordinator'=>  $this->input->post('dp_program_cordinator'),
        'dp_conclusions'=>  $this->input->post('dp_conclusions'),
        'dp_remarks'=>  $this->input->post('dp_remarks')
        );

    $this->db->where('dp_id',$id);
     $this->db->update('act_drishyam',$data);
     redirect('Activity/drishyamdetails/'.$id);
        }
}
