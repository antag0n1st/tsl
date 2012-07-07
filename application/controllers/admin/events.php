<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @property CI_Loader $load
* @property CI_Form_validation $form_validation
* @property CI_Input $input
* @property CI_Email $email
* @property CI_DB_active_record $db
* @property CI_DB_forge $dbforge
* @property Events_model $events_model
*/
class Events extends MY_Admin_Controller {
  
    
    public function index()
    {
        $this->show_events();
    }
    
    public function show_events()
    {
        $this->load->model('events_model');
        $this->load->library('pagination');

        $per_page = 5;
        
        $events = array();
        $events = $this->events_model->get_events(array(),$per_page,$this->uri->segment(4));
        $config = array();
        
        $config['base_url'] =  base_url() . 'admin/events/show_events/';
        
        
        
        $config['total_rows'] = $this->events_model->count_all_events();
        $config['per_page'] = $per_page; 
        $config['uri_segment'] = '4'; 

        $this->pagination->initialize($config); 
        
        $data = array();
        $data['events']       =   $events;
        
        $data['main_content']   =   'admin/events/events';
        $this->load->view('admin/layout/layout', $data);
        
    }
    
    public function new_event()
    {
        $this->load->model('events_model');
        
        $data['article']  = new CalendarEvent();
        
        $data['event_categories'] = $this->events_model->get_event_categories();
        
        $data['main_content']   =   'admin/events/new';
        $this->load->view('admin/layout/layout', $data);
    }
    
    public function submit_event()
    {
         $this->load->model('events_model');
        
        
        $event = new CalendarEvent();
        $event->calendar_link       = $this->input->post('calendar_link');
        $event->date_happen         = $this->input->post('calendar');
        $event->event_categories_id =   $this->input->post('calendar_category');
        $event->date_created        = TimeHelper::DateTimeAdjusted();
       // print_r($event);
        if($event->calendar_events_id == 0)
        {
            $event->calendar_events_id = $this->events_model->insert_calendar_event($event);
        }
        print_r($event);
        
    }
    
}

?>
