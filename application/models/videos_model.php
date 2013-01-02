<?php

/**
 * @property CI_DB_active_record $db
 */
class Videos_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
     public function get_videos($options = array(),$limit = 0, $offset = 0, $order_by = 'id DESC')
    {   
        foreach($options as $key => $option)
        {
            $this->db->where($key, $option);
        }
        $this->db->from('videos');
        $this->db->select('*');
        
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
    
    public function get_viewers_for_video($video_id)
    {
        $this->db->where('video_id', $video_id);
        $result = $this->db->get('video_viewer');
        return $result->result();
    }
    
    public function insert_video($data){
        $this->db->insert('videos', $data);
        return $this->db->insert_id();
    }
    
    public function insert_video_viewer($data){
        $this->db->insert('video_viewer', $data);
        return $this->db->insert_id();
    }
    
    public function update_video($data){
        $this->db->where('id', $data->slides_id);
        $this->db->update('videos',$data);
    }
    
    public function delete_slide($slide_id){
        $this->db->where('id', $slide_id);
        $this->db->delete('videos');
    }
}

?>
