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
            $data = array();
            if($this->input->post('signup')){
                $data = $this->save_sign_up();
            }
            
                $this->load->model('articles_model');
                $this->load->model('sidebar_model');
                $this->load->model('menus_model');
                $this->load->model('quotes_model');
                $this->load->model('footer_model');
                
                $footer = $this->footer_model->get_footer();
                $events = $this->articles_model->get_events();                
                $event_categories = $this->articles_model->get_event_categories();
                $sidebar_elements = $this->sidebar_model->get_sidebar_elements();
                $menu_items = $this->menus_model->get_menu_items_with_children();
                $quote = $this->quotes_model->get_quote_of_the_day();
                
                
                $data['footer']     = $footer;
                $data['quote']      = $quote;
                $data['menu_items'] =   $menu_items;
                $data['sidebar_elements']   = $sidebar_elements;
                
                $data['main_content'] = 'signup_for_training';
                $data['events'] = $events;
                $data['event_categories'] = $event_categories;
              
		$this->load->view('layout/layout',$data);
            
        }
        
        private function save_sign_up(){
            
            $data = array();
            $data['name'] = $name = $this->input->post('name');
            $data['phone'] = $phone = $this->input->post('phone');
            $data['email'] = $email = $this->input->post('email');
            $data['profession'] = $profession = $this->input->post('profession');
            $data['company'] = $company = $this->input->post('company');
            $data['event_id'] = $event_id = $this->input->post('event');
            $data['comment'] = $comment = $this->input->post('comment');
            $data['date_created'] = TimeHelper::DateTimeAdjusted();
            
            

            $errors = array();
            
            if(!$phone){
                $errors['phone'] = '*Внесете Телефонски Број';
            }
            
            if(!$name){
                $errors['name'] = "*Внесете го вашето име";
            }
            
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = "*Внесете валидна емаил адреса";
            }
            
            if(count($errors) == 0){
                
                $this->load->model('candidates_model');
                $this->candidates_model->save_candidate($data);
                $data = array(
                    'success' => true
                );
                
                //TODO send email to admin 
            }else{
                $data['errors'] = $errors;
            }
            
            return $data;
        
        }
        
        
}

?>
