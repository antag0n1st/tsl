<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @property CI_DB_active_record $db
 */
class Articles_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    
    public function insert_article($data)
    {
        $this->db->insert('articles',$data);
        return $this->db->insert_id();
    }
    
    
    public function update_article($data)
    {
        $this->db->where('id', $data->id);
        $this->db->update('articles',$data);
    }
    
    public function insert_article_categories($article_id, $categories){
        if(is_array($categories) and count($categories) > 0)
        {
            foreach($categories as $category)
            {
                $this->db->insert('articles_categories',array('articles_id'  => $article_id,
                                                            'categories_id' => $category)
                                );
            }
        }
    }
    
    public function update_article_categories($article_id,$categories)
    {
        if(is_array($categories) and count($categories) > 0)
        {
            $this->db->where('articles_id', $article_id);
            $this->db->delete('articles_categories');
            
            $this->insert_article_categories($article_id, $categories);
        }
    }
    
    public function insert_calendar_event($data){
        $this->db->insert('calendar_events', $data);
        return $this->db->insert_id();
    }
    
    
    public function get_categories()
    {
        $result = $this->db->get('categories');
        
        $categories = array();
        
        foreach($result->result() as $c){
            $category = new Category();
            $category->id   =  $c->categories_id;
            $category->name =  $c->name;
            $category->slug =  $c->slug;
            
            $categories[] = $category;
        }
        
        return $categories;
    }
    
    public function get_event_categories()
    {
        $result = $this->db->get('calendar_events_categories');
        
        $categories = array();
        
        foreach($result->result() as $c){
            $category = new EventCategory();
            $category->id    =  $c->calendar_events_categories_id;
            $category->name  =  $c->name;
            $category->slug  =  $c->slug;
            $category->color =  $c->color;
            $category->color_name = $c->color_name;
            
            $categories[] = $category;
        }
        
        return $categories;
        return $result->result();
    }
}

?>
