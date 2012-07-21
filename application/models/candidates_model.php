<?php


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @property CI_DB_active_record $db
 */


class Candidates_model extends CI_Model {
    
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }


 public function save_candidate($data){
        foreach($data as $key => &$value){
            $value = $this->db->escape($value);
        }
        $query = " INSERT INTO candidates (id,".implode(",", array_keys($data)).") ";
        $query .= " VALUES (NULL,".implode(",", array_values($data)).") ";
        $this->db->query($query);
    }
    
    public function get_candidates(){
        
        $query  = " SELECT * FROM candidates as c ";
        $query .= " JOIN calendar_events as e ";
        $query .= " ON c.event_id = e.calendar_events_id ";
        $query .= " WHERE ";
        $query .= " e.date_happen > '".TimeHelper::DateAdjusted()."' ";
        $query .= " ORDER BY e.date_happen DESC ";
        
        $result = $this->db->query($query);
        return $result->result();
        
    }
    
}
?>
