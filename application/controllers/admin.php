<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Admin_Controller {
    
    public function index()
    {
        Head::instance()->title = "TSL Admin";
        
        
        $data['main_content']   =   'admin/homepage';
        $this->load->view('admin/layout/layout', $data);
    }
    
    
    public function new_article(){
        
        $data['main_content']   =   'admin/articles/new';
        $this->load->view('admin/layout/layout', $data);
    }
}