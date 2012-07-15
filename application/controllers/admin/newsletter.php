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
        Head::instance()->title = "TSL Admin";
        
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
        
        Head::instance()->title = "TSL Admin";
        
        $this->load->model('articles_model');
        
        $articles = $this->articles_model->get_articles(array(),10);
        
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
        
        Head::instance()->title = "TSL Admin";
        
        $this->load->model('articles_model');
        $this->load->model('newsletter_model');
        
        $articles = $this->articles_model->get_articles(array(),10);
        
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
}

?>