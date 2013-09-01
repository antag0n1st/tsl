<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @property CI_DB_active_record $db
 */
class Home_banner_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    
    public function get_home_banner($options = array(),$limit = 0, $offset = 0, $order_by = 'home_banner_id DESC')
    {
        //$options = $this->_default(array('status <>' => '0'), $options);
        
        foreach($options as $key => $option)
        {
            $this->db->where($key, $option);
        }
        $this->db->from('home_banner');
        $this->db->select('home_banner_id,
                           date_created,
                           title,
                           link,
                           image,
                           is_active');
        
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
    
    
    
    public function insert_home_banner($data){
        $this->db->insert('home_banner', $data);
        return $this->db->insert_id();
    }
    
    public function update_home_banner($data){
        $this->db->where('home_banner_id', $data->home_banner_id);
        $this->db->update('home_banner',$data);
    }
    
    public function delete_slide($slide_id){
        $this->db->where('home_banner_id', $slide_id);
        $this->db->delete('home_banner');
    }
}

?>
