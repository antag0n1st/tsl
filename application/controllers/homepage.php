<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homepage extends MY_Controller {

	public function index()
	{
                Head::instance()->load_js('jquery.flexslider-min');
                Head::instance()->load_css('flexslider');
                
                
                $this->load->model('articles_model');
                $events = $this->articles_model->get_events();
                
                $event_categories = $this->articles_model->get_event_categories();
                
                $data['main_content'] = 'homepage';
                $data['events'] = $events;
                $data['event_categories'] = $event_categories;
		$this->load->view('layout/layout',$data);
	}
}