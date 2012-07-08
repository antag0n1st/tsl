<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends MY_Controller {
    
        public function __construct() {
            parent::__construct();
            
        }

	public function index()
	{
            
                
                $this->load->model('articles_model');
                $this->load->model('gallery_model');
                
                $events = $this->articles_model->get_events();                
                $event_categories = $this->articles_model->get_event_categories();
                $galleries  = $this->gallery_model->get_galleries_and_photos();
                
                $data['galleries'] = $galleries;
                $data['main_content'] = 'gallery';
                $data['events'] = $events;
                $data['event_categories'] = $event_categories;
              
		$this->load->view('layout/layout',$data);
        }
        
        public function browse_gallery($id_gallery){
            
                Head::instance()->load_css('lightbox');
                head::instance()->load_js('lightbox');
            
                $this->load->model('articles_model');
                $this->load->model('gallery_model');
                
                $gallery = $this->gallery_model->get_galleries(array('id_gallery' => $id_gallery),1);
                $gallery = $gallery[0];
                
                $events = $this->articles_model->get_events();                
                $event_categories = $this->articles_model->get_event_categories();
                $photos  = $this->gallery_model->get_photos(array('galleries_id_gallery' => $id_gallery));
                
                $data['gallery'] = $gallery;
                $data['photos'] = $photos;
                $data['main_content'] = 'gallery_browse';
                $data['events'] = $events;
                $data['event_categories'] = $event_categories;
              
		$this->load->view('layout/layout',$data);
            
        }
}
?>
