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
        echo "Hello World";
    }
    
    public function new_category()
    {
       // $this->load->model('articles_model');
        
        $data['category']  = new Category();
        
        
        $data['main_content']   =   'admin/articles/categories/new';
        $this->load->view('admin/layout/layout', $data);
    }
    
    public function submit_category()
    {
        
        
        $category = new Category();
        $category->id   =   $this->input->post('id');
        $category->name =   $this->input->post('name');
        $category->slug =   CyrillicLatin::seo_friendly($category->name);
        
        
        if($category->is_valid())
        {
            if($category->id == 0)
            {
                //TODO: insert category
            }
            else
            {
                //TODO: update category
            }
        }
        
        $data['category']   =   $category;
        $data['main_content']   =   'admin/articles/categories/new';
        $this->load->view('admin/layout/layout', $data);
        
    }
}

?>
