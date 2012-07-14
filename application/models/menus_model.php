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
    
    public function update_children_order($menu_item, $order_index, $i)
    {
        if(isset($menu_item->children)    and 
           is_array($menu_item->children) and
           count($menu_item->children)    > 0)
        {
            foreach($menu_item->children as $child)
            {
                    $child->order_index = $order_index + $i;
                    $this->update_menu_item($child);
                    $this->update_children_order($child, $order_index, ++$i);
            }
        }
    }
    
    
    
    
    public function get_menu_items_with_children(){
        
        $all_menu_items = $this->get_menu_items();
        
        $top_level_menu_items   =  array();
        foreach($all_menu_items as  $key => $menu_item) // get all parent menu items and remove them from the array
        {
            if($menu_item->parent_id == 0)
            {
               $top_level_menu_items[] = $menu_item;
               unset($all_menu_items[$key]);
            }
        }
        $all_menu_items =   array_values($all_menu_items);
        
       
        foreach($top_level_menu_items as $menu_item)
        {
            $menu_item->children = $this->menus_model->get_children($menu_item->menu_items_id,$all_menu_items);
        }

        return $top_level_menu_items;
    }
    
    
    public function get_children($parent_id, $menu_items = null)
    {
        $children = array();
        if($menu_items == null or !is_array($menu_items))
        {
            return $children;
        }
        else
        {
            foreach($menu_items as $key => $menu_item)
            {
                if($menu_item->parent_id == $parent_id)
                {
                    $children[] = $menu_item;
                    unset($menu_items[$key]);
                }
            }
            $menu_items = array_values($menu_items);
        }
        
        foreach($children as $child){
            $child->children = $this->get_children($child->menu_items_id, $menu_items);
        }
        return $children;
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
