<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends MY_Controller {
    
        public function __construct() {
            parent::__construct();
            
        }

	public function index()
	{
            
                Head::instance()->load_js('jquery.flexslider-min');
                Head::instance()->load_css('flexslider');
                
                
                $this->load->model('articles_model');
                $this->load->model('gallery_model');
                
                $events = $this->articles_model->get_events();                
                $event_categories = $this->articles_model->get_event_categories();
                $galleries  = $this->gallery_model->get_galleries_and_photos();
                
                $data['galleries'] = $galleries;
                $data['main_content'] = 'gallery';
                $data['events'] = $events;
                $data['event_categories'] = $event_categories;
              
		$this->load->view('layout/layout',$data);
        }
}
?>
