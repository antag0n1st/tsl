<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @property CI_Loader $load
* @property CI_Form_validation $form_validation
* @property CI_Input $input
* @property CI_Email $email
* @property CI_DB_active_record $db
* @property CI_DB_forge $dbforge
* @property Footer_model $footer_model
*/
class Footer extends MY_Admin_Controller {
    
    public function view_footer()
    {
        Head::instance()->title = 'Уреди Footer';
        $this->load->model('footer_model');
        $page_footer = $this->footer_model->get_footer();
        $data['page_footer']    =   $page_footer;
        $data['main_content']   =   'admin/footer/footer';
        $this->load->view('admin/layout/layout', $data);
    }
    
    public function edit_footer()
    {
        Head::instance()->title = 'Уреди Footer';
        $this->load->model('footer_model');
        $data['id']        = 1;
        $data['content']   = $this->input->post('content');
        
        $this->footer_model->update_footer($data);
        
        $data['page_footer']    =   $this->footer_model->get_footer();
        
        $data['msg'] = 'Footer-от е успешно зачуван';
        $data['main_content']   =   'admin/footer/footer';
        $this->load->view('admin/layout/layout', $data);
        
    }
}

?>
