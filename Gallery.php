<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller 
{
    public function __construct() {
        parent::__construct();
 $this->load->model("Gallerymodel","m");  
            
    }
	
	
        public function gallery()
    {
        $this->load->view('gallery');
    }
     public  function uploadfile()
        {
            $config["upload_path"]='./uploads/gallery/';
            $config['allowed_types']='gif|jpg|png';
            
            $this->load->library('upload',$config);
            
            
            
     $this->upload->do_upload('userfile');
     $data_upload_files = $this->upload->data();

     $image = $data_upload_files[file_name];  
     $data=array
     
     (
        
        'date'=> $this->input->post('date'),
          'gal_name'=> $this->input->post('gal_name'),
          'gal_details'=> $this->input->post('gal_details'),


 'photo'=> $image);
     $this->db->insert('gallery',$data);
     redirect('Gallery/gallery');
        }
    public function dash()
    {
       
     $this->load->view('dash');
    }
    public function gallerydetails($id)
    {
        $this->load->model('Gallerymodel');
$data['tmldetails']=$this->Gallerymodel->getonerowtml($id);
    $this->load->view('gallerydetails',$data);    
    }
           public function galleryview()
    {
        $this->load->view('galleryview');
    }


    public function deleteg($gal_id){
       
       $query =  $this->db->get_where('gallery',array('gal_id' => $gal_id));
    if( $query->num_rows() > 0 )
    {
        $row = $query->row();
        $photo = $row->photo;
        unlink(realpath('uploads/gallery/'.$photo ));
        $this->db->delete('gallery', array('gal_id' => $gal_id));
  redirect('Gallery/galleryview');
       
        return true;
        }

       return false;   
      
}


 }