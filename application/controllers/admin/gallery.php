<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @property CI_Loader $load
* @property CI_Form_validation $form_validation
* @property CI_Input $input
* @property CI_Email $email
* @property CI_DB_active_record $db
* @property CI_DB_forge $dbforge
* @property Gallery_model $gallery_model
*/
class Gallery extends MY_Admin_Controller {
  
    public function index()
    {
        $this->show_gallries();
    }
    
    public function show_gallries(){
        
        $this->load->model('gallery_model');
        
        $galleries = $this->gallery_model->get_galleries();
        
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
        
        $gallery->gallery_group_id  = $this->input->post('group');
        $gallery->description  = $this->input->post('description');
        $gallery->date_created = TimeHelper::DateTimeAdjusted();
        
        if($this->input->post('id_gallery')){
            $gallery->id_gallery  = $this->input->post('id_gallery');
            $this->gallery_model->update_gallery($gallery);
        }else{
            
          $this->gallery_model->insert_gallery($gallery);
        }
        
        
        $this->show_gallries();
        
    }
    public function submit_photos()
    {
        $this->load->model('gallery_model');
        
        $photo = new GalleryPhotos();
        
        $photo->image                = $this->input->post('featured_image_hidden');
        $photo->description          = $this->input->post('description');
        $photo->galleries_id_gallery = $this->input->post('id_gallery');
        $photo->date_created         = TimeHelper::DateTimeAdjusted();
        
        $id_gallery = $photo->galleries_id_gallery;
        
        if($photo->is_valid())
        {
            $this->gallery_model->insert_gallery_photo($photo);
            $msg = "Сликата е успешно зачувана";
        }
        else
        {
            $msg = "Сликата не е зачувана. Проверете дали сте ги пополниле сите полиња";
        }
        
        
        
        $groups = $this->gallery_model->get_groups();
        
        $data['msg']   =   $msg;
        $photos = $this->gallery_model->get_photos(array('galleries_id_gallery' => $id_gallery));
        
        $gallery = $this->gallery_model->get_galleries(array('id_gallery' => $id_gallery),1);
        $gallery = $gallery[0];
        
        $groups = $this->gallery_model->get_groups(array('id_gallery_group' => $gallery->gallery_group_id));
        $group = $groups[0];
        
        $data['group'] = $group;
        $data['gallery'] = $gallery;
        $data['photos'] = $photos;
        $data['id_gallery']   =   $id_gallery;
        $data['main_content']   =   'admin/gallery/add_photos';
        $this->load->view('admin/layout/layout', $data);
        
        
        
    }
    
     public function upload_image() {
        $status = "";
        $msg = "";
        $file_element_name = 'featured_image';




        if ($status != "error") {
            $config['upload_path'] = /* base_url() . */'public/uploaded/gallery/originals/';
            $config['allowed_types'] = 'gif|jpg|png|doc|txt';
            $config['max_size'] = 1024 * 8;
            $config['encrypt_name'] = FALSE;

            $this->load->library('upload', $config);


            $file_name = 'default_featured_image.jpg';
            if (!$this->upload->do_upload($file_element_name)) {
                $status = 'error';
                $msg = $this->upload->display_errors('', '');
            } else {
                $data = $this->upload->data();

                if (count($data) > 0) {
                    $status = "success";
                    $msg = "File successfully uploaded";
                    $file_name = $data['file_name'];
 
                    $image_helper = new ImageHelper('public/uploaded/gallery/');
                    $image_helper->save_image(base_url() . $config['upload_path'] . $file_name, $file_name, 640, 400, 132, 96);
                } else {
                    unlink($data['full_path']);
                    $status = "error";
                    $msg = "Something went wrong when saving the file, please try again.";
                }
            }
            @unlink($_FILES[$file_element_name]);
        }
        echo json_encode(array('status' => $status,
            'msg' => $msg,
            'featured_image_name' => $file_name));
    }
    
    
    public function delete_gallery($id_gallery){
        
        $this->load->model('gallery_model');
         
        $this->gallery_model->delete_gallery($id_gallery);
        
        $this->show_gallries();
    }
    
    
    public function add_photos($id_gallery){
        
        $this->load->model('gallery_model');
        $photos = $this->gallery_model->get_photos(array('galleries_id_gallery' => $id_gallery));
        
        $gallery = $this->gallery_model->get_galleries(array('id_gallery' => $id_gallery),1);
        $gallery = $gallery[0];
        
        $groups = $this->gallery_model->get_groups(array('id_gallery_group' => $gallery->gallery_group_id));
        $group = $groups[0];
        
        $data['group'] = $group;
        $data['gallery'] = $gallery;
        $data['photos'] = $photos;
        $data['id_gallery']   =   $id_gallery;
        $data['main_content']   =   'admin/gallery/add_photos';
        $this->load->view('admin/layout/layout', $data);
        
        
    }
    
    public function delete_photo($id_gallery,$id_gallery_photos){
        
        $this->load->model('gallery_model');
         
        $this->gallery_model->delete_gallery_photo($id_gallery_photos);
        
        $this->add_photos($id_gallery);
    }
    
    public function edit_gallery($gallery_id){
        
        $this->load->model('gallery_model');        
        $groups = $this->gallery_model->get_groups();  
        $gallery = $this->gallery_model->get_galleries(array('id_gallery' => $gallery_id),1);
        $gallery = $gallery[0];
        $data['groups']   =   $groups;
        
        $data['gallery'] = $gallery;
        $data['gallery_id']   =   $gallery_id;
        $data['main_content']   =   'admin/gallery/edit_gallery';
        $this->load->view('admin/layout/layout', $data);
    }
}
?>