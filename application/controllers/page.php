<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends MY_Controller {
    
        public function __construct() {
            parent::__construct();
            
        }

	public function index()
	{
              $this->signup_for_training();
              


               // why do you need this method? 
            
            
              /*  Head::instance()->load_js('jquery.flexslider-min');
                Head::instance()->load_css('flexslider');
                
                
                $this->load->model('articles_model');
                $this->load->model('slides_model');
                $this->load->model('sidebar_model');
                $this->load->model('menus_model');
                $this->load->model('quotes_model');
                
                $events = $this->articles_model->get_events();                
                $event_categories = $this->articles_model->get_event_categories();
                $slides = $this->slides_model->get_slides();
                $latest_news = $this->articles_model->get_latest_news();
                $sidebar_elements = $this->sidebar_model->get_sidebar_elements();
                $menu_items = $this->menus_model->get_menu_items_with_children();
                $quote = $this->quotes_model->get_quote_of_the_day();
                
                $data['quote']      = $quote;
                $data['menu_items'] =   $menu_items;
                $data['sidebar_elements']   = $sidebar_elements;
                $data['main_content'] = 'homepage';
                $data['events'] = $events;
                $data['event_categories'] = $event_categories;
                $data['latest_news'] = $latest_news;
                $data['slides'] = $slides;
              
		$this->load->view('layout/layout',$data);*/
        }
        
        public function signup_for_training(){
            
                $this->load->model('articles_model');
                $this->load->model('sidebar_model');
                $this->load->model('menus_model');
                $this->load->model('quotes_model');
                
                $events = $this->articles_model->get_events();                
                $event_categories = $this->articles_model->get_event_categories();
                $sidebar_elements = $this->sidebar_model->get_sidebar_elements();
                $menu_items = $this->menus_model->get_menu_items_with_children();
                $quote = $this->quotes_model->get_quote_of_the_day();
                
                $data['quote']      = $quote;
                $data['menu_items'] =   $menu_items;
                $data['sidebar_elements']   = $sidebar_elements;
                
                $data['main_content'] = 'signup_for_training';
                $data['events'] = $events;
                $data['event_categories'] = $event_categories;
              
		$this->load->view('layout/layout',$data);
            
        }
        
        
}

?>
