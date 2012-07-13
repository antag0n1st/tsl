<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of home
 *
 * @author Vladimir
 */
class Home extends MY_Admin_Controller {
    public function index()
    {
        Head::instance()->title = "TSL Admin";
        
        
        
        $data['main_content']   =   'admin/homepage';
        $this->load->view('admin/layout/layout', $data);
    }
}

?>
