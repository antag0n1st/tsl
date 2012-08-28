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
                $data = array();
                $this->load->model('articles_model');
                $this->load->model('quotes_model');
                $this->load->model('menus_model');
                $this->load->model('sidebar_model');
                $this->load->model('footer_model');
                
                $events = $this->articles_model->get_events();                
                $event_categories = $this->articles_model->get_event_categories();
                $sidebar_elements = $this->sidebar_model->get_sidebar_elements();
                
                $article = $this->articles_model->get_articles(array('id' => $article_id));
                
                $article_categories = $this->articles_model->get_article_categories($article_id);
                
               // print_r($article_categories);
                
                $triple_s_groups = array( 2, // learning
                                          3, // speakers
                                          4);// recruitment
                
                if(is_array($article_categories) and count($article_categories))
                {
                    foreach($article_categories as $c)
                    {
                        if( in_array($c, $triple_s_groups) )
                        {
                            $category = $this->articles_model->get_categories(array('categories_id' => $c));
                            $category = $category[0];
                            $data['logo']   =   $category->logo;
                            break;
                        }
                    }
                }
                
                
                if(isset($article[0])){
                    $article = $article[0];
                    Head::instance()->title = $article->title . ' | Triple S Group';
                    Head::instance()->description  = $article->description;
                    
                    Head::instance()->fb_title = $article->title . ' | Triple S Group';
                    Head::instance()->fb_description = $article->description;
                    Head::instance()->fb_image_url = base_url().'public/uploaded/featured/'.$article->featured_image;
                    Head::instance()->fb_page_url  = base_url().'articles/' . $article->id . '-' . $article->slug;
                }
                
                $menu_items = $this->menus_model->get_menu_items_with_children();

                $quote  = $this->quotes_model->get_quote_of_the_day();
                $footer = $this->footer_model->get_footer();
                $data['footer'] =   $footer;
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
                $this->load->model('footer_model');
                
                $footer = $this->footer_model->get_footer();
                $events = $this->articles_model->get_events();                
                $event_categories = $this->articles_model->get_event_categories();
                $sidebar_elements = $this->sidebar_model->get_sidebar_elements();
                $menu_items = $this->menus_model->get_menu_items_with_children();

                $quote = $this->quotes_model->get_quote_of_the_day();
                $current_category = $this->articles_model->get_categories(array('categories_id' => $category_id));
                if(count($current_category) == 1)
                {
                    $current_category = $current_category[0];
                }
               // $articles = $this->articles_model->get_articles_by_category($category_id);
                
                $this->load->library('pagination');

                $per_page = 5;

                $articles = array();
                $articles = $this->articles_model->get_articles_by_category($category_id,array(),$per_page,$this->uri->segment(3));
                $config = array();

                $config['base_url'] =  base_url() . 'category/' . $current_category->id . '-' . $current_category->slug . '/';



                $config['total_rows'] = count($this->articles_model->get_articles_by_category($category_id));
                $config['per_page'] = $per_page; 
                $config['uri_segment'] = '3'; 

                $this->pagination->initialize($config); 
                
                
                
                if(isset($current_category)){
                    Head::instance()->title = $current_category->name . ' | Triple S Group';
                    Head::instance()->description  = $current_category->name . ' | Triple S Group';
                    
                    Head::instance()->fb_title = $current_category->name;
                    Head::instance()->fb_description = $current_category->name . ' | Triple S Group';
                    Head::instance()->fb_image_url = base_url().'public/uploaded/featured/'.$current_category->featured_image;
                    Head::instance()->fb_page_url  = base_url().'category/' . $current_category->id . '-' . $current_category->slug;
                }
                
                
                
                
                
                
                
                
                $data['logo']   = $current_category->logo;
               
                
                $data['footer']             = $footer;
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
                $this->load->model('footer_model');
                
                $search = urldecode($search);
                $search = CyrillicLatin::sanitize($search);
                $articles = $this->articles_model->search_articles($search, array('status' => 1),0,0,'relevance DESC');
                
                $events = $this->articles_model->get_events();                
                $event_categories = $this->articles_model->get_event_categories();
                $sidebar_elements = $this->sidebar_model->get_sidebar_elements();
                $menu_items = $this->menus_model->get_menu_items_with_children();

                $quote = $this->quotes_model->get_quote_of_the_day();
                $footer = $this->footer_model->get_footer();
                
                $data['footer']     = $footer;
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
