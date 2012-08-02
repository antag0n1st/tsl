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
    
    public function get_galleries($options = array(),$limit = 0, $offset = 0, $order_by = 'id_gallery DESC')
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
                           gg.name,
                           g.gallery_group_id');
        $this->db->join('gallery_groups as gg','g.gallery_group_id = gg.id_gallery_group');
        
        if($limit){
            $this->db->limit($limit);
        }
        if($offset){
            $this->db->offset($offset);
        }
        if($order_by)
        {
            $this->db->order_by($order_by);
        }
        
        $result = $this->db->get();
        
        return $result->result();
    }
    
    public function get_galleries_and_photos($options = array(), $limit = 0, $offset = 0) {

        foreach ($options as $key => $option) {
            $this->db->where($key, $option);
        }
        $this->db->from('galleries as g');
        $this->db->select('g.id_gallery,
                           g.description,
                           g.date_created,
                           gg.name,
                           g.gallery_group_id,
                           gp.image');
        $this->db->join('gallery_groups as gg', 'g.gallery_group_id = gg.id_gallery_group');
        $this->db->join('gallery_photos as gp','g.id_gallery = gp.galleries_id_gallery');
        $this->db->group_by('g.id_gallery');
        $this->db->order_by('g.gallery_group_id,g.id_gallery');

        if ($limit) {
            $this->db->limit($limit);
        }
        if ($offset) {
            $this->db->offset($offset);
        }

        $result = $this->db->get();

        return $result->result();
    }

    public function get_groups($options = array()){
        $this->db->from('gallery_groups');
        $this->db->select('id_gallery_group,
                           name,
                           date_created');
        
        foreach($options as $key => $option)
        {
            $this->db->where($key, $option);
        }
        
        $result = $this->db->get();
        
        return $result->result();
    }
    
    public function add_group($title){
        $query  = " INSERT INTO gallery_groups  ";
        $query .= " (id_gallery_group,name,date_created) ";
        $query .= " VALUES ";
        $query .= " (NULL,".$this->db->escape($title).",'".TimeHelper::DateTimeAdjusted()."') ";
        $this->db->query($query);
    }
    
    public function update_group($id,$title){
        
        $query  = " UPDATE gallery_groups  ";
        $query .= " SET name = ".$this->db->escape($title)." ";
        $query .= " WHERE ";
        $query .= " id_gallery_group = ".$this->db->escape($id)." ";
        
        $this->db->query($query);
    }
    
    public function get_photos($options = array()){
        $this->db->from('gallery_photos');
        $this->db->select('id_gallery_photos,
                           image,
                           description,
                           date_created');
        foreach($options as $key => $option)
        {
            $this->db->where($key, $option);
        }
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
    
    public function delete_group($id){
        $this->db->where('id_gallery_group', $id);
        $this->db->delete('gallery_groups');
    }
    
    public function insert_gallery_photo($data){
     
        $this->db->insert('gallery_photos', $data);
        return $this->db->insert_id();
    }

    public function delete_gallery_photo($id_gallery_photos){
        $this->db->where('id_gallery_photos', $id_gallery_photos);
        $this->db->delete('gallery_photos');
    }
    
    
}

?>
