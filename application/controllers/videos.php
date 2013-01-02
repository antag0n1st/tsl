<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @property CI_Loader $load
* @property CI_Form_validation $form_validation
* @property CI_Input $input
* @property CI_Email $email
* @property CI_DB_active_record $db
* @property CI_DB_forge $dbforge
* @property Videos_model $videos_model
*/
class Videos extends MY_Controller {
    
     public function __construct() {
         parent::__construct();
         $this->load->library('session');
     }
    
     public function index($slug)
     {
         if(!$this->session->userdata('viewer_registered') or
             $this->session->userdata('viewer_registered') != $slug)
         {
             redirect(base_url() . 'videos/register/' . $slug);
         }
         
         
         $data = array();
         $slug = explode('-', $slug);
         if(count($slug))
         {
             $this->load->model('videos_model');
              $this->load->model('articles_model');
                $this->load->model('quotes_model');
                $this->load->model('menus_model');
                $this->load->model('sidebar_model');
                $this->load->model('footer_model');
                $this->load->model('popup_model');
                
                $footer = $this->footer_model->get_footer();
              
                $sidebar_elements = $this->sidebar_model->get_sidebar_elements();
                $menu_items = $this->menus_model->get_menu_items_with_children();

                $quote = $this->quotes_model->get_quote_of_the_day();
             $video_id = $slug[0];
             if(is_numeric($video_id))
             {
                 $options = array('id' => $video_id);
                 $video = $this->videos_model->get_videos($options);
                 if(count($video))
                 {
                     $video = $video[0];
                 }
                 
                 Head::instance()->title = 'Видео';
                 $data['video'] = $video;
                 
                $data['footer']             = $footer;
                $data['menu_items'] =   $menu_items;
                $data['sidebar_elements'] = $sidebar_elements;
                 
                 $data['main_content'] = 'video';
                 
                 $this->load->view('layout/layout',$data);
                 
             }
         }
     }
     
     public function register($video_slug)
     {
           $this->load->model('videos_model');
            $this->load->model('articles_model');
            $this->load->model('quotes_model');
            $this->load->model('menus_model');
            $this->load->model('sidebar_model');
            $this->load->model('footer_model');
            $this->load->model('popup_model');
            $footer = $this->footer_model->get_footer();
            
            
            $sidebar_elements = $this->sidebar_model->get_sidebar_elements();
            $menu_items = $this->menus_model->get_menu_items_with_children();
            
            if($this->input->post('validation') == '4') // 2 + 2 = 4
            {
                $video_viewer = new Video_viewer();
                $data['name'] = $video_viewer->name     = $this->input->post('name');
                $data['company'] = $video_viewer->company  = $this->input->post('company');
                $data['address'] = $video_viewer->address  = $this->input->post('address');
                $data['email']   = $video_viewer->email    = $this->input->post('email');  
                $data['phone']   = $video_viewer->phone    = $this->input->post('phone');  
                $data['profession'] = $video_viewer->profession = $this->input->post('profession');  
                
                if($video_viewer->is_valid())
                {
                     
                        $exploded = explode('-', $video_slug);
                        if(count($exploded))
                        {
                            $video_viewer->video_id = $exploded[0];
                        }
                    
                    
                    $this->videos_model->insert_video_viewer($video_viewer);
                    $this->session->set_userdata('viewer_registered', $video_slug);
                    redirect(base_url() . 'videos/' . $video_slug);
                }
                else
                {
                    $data['errors'] = 'Ве молиме пополнете ги сите полиња';
                }
                
            }
              else
                {
                    $data['errors'] = 'Ве молиме пополнете ги сите полиња';
                }
            
            Head::instance()->title = 'Ве молиме регистрирајте се';

            $data['footer'] = $footer;
            $data['menu_items'] = $menu_items;
            $data['sidebar_elements'] = $sidebar_elements;
                
                
          $data['main_content'] = 'video_register';
                 
          $this->load->view('layout/layout',$data);
     }
     
}

?>
