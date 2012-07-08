<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @property CI_DB_active_record $db
 */
class Gallery_model extends CI_Model {
    
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_gallries($options = array(),$limit = 0, $offset = 0)
    {
        
        //$options = $this->_default(array('status <>' => '0'), $options);
        
        foreach($options as $key => $option)
        {
            $this->db->where($key, $option);
        }
        $this->db->from('galleries as g');
        $this->db->select('g.id_gallery,
                           g.description,
                           g.date_created,
                           gg.name');
        $this->db->join('gallery_groups as gg','g.gallery_group_id = gg.id_gallery_group');
        
        if($limit){
            $this->db->limit($limit);
        }
        if($offset){
            $this->db->offset($offset);
        }
        
        $result = $this->db->get();
        
        return $result->result();
    }
    
    public function get_groups(){
        $this->db->from('gallery_groups');
        $this->db->select('id_gallery_group,
                           name,
                           date_created');
        $result = $this->db->get();
        
        return $result->result();
    }
    
    public function count_all()
    {
        return $this->db->count_all_results('galleries');
    }
    
    public function insert_gallery($data){
     
        $this->db->insert('galleries', $data);
        return $this->db->insert_id();
    }
    
    public function update_gallery($data){
        $this->db->where('id_gallery', $data->id_gallery);
        $this->db->update('galleries',$data);
    }
    
    public function delete_gallery($id_gallery){
        $this->db->where('id_gallery', $id_gallery);
        $this->db->delete('galleries');
    }
    
    
    
    public function insert_gallery_photo($data){
     
        $this->db->insert('gallery_photos', $data);
        return $this->db->insert_id();
    }

    public function delete_gallery_photo($id_gallery){
        $this->db->where('id_gallery_photos', $id_gallery);
        $this->db->delete('gallery_photos');
    }
    
    
}

?>