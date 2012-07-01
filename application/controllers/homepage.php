<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homepage extends MY_Controller {

	public function index()
	{
                Head::instance()->load_js('jquery.flexslider-min');
                Head::instance()->load_css('flexslider');
                
                $data['main_content'] = 'homepage';
		$this->load->view('layout/layout',$data);
	}
}