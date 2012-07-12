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
                           order_index');
        
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
    
    
}

?>
