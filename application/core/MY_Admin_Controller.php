<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**

 * @property CI_Loader $load

 * @property CI_Form_validation $form_validation

 * @property CI_Input $input

 * @property CI_Email $email

 * @property CI_DB_active_record $db

 * @property CI_DB_forge $dbforge

 */
class MY_Admin_Controller extends CI_Controller {
    
    function __construct() {
        parent::__construct();
         //$this->output->enable_profiler(TRUE);
            $this->load->library('session');
            if ( !$this->session->userdata('admin_loggedIn') ) // check if the admin is logged in
            {
                    $uri = 'http'. ($_SERVER['HTTPS'] ? 's' : null) .'://'. $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                
                    $redirect = urlencode($uri);

                    $redirect = base_url() . 'login' . '?r=' . $redirect;
                
                
               // UNCOMMENT THIS LINE IN PRODUCTION 
               //redirect($redirect);
            }
            
        
        
         Head::instance()->load_css('style', '1.0');
         Head::instance()->load_css('admin-style', '1.0');
         Head::instance()->load_js('jquery-1.7.2.min', '1.0');
         Head::instance()->load_js('main', '1.0');
         Head::instance()->load_js('admin-main', '1.0');
       
       
       
    }
    
}
