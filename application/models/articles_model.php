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
    
    public function get_articles($options = array(),$limit = 0, $offset = 0){
        
        //$options = $this->_default(array('status' => '1'), $options);
        
        foreach($options as $key => $option)
        {
            $this->db->where($key, $option);
        }
        $this->db->from('articles');
        $this->db->select('id,
                           title,
                           description,
                           content,
                           date_created,
                           date_published,
                           slug,
                           featured_image,
                           status');
        
        if($limit){
            $this->db->limit($limit);
        }
        if($offset){
            $this->db->offset($offset);
        }
        
        $result = $this->db->get();
        
        return $result->result();
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
    
    public function get_article_categories($article_id)
    {
        if(is_numeric($article_id))
        {
            $this->db->where('articles_id',$article_id);
            $this->db->from('articles_categories ac');
            $this->db->join('categories c', 'c.categories_id = ac.categories_id');
            $this->db->select('c.categories_id as categories_id');
            $result = $this->db->get();
            
            $results = array();
            
            foreach($result->result() as $r)
            {
                $results[] = $r->categories_id;
            }
            return $results;
        }
        return array();
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
    
    
     /**
     * _default method combines the options array with a set of defaults giving the values in the options array priority.
     *
     * @param array $defaults
     * @param array $options
     * @return array
     */
    function _default($defaults, $options) {
        return array_merge($defaults, $options);
    }
    
    
    /**
     * _required method returns false if the $data array does not contain all of the keys assigned by the $required array.
     *
     * @param array $required
     * @param array $data
     * @return bool
     */
    function _required($required, $data) {
        foreach ($required as $field)
            if (!isset($data[$field]))
                return false;
        return true;
    }
    
    function arrayToObject($array) {
        if (!is_array($array)) {
            return $array;
        }

        $object = new stdClass();
        if (is_array($array) && count($array) > 0) {
            foreach ($array as $name => $value) {
                $name = strtolower(trim($name));
                if (!empty($name)) {
                    $object->$name = arrayToObject($value);
                }
            }
            return $object;
        } else {
            return FALSE;
        }
    }
}

?>
