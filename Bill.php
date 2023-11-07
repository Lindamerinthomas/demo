<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bill extends CI_Controller 
{
    public function __construct() {
        parent::__construct();
 $this->load->model("Billmodel","m");  
            
    }
	
	
        public function planfunds()
    {
        $this->load->view('planfunds');
    }
    public  function savefund()
        {
            
     $data=array(
        'date'=>  $this->input->post('date'),
        'uniformsc'=>  $this->input->post('uniformsc'),
        'uniformut'=>  $this->input->post('uniformut'),
        'meterialsc'=>  $this->input->post('meterialsc'),
        'meterialut'=>  $this->input->post('meterialut'),
        'uniformofcsc'=>  $this->input->post('uniformofcsc'),
        'uniformofcut'=>  $this->input->post('uniformofcut'),
        'ptdresssc'=>  $this->input->post('ptdresssc'),
        'ptdressut'=>  $this->input->post('ptdressut'),
         'cmntysc'=>  $this->input->post('cmntysc'),
        'cmntyut'=>  $this->input->post('cmntyut'),
         'hifsc'=>  $this->input->post('hifsc'),
        'hifut'=>  $this->input->post('hifut'),
        'refreshmentsc'=>  $this->input->post('refreshmentsc'),
        'refreshmentut'=>  $this->input->post('refreshmentut'),
        'campsc'=>  $this->input->post('campsc'),
        'camput'=>  $this->input->post('camput'),
        'honorsc'=>  $this->input->post('honorsc'),
        'honorut'=>  $this->input->post('honorut'),
        'dutysc'=>  $this->input->post('dutysc'),
        'dutyut'=>  $this->input->post('dutyut'),
        'totalsc'=>  $this->input->post('totalsc'),
        'totalut'=>  $this->input->post('totalut')
        );
     $this->db->insert('pla_fund',$data);
     redirect('Bill/planfunds');
        }
          public function planfundreport()
    {
        $this->load->view('planfundreport');
    }

     public function planfunddetails($id)
   {
        $this->load->model('Billmodel');
$data['plandetails']=$this->Billmodel->getonerow($id);
        $this->load->view('planfunddetails',$data);
    }
public function delete($id){
       
       $query =  $this->db->get_where('pla_fund',array('id' => $id));
    if( $query->num_rows() > 0 )
    {
        $row = $query->row();
       
        $this->db->delete('pla_fund', array('id' => $id));
  redirect('Bill/planfundreport');
       
        return true;
}

    return false;   
      
}
public function oblogin()
    {
		$data["followlink"]="dailyreport";
        $this->load->view('oblogin',$data);
    }
	
public function obloginMonth()
    {
		$data["followlink"]="monthlyreport";
        $this->load->view('oblogin',$data);
    }

public function planedit($id)
    {
          $this->load->model('Billmodel');
          $data['id']=$id;
$data['plandetails']=$this->Billmodel->getonerow($id);
        $this->load->view('planedit',$data);
    }
public  function updatefund($id)
        {

  $id=$this->input->post('id');
            
        $data=array(
        'date'=>  $this->input->post('date'),
        'uniformsc'=>  $this->input->post('uniformsc'),
        'uniformut'=>  $this->input->post('uniformut'),
        'meterialsc'=>  $this->input->post('meterialsc'),
        'meterialut'=>  $this->input->post('meterialut'),
        'uniformofcsc'=>  $this->input->post('uniformofcsc'),
        'uniformofcut'=>  $this->input->post('uniformofcut'),

          'ptdresssc'=>  $this->input->post('ptdresssc'),
        'ptdressut'=>  $this->input->post('ptdressut'),
         'cmntysc'=>  $this->input->post('cmntysc'),
        'cmntyut'=>  $this->input->post('cmntyut'),
         'hifsc'=>  $this->input->post('hifsc'),
        'hifut'=>  $this->input->post('hifut'),
        'refreshmentsc'=>  $this->input->post('refreshmentsc'),
        'refreshmentut'=>  $this->input->post('refreshmentut'),
        'campsc'=>  $this->input->post('campsc'),
        'camput'=>  $this->input->post('camput'),
        'honorsc'=>  $this->input->post('honorsc'),
        'honorut'=>  $this->input->post('honorut'),
        'dutysc'=>  $this->input->post('dutysc'),
        'dutyut'=>  $this->input->post('dutyut'),
        'totalsc'=>  $this->input->post('totalsc'),
        'totalut'=>  $this->input->post('totalut')
        );

    $this->db->where('id',$id);
     $this->db->update('pla_fund',$data);
     redirect('Bill/planfunddetails/'.$id);
        }



//other bill
    public function otherbills()
    {
        $this->load->view('otherbills');
    }

public  function saveother()
        {
            
     $data=array(
        'date'=>  $this->input->post('date'),
        'activity'=>  $this->input->post('activity'),
        'stationary'=>  $this->input->post('stationary'),
       'remuneration'=>  $this->input->post('remuneration'),
         'photocharge'=>  $this->input->post('photocharge'),
         'flexcharge'=>  $this->input->post('flexcharge'),
  'ta'=>  $this->input->post('ta'),
  'photostat'=>  $this->input->post('photostat'),
    'tea'=>  $this->input->post('tea'),
      'breakfast'=>  $this->input->post('breakfast'),
        'lunch'=>  $this->input->post('lunch'),
          'cooking'=>  $this->input->post('cooking'),
            'other'=>  $this->input->post('other'),
        'total'=>  $this->input->post('total')
        );
     $this->db->insert('other_expenses',$data);
     redirect('Bill/otherbills');
        }


    public function otherbillreport()
    { 

      if($this->session->userdata('username'))
                    {
        $this->load->view('otherbillreport');
                    }
                    else
                    {
                     redirect('Bill/oblogin', 'refresh');
                    }
    }
	
	public function monthlybillreport()
    { 

      if($this->session->userdata('username'))
                    {
        $this->load->view('monthlybillreport');
                    }
                    else
                    {
                     redirect('Bill/oblogin', 'refresh');
                    }
    }
    
		public function getMonthlyBillReportBody()
    { 
		$month=$_POST["month"]	;
		$year=$_POST["year"];
		$this->load->model("Billmodel");
		$i=0; 
		$totalAmount=0;
		$tableBody="";
		foreach ($this->Billmodel->getMonthlyExpense($month,$year) as $row) {
               $i++;
               $totalAmount+=$row->total;
               $tableBody.= "<tr>
              <td>$i</td>
              <td>$row->date</td>
              <td>$row->activity</td>
                       <td>$row->total</td>                       
                       <td class='action2'><a href='".site_url('Bill/otherbilldetails/'.$row->other_id)."'><button class='btn btn-xs btn-primary'>View</button></a> | <a href='".site_url('Bill/delete1/'.$row->other_id)."'><button class='delete btn btn-xs btn-warning'>Delete</button></a></td>
          </tr>"    ;
    	}
		$tableBody.= "<tr><td>&nbsp;</td>
              <td>&nbsp;</td>
              <td style='text-align:right'><strong>TOTAL</strong></td>
                       <td><strong>Rs. $totalAmount</strong></td>                       
                       <td></td></tr>";
		echo $tableBody;
		
	}
	
      public function otherbilldetails($id)
    {
        $this->load->model('Billmodel');
$data['billdetails']=$this->Billmodel->getonerowa($id);
        $this->load->view('otherbilldetails',$data);
    }
    public function delete1($other_id){
       
       $query =  $this->db->get_where('other_expenses',array('other_id' => $other_id));
    if( $query->num_rows() > 0 )
    {
        $row = $query->row();
       
        $this->db->delete('other_expenses', array('other_id' => $other_id));
  redirect('Bill/otherbillreport');
       
        return true;
}

    return false;   
      
}
public function otherbilledit($id)
    {
          $this->load->model('Billmodel');
          $data['id']=$id;
$data['billdetails']=$this->Billmodel->getonerowa($id);
        $this->load->view('otherbilledit',$data);
    }
public  function updateother($id)
        {

  $id=$this->input->post('other_id');
            
       $data=array(
        'date'=>  $this->input->post('date'),
        'activity'=>  $this->input->post('activity'),
        'stationary'=>  $this->input->post('stationary'),
       'remuneration'=>  $this->input->post('remuneration'),
         'photocharge'=>  $this->input->post('photocharge'),
         'flexcharge'=>  $this->input->post('flexcharge'),
  'ta'=>  $this->input->post('ta'),
  'photostat'=>  $this->input->post('photostat'),
    'tea'=>  $this->input->post('tea'),
      'breakfast'=>  $this->input->post('breakfast'),
        'lunch'=>  $this->input->post('lunch'),
          'cooking'=>  $this->input->post('cooking'),
            'other'=>  $this->input->post('other'),
        'total'=>  $this->input->post('total')
        );

    $this->db->where('other_id',$id);
     $this->db->update('other_expenses',$data);
     redirect('Bill/otherbilldetails/'.$id);
        }



    public function income()
    {
        $this->load->view('income');
    }
   

     
    public  function saveincome()
        {
            
     $data=array(
        'date'=>  $this->input->post('date'),
        'govt_fund'=>  $this->input->post('govt_fund'),
        'local_bodies'=>  $this->input->post('local_bodies'),
        'donation'=>  $this->input->post('donation'),
       'donated_person'=>  $this->input->post('donated_person'),
       'total'=>  $this->input->post('total')
        );
     $this->db->insert('income',$data);
     redirect('Bill/income');
        }

        public function incomereports()
    {
        $this->load->view('incomereports');
    }

     public function incomedetails($id)
    {
          $this->load->model('Billmodel');
$data['incomedetails']=$this->Billmodel->getonerowb($id);
        $this->load->view('incomedetails',$data);
    }
     public function delete2($inc_id){
       
       $query =  $this->db->get_where('income',array('inc_id' => $inc_id));
    if( $query->num_rows() > 0 )
    {
        $row = $query->row();
       
        $this->db->delete('income', array('inc_id' => $inc_id));
  redirect('Bill/incomereports');
       
        return true;
}

    return false;   
      
}
 public function incomeedit($id)
    {
          $this->load->model('Billmodel');
          $data['id']=$id;
$data['incomedetails']=$this->Billmodel->getonerowb($id);
        $this->load->view('incomeedit',$data);
    }
public  function updateincome($id)
        {

  $id=$this->input->post('inc_id');
            
      $data=array(
        'date'=>  $this->input->post('date'),
        'govt_fund'=>  $this->input->post('govt_fund'),
        'local_bodies'=>  $this->input->post('local_bodies'),
        'donation'=>  $this->input->post('donation'),
       'donated_person'=>  $this->input->post('donated_person'),
       'total'=>  $this->input->post('total')
        );

    $this->db->where('inc_id',$id);
     $this->db->update('income',$data);
     redirect('Bill/incomedetails/'.$id);
        }

   
}