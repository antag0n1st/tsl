<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of search_filter
 *
 * @author Vladimir
 */
class SearchFilter {
    public $params;
    public $filter_class;
    public $filter_function_name;
    
    
    public function __construct($filter_class_name ,$filter_function_name, $params) {
        $this->filter_class    = $filter_class_name;
        $this->filter_function_name = $filter_function_name;
        $this->params               = $params;
        
        if(!$this->is_valid())
        {
            die('Search filter has some incorrectly passed members:' .
                'parameters'            . $this->params  . ' and ' .
                'filter function class '. $this->filter_class .
                ' filter function'      . $this->filter_function_name);
        }
        
    }
    
    public function call()
    {
        return call_user_func_array(array($this->filter_class,
                                          $this->filter_function_name),
                                    array($this->params));
    }
    
    
    public function is_valid()
    {
        if(is_array($this->params)                and
           is_string($this->filter_function_name)
           )
        {
            return true;
        }
        return false;
        
        
    }
    
}

?>
