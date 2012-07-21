<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @property CI_DB_active_record $db
 */
class Footer_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_footer()
    {
        $result = $this->db->get('footer');
        $footer =  $result->result();
        if(count($footer) == 1)
        {
            return $footer[0];
        }
        return $footer;
    }
    
    public function update_footer($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update('footer', $data);
    }
    
}

?>
