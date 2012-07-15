<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* @property CI_Loader $load
* @property CI_Form_validation $form_validation
* @property CI_Input $input
* @property CI_Email $email
* @property CI_DB_active_record $db
* @property CI_DB_forge $dbforge
* @property Menus_model $menus_model
*/
class Login extends MY_Controller {
    //put your code here
    
    public function index()
    {
        $this->load->helper('form');
        $this->load->library('session');
        
        $this->load->model('menus_model');
        
        $menu_items = $this->menus_model->get_menu_items_with_children();
        
        if (!$this->session->userdata('admin_loggedIn'))
        {
            $data   =   array('main_content'    =>  'elements/login_form',
                              'menu_items'      =>  $menu_items);
            $this->load->view('layout/layout',$data);
        }
        else
        {
            redirect(base_url() . "admin/home");
        }
    }
    
    public function submit()
    {
        $this->load->library('session');
        $this->load->library('form_validation');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $this->form_validation->set_rules('username', 'Корисничко име', 'required');
	$this->form_validation->set_rules('password', 'Лозинка', 'required');
        
        $this->form_validation->set_message('required', 'Полето %s е задолжително');
        
        if($this->form_validation->run() == TRUE)
        {
            if($username    ==  'admin' and
               $password    ==  'tsltsl')
            {
                $this->session->set_userdata('admin_loggedIn','Yes');
                
                $redirect = urldecode($this->input->post('r'));
                
                if(isset($redirect) and strlen(trim($redirect)) > 0  )
                {
                    redirect($redirect);
                }
                else
                {
                    redirect(base_url() . 'admin/home');
                }
                
            }
            else
            {
                $this->session->set_flashdata('message', 'Неточна лозинка или корисничко име');
                redirect(base_url() . "login");
            }
        }
        else
        {
            $this->index();
        }   
    }
    
    public function logout()
    {
        $this->load->library('session');
        if ($this->session->userdata('admin_loggedIn'))
        {
            $this->session->sess_destroy();
            redirect(base_url() . "login");
        }
    }
}

?>
