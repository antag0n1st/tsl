<?php

class Sidebar extends MY_Admin_Controller {
    public function index()
    {
        Head::instance()->title = "TSL Admin";
        
        
        $data['main_content']   =   'admin/sidebar/change_position';
        $this->load->view('admin/layout/layout', $data);
    }
    
    public function change_position(){
        
        Head::instance()->title = "TSL Admin";
        Head::instance()->load_js('jquery-ui/development-bundle/ui/jquery.ui.core');
        Head::instance()->load_js('jquery-ui/development-bundle/ui/jquery.ui.widget');
        Head::instance()->load_js('jquery-ui/development-bundle/ui/jquery.ui.mouse');
        Head::instance()->load_js('jquery-ui/development-bundle/ui/jquery.ui.sortable');
        
        $this->load->model('sidebar_model');
        $sidebar_elements = $this->sidebar_model->get_sidebar_elements();
        
        $data['sidebar_elements'] = $sidebar_elements;
        
        $data['main_content']   =   'admin/sidebar/change_position';
        $this->load->view('admin/layout/layout', $data);
    }
    
    public function update_position(){
        $new_positions = explode(',',$this->input->post('order'));
        $this->load->model('sidebar_model');
        $this->sidebar_model->alter_positions($new_positions);
    }
    
    public function add_element(){
        
        $data['main_content']   =   'admin/sidebar/add_element';
        $this->load->view('admin/layout/layout', $data);
        
    }
    
    public function save_element(){
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        
        $this->load->model('sidebar_model');
        
        $this->sidebar_model->save_element($title,$content);
        
        header('Location: '.  base_url().'admin/sidebar/change_position');
        exit;
        
    }
    
    public function update_element(){
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $id   = $this->input->post('id');
        
        $this->load->model('sidebar_model');
        
        $this->sidebar_model->update_element($id ,$title,$content);
        
        header('Location: '.  base_url().'admin/sidebar/change_position');
        exit;
        
    }
    
    public function delete_element($id){
        
        $this->load->model('sidebar_model');
        
        $this->sidebar_model->delete_element($id);
        
        header('Location: '.  base_url().'admin/sidebar/change_position');
        exit;
    }
    
    public function edit_element($id){
        
        $this->load->model('sidebar_model');
        $elements = $this->sidebar_model->get_sidebar_elements(array('id' => $id));
        $element = $elements[0];
        
        $data['element']= $element;
        $data['main_content']   =   'admin/sidebar/edit_element';
        
        $this->load->view('admin/layout/layout', $data);
        
    }
    
}

?>