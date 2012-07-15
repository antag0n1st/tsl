<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @property CI_DB_active_record $db
 */
class Newsletter_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_newsletter_to_send(){
        
        
        $query  = " SELECT * FROM newsletter ";
        $query .= " WHERE status < 2 ";
        $query .= " AND date_finished IS NULL ";
        $query .= " ORDER BY id DESC ";
        $query .= " LIMIT 1 ";
        
        $result = $this->db->query($query);
        
        $newsletters = $result->result();
        return isset($newsletters[0]) ? $newsletters[0] : null;
        
    }
    
    public function get_emails($newsletter_id,$limit = 100){
        
        $query  = " SELECT e.id, e.email FROM emails AS e ";
        $query .= " LEFT JOIN emails_sent AS s ";
        $query .= " ON e.id = s.email_id AND s.newsletter_id = ".$this->db->escape($newsletter_id)." ";
        $query .= " WHERE ";
        $query .= " s.email_id IS NULL ";
        $query .= " LIMIT ". ((int)$limit);
        
        $result = $this->db->query($query);
        return $result->result();
    }
    
    public function update_email_sent($newsletter_id,$email_id){
        
        $query  = " INSERT INTO emails_sent ";
        $query .= " (newsletter_id,email_id,date_sent) ";
        $query .= " VALUES ( ";
        $query .= " ".$this->db->escape($newsletter_id)." ";
        $query .= " , ".$this->db->escape($email_id)." ";
        $query .= " , ".$this->db->escape(TimeHelper::DateTimeAdjusted())." ";
        $query .= " ) ";
        
        $this->db->query($query);
    }
    
    
    public function get_newsletters()
    {
        $query  = " SELECT n.* , count(s.newsletter_id) as count FROM ";
        $query .= " newsletter as n ";
        $query .= " LEFT JOIN emails_sent as s ";
        $query .= " ON n.id = s.newsletter_id ";
        $query .= " GROUP BY n.id ";
        
        $result = $this->db->query($query);
        
        return $result->result();
    }
    
    public function get_newsletter($id){
        $query  = " SELECT * FROM newsletter ";
        $query .= " WHERE ";
        $query .= " id = ".$this->db->escape($id)." ";
        
        $result = $this->db->query($query);
        
        return $result->result();
    }
    
    public function get_newsletter_articles($newsletter_id){
        
        $query  = " SELECT * FROM newsletter_articles ";
        $query .= " WHERE ";
        $query .= " newsletter_id = ".$this->db->escape($newsletter_id)." ";
        
        $result = $this->db->query($query);
        
        return $result->result();
        
    }
    public function set_newsletter_started($newsletter_id){
        /**
         * status
         *  0 - not started
         *  1 - started
         *  2 - paused
         *  3 - finished
         */
        $query  = " UPDATE newsletter ";
        $query .= " SET ";
        $query .= " status  = 1 ";
        $query .= " , date_started = ".$this->db->escape(TimeHelper::DateTimeAdjusted())." ";
        $query .= " WHERE id = ".$this->db->escape($newsletter_id)." ";
        
        $this->db->query($query);
    }
    
    public function set_newsletter_finished($newsletter_id){
        /**
         * status
         *  0 - not started
         *  1 - started
         *  2 - paused
         *  3 - finished
         */
        $query  = " UPDATE newsletter ";
        $query .= " SET ";
        $query .= " status  = 3 ";
        $query .= " , date_finished = ".$this->db->escape(TimeHelper::DateTimeAdjusted())." ";
        $query .= " WHERE id = ".$this->db->escape($newsletter_id)." ";
        
        $this->db->query($query);
    }
    
    public function insert_newsletter($title,$content,$articles = array()){
        
        /**
         * status
         *  0 - not started
         *  1 - started
         *  2 - paused
         *  3 - finished
         */
        
        $query  = " INSERT INTO newsletter ";
        $query .= " (id,title,content,status,date_created,date_started,date_finished) ";
        $query .= " VALUES ( ";
        $query .= " NULL ";
        $query .= " , ".$this->db->escape($title)." ";
        $query .= " , ".$this->db->escape($content)." ";
        $query .= " , 0 ";
        $query .= " , '".TimeHelper::DateTimeAdjusted()."' ";
        $query .= " , NULL ";
        $query .= " , NULL ";
        $query .= " )  ";
        
        $this->db->query($query);
        $newsletter_id = mysql_insert_id();
        
        foreach($articles as $key => $article_id){
            
            $query = " INSERT INTO newsletter_articles ";
            $query .= " (newsletter_id,article_id) ";
            $query .= " VALUES ( " ;
            $query .= "  ".$this->db->escape($newsletter_id)." ";
            $query .= " , ".$this->db->escape($article_id)." ";
            $query .= " ) ";
            
            $this->db->query($query);
        }
        
    }
    
    
    public function update_newsletter($newsletter_id,$title,$content,$articles,$status){
        
        
        
        /**
         * status
         *  0 - not started
         *  1 - started
         *  2 - paused
         *  3 - finished
         */
        
        $query  = " UPDATE newsletter ";
        $query .= " SET ";
        $query .= " title = ".$this->db->escape($title)." ";
        $query .= " , content = ".$this->db->escape($content)." ";
        $query .= " , status  = ".$this->db->escape($status)." ";
        $query .= " WHERE id = ".$this->db->escape($newsletter_id)." ";
     
        
        $this->db->query($query);
        
        $query = " DELETE FROM newsletter_articles  ";
        $query .= " WHERE newsletter_id = ".$this->db->escape($newsletter_id)." ";
        $this->db->query($query);
        
        foreach($articles as $key => $article_id){
            
            $query = " INSERT INTO newsletter_articles ";
            $query .= " (newsletter_id,article_id) ";
            $query .= " VALUES ( " ;
            $query .= "  ".$this->db->escape($newsletter_id)." ";
            $query .= " , ".$this->db->escape($article_id)." ";
            $query .= " ) ";
            
            $this->db->query($query);
        }
        
        
        
        
    }
    public function delete_newsletter($newsletter_id){
        
        $query  = " DELETE FROM newsletter  ";
        $query .= " WHERE id = ".$this->db->escape($newsletter_id)." ";
        $this->db->query($query);
        
        $query = " DELETE FROM newsletter_articles  ";
        $query .= " WHERE newsletter_id = ".$this->db->escape($newsletter_id)." ";
        $this->db->query($query);
        
        $query = " DELETE FROM emails_sent  ";
        $query .= " WHERE newsletter_id = ".$this->db->escape($newsletter_id)." ";
        $this->db->query($query);
    }
    
    public function get_total_newsletters()
    {
        return $this->db->count_all_results('newsletter');
    }
    
    public function get_total_emails()
    {
        return $this->db->count_all_results('emails');
    }
}

?>
