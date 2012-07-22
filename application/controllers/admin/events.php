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
        Head::instance()->title = 'Сите настани';
        $this->load->model('events_model');
        $this->load->library('pagination');

        $per_page = 10;
        
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
        Head::instance()->title = 'Нов настан';
        $this->load->model('events_model');
        
        $data['event']  = new CalendarEvent();
        
        $data['event_categories'] = $this->events_model->get_event_categories();
        
        $data['main_content']   =   'admin/events/new';
        $this->load->view('admin/layout/layout', $data);
    }
    
    public function edit_event($event_id)
    {
        if(is_numeric($event_id))
        {
            Head::instance()->title = 'Уреди настан';
            $this->load->model('events_model');
            $this->load->model('candidates_model');
                    
            $options = array('calendar_events_id' => $event_id);
            
            $event = $this->events_model->get_events($options);
            if(count($event) == 1)
            {
                $event = $event[0];
                
                $data['event']  = $event;
        
                $data['event_categories'] = $this->events_model->get_event_categories();

                $data['candidates'] = $this->candidates_model->get_candidates_by_event($event_id);
                
                
                $data['main_content']   =   'admin/events/new';
                $this->load->view('admin/layout/layout', $data);
            }
            
        }
    }
    
    public function submit_event()
    {
         $this->load->model('events_model');
        
         $data = array();
        
        $event = new CalendarEvent();
        $event->title               = $this->input->post('title');
        $event->calendar_events_id  = $this->input->post('calendar_events_id');
        $event->calendar_link       = $this->input->post('calendar_link');
        $event->date_happen         = TimeHelper::convert_datetime(
                                            $this->input->post('calendar') . ' ' .
                                            $this->input->post('time_published')
                                            );
        
        
        $event->event_categories_id = $this->input->post('calendar_category');
        $event->date_created        = TimeHelper::DateTimeAdjusted();
        
        if($event->is_valid())
        {
            if($event->calendar_events_id == 0)
            {
                    $event->calendar_events_id = $this->events_model->insert_calendar_event($event);   
            }
            else
            {
                    $this->events_model->update_calendar_event($event);
            }
            $msg = "Настанот е успешно зачуван";
        }
        else
        {
            $msg = "Грешка при зачувување на настанот";
        }
        
        $data['event'] = $event;
        $data['msg']   = $msg;
        $data['event_categories'] = $this->events_model->get_event_categories();
        $data['main_content']   =   'admin/events/new';
        $this->load->view('admin/layout/layout', $data);
        
    }
    
    
    public function delete_event($event_id)
    {
        if(is_numeric($event_id))
        {
            $this->load->model('events_model');
            $this->load->model('candidates_model');
            
            $candidates = $this->candidates_model->get_candidates_by_event($event_id);
            if(count($candidates)) // delete all candidates for this event
            {
                foreach($candidates as $candidate){
                    $this->candidates_model->delete_candidate($candidate->id);
                }
            }
            
            $this->events_model->delete_calendar_event($event_id);
            redirect(base_url() . 'admin/events/show_events');
        }
    }
    
    public function delete_candidate($candidate_id)
    {
        if(is_numeric($candidate_id))
        {
            $this->load->model('events_model');
            $this->load->model('candidates_model');
            
            
            $candidate = $this->candidates_model->get_candidate_by_id($candidate_id);
            if(count($candidate) == 1)
            {
                $candidate = $candidate[0];
                
                $deleted = $this->candidates_model->delete_candidate($candidate_id);
                if($deleted > 0){
                    $event = $this->events_model->get_events(
                                                    array(
                                                          'calendar_events_id' => $candidate->event_id
                                                         ));
                    $event = $event[0];
                    $event->candidates_num = $event->candidates_num - 1;
                    $this->events_model->update_calendar_event($event);
                    
                    
                    redirect(base_url() . 'admin/events/edit_event/' . $event->calendar_events_id);
                    
                }
                
                
            }
            
            
           
            
            
            
            
        }
    }
    
}

?>
