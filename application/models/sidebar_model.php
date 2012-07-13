<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @property CI_DB_active_record $db
 */
class Sidebar_model extends CI_Model {
    
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_sidebar_elements($options = array())
    {
       
            $this->db->select('*');
            $this->db->from('sidebar');
            foreach($options as $key => $option)
            {
                $this->db->where($key, $option);
            }
            $this->db->order_by('position','ASC');
            
            $result = $this->db->get();
            
            $results = array();
            
            foreach($result->result() as $r)
            {
                $results[] = $r;
            }
            return $results;
    }
    
    public function alter_positions($new_positions){
        foreach($new_positions as $position =>$id){
            $query = " UPDATE sidebar SET position = ".$this->db->escape($position)." WHERE id=".$this->db->escape($id)." ";
            $this->db->query($query);
        }
    }
    
    public function save_element($title,$content){
        
        $count = $this->db->count_all_results('sidebar');
        
        $query  = " INSERT INTO sidebar (id,name,content,position,is_deletable,type) ";
        $query .= " VALUES ";
        $query .= " (NULL,".$this->db->escape($title).",".$this->db->escape($content).",'".($count)."',1,'content') ";
        $this->db->query($query);
    }
    
    public function update_element($id,$title,$content){
        
        $query  = " UPDATE sidebar ";
        $query .= " SET ";
        $query .= " name = ".$this->db->escape($title)." ";
        $query .= " ,content = ".$this->db->escape($content)." ";
        $query .= " WHERE id = ".$this->db->escape($id)." ";
        
        $this->db->query($query);
    }
    
    
    public function delete_element($id){
        
        $query = " DELETE FROM sidebar ";
        $query .= " WHERE id = ".$this->db->escape($id)." ";
        
        $this->db->query($query);
    }




    /**
     * _default method combines the options array with a set of defaults giving the values in the options array priority.
     *
     * @param array $defaults
     * @param array $options
     * @return array
     */
    function _default($defaults, $options) {
        return array_merge($defaults, $options);
    }
    
    
    /**
     * _required method returns false if the $data array does not contain all of the keys assigned by the $required array.
     *
     * @param array $required
     * @param array $data
     * @return bool
     */
    function _required($required, $data) {
        foreach ($required as $field)
            if (!isset($data[$field]))
                return false;
        return true;
    }
    
    function arrayToObject($array) {
        if (!is_array($array)) {
            return $array;
        }

        $object = new stdClass();
        if (is_array($array) && count($array) > 0) {
            foreach ($array as $name => $value) {
                $name = strtolower(trim($name));
                if (!empty($name)) {
                    $object->$name = arrayToObject($value);
                }
            }
            return $object;
        } else {
            return FALSE;
        }
    }
}

?>
