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
class Articles extends MY_Admin_Controller {
            
    
    public function index()
    {
        $this->show_articles();
    }
    
    public function new_article(){
        
        Head::instance()->title = 'Нова статија';
        
        $this->load->model('articles_model');
        
        $data['article']  = new Article();
        
        $data['categories'] = $this->articles_model->get_categories();
        
        $data['main_content']   =   'admin/articles/new';
        $this->load->view('admin/layout/layout', $data);
    }
    
    public function edit_article($article_id)
    {
        if(is_numeric($article_id))
        {
            Head::instance()->title = 'Уреди статија';
            $this->load->model('articles_model');
            $article = $this->articles_model->get_articles(array('id'   =>  $article_id));
            if(count($article) == 1)
            {
                $data['article']  = $article[0];
                $categories       = $this->articles_model->get_article_categories($article_id);
                
                //print_r($categories);
                
                $data['categories'] = $this->articles_model->get_categories();
                $data['saved_categories'] = $categories;
                $data['main_content']   =   'admin/articles/new';
                $this->load->view('admin/layout/layout', $data);
            }
        }
    }
    
    
    
    public function submit_article()
    {
        $this->load->model('articles_model');
        $data = array();
        $article = new Article();
        
        // fill article data
        $article->id              =   $this->input->post('article_id');
        $article->title           =   $this->input->post('title');
        $article->content         =   $this->input->post('content');
        $article->description     =   $this->input->post('description');
          
        $article->date_published  =    TimeHelper::convert_datetime(
                                            $this->input->post('date_published') . ' ' .
                                            $this->input->post('time_published')
                                            );
        $article->date_created    =   TimeHelper::DateTimeAdjusted();
        $article->slug            =   CyrillicLatin::seo_friendly($article->title);
        
        $original_status_request  =
        $article->status          =   $this->input->post('status');
        
        $featured_image_hidden = $this->input->post('featured_image_hidden');
        if(isset($featured_image_hidden) and $featured_image_hidden != null)
        {
            $article->featured_image  =   $featured_image_hidden;
        }
        else
        {
            $article->featured_image = 'default_featured_image.jpg';
        }
        
        // save the article
        if($article->id == 0)
        {
            $article->id = $this->articles_model->insert_article($article); 
        }
        else
        {
            $existing_article = $this->articles_model->get_articles(array('id' => $article->id));
            if(count($existing_article) == 1) // if we are updating a published article through autosave
            {
                $existing_article = $existing_article[0];
                if($article->status == 2 and
                   $existing_article->status == 1)
                {
                    $article->status = 1;    // then keep the article published
                }
            }
            
            $this->articles_model->update_article($article); 
        }
        
        
            // save the categories
            $categories = $this->input->post('category');
            if(!isset($categories) or $categories == null){
                $categories = array();
            }
            
            $this->articles_model->update_article_categories($article->id, $categories);

        if($article->id == 0){
            $data['msg']    =   'Статијата не е зачувана!';
        }
        else{
            $data['msg']    =   'Статијата е успешно зачувана';
        }
        
        
        
        $data['article'] = $article;
        $data['categories'] = $this->articles_model->get_categories();
        $data['saved_categories'] = $categories;
        $data['main_content']   =   'admin/articles/new';
        if((int)$original_status_request == 2){ // autosave
            echo json_encode($article);
        }
        else{
            //redirect('admin/articles/edit_article/' . $article->id);
            $this->load->view('admin/layout/layout', $data);
        }
    }
    
    
    public function upload_image() {
        $status = "";
        $msg = "";
        $file_element_name = 'featured_image';




        if ($status != "error") {
            $config['upload_path'] = /* base_url() . */'public/uploaded/featured/originals/';
            $config['allowed_types'] = 'gif|jpg|png|doc|txt';
            $config['max_size'] = 1024 * 8;
            $config['encrypt_name'] = FALSE;

            $this->load->library('upload', $config);


            $file_name = 'default_featured_image.jpg';
            if (!$this->upload->do_upload($file_element_name)) {
                $status = 'error';
                $msg = $this->upload->display_errors('', '');
            } else {
                $data = $this->upload->data();

                if (count($data) > 0) {
                    $status = "success";
                    $msg = "File successfully uploaded";
                    $file_name = $data['file_name'];
                    
                    
                    
                    
                    

                    $image_helper = new ImageHelper();
                    $image_helper->save_image(base_url() . $config['upload_path'] . $file_name, $file_name, 608, 250, 150, 150);
                } else {
                    unlink($data['full_path']);
                    $status = "error";
                    $msg = "Something went wrong when saving the file, please try again.";
                }
            }
            @unlink($_FILES[$file_element_name]);
        }
        echo json_encode(array('status' => $status,
            'msg' => $msg,
            'featured_image_name' => $file_name));
    }
    
    
    public function show_articles()
    {
        Head::instance()->title = 'Статии';
        $this->load->model('articles_model');
        $this->load->library('pagination');

        $per_page = 5;
        
        $articles = array();
        
        $search = $this->input->get('s');
        $total_rows = 0;
        if(isset($search) and strlen($search))
        {
            $per_page = $total_rows; // show all search results on one page
            $articles = $this->articles_model->search_articles($search, array(), $per_page,$this->uri->segment(4));
            $total_rows = count($this->articles_model->search_articles($search));
        }
        else
        {
            $articles = $this->articles_model->get_articles(array(),$per_page,$this->uri->segment(4));
            $total_rows = $this->db->count_all_results('articles');
        }
        $config = array();
        
        $config['base_url'] =  base_url() . 'admin/articles/show_articles/';
        
        
        
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page; 
        $config['uri_segment'] = '4'; 

        $this->pagination->initialize($config); 
        
        $data = array();
        $data['articles']       =   $articles;
        $data['main_content']   =   'admin/articles/articles';
        
        
        $this->load->view('admin/layout/layout', $data);
    }
    
    
    public function delete_article($article_id)
    {
        if(is_numeric($article_id))
        {
            $this->load->model('articles_model');
            $this->articles_model->delete_article_categories($article_id);
            $this->articles_model->delete_article($article_id);
            redirect(base_url() . 'admin/articles/show_articles');
        }
    }
}