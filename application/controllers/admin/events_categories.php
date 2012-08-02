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
class events_categories extends MY_Admin_Controller {
    public function index()
    {
        echo "Hello";
    }
    
    public function new_event_category()
    {
        Head::instance()->title = 'Нов категорија на настани';
        $this->load->model('events_model');
        $data['event_category'] = new EventCategory();
        
        $data['main_content']   =   'admin/events/categories/new';
        $this->load->view('admin/layout/layout', $data);
        
    }
    
    public function edit_event_category($category_id)
    {
        if(is_numeric($category_id))
        {
            $this->load->model('events_model');
            $event_category = $this->events_model->get_event_categories(array('calendar_events_categories_id'=>$category_id));
            if(count($event_category) == 1)
                $event_category = $event_category[0];
            $data['event_category'] = $event_category;
            $data['main_content']   =   'admin/events/categories/new';
            $this->load->view('admin/layout/layout', $data);
        }
        
    }
    
    
    
    public function submit_event_category()
    {
        $this->load->model('events_model');
        $event_category = new EventCategory();
        $event_category->id         = $this->input->post("id");
        $event_category->name       = $this->input->post("name");
        $event_category->color      = $this->input->post("color");
        $event_category->color_name = $this->input->post("color_name");
        $event_category->slug       = CyrillicLatin::seo_friendly($event_category->name);
        
        if($event_category->is_valid())
        {
            if($event_category->id == 0)
            {
                $event_category->id = $this->events_model->insert_event_category($event_category);
            }
            else
            {
                $this->events_model->update_event_category($event_category);
            }
            $msg = 'Категоријата е успешно зачувана';
            
        }
        else
        {
            $msg = "Категоријата не е зачувана. Проверете дали сте ги пополниле (правилно) сите полиња";
        }
        
        $data['event_category'] = $event_category;
        $data['msg']            = $msg;
        
        $data['main_content']   =   'admin/events/categories/new';
        $this->load->view('admin/layout/layout', $data);
        
    }
    
    
    public function show_events_categories()
    {
        Head::instance()->title = 'Сите категории на настани';
        $this->load->model('events_model');
        $data['event_categories'] = $this->events_model->get_event_categories();
        
        $data['main_content']   =   'admin/events/categories/categories';
        $this->load->view('admin/layout/layout', $data);
    }
    
}

?>
