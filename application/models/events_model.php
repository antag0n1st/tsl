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
    
    public function get_events($options = array(),$limit = 0, $offset = 0, $order_by = 'date_happen DESC')
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
                           date_ends,
                           calendar_link,
                           title,
                           event_categories_id,
                           candidates_num');
        
        if($limit){
            $this->db->limit($limit);
        }
        if($offset){
            $this->db->offset($offset);
        }
        if($order_by){
            $this->db->order_by($order_by);
        }
        
        $result = $this->db->get();
        
        return $result->result();
    }
    
   
    
    public function count_all_events()
    {
        return $this->db->count_all_results('calendar_events');
    }
    
     public function get_event_categories($options = array())
    {
         foreach($options as $key => $option)
         {
             $this->db->where($key,$option);
         }
         $this->db->from('calendar_events_categories ec');
         $this->db->join('calendar_events c','event_categories_id = calendar_events_categories_id','left');
         $this->db->select('ec.*,
                            COUNT(c.calendar_events_id) as num_events');
         $this->db->group_by('ec.calendar_events_categories_id');
         
         $result = $this->db->get();
        
        $categories = array();
        
        foreach($result->result() as $c){
            $category = new EventCategory();
            $category->id    =  $c->calendar_events_categories_id;
            $category->name  =  $c->name;
            $category->slug  =  $c->slug;
            $category->color =  $c->color;
            $category->color_name = $c->color_name;
            $category->num_events = $c->num_events;
            
            $categories[] = $category;
        }
        
        return $categories;
        return $result->result();
    }
    
    
    public function insert_event_category($event_category)
    {
        $data = array(
            'calendar_events_categories_id' =>  $event_category->id,
            'name'                          =>  $event_category->name,
            'slug'                          =>  $event_category->slug,
            'color'                         =>  $event_category->color,
            'color_name'                    =>  $event_category->color_name
        );
        
        $this->db->insert('calendar_events_categories', $data);
        return $this->db->insert_id(); 
    }
    
    public function update_event_category($event_category)
    {
        $data = array(
            'name'                          =>  $event_category->name,
            'slug'                          =>  $event_category->slug,
            'color'                         =>  $event_category->color,
            'color_name'                    =>  $event_category->color_name
        );
        $this->db->where('calendar_events_categories_id', $event_category->id);
        $this->db->update('calendar_events_categories', $data);
    }
    
    public function delete_event_category($category_id)
    {
        $this->db->where('calendar_events_categories_id', $category_id);
        $this->db->delete('calendar_events_categories');
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
