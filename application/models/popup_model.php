<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @property CI_DB_active_record $db
 */
class Popup_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_popup()
    {
        $result = $this->db->get('popup');
        return $result->result();
    }
    
    public function update_popup($id,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('popup',$data);
    }
    
}