<?php error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); ?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Form extends CI_Controller 
{
    public function __construct() {
        parent::__construct();
  $this->load->model("Biodatamodel","m");
         
    }
	
	
	
   public function index()
    {
         if($this->session->userdata('username'))
                    {
        $this->load->view('index');
                    }
                    else
                    {
                     redirect('Form/login', 'refresh');
                    }
    }
    public function login()
    {
        $this->load->view('login');
    }



 public function login1()
    {
        $this->load->view('login1');
    }





	public function slider()
	{
		$this->load->view('sliderview');
	}
	 public  function saveslider()
        {
            $config["upload_path"]='./uploads/slider';
            $config['allowed_types']='gif|jpg|png';
            
            $this->load->library('upload',$config);
            
            
            
     $this->upload->do_upload('userfile');
     $data_upload_files = $this->upload->data();

     $image = $data_upload_files['file_name'];  
     $data=array
     
     (
        
          'sl_title'=> $this->input->post('sl_title'),


 'photo'=> $image);
     $this->db->insert('slider',$data);
     redirect('Form/slider');
        }


         public function editslider($sl_id)
    {
         $this->load->model('Biodatamodel');
$data['sliderdetails']=$this->Biodatamodel->getonerow($sl_id);
     $this->load->view('editslider',$data);
    }
    






public function sliderdelete($id){
       
       $query =  $this->db->get_where('slider',array('sl_id' => $id));
    if( $query->num_rows() > 0 )
    {
        $row = $query->row();
        $photo = $row->photo;
        unlink(realpath('uploads/slider/'.$photo ));
        $this->db->delete('slider', array('sl_id' => $id));
  redirect('Form/slider');
       
        return true;
        }

       return false;   
      
}


public function updateslider($id)
     {
  $id=$this->input->post('sl_id');

        $config['upload_path']='./uploads/slider';
        $config['allowed_types']='gif|jpg|png';
        $config['encrypt_type']=TRUE;
        $this->load->library('upload',$config);

$this->upload->do_upload('userfile');
        $data_upload_files=$this->upload->data();
        $image=$data_upload_files['file_name'];

        if($image)
      {
         $dataa=array('photo'=> $image);
          $this->db->where('sl_id',$id);
          $this->db->update('slider',$dataa);
      }
     
            
 $data=array(
         'sl_title'=>  $this->input->post('sl_title')
        
          );
 
                        $this->db->where('sl_id',$id);
                        $this->db->update('slider',$data);
                        redirect('Form/slider');

    }











//Members Directory


    public function addmembers()
    {
        $this->load->view('addmembers');
    }
     public  function savemember()
        {
            $config["upload_path"]='./uploads/membersdirectory';
            $config['allowed_types']='gif|jpg|png';
            
            $this->load->library('upload',$config);
            
            
            
     $this->upload->do_upload('userfile');
     $data_upload_files = $this->upload->data();

     $image = $data_upload_files[file_name];  
     $data=array
     
     (
        
          'mb_name'=> $this->input->post('mb_name'),
          'mb_dob'=> $this->input->post('mb_dob'),
          'mb_parish'=> $this->input->post('mb_parish'),
          'mb_diocese'=> $this->input->post('mb_diocese'),
          'mb_feast'=>"0000-".$this->input->post('mb_feast'),
          'mb_ordination'=> $this->input->post('mb_ordination'),
          'mb_vow'=> $this->input->post('mb_vow'),
                'mb_seniority'=> $this->input->post('mb_seniority'),
          'mb_phone'=> $this->input->post('mb_phone'),
          'mb_email'=> $this->input->post('mb_email'),
          'mb_address'=> $this->input->post('mb_address'),


 'photo'=> $image);
     $this->db->insert('members',$data);
     redirect('Form/addmembers');
        }




        public function viewmembers()
    {
        $this->load->view('viewmembers');
    }


 public function editmembers($mb_id)
    {
         $this->load->model('Biodatamodel');
$data['mbdetails']=$this->Biodatamodel->getonerowmb($mb_id);
     $this->load->view('editmembers',$data);
    }
    









public function updatemembers($id)
     {
  $id=$this->input->post('mb_id');

        $config['upload_path']='./uploads/membersdirectory';
        $config['allowed_types']='gif|jpg|png';
        $config['encrypt_type']=TRUE;
        $this->load->library('upload',$config);

$this->upload->do_upload('userfile');
        $data_upload_files=$this->upload->data();
        $image=$data_upload_files['file_name'];

        if($image)
      {
         $dataa=array('photo'=> $image);
          $this->db->where('mb_id',$id);
          $this->db->update('members',$dataa);
      }
     
            
 $data=array(
             'mb_name'=> $this->input->post('mb_name'),
          'mb_dob'=> $this->input->post('mb_dob'),
         'mb_parish'=> $this->input->post('mb_parish'),
          'mb_diocese'=> $this->input->post('mb_diocese'),
          'mb_feast'=>$this->input->post('mb_feast'),
          'mb_ordination'=> $this->input->post('mb_ordination'),
          'mb_vow'=> $this->input->post('mb_vow'),
                'mb_seniority'=> $this->input->post('mb_seniority'),
          'mb_phone'=> $this->input->post('mb_phone'),
          'mb_email'=> $this->input->post('mb_email'),
          'mb_address'=> $this->input->post('mb_address')

        
          );
 
                        $this->db->where('mb_id',$id);
                        $this->db->update('members',$data);
                        redirect('Form/viewmembers');

    }





public function memberdelete($id){
       
       $query =  $this->db->get_where('members',array('mb_id' => $id));
    if( $query->num_rows() > 0 )
    {
        $row = $query->row();
        $photo = $row->photo;
        unlink(realpath('uploads/membersdirectory/'.$photo ));
        $this->db->delete('members', array('mb_id' => $id));
  redirect('Form/viewmembers');
       
        return true;
        }

       return false;   
      
}





//Formation




 public function addformation()
    {
        $this->load->view('addformation');
    }



 public  function saveformation()
        {
            $config["upload_path"]='./uploads/formation';
            $config['allowed_types']='gif|jpg|png';
            
            $this->load->library('upload',$config);
            
            
            
     $this->upload->do_upload('userfile');
     $data_upload_files = $this->upload->data();

     $image = $data_upload_files['file_name'];  
     $data=array
     
     (
        
        
         'fr_name'=> $this->input->post('fr_name'),
          'fr_dob'=> $this->input->post('fr_dob'),
     'fr_category'=> $this->input->post('fr_category'),
          'fr_parish'=> $this->input->post('fr_parish'),
          'fr_diocese'=> $this->input->post('fr_diocese'),
          'fr_feast'=>"0000-".$this->input->post('fr_feast'),
          'fr_study'=> $this->input->post('fr_study'),

 'photo'=> $image);
     $this->db->insert('formation',$data);
     redirect('Form/addformation');
        }



















  public function viewformation()
    {
        $this->load->view('viewformation');
    }


 public function editformation($fr_id)
    {
         $this->load->model('Biodatamodel');
$data['frdetails']=$this->Biodatamodel->getonerowfr($fr_id);
     $this->load->view('editformation',$data);
    }
    









public function updateformation($id)
     {
  $id=$this->input->post('fr_id');

        $config['upload_path']='./uploads/formation';
        $config['allowed_types']='gif|jpg|png';
        $config['encrypt_type']=TRUE;
        $this->load->library('upload',$config);

$this->upload->do_upload('userfile');
        $data_upload_files=$this->upload->data();
        $image=$data_upload_files['file_name'];

        if($image)
      {
         $dataa=array('photo'=> $image);
          $this->db->where('fr_id',$id);
          $this->db->update('formation',$dataa);
      }
     
            
 $data=array(

       'fr_name'=> $this->input->post('fr_name'),
                'fr_dob'=> $this->input->post('fr_dob'),
          'fr_category'=> $this->input->post('fr_category'),
          'fr_parish'=> $this->input->post('fr_parish'),
          'fr_diocese'=> $this->input->post('fr_diocese'),
          'fr_feast'=> $this->input->post('fr_feast'),
          'fr_study'=> $this->input->post('fr_study')
        
          );
 
                        $this->db->where('fr_id',$id);
                        $this->db->update('formation',$data);
                        redirect('Form/viewformation');

    }








public function formationdelete($id){
       
       $query =  $this->db->get_where('formation',array('fr_id' => $id));
    if( $query->num_rows() > 0 )
    {
        $row = $query->row();
        $photo = $row->photo;
        unlink(realpath('uploads/formation/'.$photo ));
        $this->db->delete('formation', array('fr_id' => $id));
  redirect('Form/viewformation');
       
        return true;
        }

       return false;   
      
}





//Gallery -Category///////////////////////////////////////////////////////////////////////////////////



   public function gallerycategory()
    {
        $this->load->view('gallerycategory');
    }


      
     public  function savecategory()
        {
            
     $data=array(
       
        'category'=>  $this->input->post('category')
        
        );
            $this->db->insert('gallerycategory',$data);
     redirect('Form/gallerycategory');
        }
        public function deletgc($id){
       
       $query =  $this->db->get_where('gallerycategory',array('id' => $id));
    if( $query->num_rows() > 0 )
    {
        $row = $query->row();
       
        $this->db->delete('gallerycategory', array('id' => $id));
  redirect('Form/gallerycategory');
       
        return true;
}

    return false;   
      
}
public function editgallerycategory($id)
    {
    {
       {
        $this->load->model('Biodatamodel');
$data['gcdetails']=$this->Biodatamodel->getonerowgc($id);
        $this->load->view('editgallerycategory',$data);
    }
    }
    }
public  function updategc($id)
        {

  $id=$this->input->post('id');
            
     $data=array(
       
        'category'=>  $this->input->post('category')
        
        );

    $this->db->where('id',$id);
     $this->db->update('gallerycategory',$data);
     redirect('Form/gallerycategory');
        }








//Gallery-------------------------------------------------Gallery--------------------------------------


         public function galleryadd()
    {
        $this->load->view('galleryadd');
    }
     public  function savegallery()
        {
            $config["upload_path"]='./uploads/gallery/';
            $config['allowed_types']='gif|jpg|png';
            
            $this->load->library('upload',$config);
            
            
            
     $this->upload->do_upload('userfile');
     $data_upload_files = $this->upload->data();

     $image = $data_upload_files['file_name'];  
     $data=array
     
     (
        
        'date'=> $this->input->post('date'),
          'gl_name'=> $this->input->post('gl_name'),
          'gl_category'=> $this->input->post('gl_category'),


 'photo'=> $image);
     $this->db->insert('gallery',$data);
     redirect('Form/galleryadd');
        }




  public function galleryview()
    {
        $this->load->view('galleryview');
    }




      public function editgallery($gl_id)
    {
         $this->load->model('Biodatamodel');
$data['gldetails']=$this->Biodatamodel->getonerowgl($gl_id);
     $this->load->view('editgallery',$data);
    }
    



public function updategallery($id)
     {
  $id=$this->input->post('gl_id');
$config['upload_path']='./uploads/gallery';
        $config['allowed_types']='gif|jpg|png';
        $config['encrypt_type']=TRUE;
        $this->load->library('upload',$config);
$this->upload->do_upload('userfile');
        $data_upload_files=$this->upload->data();
        $image=$data_upload_files['file_name'];
 if($image)
      {
         $dataa=array('photo'=>$image);
          $this->db->where('gl_id',$id);
          $this->db->update('gallery',$dataa);
      }
    $data=array(
         'date'=> $this->input->post('date'),
          'gl_name'=> $this->input->post('gl_name'),
          'gl_category'=> $this->input->post('gl_category')
        
          );
$this->db->where('gl_id',$id);
                        $this->db->update('gallery',$data);
                        redirect('Form/galleryview');

    }






  public function deleteg($gl_id){
       
       $query =  $this->db->get_where('gallery',array('gl_id' => $gl_id));
    if( $query->num_rows() > 0 )
    {
        $row = $query->row();
        $photo = $row->photo;
        unlink(realpath('uploads/gallery/'.$photo ));
        $this->db->delete('gallery', array('gl_id' => $gl_id));
  redirect('Form/galleryview');
       
        return true;
        }

       return false; 
   }














//Institution-------------------------------------------------Institution--------------------------------------







public function institutionadd()
    {
        $this->load->view('institutionadd');
    }
     public  function saveinst()
        {
            $config["upload_path"]='./uploads/institution/';
            $config['allowed_types']='gif|jpg|png';
            
            $this->load->library('upload',$config);
            
            
            
     $this->upload->do_upload('userfile');
     $data_upload_files = $this->upload->data();

     $image = $data_upload_files['file_name'];  
     $data=array
     
     (
        
       
          'in_name'=> $this->input->post('in_name'),
          'in_description'=> $this->input->post('in_description'),

          'in_activity'=> $this->input->post('in_activity'),
          'in_associate'=> $this->input->post('in_associate'),











 'photo'=> $image);
     $this->db->insert('institution',$data);
     redirect('Form/institutionadd');
        }









  public function institutionview()
    {
        $this->load->view('institutionview');
    }




      public function editinstitution($in_id)
    {
         $this->load->model('Biodatamodel');
$data['indetails']=$this->Biodatamodel->getonerowin($in_id);
     $this->load->view('editinstitution',$data);
    }
    



public function updateinst($id)
     {
  $id=$this->input->post('in_id');

        $config['upload_path']='./uploads/institution';
        $config['allowed_types']='gif|jpg|png';
        $config['encrypt_type']=TRUE;
        $this->load->library('upload',$config);

$this->upload->do_upload('userfile');
        $data_upload_files=$this->upload->data();
        $image=$data_upload_files['file_name'];

        if($image)
      {
         $dataa=array('photo'=> $image);
          $this->db->where('in_id',$id);
          $this->db->update('institution',$dataa);
      }
     
            
 $data=array(
 'in_name'=> $this->input->post('in_name'),
          'in_description'=> $this->input->post('in_description'),

          'in_activity'=> $this->input->post('in_activity'),
          'in_associate'=> $this->input->post('in_associate')
        
          );
 
                        $this->db->where('in_id',$id);
                        $this->db->update('institution',$data);
                        redirect('Form/institutionview');

    }






  public function deletinst($in_id){
       
       $query =  $this->db->get_where('institution',array('in_id' => $in_id));
    if( $query->num_rows() > 0 )
    {
        $row = $query->row();
        $photo = $row->photo;
        unlink(realpath('uploads/institution/'.$photo ));
        $this->db->delete('institution', array('in_id' => $in_id));
  redirect('Form/institutionview');
       
        return true;
        }

       return false; 
   }












//news & events-------------news & events------------------news & events-------------news & events-----------







public function newsadd()
    {
        $this->load->view('newsadd');
    }
     public  function savenw()
        {
            $config["upload_path"]='./uploads/news/';
            $config['allowed_types']='gif|jpg|png';
            
            $this->load->library('upload',$config);
            
            
            
     $this->upload->do_upload('userfile');
     $data_upload_files = $this->upload->data();

     $image = $data_upload_files['file_name'];  
     $data=array
     
     (
        
       
          'date'=> $this->input->post('date'),
          'nw_title'=> $this->input->post('nw_title'),

          'nw_category'=> $this->input->post('nw_category'),
          'nw_description'=> $this->input->post('nw_description'),











 'photo'=> $image);
     $this->db->insert('news',$data);
     redirect('Form/newsadd');
        }









  public function newsview()
    {
        $this->load->view('newsview');
    }




      public function newsedit($nw_id)
    {
         $this->load->model('Biodatamodel');
$data['nwdetails']=$this->Biodatamodel->getonerownw($nw_id);
     $this->load->view('newsedit',$data);
    }
    



public function updatenw($id)
     {
  $id=$this->input->post('nw_id');

        $config['upload_path']='./uploads/news';
        $config['allowed_types']='gif|jpg|png';
        $config['encrypt_type']=TRUE;
        $this->load->library('upload',$config);

$this->upload->do_upload('userfile');
        $data_upload_files=$this->upload->data();
        $image=$data_upload_files['file_name'];

        if($image)
      {
         $dataa=array('photo'=> $image);
          $this->db->where('nw_id',$id);
          $this->db->update('news',$dataa);
      }
     
            
 $data=array(
  'date'=> $this->input->post('date'),
          'nw_title'=> $this->input->post('nw_title'),

          'nw_category'=> $this->input->post('nw_category'),
          'nw_description'=> $this->input->post('nw_description'),
        
          );
 
                        $this->db->where('nw_id',$id);
                        $this->db->update('news',$data);
                        redirect('Form/newsview');

    }






  public function deletenw($nw_id){
       
       $query =  $this->db->get_where('news',array('nw_id' => $nw_id));
    if( $query->num_rows() > 0 )
    {
        $row = $query->row();
        $photo = $row->photo;
        unlink(realpath('uploads/news/'.$photo ));
        $this->db->delete('news', array('nw_id' => $nw_id));
  redirect('Form/newsview');
       
        return true;
        }

       return false; 
   }





////////////////////mission//////////mission///////////////////////////////////////////////////////






public function missionadd()
    {
        $this->load->view('missionadd');
    }
     public  function savemn()
        {
            $config["upload_path"]='./uploads/mission/';
            $config['allowed_types']='gif|jpg|png';
            
            $this->load->library('upload',$config);
            
            
            
     $this->upload->do_upload('userfile');
     $data_upload_files = $this->upload->data();

     $image = $data_upload_files['file_name'];  
     $data=array
     
     (
        
       
          'mn_name'=> $this->input->post('mn_name'),
            'mn_country'=> $this->input->post('mn_country'),
          'mn_email'=> $this->input->post('mn_email'),

          'mn_phone'=> $this->input->post('mn_phone'),
          'mn_address'=> $this->input->post('mn_address'),











 'photo'=> $image);
     $this->db->insert('mission',$data);
     redirect('Form/missionadd');
        }









  public function missionview()
    {
        $this->load->view('missionview');
    }




      public function mnedit($mn_id)
    {
         $this->load->model('Biodatamodel');
$data['mndetails']=$this->Biodatamodel->getonerowmn($mn_id);
     $this->load->view('mnedit',$data);
    }
    



public function updatemn($id)
     {
  $id=$this->input->post('mn_id');

        $config['upload_path']='./uploads/mission';
        $config['allowed_types']='gif|jpg|png';
        $config['encrypt_type']=TRUE;
        $this->load->library('upload',$config);

$this->upload->do_upload('userfile');
        $data_upload_files=$this->upload->data();
        $image=$data_upload_files['file_name'];

        if($image)
      {
         $dataa=array('photo'=> $image);
          $this->db->where('mn_id',$id);
          $this->db->update('mission',$dataa);
      }
     
            
 $data=array(
     'mn_name'=> $this->input->post('mn_name'),
     'mn_country'=> $this->input->post('mn_country'),
          'mn_email'=> $this->input->post('mn_email'),

          'mn_phone'=> $this->input->post('mn_phone'),
          'mn_address'=> $this->input->post('mn_address')

          );
 
                        $this->db->where('mn_id',$id);
                        $this->db->update('mission',$data);
                        redirect('Form/missionview');

    }






  public function deletemn($mn_id){
       
       $query =  $this->db->get_where('mission',array('mn_id' => $mn_id));
    if( $query->num_rows() > 0 )
    {
        $row = $query->row();
        $photo = $row->photo;
        unlink(realpath('uploads/mission/'.$photo ));
        $this->db->delete('mission', array('mn_id' => $mn_id));
  redirect('Form/missionview');
       
        return true;
        }

       return false; 
   }














///////////////////////////Publication//////////////publication///////////////////publication////////














public function publicationadd()
    {
        $this->load->view('publicationadd');
    }
     public  function savepc()
        {
            $config["upload_path"]='./uploads/publication/';
            $config['allowed_types']='pdf';
            
            $this->load->library('upload',$config);
            
            
            
     $this->upload->do_upload('userfile');
     $data_upload_files = $this->upload->data();

     $image = $data_upload_files['file_name'];  
     $data=array
     
     (
        
       
          'date'=> $this->input->post('date'),
          'pc_author'=> $this->input->post('pc_author'),

          'pc_edition'=> $this->input->post('pc_edition'),
          'pc_publish'=> $this->input->post('pc_publish'),











 'photo'=> $image);
     $this->db->insert('publication',$data);
     redirect('Form/publicationadd');
        }









  public function publicationview()
    {
        $this->load->view('publicationview');
    }




      public function pcedit($pc_id)
    {
         $this->load->model('Biodatamodel');
$data['pcdetails']=$this->Biodatamodel->getonerowpc($pc_id);
     $this->load->view('pcedit',$data);
    }
    



public function updatepc($id)
     {
  $id=$this->input->post('pc_id');

        $config['upload_path']='./uploads/publication';
        $config['allowed_types']='pdf';
        $config['encrypt_type']=TRUE;
        $this->load->library('upload',$config);

$this->upload->do_upload('userfile');
        $data_upload_files=$this->upload->data();
        $image=$data_upload_files['file_name'];

        if($image)
      {
         $dataa=array('photo'=> $image);
          $this->db->where('pc_id',$id);
          $this->db->update('publication',$dataa);
      }
     
            
 $data=array(
  
 
          'date'=> $this->input->post('date'),
          'pc_author'=> $this->input->post('pc_author'),

          'pc_edition'=> $this->input->post('pc_edition'),
          'pc_publish'=> $this->input->post('pc_publish')

          );
 
                        $this->db->where('pc_id',$id);
                        $this->db->update('publication',$data);
                        redirect('Form/publicationview');

    }






  public function deletepc($pc_id){
       
       $query =  $this->db->get_where('publication',array('pc_id' => $pc_id));
    if( $query->num_rows() > 0 )
    {
        $row = $query->row();
        $photo = $row->photo;
        unlink(realpath('uploads/publication/'.$photo ));
        $this->db->delete('publication', array('pc_id' => $pc_id));
  redirect('Form/publicationview');
       
        return true;
        }

       return false; 
   }










///////////////////////////Publication QR Code//////////////publication///////////////////publication  QR Code////////


public function qrcode()
  {
    $this->load->view('qrcode');
  }
   public  function saveqrcode()
        {
            $config["upload_path"]='./uploads/qrcode';
            $config['allowed_types']='gif|jpg|png';
            
            $this->load->library('upload',$config);
            
            
            
     $this->upload->do_upload('userfile');
     $data_upload_files = $this->upload->data();

     $image = $data_upload_files['file_name'];  
     $data=array
     
     (
        
     'pc_code'=> $this->input->post('pc_code'),
          


 'photo'=> $image);
     $this->db->insert('qrcode',$data);
     redirect('Form/qrcode');
        }


         public function editqrcode($qr_id)
    {
         $this->load->model('Biodatamodel');
$data['qrdetails']=$this->Biodatamodel->getonerowqr($qr_id);
     $this->load->view('editqrcode',$data);
    }
    






public function qrdelete($id){
       
       $query =  $this->db->get_where('qrcode',array('qr_id' => $id));
    if( $query->num_rows() > 0 )
    {
        $row = $query->row();
        $photo = $row->photo;
        unlink(realpath('uploads/qrcode/'.$photo ));
        $this->db->delete('qrcode', array('qr_id' => $id));
  redirect('Form/qrcode');
       
        return true;
        }

       return false;   
      
}



public function updateqr($id)
     {
  $id=$this->input->post('qr_id');

        $config['upload_path']='./uploads/qrcode';
        $config['allowed_types']='gif|jpg|png';
        $config['encrypt_type']=TRUE;
        $this->load->library('upload',$config);

$this->upload->do_upload('userfile');
        $data_upload_files=$this->upload->data();
        $image=$data_upload_files['file_name'];

        if($image)
      {
         $dataa=array('photo'=> $image);
          $this->db->where('qr_id',$id);
          $this->db->update('qrcode',$dataa);
      }
     
            
 $data=array(
  'pc_code'=> $this->input->post('pc_code'),
         

        
          );
 
                        $this->db->where('qr_id',$id);
                        $this->db->update('qrcode',$data);
                        redirect('Form/qrcode');

    }













/////////////////////////////////Notification//////////////Notification////////////////////////////////











 public function notification()
    {
        $this->load->view('notification');
    }


      
     public  function savenotification()
        {
            
     $data=array(
       
        'date'=>  $this->input->post('date'),
            'nt_title'=>  $this->input->post('nt_title'),
                'nt_details'=>  $this->input->post('nt_details')

        
        );
            $this->db->insert('notification',$data);
     redirect('Form/notification');
        }
        public function deletnt($id){
       
       $query =  $this->db->get_where('notification',array('nt_id' => $id));
    if( $query->num_rows() > 0 )
    {
        $row = $query->row();
       
        $this->db->delete('notification', array('nt_id' => $id));
  redirect('Form/notification');
       
        return true;
}

    return false;   
      
}
public function editnotification($nt_id)
    {
    {
       {
        $this->load->model('Biodatamodel');
$data['ntdetails']=$this->Biodatamodel->getonerownt($nt_id);
        $this->load->view('editnotification',$data);
    }
    }
    }
public  function updatent($id)
        {

  $id=$this->input->post('nt_id');
            
     $data=array(
       
          'date'=>  $this->input->post('date'),
            'nt_title'=>  $this->input->post('nt_title'),
                'nt_details'=>  $this->input->post('nt_details')
        
        );

    $this->db->where('nt_id',$id);
     $this->db->update('notification',$data);
     redirect('Form/notification');
        }













////////////////////////////General administration////////////////////////////////////////////////////



public function gnadmin()
  {
    $this->load->view('gnadmin');
  }
   public  function savegnadmin()
        {
            $config["upload_path"]='./uploads/gnadmin';
            $config['allowed_types']='gif|jpg|png';
            
            $this->load->library('upload',$config);
            
            
            
     $this->upload->do_upload('userfile');
     $data_upload_files = $this->upload->data();

     $image = $data_upload_files['file_name'];  
     $data=array
     
     (
        
          'ga_category'=> $this->input->post('ga_category'),
           'ga_name'=> $this->input->post('ga_name'),
            'ga_mail'=> $this->input->post('ga_mail'),
             'ga_phone'=> $this->input->post('ga_phone'),


 'photo'=> $image);
     $this->db->insert('gnadmin',$data);
     redirect('Form/gnadmin');
        }


         public function editgnadmin($ga_id)
    {
         $this->load->model('Biodatamodel');
$data['gadetails']=$this->Biodatamodel->getonerowga($ga_id);
     $this->load->view('editgnadmin',$data);
    }
    






public function gadelete($id){
       
       $query =  $this->db->get_where('gnadmin',array('ga_id' => $id));
    if( $query->num_rows() > 0 )
    {
        $row = $query->row();
        $photo = $row->photo;
        unlink(realpath('uploads/gnadmin/'.$photo ));
        $this->db->delete('gnadmin', array('ga_id' => $id));
  redirect('Form/gnadmin');
       
        return true;
        }

       return false;   
      
}


public function updatega($id)
     {
  $id=$this->input->post('ga_id');

        $config['upload_path']='./uploads/gnadmin';
        $config['allowed_types']='gif|jpg|png';
        $config['encrypt_type']=TRUE;
        $this->load->library('upload',$config);

$this->upload->do_upload('userfile');
        $data_upload_files=$this->upload->data();
        $image=$data_upload_files['file_name'];

        if($image)
      {
         $dataa=array('photo'=> $image);
          $this->db->where('ga_id',$id);
          $this->db->update('gnadmin',$dataa);
      }
     
            
 $data=array(
       'ga_category'=> $this->input->post('ga_category'),
           'ga_name'=> $this->input->post('ga_name'),
            'ga_mail'=> $this->input->post('ga_mail'),
             'ga_phone'=> $this->input->post('ga_phone')
        
          );
 
                        $this->db->where('ga_id',$id);
                        $this->db->update('gnadmin',$data);
                        redirect('Form/gnadmin');

    }














/////////////////Provincial Administration////////////////////////////////////////////////////////////


public function pvcadmin()
  {
    $this->load->view('pvcadmin');
  }
   public  function savepvcadmin()
        {
            $config["upload_path"]='./uploads/pvcadmin';
            $config['allowed_types']='gif|jpg|png';
            
            $this->load->library('upload',$config);
            
            
            
     $this->upload->do_upload('userfile');
     $data_upload_files = $this->upload->data();

     $image = $data_upload_files['file_name'];  
     $data=array
     
     (
        
          'pv_category'=> $this->input->post('pv_category'),
           'pv_name'=> $this->input->post('pv_name'),
            'pv_mail'=> $this->input->post('pv_mail'),
             'pv_phone'=> $this->input->post('pv_phone'),


 'photo'=> $image);
     $this->db->insert('pvcadmin',$data);
     redirect('Form/pvcadmin');
        }


         public function editpvcadmin($pv_id)
    {
         $this->load->model('Biodatamodel');
$data['pvcdetails']=$this->Biodatamodel->getonerowpvc($pv_id);
     $this->load->view('editpvcadmin',$data);
    }
    






public function pvcdelete($id){
       
       $query =  $this->db->get_where('pvcadmin',array('pv_id' => $id));
    if( $query->num_rows() > 0 )
    {
        $row = $query->row();
        $photo = $row->photo;
        unlink(realpath('uploads/pvcadmin/'.$photo ));
        $this->db->delete('pvcadmin', array('pv_id' => $id));
  redirect('Form/pvcadmin');
       
        return true;
        }

       return false;   
      
}


public function updatepvc($id)
     {
  $id=$this->input->post('pv_id');

        $config['upload_path']='./uploads/pvcadmin';
        $config['allowed_types']='gif|jpg|png';
        $config['encrypt_type']=TRUE;
        $this->load->library('upload',$config);

$this->upload->do_upload('userfile');
        $data_upload_files=$this->upload->data();
        $image=$data_upload_files['file_name'];

        if($image)
      {
         $dataa=array('photo'=> $image);
          $this->db->where('pv_id',$id);
          $this->db->update('pvcadmin',$dataa);
      }
     
            
 $data=array(
  'pv_category'=> $this->input->post('pv_category'),
           'pv_name'=> $this->input->post('pv_name'),
            'pv_mail'=> $this->input->post('pv_mail'),
             'pv_phone'=> $this->input->post('pv_phone'),

        
          );
 
                        $this->db->where('pv_id',$id);
                        $this->db->update('pvcadmin',$data);
                        redirect('Form/pvcadmin');

    }


//////////////////////////Departed Members////////////////////////////////////////////////////////////////

public function depart()
  {
    $this->load->view('depart');
  }
   public  function savedepart()
        {
            $config["upload_path"]='./uploads/departed';
            $config['allowed_types']='gif|jpg|png';
            
            $this->load->library('upload',$config);
            
            
            
     $this->upload->do_upload('userfile');
     $data_upload_files = $this->upload->data();

     $image = $data_upload_files['file_name'];  
     $data=array
     
     (
        
          'dp_name'=> $this->input->post('dp_name'),
           'dp_dob'=> $this->input->post('dp_dob'),
            'dp_parish'=> $this->input->post('dp_parish'),
             'dp_vow'=> $this->input->post('dp_vow'),
                      'dp_ordination'=> $this->input->post('dp_ordination'),
           'dp_death'=> $this->input->post('dp_death'),
            'dp_buried'=> $this->input->post('dp_buried'),
             'dp_address'=> $this->input->post('dp_address'),


 'photo'=> $image);
     $this->db->insert('depart',$data);
     redirect('Form/depart');
        }


         public function editdepart($dp_id)
    {
         $this->load->model('Biodatamodel');
$data['dpdetails']=$this->Biodatamodel->getonerowdp($dp_id);
     $this->load->view('editdepart',$data);
    }
    






public function dpdelete($id){
       
       $query =  $this->db->get_where('depart',array('dp_id' => $id));
    if( $query->num_rows() > 0 )
    {
        $row = $query->row();
        $photo = $row->photo;
        unlink(realpath('uploads/departed/'.$photo ));
        $this->db->delete('depart', array('dp_id' => $id));
  redirect('Form/depart');
       
        return true;
        }

       return false;   
      
}


public function updatedepart($id)
     {
  $id=$this->input->post('dp_id');

        $config['upload_path']='./uploads/departed';
        $config['allowed_types']='gif|jpg|png';
        $config['encrypt_type']=TRUE;
        $this->load->library('upload',$config);

$this->upload->do_upload('userfile');
        $data_upload_files=$this->upload->data();
        $image=$data_upload_files['file_name'];

        if($image)
      {
         $dataa=array('photo'=> $image);
          $this->db->where('dp_id',$id);
          $this->db->update('depart',$dataa);
      }
     
            
 $data=array(
   'dp_name'=> $this->input->post('dp_name'),
           'dp_dob'=> $this->input->post('dp_dob'),
            'dp_parish'=> $this->input->post('dp_parish'),
             'dp_vow'=> $this->input->post('dp_vow'),
                      'dp_ordination'=> $this->input->post('dp_ordination'),
           'dp_death'=> $this->input->post('dp_death'),
            'dp_buried'=> $this->input->post('dp_buried'),
             'dp_address'=> $this->input->post('dp_address'),

        
          );
 
                        $this->db->where('dp_id',$id);
                        $this->db->update('depart',$data);
                        redirect('Form/depart');


}
////////////////////////////////////////////////////////////////////////////////////////////////////////////






public function birthday()
  {
    $this->load->view('birthday');
  }


//////////////////////////////////////////////cmi at aglance-personnal/////////////////////////////

public function glprsnl($id)
    {
        $this->load->model('Biodatamodel');
$data['glpdetails']=$this->Biodatamodel->getonerowglprsnl($id);
        $this->load->view('glprsnl',$data);
    }


public  function updateglprsnl($id)
        {

  $id=$this->input->post('gc_id');
            
     $data=array(
       
          'bishops'=>  $this->input->post('bishops'),
            'priests'=>  $this->input->post('priests'),
                'permanent_deacons'=>  $this->input->post('permanent_deacons'),
                      'brothers'=>  $this->input->post('brothers'),
            'scholastics'=>  $this->input->post('scholastics'),
                'novices'=>  $this->input->post('novices'),
        
              'aspirants'=>  $this->input->post('aspirants'),
            'total_members'=>  $this->input->post('total_members'),
                'deceased_members'=>  $this->input->post('deceased_members')
        
        
        );

    $this->db->where('gc_id',$id);
     $this->db->update('glance',$data);
     redirect('Form/glprsnl/1');
        }





//////////////////////////////////////////////cmi at a glance- general information///////////////////


public function glinformation($id)
    {
        $this->load->model('Biodatamodel');
$data['glindetails']=$this->Biodatamodel->getonerowglir($id);
        $this->load->view('glinformation',$data);
    }


public  function updateglinformation($id)
        {

  $id=$this->input->post('gc_id');
            
     $data=array(
       
          'provinces'=>  $this->input->post('provinces'),
            'vice_provinces'=>  $this->input->post('vice_provinces'),
                'region'=>  $this->input->post('region'),
                      'sub_regions'=>  $this->input->post('sub_regions'),
            'mission_dioceses'=>  $this->input->post('mission_dioceses'),
                'no_countries'=>  $this->input->post('no_countries'),
        
           
        
        
        );

    $this->db->where('gc_id',$id);
     $this->db->update('glance',$data);
     redirect('Form/glinformation/1');
        }





////////////////////////CMI at a Glance-institutions///////////////////////////////////////////////





public function glinstitution($id)
    {
        $this->load->model('Biodatamodel');
$data['glinstidetails']=$this->Biodatamodel->getonerowglins($id);
        $this->load->view('glinstitution',$data);
    }


public  function updateglinsti($id)
        {

  $id=$this->input->post('gc_id');
            
     $data=array(
       
          'canonical_houses'=>  $this->input->post('canonical_houses'),
            'houses'=>  $this->input->post('houses'),
                'residences_india'=>  $this->input->post('residences_india'),
                      'residences_abroad'=>  $this->input->post('residences_abroad'),
            'centres_india'=>  $this->input->post('centres_india'),
                'centres_abroad'=>  $this->input->post('centres_abroad'),
          'aspirants_houses'=>  $this->input->post('aspirants_houses'),
            'aspirants_houses_abroad'=>  $this->input->post('aspirants_houses_abroad'),
                'novitiate_houses_india'=>  $this->input->post('novitiate_houses_india'),
                      'novitiate_houses_abroad'=>  $this->input->post('novitiate_houses_abroad'),
            'major_study_houses'=>  $this->input->post('major_study_houses'),
            
           
        
        
        );

    $this->db->where('gc_id',$id);
     $this->db->update('glance',$data);
     redirect('Form/glinstitution/1');
        }









////////////////////////CMI at a Glance-Pastoral Apostolate///////////////////////////////////////////////






public function glpa($id)
    {
        $this->load->model('Biodatamodel');
$data['glpadetails']=$this->Biodatamodel->getonerowglpa($id);
        $this->load->view('glpa',$data);
    }


public  function updateglpa($id)
        {

  $id=$this->input->post('gc_id');
            
     $data=array(
       
          'mission_stations'=>  $this->input->post('mission_stations'),
            'parishes'=>  $this->input->post('parishes'),
                'retreat_centres'=>  $this->input->post('retreat_centres'),
   'common_renewal_centres'=>  $this->input->post('common_renewal_centres'),
        
            
           
        
        
        );

    $this->db->where('gc_id',$id);
     $this->db->update('glance',$data);
     redirect('Form/glpa/1');
        }














////////////////////////CMI at a Glance-Social Apostolate///////////////////////////////////////////////






public function glsa($id)
    {
        $this->load->model('Biodatamodel');
$data['glsadetails']=$this->Biodatamodel->getonerowglsa($id);
        $this->load->view('glsa',$data);
    }


public  function updateglsa($id)
        {

  $id=$this->input->post('gc_id');
            
     $data=array(
       
          'hospitals'=>  $this->input->post('hospitals'),
            'dispensaries'=>  $this->input->post('dispensaries'),
                'social_research'=>  $this->input->post('social_research'),

              'mentally_retarded'=>  $this->input->post('mentally_retarded'),
               'social_service'=>  $this->input->post('social_service'),
            'children_home'=>  $this->input->post('children_home'),
                'boys_home'=>  $this->input->post('boys_home'),
   'home_aged'=>  $this->input->post('home_aged'),
            
                 'home_handicapped'=>  $this->input->post('home_handicapped'),
            'street_boys'=>  $this->input->post('street_boys'),
                'literacy_centres'=>  $this->input->post('literacy_centres'),
   'self_help_groups'=>  $this->input->post('self_help_groups'),
           'jail_ministry'=>  $this->input->post('jail_ministry'),
        
        );

    $this->db->where('gc_id',$id);
     $this->db->update('glance',$data);
     redirect('Form/glsa/1');
        }











///////////////CMI at a Glance-Education & Mass Media Apostolate/////////////////////////////






public function gledu($id)
    {
        $this->load->model('Biodatamodel');
$data['gledudetails']=$this->Biodatamodel->getonerowgledu($id);
        $this->load->view('gledu',$data);
    }


public  function updategledu($id)
        {

  $id=$this->input->post('gc_id');
            
     $data=array(
       
          'pontifical_athenaeum'=>  $this->input->post('pontifical_athenaeum'),
            'university'=>  $this->input->post('university'),
                'medical_college'=>  $this->input->post('medical_college'),

              'engineering'=>  $this->input->post('engineering'),
               'university_colleges'=>  $this->input->post('university_colleges'),
            'parallel_colleges'=>  $this->input->post('parallel_colleges'),
                'bed_colleges'=>  $this->input->post('bed_colleges'),
   'law_college'=>  $this->input->post('law_college'),
            
                 'nursing_schools'=>  $this->input->post('nursing_schools'),
            'polytechnic'=>  $this->input->post('polytechnic'),
                'itc'=>  $this->input->post('itc'),
   'research_centers'=>  $this->input->post('research_centers'),
           'cbse_schools'=>  $this->input->post('cbse_schools'),
            'icse_schools'=>  $this->input->post('icse_schools'),
            'hss'=>  $this->input->post('hss'),
                'hs'=>  $this->input->post('hs'),

              'up'=>  $this->input->post('up'),
               'lp'=>  $this->input->post('lp'),
            'nursery'=>  $this->input->post('nursery'),
                'hostels'=>  $this->input->post('hostels'),
   'cultural'=>  $this->input->post('cultural'),
            
                 'printing'=>  $this->input->post('printing'),
            'periodicals'=>  $this->input->post('periodicals'),
                'book_houses'=>  $this->input->post('book_houses'),
   'av_centres'=>  $this->input->post('av_centres'),
       
        
        );

    $this->db->where('gc_id',$id);
     $this->db->update('glance',$data);
     redirect('Form/gledu/1');
        }








////////////////////////////////////Provincial Circular///////////////////////////////////






public function pvcircular($id)
    {
        $this->load->model('Biodatamodel');
$data['pvcrdetails']=$this->Biodatamodel->getonerowpvcr($id);
        $this->load->view('pvcircular',$data);
    }


public  function updatepvcr($id)
        {

  $id=$this->input->post('id');
            
     $data=array(
       
          'gnl_administration'=>  $this->input->post('gnl_administration'),
            'prior_general'=>  $this->input->post('prior_general'),
                'gn_pastral'=>  $this->input->post('gn_pastral'),

              'gn_counsiler'=>  $this->input->post('gn_counsiler'),
               'gn_apostalate'=>  $this->input->post('gn_apostalate'),
            'gc_financw'=>  $this->input->post('gc_financw'),
                'gn_auditor'=>  $this->input->post('gn_auditor'),
   'sc_prgeneral'=>  $this->input->post('sc_prgeneral'),
            
                 'dr_reserch'=>  $this->input->post('dr_reserch'),
            'prefect'=>  $this->input->post('prefect'),
                
        
        );

    $this->db->where('id',$id);
     $this->db->update('provincial_circular',$data);
     redirect('Form/pvcircular/1');
        }





























































































































        public function viewbiodata()
    {
        $this->load->view('viewbiodata');
    }
         public function viewdetails($id)
    {
        $this->load->model('Biodatamodel');
$data['cadetdetails']=$this->Biodatamodel->getonerow($id);
        $this->load->view('viewdetails',$data);
    }

  public function idcardjr($id)
    {
        $this->load->model('Biodatamodel');
$data['cadetdetails']=$this->Biodatamodel->getonerow($id);
        $this->load->view('idcardjr',$data);
    }


    public function delete($cadet_id){
       
       $query =  $this->db->get_where('cadet_biodata',array('cadet_id' => $cadet_id));
    if( $query->num_rows() > 0 )
    {
        $row = $query->row();
        $photo = $row->photo;
        unlink(realpath('uploads/biodata/cadets/'.$photo ));
        $this->db->delete('cadet_biodata', array('cadet_id' => $cadet_id));
  redirect('Form/viewbiodata');
       
        return true;
}

    return false;   
      
}
    
        
public function srbiodata($id)
    {
         $this->load->model('Biodatamodel');
$data['cadetdetails']=$this->Biodatamodel->getonerow($id);
     $this->load->view('srbiodata',$data);
    }
    

        public function directsrbiodata()
    {
        $this->load->view('directsrbiodata');
    }
        


       
      
       
    public  function update($id)
        {
  $id=$this->input->post('cadet_id');
            
     $data=array
     
     (
        'cadet_category'=> $this->input->post('cadet_category'),
        'cadet_no'=>  $this->input->post('cadet_no'), 
         'cadet_name'=>  $this->input->post('cadet_name'), 
         'cadet_parent_name'=>  $this->input->post('cadet_parent_name'),
         
         'cadet_class'=>  $this->input->post('cadet_class'),
         'cadet_division'=>  $this->input->post('cadet_division'),
        
         'cadet_height2'=> $this->input->post('cadet_height2'),
         'cadet_weight2'=> $this->input->post('cadet_weight2'),
        
         'cadet_attendance_first'=> $this->input->post('cadet_attendance_first'),
        'cadet_annual_camp'=> $this->input->post('cadet_annual_camp'),
          'cadet_social_camp'=> $this->input->post('cadet_social_camp')
          );



  
      $this->db->where('cadet_id',$id);
     $this->db->update('cadet_biodata',$data);
     redirect('Form/viewbiodata');
        }

 public function editbiodata($id)
    {
         $this->load->model('Biodatamodel');
$data['cadetdetails']=$this->Biodatamodel->getonerow($id);
     $this->load->view('editbiodata',$data);
    }
    
 public function updatejr($id)
     {
  $id=$this->input->post('cadet_id');

        $config['upload_path']='./uploads/biodata/cadets';
        $config['allowed_types']='gif|jpg|png';
        $config['encrypt_type']=TRUE;
        $this->load->library('upload',$config);

$this->upload->do_upload('userfile');
        $data_upload_files=$this->upload->data();
        $image=$data_upload_files[file_name];

        if($image)
      {
         $dataa=array('photo'=> $image);
          $this->db->where('cadet_id',$id);
          $this->db->update('cadet_biodata',$dataa);
      }
     
            
 $data=array(
         'cadet_category'=>  $this->input->post('cadet_category'), 
        'cadet_no'=>  $this->input->post('cadet_no'), 
        'cadet_admn'=>  $this->input->post('cadet_admn'),
         'cadet_name'=>  $this->input->post('cadet_name'), 
         'cadet_parent_name'=>  $this->input->post('cadet_parent_name'),
         'cadet_parent_occupation'=>  $this->input->post('cadet_parent_occupation'),
         'cadet_mother_name'=>  $this->input->post('cadet_mother_name'),
            'cadet_gender'=>  $this->input->post('cadet_gender'),
         'cadet_status'=>  $this->input->post('cadet_status'),
         'cadet_batch'=>  $this->input->post('cadet_batch'),
         'cadet_address'=>  $this->input->post('cadet_address'),
         'cadet_dob'=>  $this->input->post('cadet_dob'),
         'cadet_class'=>  $this->input->post('cadet_class'),
         'cadet_division'=>  $this->input->post('cadet_division'),
         'cadet_enrolement_date'=>  $this->input->post('cadet_enrolement_date'),
         'cadet_blood_group'=>  $this->input->post('cadet_blood_group'),
         'cadet_medical_date'=>  $this->input->post('cadet_medical_date'),
         'cadet_height'=>  $this->input->post('cadet_height'),
         'cadet_weight'=>  $this->input->post('cadet_weight'),
         
         'cadet_talent'=>  $this->input->post('cadet_talent'),
         'cadet_phone'=>  $this->input->post('cadet_phone')
         
          );
 
                        $this->db->where('cadet_id',$id);
                        $this->db->update('cadet_biodata',$data);
                        redirect('Form/viewbiodata');

    }


        public function viewsrbiodata()
    {
        $this->load->view('viewsrbiodata');
    }
     public function viewsrdetails($id)
    {
         $this->load->model('Biodatamodel');
$data['cadetdetails']=$this->Biodatamodel->getonerowb($id);
        $this->load->view('viewsrdetails',$data);
    }
    public  function uploadfilesr()
        {
            $config["upload_path"]='./uploads/biodata/cadets';
            $config['allowed_types']='gif|jpg|png';
            
            $this->load->library('upload',$config);
            
            
            
     $this->upload->do_upload('userfile');
     $data_upload_files = $this->upload->data();

     $image = $data_upload_files[file_name];  
     $data=array
     
     (
        'cadet_category'=>  $this->input->post('cadet_category'), 
        'cadet_no'=>  $this->input->post('cadet_no'), 
        'cadet_admn'=>  $this->input->post('cadet_admn'), 
         'cadet_name'=>  $this->input->post('cadet_name'), 
         'cadet_parent_name'=>  $this->input->post('cadet_parent_name'),
         'cadet_parent_occupation'=>  $this->input->post('cadet_parent_occupation'),
         'cadet_mother_name'=>  $this->input->post('cadet_mother_name'),
         'cadet_gender'=>  $this->input->post('cadet_gender'),
         'cadet_status'=>  $this->input->post('cadet_status'),
         'cadet_batch'=>  $this->input->post('cadet_batch'),
         'cadet_address'=>  $this->input->post('cadet_address'),
         'cadet_dob'=>  $this->input->post('cadet_dob'),
         'cadet_class'=>  $this->input->post('cadet_class'),
         'cadet_division'=>  $this->input->post('cadet_division'),
         'cadet_enrolement_date'=>  $this->input->post('cadet_enrolement_date'),
         'cadet_blood_group'=>  $this->input->post('cadet_blood_group'),
         'cadet_medical_date'=>  $this->input->post('cadet_medical_date'),
         'cadet_height'=>  $this->input->post('cadet_height'),
         'cadet_weight'=>  $this->input->post('cadet_weight'),
        
         'cadet_talent'=>  $this->input->post('cadet_talent'),
         'cadet_phone'=>  $this->input->post('cadet_phone'),
         'cadet_height2'=> $this->input->post('cadet_height2'),
         'cadet_weight2'=> $this->input->post('cadet_weight2'),
        
         'cadet_attendance_first'=> $this->input->post('cadet_attendance_first'),
        'cadet_annual_camp'=> $this->input->post('cadet_annual_camp'),
          'cadet_social_camp'=> $this->input->post('cadet_social_camp'),


 'photo'=> $image);
     $this->db->insert('cadet_biodata',$data);
     redirect('Form/directsrbiodata');
        }

public function delete1($cadet_id){
       
       $query =  $this->db->get_where('cadet_biodata',array('cadet_id' => $cadet_id));
    if( $query->num_rows() > 0 )
    {
        $row = $query->row();
        $photo = $row->photo;
        unlink(realpath('uploads/biodata/cadets/'.$photo ));
        $this->db->delete('cadet_biodata', array('cadet_id' => $cadet_id));
  redirect('Form/viewsrbiodata');
       
        return true;
        }

       return false;   
      
}


 public function editsrbiodata($id)
    {
         $this->load->model('Biodatamodel');
$data['cadetdetails']=$this->Biodatamodel->getonerow($id);
     $this->load->view('editsrbiodata',$data);
    }

    public function updatesr($id)
     {
  $id=$this->input->post('cadet_id');

        $config['upload_path']='./uploads/biodata/cadets';
        $config['allowed_types']='gif|jpg|png';
        $config['encrypt_type']=TRUE;
        $this->load->library('upload',$config);

$this->upload->do_upload('userfile');
        $data_upload_files=$this->upload->data();
        $image=$data_upload_files[file_name];

        if($image)
      {
         $dataa=array('photo'=> $image);
          $this->db->where('cadet_id',$id);
          $this->db->update('cadet_biodata',$dataa);
      }
     
            
 $data=array(
         'cadet_category'=>  $this->input->post('cadet_category'), 
        'cadet_no'=>  $this->input->post('cadet_no'), 
        'cadet_admn'=>  $this->input->post('cadet_admn'),
         'cadet_name'=>  $this->input->post('cadet_name'), 
         'cadet_parent_name'=>  $this->input->post('cadet_parent_name'),
         'cadet_parent_occupation'=>  $this->input->post('cadet_parent_occupation'),
         'cadet_mother_name'=>  $this->input->post('cadet_mother_name'),
         'cadet_gender'=>  $this->input->post('cadet_gender'),
         'cadet_status'=>  $this->input->post('cadet_status'),
         'cadet_batch'=>  $this->input->post('cadet_batch'),
         'cadet_address'=>  $this->input->post('cadet_address'),
         'cadet_dob'=>  $this->input->post('cadet_dob'),
         'cadet_class'=>  $this->input->post('cadet_class'),
         'cadet_division'=>  $this->input->post('cadet_division'),
         'cadet_enrolement_date'=>  $this->input->post('cadet_enrolement_date'),
         'cadet_blood_group'=>  $this->input->post('cadet_blood_group'),
         'cadet_medical_date'=>  $this->input->post('cadet_medical_date'),
         'cadet_height'=>  $this->input->post('cadet_height'),
         'cadet_weight'=>  $this->input->post('cadet_weight'),
         
         'cadet_talent'=>  $this->input->post('cadet_talent'),
         'cadet_phone'=>  $this->input->post('cadet_phone'),
         'cadet_height2'=> $this->input->post('cadet_height2'),
         
         'cadet_attendance_first'=> $this->input->post('cadet_attendance_first'),
        'cadet_annual_camp'=> $this->input->post('cadet_annual_camp'),
          'cadet_social_camp'=> $this->input->post('cadet_social_camp')
          );
 
                        $this->db->where('cadet_id',$id);
                        $this->db->update('cadet_biodata',$data);
                        redirect('Form/viewsrbiodata');

    }

public  function complete($id)
        {
  $id=$this->input->post('cadet_id');
            
     $data=array
     
     (
        'cadet_category'=> $this->input->post('cadet_category'),
        'cadet_no'=>  $this->input->post('cadet_no'), 
         'cadet_name'=>  $this->input->post('cadet_name'), 
         'cadet_parent_name'=>  $this->input->post('cadet_parent_name'),
        
        
         'cadet_total_attendance'=> $this->input->post('cadet_total_attendance'),
         'cadet_certificate_date'=> $this->input->post('cadet_certificate_date'),
         'cadet_remarks'=>  $this->input->post('cadet_remarks')
         
          );



  
      $this->db->where('cadet_id',$id);
     $this->db->update('cadet_biodata',$data);
     redirect('Form/viewsrbiodata');
        }


public function completesr($id)
    {
         $this->load->model('Biodatamodel');
$data['cadetdetails']=$this->Biodatamodel->getonerowc($id);
     $this->load->view('completesr',$data);
    }
   

  

public  function complete1($id)
        {
  $id=$this->input->post('cadet_id');
            
     $data=array
     
     (
        'cadet_category'=> $this->input->post('cadet_category'),
        'cadet_no'=>  $this->input->post('cadet_no'), 
         'cadet_name'=>  $this->input->post('cadet_name'), 
         'cadet_parent_name'=>  $this->input->post('cadet_parent_name'),
        
        
         'cadet_total_attendance'=> $this->input->post('cadet_total_attendance'),
         'cadet_certificate_date'=> $this->input->post('cadet_certificate_date'),
         'cadet_remarks'=>  $this->input->post('cadet_remarks')
         
          );



  
      $this->db->where('cadet_id',$id);
     $this->db->update('cadet_biodata',$data);
     redirect('Form/viewsrbiodata');
        }


public function completejr($id)
    {
         $this->load->model('Biodatamodel');
$data['cadetdetails']=$this->Biodatamodel->getonerowc($id);
     $this->load->view('completejr',$data);
    }




      public function idcardsr($id)
    {
        $this->load->model('Biodatamodel');
$data['cadetdetails']=$this->Biodatamodel->getonerow($id);
        $this->load->view('idcardsr',$data);
    }

    //official


 public function ofcbiodata()
    {
        $this->load->view('ofcbiodata');
    }
     public  function uploadfile1()
        {
            $config["upload_path"]='./uploads/biodata/officials/';
            $config['allowed_types']='gif|jpg|png';
            
            $this->load->library('upload',$config);
            
            
            
     $this->upload->do_upload('userfile');
     $data_upload_files = $this->upload->data();

     $image = $data_upload_files[file_name];  
     $data=array
     
     (
         
         'ofc_name'=>  $this->input->post('ofc_name'), 
         'ofc_designation'=>  $this->input->post('ofc_designation'),
         'ofc_officeal_address'=>  $this->input->post('ofc_officeal_address'),
         'ofc_home_address'=>  $this->input->post('ofc_home_address'),
         'ofc_reg_year'=>$this->input->post('ofc_reg_year'),
         'ofc_phone'=>  $this->input->post('ofc_phone'),
         'ofc_mail'=>  $this->input->post('ofc_mail'),
         


 'photo'=> $image);
     $this->db->insert('officials_biodata',$data);
     redirect('form/ofcbiodata');
}
 public function viewofcbiodata()
    {
        $this->load->view('viewofcbiodata');
    }

  public function viewofcdetails($id)
    {
        $this->load->model('Biodatamodel');
$data['ofcdetails']=$this->Biodatamodel->getonerowa($id);
        $this->load->view('viewofcdetails',$data);
    }


    public function delete2($ofc_id){
       
       $query =  $this->db->get_where('officials_biodata',array('ofc_id' => $ofc_id));
    if( $query->num_rows() > 0 )
    {
        $row = $query->row();
        $photo = $row->photo;
        unlink(realpath('uploads/biodata/officials/'.$photo ));
        $this->db->delete('officials_biodata', array('ofc_id' => $ofc_id));
  redirect('Form/viewofcbiodata');
       
        return true;
        }

       return false;   
      
}


 public function editofcbiodata($id)
    {
         $this->load->model('Biodatamodel');
$data['ofcdetails']=$this->Biodatamodel->getonerowa($id);
     $this->load->view('editofcbiodata',$data);
    }

     public function updateofc($id)
     {
  $id=$this->input->post('ofc_id');

        $config['upload_path']='./uploads/biodata/officials';
        $config['allowed_types']='gif|jpg|png';
        $config['encrypt_type']=TRUE;
        $this->load->library('upload',$config);

$this->upload->do_upload('userfile');
        $data_upload_files=$this->upload->data();
        $image=$data_upload_files[file_name];

        if($image)
      {
         $dataa=array('photo'=> $image);
          $this->db->where('ofc_id',$id);
          $this->db->update('officials_biodata',$dataa);
      }
      $data=array
     
     (
         
         'ofc_name'=>  $this->input->post('ofc_name'), 
         'ofc_designation'=>  $this->input->post('ofc_designation'),
         'ofc_officeal_address'=>  $this->input->post('ofc_officeal_address'),
         'ofc_home_address'=>  $this->input->post('ofc_home_address'),
         'ofc_reg_year'=>$this->input->post('ofc_reg_year'),
         'ofc_phone'=>  $this->input->post('ofc_phone'),
         'ofc_mail'=>  $this->input->post('ofc_mail')
         );
     $this->db->where('ofc_id',$id);
                        $this->db->update('officials_biodata',$data);
                        redirect('Form/viewofcbiodata');

     }


     //calender


   public function calender()
    {
        $this->load->view('calender');
    }


       public function caldetails($id)
    {
        $this->load->model('Biodatamodel');
$data['caldetails']=$this->Biodatamodel->getonerowcl($id);
        
    }
     public  function saveprogram()
        {
            
     $data=array(
        'date'=>  $this->input->post('date'),
        'name'=>  $this->input->post('name'),
        'details'=>  $this->input->post('details')
        );
            $this->db->insert('calender',$data);
     redirect('Form/calender');
        }
        public function deletec($cal_id){
       
       $query =  $this->db->get_where('calender',array('cal_id' => $cal_id));
    if( $query->num_rows() > 0 )
    {
        $row = $query->row();
       
        $this->db->delete('calender', array('cal_id' => $cal_id));
  redirect('Form/calender');
       
        return true;
}

    return false;   
      
}
public function calenderedit($id)
    {
    {
       {
        $this->load->model('Biodatamodel');
$data['caldetails']=$this->Biodatamodel->getonerowcal($id);
        $this->load->view('calenderedit',$data);
    }
    }
    }
public  function updatecal($id)
        {

  $id=$this->input->post('cal_id');
            
     $data=array(
        'date'=>  $this->input->post('date'),
        'name'=>  $this->input->post('name'),
        'details'=>  $this->input->post('details')
        );

    $this->db->where('cal_id',$id);
     $this->db->update('calender',$data);
     redirect('Form/calender/'.$id);
        }



        //history

        public function history()
    {
        $this->load->view('history');
    }
    public function historydetails($id)
    {
        $this->load->model('Biodatamodel');
$data['cadetdetails']=$this->Biodatamodel->getonerowc($id);
        $this->load->view('historydetails',$data);
    }








}

