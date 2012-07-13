<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @property CI_DB_active_record $db
 */
class Menus_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_menu_items($options = array(),$limit = 0, $offset = 0, $order_by = 'order_index ASC')
    {
        foreach($options as $key => $option)
        {
            $this->db->where($key, $option);
        }
        $this->db->from('menu_items');
        $this->db->select('menu_items_id,
                           text,
                           link,
                           date_created,
                           parent_id,
                           order_index,
                           depth_level');
        
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
    
     public function insert_menu_item($data){
        $this->db->insert('menu_items', $data);
        return $this->db->insert_id();
    }
    
    public function update_menu_item($data){
        $this->db->where('menu_items_id', $data->menu_items_id);
        $this->db->update('menu_items',$data);
    }
    
    public function delete_calendar_event($menu_item_id){
        $this->db->where('menu_items_id', $menu_item_id);
        $this->db->delete('menu_items');
    }
}

?>
