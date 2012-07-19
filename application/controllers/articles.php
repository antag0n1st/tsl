<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @property CI_Loader $load
* @property CI_Form_validation $form_validation
* @property CI_Input $input
* @property CI_Email $email
* @property CI_DB_active_record $db
* @property CI_DB_forge $dbforge
* @property Articles_model $articles_model
*/
class Articles extends MY_Controller {

	public function index($article_id = 0)
	{
            
                $this->load->model('articles_model');
                $this->load->model('quotes_model');
                $this->load->model('menus_model');
                $this->load->model('sidebar_model');
                $events = $this->articles_model->get_events();                
                $event_categories = $this->articles_model->get_event_categories();
                $sidebar_elements = $this->sidebar_model->get_sidebar_elements();
                
                $article = $this->articles_model->get_articles(array('id' => $article_id));
                if(isset($article[0])){
                    $article = $article[0];
                    Head::instance()->title = $article->title;
                    Head::instance()->description  = $article->description;
                    
                    Head::instance()->fb_title = $article->title;
                    Head::instance()->fb_description = $article->description;
                    Head::instance()->fb_image_url = base_url().'public/uploaded/featured/'.$article->featured_image;
                }
                
                $menu_items = $this->menus_model->get_menu_items_with_children();

                $quote = $this->quotes_model->get_quote_of_the_day();
                $data['quote']      = $quote;
                $data['menu_items'] =   $menu_items;
                $data['article'] = $article;
                $data['sidebar_elements'] = $sidebar_elements;
                $data['events'] = $events;
                $data['event_categories'] = $event_categories;                 
                $data['main_content'] = 'article';
                
                $this->load->view('layout/layout',$data);
        }
        
        public function category($category_id)
        {
            if(is_numeric($category_id))
            {
                $this->load->model('articles_model');
                $this->load->model('quotes_model');
                $this->load->model('menus_model');
                $this->load->model('sidebar_model');
                
                $events = $this->articles_model->get_events();                
                $event_categories = $this->articles_model->get_event_categories();
                $sidebar_elements = $this->sidebar_model->get_sidebar_elements();
                $menu_items = $this->menus_model->get_menu_items_with_children();

                $quote = $this->quotes_model->get_quote_of_the_day();
                

                $articles = $this->articles_model->get_articles_by_category($category_id);
                $current_category = $this->articles_model->get_categories(array('categories_id' => $category_id));
                
               
                
                if(count($current_category) == 1)
                {
                    $current_category = $current_category[0];
                }
                $data['current_category']   = $current_category;
                $data['articles']   = $articles;
                $data['quote']      = $quote;
                $data['menu_items'] =   $menu_items;
                $data['sidebar_elements'] = $sidebar_elements;
                $data['events'] = $events;
                $data['event_categories'] = $event_categories;                 
                $data['main_content'] = 'category';
                
                $this->load->view('layout/layout',$data);
            }
        }
        
        
        public function search()
        {
            
            $search = $this->input->get('s');
            if(isset($search) and strlen(trim($search)))
            {
                $search_original = $search;
                $this->load->model('articles_model');
                $this->load->model('quotes_model');
                $this->load->model('menus_model');
                $this->load->model('sidebar_model');
            
                
                $search = urldecode($search);
                $search = CyrillicLatin::sanitize($search);
                $articles = $this->articles_model->search_articles($search);
                
                $events = $this->articles_model->get_events();                
                $event_categories = $this->articles_model->get_event_categories();
                $sidebar_elements = $this->sidebar_model->get_sidebar_elements();
                $menu_items = $this->menus_model->get_menu_items_with_children();

                $quote = $this->quotes_model->get_quote_of_the_day();
                
                $data['search']     = $search_original;
                $data['articles']   = $articles;
                $data['quote']      = $quote;
                $data['menu_items'] =   $menu_items;
                $data['sidebar_elements'] = $sidebar_elements;
                $data['events'] = $events;
                $data['event_categories'] = $event_categories;                 
                $data['main_content'] = 'search_results';
                
                $this->load->view('layout/layout',$data);
            }
        }
        
        public function test()
        {
            $str = 'новости :';
            echo $str;
            echo "is cyrilic: " . CyrillicLatin::is_cyrilic($str);
            echo "is latinic: " . CyrillicLatin::is_latin($str);
            
            
            echo strlen($str) . '<br />';
            echo mb_strlen($str,'UTF-8');
            
            
        }
}

?>
