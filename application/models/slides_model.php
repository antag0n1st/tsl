<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @property CI_DB_active_record $db
 */
class Slides_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    
    public function get_slides($options = array(),$limit = 0, $offset = 0)
    {
        //$options = $this->_default(array('status <>' => '0'), $options);
        
        foreach($options as $key => $option)
        {
            $this->db->where($key, $option);
        }
        $this->db->from('slides');
        $this->db->select('slides_id,
                           date_created,
                           title,
                           description,
                           link,
                           image,
                           order_index');
        
        if($limit){
            $this->db->limit($limit);
        }
        if($offset){
            $this->db->offset($offset);
        }
        
        $result = $this->db->get();
        
        return $result->result();
    }
    
    public function get_max_order_index()
    {
        $this->db->select_max('order_index','m');
        $result = $this->db->get('slides');
        
        if ($result->num_rows() > 0)
        {
            $res2 = $result->result_array();
            $max  = $res2[0]['m'];
        }
        return $max;
    }
    
    public function insert_slide($data){
        $this->db->insert('slides', $data);
        return $this->db->insert_id();
    }
    
    public function update_slide($data){
        $this->db->where('slides_id', $data->slides_id);
        $this->db->update('slides',$data);
    }
    
    public function delete_slide($slide_id){
        $this->db->where('slides_id', $slide_id);
        $this->db->delete('slides');
    }
}

?>
