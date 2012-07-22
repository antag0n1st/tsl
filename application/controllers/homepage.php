<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homepage extends MY_Controller {

	public function index()
	{
                Head::instance()->load_js('jquery.flexslider-min');
                Head::instance()->load_css('flexslider');
         
                Head::instance()->title          = 'Triple S Group - Delivering Success';
                Head::instance()->description    = Head::instance()->title .
                                                          ' Triple S Group';
                Head::instance()->keywords       = 'пријавување,обуки,тренинзи,професионално учење,семинари,маркетинг,продажба,семинари';
                Head::instance()->fb_title       = Head::instance()->title;
                Head::instance()->fb_description = Head::instance()->description . ' ' .
                                                   Head::instance()->keywords;
                
                
                
                $this->load->model('articles_model');
                $this->load->model('slides_model');
                $this->load->model('sidebar_model');

                $this->load->model('quotes_model');
                $this->load->model('clients_model');
                $this->load->model('menus_model');
                $this->load->model('footer_model');
                
                $events = $this->articles_model->get_events();                
                $event_categories = $this->articles_model->get_event_categories();
                $slides = $this->slides_model->get_slides();
                $sidebar_elements = $this->sidebar_model->get_sidebar_elements();
                $latest_news = $this->articles_model->get_latest_news();
                $quote = $this->quotes_model->get_quote_of_the_day();
                $clients = $this->clients_model->get_clients();
                $footer  = $this->footer_model->get_footer();
                
                $menu_items = $this->menus_model->get_menu_items_with_children();
        
                
                
                $data['menu_items'] =   $menu_items;

                $data['footer']     =   $footer;
                
                $data['sidebar_elements'] = $sidebar_elements;

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
