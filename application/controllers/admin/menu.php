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
        $articles   = $this->articles_model->get_articles();
        
        $data['articles']       =   $articles;
        $data['menu_items']     =   $menu_items;
        $data['categories']     =   $categories;
        $data['main_content']   =   'admin/menu/new';
        $this->load->view('admin/layout/layout', $data);
    }
    
    public function submit_menu_item()
    {
      //  print_r($_POST);
        $this->load->model('menus_model');
        $this->load->model('articles_model');
        
        $menu_item = new MenuItem();
        $menu_item->menu_items_id   =   $this->input->post('menu_item_id');
        $menu_item->text            =   $this->input->post('text');
        $menu_item->link            =   $this->input->post('link');
        $menu_item->parent_id       =   $this->input->post('parent');
        $menu_item->date_created    = TimeHelper::DateTimeAdjusted();
        
        
        if($menu_item->parent_id == 0) // top level item
        {
  /*          if($menu_item->menu_items_id == 0)
            {*/
                $options = array('parent_id'    => 0);
                $max_parent_id_item = $this->menus_model->get_menu_items($options,0,0,'menu_items_id DESC');
                
                $menu_item->order_index = $max_parent_id_item[0]->order_index + 100; //($max_parent_id_item[0]->menu_items_id + 1) * 100;
                $menu_item->depth_level = 0;
          /*  }
            else{
               $menu_item->order_index = $this->input->post('order_index');
               $menu_item->depth_level = $this->input->post('depth_level');
            }*/
        }
        else{ // sub level item
    //        if($menu_item->menu_items_id == 0)
    //        {
                $options = array('menu_items_id'    => $menu_item->parent_id);
                $max_parent_id_item = $this->menus_model->get_menu_items($options,1,0,'order_index DESC');
               
                
                $options = array('parent_id'    => $menu_item->parent_id);
                $max_child_id_item = $this->menus_model->get_menu_items($options,1,0,'order_index DESC');
                
                
                if(count($max_child_id_item) > 0)
                {
                    $menu_item->order_index = $max_child_id_item[0]->order_index + 1;
                }
                else
                {
                    $menu_item->order_index = $max_parent_id_item[0]->order_index + 1;
                }
                
                $menu_item->depth_level = $max_parent_id_item[0]->depth_level + 1;
     /*       }
            else{
                $menu_item->order_index = $this->input->post('order_index');
                $menu_item->depth_level = $this->input->post('depth_level');
            }*/
        }
        
        if($menu_item->is_valid())
        {
            if($menu_item->menu_items_id == 0)
            {
                $menu_item->menu_items_id = $this->menus_model->insert_menu_item($menu_item);
            }
            else{
                $this->menus_model->update_menu_item($menu_item);
            }
            $msg = 'Линкот е успешно зачуван во менито';
        }
        else{
            $msg = 'Линкот не е зачуван. Проверете дали сте ги пополниле сите полиња';
        }
        $data['msg']    =   $msg;
        
        $categories = $this->articles_model->get_categories();
        $menu_items = $this->menus_model->get_menu_items();
        $articles   = $this->articles_model->get_articles();
        
        $data['articles']       =   $articles;
        $data['menu_item']     =   $menu_item;
        $data['menu_items']     =   $menu_items;
        $data['categories']     =   $categories;
        $data['main_content']   =   'admin/menu/new';
        $this->load->view('admin/layout/layout', $data);
        
    }
}

?>
