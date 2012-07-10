<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @property CI_DB_active_record $db
 */
class Quotes_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_quote_of_the_day($quotes = null)
    {
        if(!isset($quotes)      or 
           !is_array($quotes)   or 
           count($quotes) == 0 
          )
        {   
            $quotes = $this->get_quotes();
        }
        
            $date   = TimeHelper::DateTimeAdjusted();
            $buffer = array( date('Y',strtotime($date)) % 256,
                             date('Y',strtotime($date)) / 256,
                             date('m',strtotime($date))      ,
                             date('d',strtotime($date))      
                      );
            
            $data = "";
            foreach($buffer as $b)
            {
                $data .= $b;
            }
            
            $hash   =   sha1($data);

            $tip_number =   0;
            for($i = 0; $i < strlen($hash); $i++)
            {
                $h = $hash{$i};
                $tip_number += $h;
                $tip_number %= count($quotes);
            }
         return $quotes[$tip_number];
    }
    
    
    public function get_quotes($options = array(),$limit = 0, $offset = 0, $order_by = 'quotes_id DESC')
    {
        foreach($options as $key => $option)
        {
            $this->db->where($key, $option);
        }
        $this->db->from('quotes');
        $this->db->select('quotes_id,
                           description,
                           author,
                           date_created');
        
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
    
    public function insert_quote($data){
        $this->db->insert('quotes', $data);
        return $this->db->insert_id();
    }
    
    public function update_quote($data){
        $this->db->where('quotes_id', $data->quotes_id);
        $this->db->update('quotes',$data);
    }
    
    public function delete_slide($quote_id){
        $this->db->where('quotes_id', $quote_id);
        $this->db->delete('quotes');
    }
    public function get_total_quotes()
    {
        return $this->db->count_all_results('quotes');
    }
}

?>
