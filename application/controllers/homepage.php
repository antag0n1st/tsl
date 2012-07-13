<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homepage extends MY_Controller {

	public function index()
	{
                Head::instance()->load_js('jquery.flexslider-min');
                Head::instance()->load_css('flexslider');
                
                
                $this->load->model('articles_model');
                $this->load->model('slides_model');
                $this->load->model('sidebar_model');
                
                
                $events = $this->articles_model->get_events();                
                $event_categories = $this->articles_model->get_event_categories();
                $slides = $this->slides_model->get_slides();
                $sidebar_elements = $this->sidebar_model->get_sidebar_elements();
                $latest_news = $this->articles_model->get_latest_news();
                
                
                $data['sidebar_elements'] = $sidebar_elements;
                $data['main_content'] = 'homepage';
                $data['events'] = $events;
                $data['event_categories'] = $event_categories;
                $data['slides'] = $slides;
                $data['latest_news'] = $latest_news;
              
		$this->load->view('layout/layout',$data);
	}
}