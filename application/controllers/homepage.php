<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homepage extends MY_Controller {

	public function index()
	{
                Head::instance()->load_js('jquery.flexslider-min');
                Head::instance()->load_css('flexslider');
                
                
                $this->load->model('articles_model');
                $this->load->model('slides_model');
                $this->load->model('quotes_model');
                $this->load->model('clients_model');
                
                $events = $this->articles_model->get_events();                
                $event_categories = $this->articles_model->get_event_categories();
                $slides = $this->slides_model->get_slides();
                
                $latest_news = $this->articles_model->get_latest_news();
                $quote = $this->quotes_model->get_quote_of_the_day();
                $clients = $this->clients_model->get_clients();
                
                $data['quote']      = $quote;
                $data['clients']    = $clients;
                $data['main_content'] = 'homepage';
                $data['events'] = $events;
                $data['event_categories'] = $event_categories;
                $data['slides'] = $slides;
                $data['latest_news'] = $latest_news;
		$this->load->view('layout/layout',$data);
	}
}