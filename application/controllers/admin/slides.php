<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @property CI_Loader $load
* @property CI_Form_validation $form_validation
* @property CI_Input $input
* @property CI_Email $email
* @property CI_DB_active_record $db
* @property CI_DB_forge $dbforge
* @property Slides_model $slides_model
*/
class Slides extends MY_Admin_Controller {
    public function index()
    {
        $this->show_slides();
    }
    
    public function new_slide()
    {
        $data = array();
        $data['slide']  = new Slide();
        
        $data['main_content']   =   'admin/slides/new';
        $this->load->view('admin/layout/layout', $data);
    }
    
    public function edit_slide($slide_id)
    {    
        if(is_numeric($slide_id))
        {
            $this->load->model('slides_model');
            $slide = $this->slides_model->get_slides(array('slides_id'  =>  $slide_id));
            if(count($slide) == 1)
            {
                $slide = $slide[0];
                $data['slide']  =   $slide;
                $data['main_content']   =   'admin/slides/new';
                $this->load->view('admin/layout/layout', $data);
            }
            
        }
        
    }
    
    public function submit_slide()
    {
        $this->load->model('slides_model');
        
        $slide = new Slide();
        
        $slide->slides_id       = $this->input->post('slides_id');
        $slide->title           = $this->input->post('title');
        $slide->description     = $this->input->post('description');
        $slide->link            = $this->input->post('link');
        $slide->image           = $this->input->post('featured_image_hidden');
        $slide->order_index     = $this->input->post('order_index');
        $slide->date_created    = TimeHelper::DateTimeAdjusted();
        
        
        if($slide->is_valid())
        {
            if($slide->order_index == 0)
            {
                $slide->order_index = $this->slides_model->get_max_order_index() + 1;
            }
            
            if($slide->slides_id == 0)
            {
                $slide->slides_id   =   $this->slides_model->insert_slide($slide);
            }
            else
            {
                $this->slides_model->update_slide($slide);
            }
            $msg = 'Слајдот е успешно зачуван';
        }
        else
        {
            $msg = 'Слајдот не е зачуван. Проверете дали сте ги пополниле сите полиња';
        }
        
        
        $data['msg']    =   $msg;
        $data['slide']  =   $slide;
        $data['main_content']   =   'admin/slides/new';
        $this->load->view('admin/layout/layout', $data);
    }
    
    public function show_slides()
    {
        $this->load->model('slides_model');
        $slides =  $this->slides_model->get_slides(); 
        
        $data['slides'] = $slides;
        
        $data['main_content']   =   'admin/slides/slides';
        $this->load->view('admin/layout/layout', $data);
    }
    
    public function delete_slide($slide_id)
    {
        if(is_numeric($slide_id))
        {
            $this->load->model('slides_model');
            $this->slides_model->delete_slide($slide_id);
             redirect(base_url() . 'admin/slides/show_slides');
        }
    }
    
    
    public function update_slide_order()
    {
        $this->load->model('slides_model');
        
        parse_str($_POST['pages'], $pageOrder);
        
        foreach ($pageOrder['page'] as $key => $value) {
                $id = $value;
                $order_index = $key;
            
                $slide = $this->slides_model->get_slides(array('slides_id'    =>  $id));
                
                if(count($slide) == 1)
                {
                    $slide = $slide[0];
                    //echo $slide->slides_id . ": " . $slide->order_index . ": " . $key . '\n';
                    $slide->order_index = $order_index;
                    $this->slides_model->update_slide($slide);
               }
        }
        
    }
    
     public function upload_image() {
        $status = "";
        $msg = "";
        $file_element_name = 'featured_image';




        if ($status != "error") {
            $config['upload_path'] = /* base_url() . */'public/uploaded/slider/';
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
 
                   // $image_helper = new ImageHelper();
                   // $image_helper->save_image(base_url() . $config['upload_path'] . $file_name, $file_name, 650, 250, 150, 150);
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
    
    
    
}

?>
