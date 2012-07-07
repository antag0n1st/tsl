<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @property CI_DB_active_record $db
 */
class Events_model extends CI_Model {
    
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_events($options = array(),$limit = 0, $offset = 0)
    {
        
        //$options = $this->_default(array('status <>' => '0'), $options);
        
        foreach($options as $key => $option)
        {
            $this->db->where($key, $option);
        }
        $this->db->from('calendar_events');
        $this->db->select('calendar_events_id,
                           date_created,
                           date_happen,
                           calendar_link,
                           event_categories_id');
        
        if($limit){
            $this->db->limit($limit);
        }
        if($offset){
            $this->db->offset($offset);
        }
        
        $result = $this->db->get();
        
        return $result->result();
    }
    
    public function count_all_events()
    {
        return $this->db->count_all_results('calendar_events');
    }
    
     public function get_event_categories()
    {
        $result = $this->db->get('calendar_events_categories');
        
        $categories = array();
        
        foreach($result->result() as $c){
            $category = new EventCategory();
            $category->id    =  $c->calendar_events_categories_id;
            $category->name  =  $c->name;
            $category->slug  =  $c->slug;
            $category->color =  $c->color;
            $category->color_name = $c->color_name;
            
            $categories[] = $category;
        }
        
        return $categories;
        return $result->result();
    }
    
    public function insert_calendar_event($data){
        $this->db->insert('calendar_events', $data);
        return $this->db->insert_id();
    }
    
    public function update_calendar_event($data){
        $this->db->where('calendar_events_id', $data->calendar_events_id);
        $this->db->update('calendar_events',$data);
    }
    
    public function delete_calendar_event($event_id){
        $this->db->where('calendar_events_id', $event_id);
        $this->db->delete('calendar_events');
    }
    
    
}

?>
