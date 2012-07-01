<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Admin_Controller {
    
    public function index()
    {
        $data['main_content']   =   'admin/homepage';
        $this->load->view('admin/layout/layout', $data);
    }
}