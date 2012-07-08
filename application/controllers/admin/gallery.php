<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @property CI_Loader $load
* @property CI_Form_validation $form_validation
* @property CI_Input $input
* @property CI_Email $email
* @property CI_DB_active_record $db
* @property CI_DB_forge $dbforge
* @property Events_model $events_model
*/
class Gallery extends MY_Admin_Controller {
  
    public function index()
    {
        $this->show_gallries();
    }
    
    public function show_gallries(){
        
        $this->load->model('gallery_model');
        
        $galleries = $this->gallery_model->get_gallries();
        
        $data['galleries']   =   $galleries;
        $data['main_content']   =   'admin/gallery/galleries';
        $this->load->view('admin/layout/layout', $data);
    }
    
    public function new_gallery(){
        
        $this->load->model('gallery_model');
        
        $groups = $this->gallery_model->get_groups();
        
        $data['groups']   =   $groups;
        $data['main_content']   =   'admin/gallery/new_gallery';
        $this->load->view('admin/layout/layout', $data);
    }
    
    public function submit_gallery()
    {
        $this->load->model('gallery_model');
        
        $gallery = new GalleryObject();
        //$gallery->id_gallery  = $this->input->post('calendar_events_id');
        
        $gallery->gallery_group_id  = $this->input->post('group');
        $gallery->description  = $this->input->post('description');
        $gallery->date_created = TimeHelper::DateTimeAdjusted();
        
        $this->gallery_model->insert_gallery($gallery);
        
        $this->show_gallries();
        
    }
    public function submit_photos(){}
    
    public function delete_gallery($id_gallery){
        
        $this->load->model('gallery_model');
         
        $this->gallery_model->delete_gallery($id_gallery);
        
        $this->show_gallries();
    }
    
    public function choose_gallery(){
        $this->load->model('gallery_model');
        
        $galleries = $this->gallery_model->get_gallries();
        
        $data['galleries']   =   $galleries;
        $data['main_content']   =   'admin/gallery/choose_gallery';
        $this->load->view('admin/layout/layout', $data);
    }
    
    public function add_photos($gallery_id){
        
        
        $data['gallery_id']   =   $gallery_id;
        $data['main_content']   =   'admin/gallery/add_photos';
        $this->load->view('admin/layout/layout', $data);
        
        
    }
    
}
?>