<?php error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); ?>

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Oblogin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->library('session');
   $this->load->model('Obloginmodel','',TRUE);
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username', 'trim|required');//xss_clean
   $this->form_validation->set_rules('password', 'Password', 'trim|required');//|callback_check_database

   $username=$this->input->post('username');
   $password=$this->input->post('password');
   $res=$this->Obloginmodel->oblogin($username,$password);
   if($res)
   {
     $this->session->set_userdata('username', $username);
     if($password=$this->input->post('followlink')=="monthlyreport"){
      redirect('Bill/monthlybillreport');
     }else{
      redirect('Bill/Otherbillreport');
                    //$this->load->view('user-profile');
                    }
   }
   else
   {
     //Go to private area
    
     redirect('Bill/oblogin', 'refresh');
   }

 }



}