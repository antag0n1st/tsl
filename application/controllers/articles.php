<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articles extends MY_Controller {

	public function index()
	{
            $data['main_content'] = 'article';
            $this->load->view('layout/layout',$data);
           
            
        }
}

?>
