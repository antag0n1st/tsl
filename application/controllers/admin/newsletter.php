<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of home
 *
 * @author Vladimir
 */
class Newsletter extends MY_Admin_Controller {
    public function index()
    {
        Head::instance()->title = "Сите Писма";
        
        $this->load->model('newsletter_model');
        
        $newsletters = $this->newsletter_model->get_newsletters();
        $total_emails = $this->newsletter_model->get_total_emails();
        
        /**
         * status
         *  0 - not started
         *  1 - started
         *  2 - paused
         *  3 - finished
         */
         
        $data['total_emails'] = $total_emails;
        $data['newsletters'] = $newsletters;
        $data['main_content']   =   'admin/newsletter/view_all';
        $this->load->view('admin/layout/layout', $data);
    }
    public function add_new(){
        
        Head::instance()->title = "Ново писмо";
        
        $this->load->model('articles_model');
        
        $articles = $this->articles_model->get_articles();
        
        $data['articles'] = $articles;
        $data['main_content']   =   'admin/newsletter/add_new';
        $this->load->view('admin/layout/layout', $data);
        
    }
    
    public function newsletter_save(){
        
        $articles = $this->input->post('articles');
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        
        $this->load->model('newsletter_model');
        
        $this->newsletter_model->insert_newsletter($title,$content,$articles);
        
        header('Location: '.base_url().'admin/newsletter');
        exit;
    }
    
    public function edit_newsletter($id){
        
        Head::instance()->title = "Уреди писмо";
        
        $this->load->model('articles_model');
        $this->load->model('newsletter_model');
        
        $articles = $this->articles_model->get_articles();
        
        $selected_articles = $this->newsletter_model->get_newsletter_articles($id);
        $newsletters = $this->newsletter_model->get_newsletter($id);
        $newsletter =$newsletters[0];
        
        $sa = array();
        foreach($selected_articles as $ar){
            $sa[] = $ar->article_id;
        }
        
        $data['newsletter'] = $newsletter;
        $data['selected_articles'] = $sa;
        $data['articles'] = $articles;
        $data['main_content']   =   'admin/newsletter/edit_newsletter';
        $this->load->view('admin/layout/layout', $data);
        
    }
    
    public function newsletter_update(){
        $articles = $this->input->post('articles');
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $id = $this->input->post('newsletter_id');
        $status = $this->input->post('status');
        
        $this->load->model('newsletter_model');
        
        $this->newsletter_model->update_newsletter($id,$title,$content,$articles,$status);
        
        header('Location: '.base_url().'admin/newsletter');
        exit;
    }
    
    public function delete_newsletter($id){
        

        $this->load->model('newsletter_model');
        
        $this->newsletter_model->delete_newsletter($id);
        
        header('Location: '.base_url().'admin/newsletter');
        exit;
    }
    
    public function browse_emails(){
        
        Head::instance()->title = "Сите емаил адреси";
        
        $this->load->model('newsletter_model');
        
        $this->load->library('pagination');

        $per_page = 5;
        
        $emails = array();
        $emails = $this->newsletter_model->get_all_emails($per_page,$this->uri->segment(4));
        $config = array();
        
        $config['base_url'] =  base_url() . 'admin/newsletter/browse_emails/';
        
        
        
        $config['total_rows'] = $this->newsletter_model->get_total_emails();
        $config['per_page'] = $per_page; 
        $config['uri_segment'] = '4'; 

        $this->pagination->initialize($config); 
        
        
        
        $emails = 
        
        $data['emails'] = $emails;
        $data['main_content']   =   'admin/newsletter/browse_emails';
        $this->load->view('admin/layout/layout', $data);
        
    }
    
    public function edit_email($id){
        
       
        
        $this->load->model('newsletter_model');
        $emails = $this->newsletter_model->get_email_by_id($id);
        $email = $emails[0];
        
        
         if($this->input->post('id')){
             
             $this->newsletter_model->update_email($this->input->post('id'),$this->input->post('email'),$this->input->post('status'));
        
             header('Location: '.  base_url().'admin/newsletter/browse_emails');
             exit;
        }
        
        $data['email'] = $email;
        $data['main_content']   =   'admin/newsletter/edit_email';
        $this->load->view('admin/layout/layout', $data);
        
    }
    
    public function delete_email($id){
        $this->load->model('newsletter_model');
        $this->newsletter_model->delete_email($id);
        
        header('Location: '.  base_url().'admin/newsletter/browse_emails');
        exit;
    }
}

?>