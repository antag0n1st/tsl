<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @property CI_Loader $load
* @property CI_Form_validation $form_validation
* @property CI_Input $input
* @property CI_Email $email
* @property CI_DB_active_record $db
* @property CI_DB_forge $dbforge
* @property Popup_model $popup_model
*/
class Popups extends MY_Admin_Controller {
  
    
    public function index()
    {
                $this->load->model('popup_model');
                $popup = $this->popup_model->get_popup();
                $popup = $popup[0];
                $data['popup']          =   $popup;
                $data['main_content']   =   'admin/popups/popup';
                $this->load->view('admin/layout/layout', $data);
    }
    
    public function submit_popup()
    {
        $popup = new Popup();
        
        $popup->id          =   $this->input->post('id');
        $popup->image_url   =   $this->input->post('featured_image_hidden');
        $popup->is_active   =   $this->input->post('is_active');
        $popup->link        =   $this->input->post('link');
        
        $this->load->model('popup_model');
        
        if($popup->is_valid())
        {
            $this->popup_model->update_popup($popup->id,$popup);
            $msg = 'Popup-от е успешно зачуван';
        }
        else
        {
            $msg = 'Popup-от не беше зачуван. Проверете дали сте ги пополниле сите полиња';
        }
        
        $data['msg']    =   $msg;
        $data['popup']  =   $popup;
        $data['main_content']   =   'admin/popups/popup';
        $this->load->view('admin/layout/layout', $data);
        
        
    }
    
    
      public function upload_image() {
        $status = "";
        $msg = "";
        $file_element_name = 'featured_image';




        if ($status != "error") {
            $config['upload_path'] = /* base_url() . */'public/uploaded/popup/';
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