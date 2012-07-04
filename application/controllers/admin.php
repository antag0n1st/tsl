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
class Admin extends MY_Admin_Controller {
    
    public function index()
    {
        Head::instance()->title = "TSL Admin";
        
        
        $data['main_content']   =   'admin/homepage';
        $this->load->view('admin/layout/layout', $data);
    }
    
    
    public function new_article(){
        
        $this->load->model('articles_model');
        
        $data['categories'] = $this->articles_model->get_categories();
        $data['event_categories'] = $this->articles_model->get_event_categories();
        
        $data['main_content']   =   'admin/articles/new';
        $this->load->view('admin/layout/layout', $data);
    }
    
    public function submit_article()
    {
        $this->load->model('articles_model');
        
        $article = array();
        
        // fill article data
        $article['title']           =   $this->input->post('title');
        $article['content']         =   $this->input->post('content');
        $article['description']     =   $this->input->post('description');
          
        $article['date_published']  =    TimeHelper::convert_datetime(
                                            $this->input->post('date_published') . ' ' .
                                            $this->input->post('time_published')
                                            );
        $article['date_created']    =   TimeHelper::DateTimeAdjusted();
        $article['slug']            =   CyrillicLatin::seo_friendly($article['title']);
        $article['status']       =   1;
        
        $featured_image_hidden = $this->input->post('featured_image_hidden');
        if(isset($featured_image_hidden) and $featured_image_hidden != null)
        {
            $article['featured_image']  =   $featured_image_hidden;
        }
        else
        {
            $article['featured_image'] = 'default_featured_image.jpg';
        }
        
        
        $article_id = 0;
        // save the article
        $article_id = $this->articles_model->insert_article($article);
        
        
        if($article_id > 0)
        {
            // save the categories
            $categories = $this->input->post('category');
            $this->articles_model->insert_article_categories($article_id, $categories);
            
            // is it an event?
            $event = array();
            $event['date_happen']   =   $this->input->post('calendar');
            if(isset($event['date_happen']) and $event['date_happen'] != null)
            {
                $event['date_happen']               = TimeHelper::convert_datetime($event['date_happen'] . ' 00:00');
                $event['date_created']              = TimeHelper::DateTimeAdjusted();
                $event['calendar_link']             = $this->input->post('calendar_link');
                $event['event_categories_id']    = $this->input->post('calendar_category');
                
                $event['id'] = $this->articles_model->insert_calendar_event($event);
            }
            
            
            
            
        }
        
        
        
        
        if($article_id == 0){
            $data['msg']    =   'Статијата не е зачувана!';
        }
        else{
            $data['msg']    =   'Статијата е успешно зачувана';
        }
        
        $data['categories'] = $this->articles_model->get_categories();
        $data['event_categories'] = $this->articles_model->get_event_categories();
        
        $data['main_content']   =   'admin/articles/new';
        
        $this->load->view('admin/layout/layout', $data);
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


            $file_name = 'default.jpg';
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
                    $image_helper->save_image(base_url() . $config['upload_path'] . $file_name, $file_name, 200, 126, 150, 150);
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
}