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
    
    public function get_articles($options = array(),$limit = 0, $offset = 0, $order_by = 'ID DESC'){
        
        $options = $this->_default(array('status <>' => '0'), $options);
        
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
        if($order_by)
        {
            $this->db->order_by($order_by);
        }
        
        $result = $this->db->get();
        
        return $result->result();
    }
    
    public function get_articles_by_category($category_id,$options = array(),$limit = 0, $offset = 0, $order_by = 'ID DESC')
    {
        $options = $this->_default(array('status <>' => '0'), $options);
        
        foreach($options as $key => $option)
        {
            $this->db->where($key, $option);
        }
        $this->db->where('ac.categories_id',$category_id);
        $this->db->from('articles a');
        $this->db->join('articles_categories ac', 'a.id = ac.articles_id');
        $this->db->select('a.id,
                           a.title,
                           a.description,
                           a.content,
                           a.date_created,
                           a.date_published,
                           a.slug,
                           a.featured_image,
                           a.status');
        
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
    
    
    public function get_latest_news() {

       
            $query  = " SELECT a.* , DATE_FORMAT(a.date_published,'%d.%m.%Y') as d ";
            $query .= " FROM articles as a ";
            $query .= " JOIN articles_categories as ac ";
            $query .= " ON a.id = ac.articles_id ";
            $query .= " JOIN categories as c ";
            $query .= " ON ac.categories_id = c.categories_id ";
            $query .= " WHERE status = 1 ";
            $query .= " AND c.categories_id = 1 ";
            $query .= " ORDER BY a.date_published DESC ";
            $query .= " LIMIT 4 ";
            
            $result = $this->db->query($query);
            
            $return = array();

            foreach ($result->result() as $row)
            {
                $return[] = $row;
            }
            
            return $return;
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
    
    public function delete_article_categories($article_id)
    {
        $this->db->where('articles_id', $article_id);
        $this->db->delete('articles_categories');
    }
    
    public function delete_article($article_id)
    {
        $this->db->where('id', $article_id);
        $this->db->delete('articles');
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
    
    public function get_events()
            
            
            
    {       
            // 07/25/2012
            $query  = " SELECT * , DATE_FORMAT(date_happen,'%m/%d/%Y') as d ";
            $query .= " FROM calendar_events ce ";
            $query .= " JOIN `calendar_events_categories` c ";
            $query .= " ON `c`.`calendar_events_categories_id` = `ce`.`event_categories_id` ";
            $query .= " WHERE `date_happen` > '".TimeHelper::DateTimeAdjusted()."' ";
            $query .= " ORDER BY date_happen ASC ";
            
            $result = $this->db->query($query);
            
            $return = array();

            foreach ($result->result() as $row)
            {
                $return[] = $row;
            }
            
            return $return;

    }
    
    
    public function get_categories($options = array(),$limit = 0, $offset = 0, $order_by = 'categories_id DESC')
    {
        
        foreach($options as $key => $option)
        {
            $this->db->where($key, $option);
        }
        $this->db->from('categories');
        $this->db->select('categories_id,
                           name,
                           slug');
        
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
    
    
    public function search_articles($keywords,$options = array(),$limit = 0,$offset = 0, $order_by = 'date_published DESC')
    {
        $params = array(    $keywords,
                            $options,
                            $limit,
                            $offset,
                            $order_by
        );
        
        $filters = $this->get_search_filters($params);
        
        foreach($filters as $filter)
        {
            $results    = $filter->call();
            if(isset($results) and count($results) > 0)
            {
                return $results;
            }
        }
        return array();
    }
    
    protected function get_search_filters($params)
    {
        $filters    =   array(
                        new SearchFilter($this , 'search_articles_by_categories', $params),
                        new SearchFilter($this , 'search_articles_default'      , $params),
                        new SearchFilter($this , 'search_articles_latinic'      , $params),
                        new SearchFilter($this , 'search_articles_cyrilic'      , $params)
                        
                        
        );
        return $filters;
    }
    
    
    public function search_articles_default($params)
    {
        list($search,$options,$limit,$offset,$order_by) = $params;
        $search = implode('* *', (explode('+',$search)) ); 
        $options["MATCH(title,description,content) AGAINST('*{$search}*' IN BOOLEAN MODE)"] = NULL;              
        return $this->get_articles($options, $limit, $offset, $order_by); 
    }
    
    
    public function search_articles_latinic($params)
    {
        $search = explode('+',$params[0]);
        
        $search_transformed = array();
        foreach($search as $keyword)
        {
            if(CyrillicLatin::is_cyrilic($keyword) == true)
            $search_transformed[]    = CyrillicLatin::cyrillic2latin($keyword);
        }
        $search = implode('* *', $search_transformed );
        
        
        
        $options["MATCH(title,description,content) AGAINST('*{$search}*' IN BOOLEAN MODE)"] = NULL;
        $limit    = $params[2];
        $offset   = $params[3];
        $order_by = $params[4];
        
        $options = array_merge($options,$params[1]);
                
        return $this->get_articles($options, $limit, $offset, $order_by); 
        
    }
    
    public function search_articles_cyrilic($params)
    {
        $search = explode('+',$params[0]);
        
        
        $search_transformed = array();
        foreach($search as $keyword)
        {
            if(CyrillicLatin::is_latin($keyword) == true)
            $search_transformed[]    = CyrillicLatin::latin2cyrillic ($keyword);
        }
        $search = implode('* *', $search_transformed );
        
        
        $options["MATCH(title,description,content) AGAINST('*{$search}*' IN BOOLEAN MODE)"] = NULL;
        $limit    = $params[2];
        $offset   = $params[3];
        $order_by = $params[4];
        
        $options = array_merge($options,$params[1]);
                
        return $this->get_articles($options, $limit, $offset, $order_by);
    }
    
    public function search_articles_by_categories($params)
    {
        $categories = $this->get_categories();
        
        $search = $params[0];
        
        $lower_search = mb_strtolower($search,'UTF-8');
        if(strlen($lower_search) > 0)
        foreach($categories as $category)
        {
            $contains_category = mb_stripos(mb_strtolower($category->name,'UTF-8'), $lower_search);
            $contains_slug = mb_stripos(mb_strtolower($category->slug,'UTF-8'),$lower_search);
            if($contains_category === false and $contains_slug === false)
            {
                continue;
            }
            else
            {
                $options  = array();
                $options  = array_merge($options,$params[1]);
                $limit    = $params[2];
                $offset   = $params[3];
                $order_by = $params[4];

                return $this->get_articles_by_category($category->id,$options, $limit, $offset, $order_by); 
            }
        }
        
        return array();
       
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
