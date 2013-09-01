<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @property CI_Loader $load
* @property CI_Form_validation $form_validation
* @property CI_Input $input
* @property CI_Email $email
* @property CI_DB_active_record $db
* @property CI_DB_forge $dbforge
* @property Home_banner_model $home_banner_model
*/
class Home_banner extends MY_Admin_Controller {
    public function index()
    {
        $this->show_home_banner();
    }
    
    public function new_home_banner()
    {
        Head::instance()->title = 'Главен банер';
        $data = array();
        $data['home_banner']  = new HomeBanner();
        
        $data['main_content']   =   'admin/home_banner/new';
        $this->load->view('admin/layout/layout', $data);
    }
    
    public function edit_home_banner($banner_id)
    {    
        if(is_numeric($banner_id))
        {
            Head::instance()->title = 'Уреди банер на почетна страница';
            $this->load->model('home_banner_model');
            $banner = $this->home_banner_model->get_home_banner(array('home_banner_id'  =>  $banner_id));
            if(count($banner) == 1)
            {
                $banner = $banner[0];
                $data['home_banner']  =   $banner;
                $data['main_content']   =   'admin/home_banner/new';
                $this->load->view('admin/layout/layout', $data);
            }
            
        }
        
    }
    
    public function submit_home_banner()
    {
        $this->load->model('home_banner_model');
        
        
        $home_banner = new HomeBanner();
        $home_banner->home_banner_id = $this->input->post('id');
        $home_banner->title = $this->input->post('title');
        $home_banner->link  = $this->input->post('link');
        $home_banner->image = $this->input->post('featured_image_hidden');
        $home_banner->date_created  = TimeHelper::DateTimeAdjusted();
        $home_banner->is_active = $this->input->post('is_active');
        
        if($home_banner->is_valid())
        {
            $this->home_banner_model->update_home_banner($home_banner);
            $msg = 'Банерот е успешно зачуван';
        }
        else
        {
            $msg = 'Банерот не е успешно зачуван';
        }
        
        
        
        
        $data['msg']    =   $msg;
        $data['home_banner']  =   $home_banner;
        $data['main_content']   =   'admin/home_banner/home_banner';
        $this->load->view('admin/layout/layout', $data);
    }
    
    public function show_home_banner()
    {
        Head::instance()->title = 'Банер на почетна страница';
        $this->load->model('home_banner_model');
        $home_banner =  $this->home_banner_model->get_home_banner(); 
        if(is_array($home_banner))
        {
            $home_banner = $home_banner[0];
        }
        else
        {
            $home_banner = new Home_banner();
        }
        
        
        $data['home_banner'] = $home_banner;
        
        $data['main_content']   =   'admin/home_banner/home_banner';
        $this->load->view('admin/layout/layout', $data);
    }
    
    public function delete_home_banner($banner_id)
    {
        if(is_numeric($banner_id))
        {
            $this->load->model('home_banner_model');
            $this->home_banner_model->delete_home_banner($banner_id);
             redirect(base_url() . 'admin/home_banner/show_home_banner');
        }
    }
    
    
  
    
     public function upload_image() {
        $status = "";
        $msg = "";
        $file_element_name = 'featured_image';




        if ($status != "error") {
            $config['upload_path'] = /* base_url() . */'public/uploaded/home_banner/';
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
