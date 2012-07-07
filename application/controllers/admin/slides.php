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
        $this->new_slide();
    }
    
    public function new_slide()
    {
        $data = array();
        
        
        $data['main_content']   =   'admin/slides/new';
        $this->load->view('admin/layout/layout', $data);
    }
    
    
}

?>
