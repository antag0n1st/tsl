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
        $menu_items = $this->menus_model->get_menu_items_with_children();
        $articles   = $this->articles_model->get_articles();
        
        $data['articles']       =   $articles;
        $data['menu_items']     =   $menu_items;
        $data['categories']     =   $categories;
        $data['main_content']   =   'admin/menu/new';
        $this->load->view('admin/layout/layout', $data);
    }
    
    public function edit_menu_item($menu_item_id)
    {
        if(is_numeric($menu_item_id))
        {
            $this->load->model('menus_model');
            $this->load->model('articles_model');
            
            $all_items  = $this->menus_model->get_menu_items_with_children();
            
            $menu_item = null;
            foreach($all_items as $a_item)
            {
                $menu_item = $this->menus_model->traverse($a_item, $menu_item_id);
                if($menu_item != null){
                    break;
                }
            }
            
            if($menu_item == null)
            {
                $menu_item = $this->menus_model->get_menu_items(array('menu_items_id' => $menu_item_id));
                $menu_item = $menu_item[0];
            }
            
            
            
            $menu_items = $all_items; //$this->menus_model->get_menu_items();
            $categories = $this->articles_model->get_categories();
            $articles   = $this->articles_model->get_articles();
            
            $data['categories']     =   $categories;
            $data['articles']       =   $articles;
            $data['menu_item']      =   $menu_item;
            $data['menu_items']     =   $menu_items;
            $data['main_content']   =   'admin/menu/new';
            $this->load->view('admin/layout/layout', $data);
        }
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
                $options = array('parent_id'    => 0);
                $max_parent_id_item = $this->menus_model->get_menu_items($options,0,0,'menu_items_id DESC');
                
                $menu_item->order_index = $max_parent_id_item[0]->order_index + 100;
                $menu_item->depth_level = 0;
        }
        else{ // sub level item
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
    
    
    public function show_menu_items()
    {
        $this->load->model('menus_model');
        
     //   $options = array('parent_id'    =>  0);
        $menu_items = $this->menus_model->get_menu_items_with_children();
        
        $data['menu_items'] =   $menu_items;
        $data['main_content']   =   'admin/menu/menu_items';
        $this->load->view('admin/layout/layout', $data);
        
       
        
    }
    
    
    public function update_menu_order()
    {
        $this->load->model('menus_model');
        
        $new_positions = explode(',',$this->input->post('order'));
        $is_top_level  = (int)$this->input->post('topLevelItems');
        
        $max_order_index_item = null;
        
        foreach ($new_positions as $key => $value) {
                $id = $value;
                
                $menu_item = $this->menus_model->get_menu_items(array('menu_items_id'    =>  $id)); // get the current item
                
                
                
                if($is_top_level == 1)
                {
                    $order_index = (($key * 100) + 100);
                }
                elseif ($is_top_level == 0)
                {
                    $parent = $this->menus_model->get_menu_items(array('menu_items_id'  => $menu_item[0]->parent_id ));
                    $parent = $parent[0];
                    
                    
                    if($max_order_index_item == null)
                    {
                        $max_order_index_item = $this->menus_model->get_menu_items(array('order_index > ' => $parent->order_index,
                                                                                     'order_index <'  => (($parent->order_index / 100) * 100) + 100 - ($parent->order_index % 100)
                                                                                    ),
                                                                                    1,
                                                                                    0,
                                                                                    'order_index DESC'
                                                                               );
                        $max_order_index_item = $max_order_index_item[0];
                        $max_order_index_item->order_index--;
                    }
                    $order_index = $max_order_index_item->order_index  + $key;
                }
                
                
               
                
                
                $all_menu_items = $this->menus_model->get_menu_items_with_children(); // get all items with their children so that we could update their order index accordingly
                
                
                if(count($menu_item) == 1)
                {
                    $menu_item = $menu_item[0];
                    $menu_item->order_index = $order_index;

                     foreach($all_menu_items as $k => $a_menu_item)
                     {
                         if($menu_item->menu_items_id == $a_menu_item->menu_items_id)
                         {
                            $this->menus_model->update_children_order($a_menu_item, $order_index, 1);
                            unset($all_menu_items[$k]);
                            break;
                         }
                     }
                     $all_menu_items = array_values($all_menu_items);
                    
                    $this->menus_model->update_menu_item($menu_item);
                }     
         }
    }
    
}

?>
