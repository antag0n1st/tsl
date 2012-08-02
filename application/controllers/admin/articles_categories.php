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
class Articles_categories extends MY_Admin_Controller {
            
    public function index()
    {
        $this->show_categories();
    }
    
    public function new_category()
    {
       // $this->load->model('articles_model');
        Head::instance()->title = 'Нова категорија';
        $data['category']  = new Category();
        
        
        $data['main_content']   =   'admin/articles/categories/new';
        $this->load->view('admin/layout/layout', $data);
    }
    
    public function edit_category($category_id)
    {
        if(is_numeric($category_id))
        {
            Head::instance()->title = 'Уреди категорија';
            $this->load->model('articles_model');
            
            $options = array('categories_id'    => $category_id);
            $category = $this->articles_model->get_categories($options);
            if(count($category) == 1)
            {
                $data['category']       =   $category[0];
                $data['main_content']   =   'admin/articles/categories/new';
                $this->load->view('admin/layout/layout', $data);
            }
            
        }
    }
    
    public function delete_category($category_id)
    {
        if(is_numeric($category_id))
        {
            $this->load->model('articles_model');
            $this->articles_model->delete_category($category_id);
            redirect(base_url() . 'admin/articles_categories/show_categories');
        }
    }
    
    
    public function show_categories()
    {
        Head::instance()->title = 'Сите категории';
        $this->load->model('articles_model');
        $this->load->library('pagination');

        $per_page = 5;
        
        $categories = array();
        $categories = $this->articles_model->get_categories(array(),$per_page,$this->uri->segment(4));
        $config = array();
        
        $config['base_url'] =  base_url() . 'admin/articles_categories/show_categories/';
        
        
        
        $config['total_rows'] = count($this->articles_model->get_categories());
        $config['per_page'] = $per_page; 
        $config['uri_segment'] = '4'; 

        $this->pagination->initialize($config); 
        
        
        
        $data['categories'] = $categories;
        $data['main_content']   =   'admin/articles/categories/categories';
        $this->load->view('admin/layout/layout', $data);
    }
    
    
    public function submit_category()
    {
        $this->load->model('articles_model');
        
        $category = new Category();
        $category->id             = $this->input->post('id');
        $category->name           = $this->input->post('name');
        $category->description    = $this->input->post('content');
        $category->slug           = CyrillicLatin::seo_friendly($category->name);
        $category->featured_image = $this->input->post('featured_image_hidden');
        
        if($category->is_valid())
        {
            if($category->id == 0)
            {
                $category->id   =   $this->articles_model->insert_category($category);
            }
            else
            {
                $this->articles_model->update_category($category);
            }
            $msg = 'Категоријата е успешно зачувана';
        }
        else
        {
            $msg = 'Категоријата не е зачувана. Проверете дали сте ги пополниле сите полиња';
        }
        
        $data['msg']        =   $msg;
        $data['category']   =   $category;
        $data['main_content']   =   'admin/articles/categories/new';
        $this->load->view('admin/layout/layout', $data);
        
    }
    
     
}

?>
