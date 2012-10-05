<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @property CI_Loader $load
* @property CI_Form_validation $form_validation
* @property CI_Input $input
* @property CI_Email $email
* @property CI_DB_active_record $db
* @property CI_DB_forge $dbforge
* @property Newsletter_model $newsletter_model
* @property Articles_model $articles_model
*/
class Newsletter extends MY_Controller {

    public function index($auth_token = '') {
        set_time_limit(0);


        $current_time = new DateTime(TimeHelper::DateTimeAdjusted());
        $start_time = new DateTime(TimeHelper::DateAdjusted() . ' 8:00:00');
        $end_time = new DateTime(TimeHelper::DateAdjusted() . ' 15:00:00');

       /* if ($current_time > $start_time and $current_time < $end_time) {
            // we can begin , the time is right
        } else {
            die('the time is not right yet');
        } */

        if ($auth_token != 'thepasswordfortsl123') {
            die();
        }

        $this->load->model('newsletter_model');
        $this->load->helper('phpmailer');
        $newsletter = $this->newsletter_model->get_newsletter_to_send();
        if ($newsletter == null) {
            die('there is no newsletter to sent');
        }

        $data['newsletter_id'] = $newsletter_id = $newsletter->id;
        $data['title'] = $title = $newsletter->title;
        $data['content'] = $content = $newsletter->content;
        $data['date_finished'] = $newsletter->date_finished;

        if ($newsletter->status == 0) {
            $this->newsletter_model->set_newsletter_started($newsletter_id);
        }

        $data['articles'] = $articles = $this->newsletter_model->get_newsletter_articles($newsletter_id);

        $emails = $this->newsletter_model->get_emails($newsletter_id, 100);

        if (count($emails) == 0) {

            $this->newsletter_model->set_newsletter_finished($newsletter_id);
        } else {

            foreach ($emails as $email) {
                $from = 'info@tsgroup.mk';
            
                $data['unsubscribe_id'] = $email->unsubscribe_id;
                $data['email']          = $email;
                $body = $this->load->view('newsletter_template', $data, TRUE);
                
                if(send_email($email->email, $from, $title, $body)){
                     $this->newsletter_model->update_email_sent($newsletter_id, $email->id);
                }

                sleep(3);
            }
        }
    }
    
    public function view($newsletter_id = 0, $email_id = 0){
        
        $this->load->model('newsletter_model');

        $newsletter = $this->newsletter_model->get_newsletter($newsletter_id);
        
        if($newsletter){
            $newsletter = $newsletter[0];
            $data['newsletter_id'] = $newsletter_id = $newsletter->id;
            $data['title'] = $title = $newsletter->title;
            $data['content'] = $content = $newsletter->content;
            $data['articles'] = $articles = $this->newsletter_model->get_newsletter_articles($newsletter_id);
            $data['date_finished'] = $newsletter->date_finished;
            
            if(is_numeric($email_id) and $email_id > 0)
            {
                $email = $this->newsletter_model->get_email_by_id($email_id);
                if($email)
                {
                    $email = $email[0];
                    $data['email']  = $email;
                }
            }
            
            
            $this->load->view('newsletter_template',$data);
        }
        
    }
    
    public function click($newsletter_id,$article_id,$email_id)
    {
        
        if(is_numeric($newsletter_id) and
           is_numeric($article_id)    and
           is_numeric($email_id)         )
        {
            $this->load->model('newsletter_model');
            $this->load->model('articles_model');
            
            
           $newsletter = $this->newsletter_model->get_newsletter($newsletter_id);
           $article    = $this->articles_model->get_articles(array('id' =>  $article_id));
           $email      = $this->newsletter_model->get_email_by_id($email_id);
           
           if( count($newsletter)    and
               count($article)       and
               count($email)    
                   )
           {
               $data = array(
                   'newsletter_id'  =>  $newsletter_id,
                   'article_id'     =>  $article_id,
                   'email_id'       =>  $email_id,
                   'date_created'   =>  TimeHelper::DateTimeAdjusted()
               );
               
               
                $this->newsletter_model->insert_newsletter_click($data);
                
                $article = $article[0];
                redirect(base_url() . 'articles/' . $article->id . '-' . $article->slug);
                
           }
           
        }
        
        
    }
    
    
    
