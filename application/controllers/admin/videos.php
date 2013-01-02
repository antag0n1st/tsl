<?php

/**
* @property CI_Loader $load
* @property CI_Form_validation $form_validation
* @property CI_Input $input
* @property CI_Email $email
* @property CI_DB_active_record $db
* @property CI_DB_forge $dbforge
* @property Videos_model $videos_model
*/
class Videos extends MY_Admin_Controller {
    
    public function index()
    {
        $this->new_video();
    }
    
    public function new_video()
    {
        Head::instance()->title = 'Ново видео';
        $data = array();
        $data['video']  = new Video();
        
        $data['main_content']   =   'admin/videos/new';
        $this->load->view('admin/layout/layout', $data);
    }
    
    public function submit_video()
    {
        $video = new Video();
        $video->title           =   $this->input->post('title');
        $video->description     =   $this->input->post('description');
        $video->embed_code      =   $this->input->post('embed_code');
        $video->slug            =    CyrillicLatin::seo_friendly($video->title);
        
        if($video->is_valid())
        {
            $this->load->model('videos_model');
            if($video->id == 0)
            {
                $video->id =  $this->videos_model->insert_video($video);
            }
            else
            {
                $this->videos_model->update_video($video);
            }
            $msg = 'Видеото е успешно зачувано';
        }
        else
        {
            $msg = 'Видеото не беше зачувано. Проверете дали сте ги пополниле правилно полињата';
        }
        
        $data['msg']    =   $msg;
        $data['video']  =   $video;
        
        $data['main_content']   =   'admin/videos/new';
        $this->load->view('admin/layout/layout', $data);
    }
    
    public function show_videos()
    {
        $this->load->model('videos_model');
        $videos = $this->videos_model->get_videos();
        
        $data['videos'] =   $videos;
        $data['title']  =   'Сите видеоклипови';
        
        $data['main_content']   =   'admin/videos/videos';
        $this->load->view('admin/layout/layout', $data);
    }
    
     public function edit_video($video_id)
    {    
        if(is_numeric($video_id))
        {
            Head::instance()->title = 'Уреди видео';
            $this->load->model('videos_model');
            $video = $this->videos_model->get_videos(array('id'  =>  $video_id));
            if(count($video) == 1)
            {
                $video = $video[0];
                $data['video']  =   $video;
                
                $data['viewers'] = $viewers = $this->videos_model->get_viewers_for_video($video_id);
                
                
                
                $data['main_content']   =   'admin/videos/new';
                $this->load->view('admin/layout/layout', $data);
            }
            
        }
        
    }
    
     public function delete_video($video_id)
    {
        if(is_numeric($video_id))
        {
            $this->load->model('videos_model');
            $this->videos_model->delete_slide($video_id);            
            
            redirect(base_url() . 'admin/videos/show_videos');
        }
    }
    
}

?>
