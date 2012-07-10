<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of clients_model
 *
 * @author Vladimir
 */
class Clients_model extends CI_Model {
    
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_clients($options = array(),$limit = 0, $offset = 0, $order_by = 'clients_id DESC')
    {
        
        foreach($options as $key => $option)
        {
            $this->db->where($key, $option);
        }
        $this->db->from('clients');
        $this->db->select('clients_id,
                           name,
                           image,
                           link,
                           date_created');
        
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
    
    
    public function insert_client($data){
        $this->db->insert('clients', $data);
        return $this->db->insert_id();
    }
    
    public function update_client($data){
        $this->db->where('clients_id', $data->clients_id);
        $this->db->update('clients',$data);
    }
    
    public function delete_slide($quote_id){
        $this->db->where('clients_id', $quote_id);
        $this->db->delete('clients');
    }
    public function get_total_quotes()
    {
        return $this->db->count_all_results('clients');
    }
    
    
    
}

?>
