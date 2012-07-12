<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @property CI_Loader $load
* @property CI_Form_validation $form_validation
* @property CI_Input $input
* @property CI_Email $email
* @property CI_DB_active_record $db
* @property CI_DB_forge $dbforge
* @property Articles_model $articles_model
* @property Menus_model $menus_model
*/
class Menu extends MY_Admin_Controller {
            
    public function index()
    {
        echo "Hello World";
    }
    
    public function new_menu_item()
    {
        $this->load->model('articles_model');
        $this->load->model('menus_model');
        $data = array();
        $data['menu_item']  = new MenuItem();
        
        $categories = $this->articles_model->get_categories();
        $menu_items = $this->menus_model->get_menu_items();
        
        $data['menu_items']     =   $menu_items;
        $data['categories']     =   $categories;
        $data['main_content']   =   'admin/menu/new';
        $this->load->view('admin/layout/layout', $data);
    }
}

?>
