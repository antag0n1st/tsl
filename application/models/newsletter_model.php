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
        
        $query  = " SELECT e.id, e.email, e.unsubscribe_id FROM emails AS e ";
        $query .= " LEFT JOIN emails_sent AS s ";
        $query .= " ON e.id = s.email_id AND s.newsletter_id = ".$this->db->escape($newsletter_id)."  ";
        $query .= " WHERE ";
        $query .= " s.email_id IS NULL ";
        $query .= " AND e.is_unsubscribed = 0 ";
        $query .= " LIMIT ". ((int)$limit);
        
        $result = $this->db->query($query);
        return $result->result();
    }
    
    public function get_all_emails($limit = 0, $offset = 0){
        $query = " SELECT * FROM emails ";
        
        if($limit){
            $query .= " LIMIT " . $limit;
        }
        if($offset){
            $query .= " OFFSET " . $offset;
        }
        
        
        
        $result = $this->db->query($query);
        return $result->result();
    }
    
    public function get_email_by_id($id){
        $query = " SELECT * FROM emails ";
        $query .= " WHERE ";
        $query .= " id = ".$this->db->escape($id)." ";
        $query .= " LIMIT 1 ";
        
        $result = $this->db->query($query);
        return $result->result();
    }
    
    public function get_email_by_address($email)
    {
        $query = " SELECT * FROM emails ";
        $query .= " WHERE ";
        $query .= " email = ".$this->db->escape($email)." ";
        $query .= " LIMIT 1 ";
        
        $result = $this->db->query($query);
        return $result->result();
    }
    
    public function update_email($id,$email,$is_unsubscribed){
        $query = " UPDATE emails ";
        $query .= " SET ";
        $query .= " email = ".$this->db->escape($email)." ";
        $query .= " , is_unsubscribed = ".$this->db->escape($is_unsubscribed)." ";
        $query .= " WHERE ";
        $query .= " id = ".$this->db->escape($id)." ";
        
        $this->db->query($query);
        
        return $this->db->affected_rows();
    }
    
    public function unsibscribe($unsubscribe_id){
        $query = " UPDATE emails ";
        $query .= " SET ";      
        $query .= " is_unsubscribed = 1 ";
        $query .= " WHERE ";
        $query .= " unsubscribe_id = ".$this->db->escape($unsubscribe_id)." ";
        
        $this->db->query($query);
    }
    
    public function delete_email($id){
        $query = " DELETE FROM emails ";
        $query .= " WHERE ";
        $query .= " id = ".$this->db->escape($id)." ";
        
        $this->db->query($query);
    }
    
    public function insert_email($data){
        foreach($data as $key => &$value){
            $value = $this->db->escape($value);
        }
        $query = " INSERT INTO emails (id,".implode(",", array_keys($data)).",unsubscribe_id) ";
        $query .= " VALUES (NULL,".implode(",", array_values($data)).",UUID()) ";
        $query .= " ON DUPLICATE KEY UPDATE is_unsubscribed = 0  ";
        $this->db->query($query);
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
        $query .= " ORDER BY n.id DESC";
        
        $result = $this->db->query($query);
        
        return $result->result();
    }
    
    public function get_finished_newsletters()
    {
        $query  = " SELECT * FROM ";
        $query .= " newsletter as n ";
        $query .= " WHERE ";
        $query .= " status = 3 ";
        $query .= " ORDER BY date_finished DESC ";
        
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
        
        $query  = " SELECT * FROM newsletter_articles as n ";
        $query .= " JOIN articles as a ";
        $query .= " ON n.article_id = a.id ";
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
    
    
    public function insert_newsletter_click($data)
    {
        $this->db->insert('newsletter_clicks', $data);
        return $this->db->insert_id(); 
    }
    
    public function delete_newsletter_click($options = array())
    {
        foreach($options as $key => $option)
        {
            $this->db->where($key,$option);
        }
        $this->db->delete('newsletter_clicks');
    }
    
    public function get_newsletter_clicks($options = array(),$limit = 0, $offset = 0, $order_by = 'email DESC, date_clicked DESC', $result_only = 0)
    {
        foreach($options as $key => $option)
        {
            $this->db->where($key,$option);
        }
        
        $this->db->from('newsletter_clicks as nc');
        $this->db->join('newsletter n', 'nc.newsletter_id = n.id');
        $this->db->join('articles   a', 'nc.article_id    = a.id');
        $this->db->join('emails     e', 'nc.email_id      = e.id');
        
        $this->db->select('nc.date_created  as date_clicked,
                       n.id             as newsletter_id,
                       n.title          as newsletter_title,
                       a.id             as article_id,
                       a.title          as article_title,
                       a.slug           as article_slug,
                       e.id             as email_id,
                       e.email          as email');
        
        
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
        
        if($result_only)
        {
            return $result;
        }
        else
        {
            return $result->result();
        }
        
    }
    
    
}

?>
