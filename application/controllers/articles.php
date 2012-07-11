<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articles extends MY_Controller {

	public function index($article_id = 0)
	{
            
                $this->load->model('articles_model');
                $this->load->model('quotes_model');
                $events = $this->articles_model->get_events();                
                $event_categories = $this->articles_model->get_event_categories();
                
                $article = $this->articles_model->get_articles(array('id' => $article_id));
                if(isset($article[0])){
                    $article = $article[0];
                    Head::instance()->title = $article->title;
                    Head::instance()->description  = $article->description;
                    
                    Head::instance()->fb_title = $article->title;
                    Head::instance()->fb_description = $article->description;
                    Head::instance()->fb_image_url = base_url().'public/uploaded/featured/'.$article->featured_image;
                }
                $quote = $this->quotes_model->get_quote_of_the_day();
                $data['quote']      = $quote;
                $data['article'] = $article;
                $data['events'] = $events;
                $data['event_categories'] = $event_categories;                 
                $data['main_content'] = 'article';
                
                $this->load->view('layout/layout',$data);
        }
        
        
}

?>
