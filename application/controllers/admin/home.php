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
class Home extends MY_Admin_Controller {
    public function index()
    {
        Head::instance()->title = "TSL Admin";
        $this->load->model('articles_model');
        $this->load->model('events_model');
        $this->load->model('slides_model');
        $this->load->model('newsletter_model');
        $this->load->model('gallery_model');
        
        $articles = $this->articles_model->get_articles(array(),3,0);
        $data['articles']   = $articles;
        
        $events = $this->events_model->get_events(array(),3,0);
        $data['events'] =   $events;
        
        $slides = $this->slides_model->get_slides(array(),3,0);
        $data['slides'] =   $slides;
        
        $galleries = $this->gallery_model->get_galleries(array(),3,0);
        $data['galleries'] = $galleries;
        
        $newsletters = $this->newsletter_model->get_newsletters();
        $data['newsletters']    =   array_slice($newsletters, 0 , 3);
        
        $data['main_content']   =   'admin/homepage';
        $this->load->view('admin/layout/layout', $data);
    }
}

?>