    public function add_email(){
        
        $this->load->model('newsletter_model');
        
        $data = array();
        
        $errors = array();
        
        $data['email'] = $this->input->post('email');
        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Внесовте невалиден емаил';
           
        }else{
            
            $data['created_at'] = TimeHelper::DateTimeAdjusted();
            $data['is_unsubscribed'] = 0;
            
            $emails = $this->newsletter_model->get_all_emails();
            $already_exists = 0;
            foreach($emails as $e){
                if(strtolower($e->email) == strtolower($data['email']) and $e->is_unsubscribed == 0 ){
                        $already_exists = 1;
                        break;
                }
            }
            if($already_exists){
                $errors['email'] = 'Адресата веќе постои. Обидете се со друга';
            }
            else{
                $this->newsletter_model->insert_email($data);
            }
        }
        
      
        return $errors;
        
    }
    
    public function subscribe(){
        
        
        
        Head::instance()->load_js('jquery.flexslider-min');
                Head::instance()->load_css('flexslider');
         
                Head::instance()->title          = 'Пријавете се за Newsletter';
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
             
                $this->load->model('menus_model');
                $this->load->model('footer_model');
                
                $events = $this->articles_model->get_events();                
                $event_categories = $this->articles_model->get_event_categories();
                $slides = $this->slides_model->get_slides();
                $sidebar_elements = $this->sidebar_model->get_sidebar_elements();
              
                $quote = $this->quotes_model->get_quote_of_the_day();
              
                $footer  = $this->footer_model->get_footer();
                
                $menu_items = $this->menus_model->get_menu_items_with_children();
        
                if($this->input->post()){
                    
                $errors = $this->add_email();
                if(count($errors) > 0){
                    $data['errors'] = $errors;
                } else{
                    $data['success'] = 'success';
                }
                }
                
                $data['menu_items'] =   $menu_items;

                $data['footer']     =   $footer;
                
                $data['sidebar_elements'] = $sidebar_elements;

                $data['quote']      = $quote;
                
                $data['main_content'] = 'newsletter_subscribe';
                $data['events'] = $events;
                $data['event_categories'] = $event_categories;
                $data['slides'] = $slides;
                
                
           
		$this->load->view('layout/layout',$data);
        
    }
    
    public function subscribe_ajax()
    {
                $errors = $this->add_email();
                if(count($errors) > 0){
                    $data['errors'] = $errors;
                } else{
                    $data['success'] = array('success');
                }
                 echo json_encode($data);
    }
    
    
    
    public function pages_of_success(){
        
                Head::instance()->load_js('jquery.flexslider-min');
                Head::instance()->load_css('flexslider');
         
                Head::instance()->title          = 'Страници за успех - Delivering Success';
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
             
                $this->load->model('menus_model');
                $this->load->model('footer_model');
                $this->load->model('newsletter_model');
                
                $events = $this->articles_model->get_events();                
                $event_categories = $this->articles_model->get_event_categories();
                $slides = $this->slides_model->get_slides();
                $sidebar_elements = $this->sidebar_model->get_sidebar_elements();
              
                $quote = $this->quotes_model->get_quote_of_the_day();
              
                $footer  = $this->footer_model->get_footer();
                
                $menu_items = $this->menus_model->get_menu_items_with_children();
        
                $finished_newsletters = $this->newsletter_model->get_finished_newsletters();
                
                $data['finished_newsletters'] = $finished_newsletters;
                $data['menu_items'] =   $menu_items;

                $data['footer']     =   $footer;
                
                $data['sidebar_elements'] = $sidebar_elements;

                $data['quote']      = $quote;
                
                $data['main_content'] = 'pages_of_success';
                $data['events'] = $events;
                $data['event_categories'] = $event_categories;
                $data['slides'] = $slides;
                
                
           
		$this->load->view('layout/layout',$data);
        
    }
    
    public function unsubscribe($unsubscribe_id){
        
        
        
        
        
        
        
        
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
             
                $this->load->model('menus_model');
                $this->load->model('footer_model');
                $this->load->model('newsletter_model');
                
                $events = $this->articles_model->get_events();                
                $event_categories = $this->articles_model->get_event_categories();
                $slides = $this->slides_model->get_slides();
                $sidebar_elements = $this->sidebar_model->get_sidebar_elements();
              
                $quote = $this->quotes_model->get_quote_of_the_day();
              
                $footer  = $this->footer_model->get_footer();
                
                $menu_items = $this->menus_model->get_menu_items_with_children();
        
           
                
                $this->newsletter_model->unsibscribe($unsubscribe_id);
                
          
                $data['menu_items'] =   $menu_items;
                $data['footer']     =   $footer;                
                $data['sidebar_elements'] = $sidebar_elements;
                $data['quote']      = $quote;
                
            
                $data['events'] = $events;
                $data['event_categories'] = $event_categories;
                $data['slides'] = $slides;
        
     
       
         
               $data['main_content'] = 'unsubscribe_success';
               $this->load->view('layout/layout',$data);
      
        
        
       
        
    }

}

?>
