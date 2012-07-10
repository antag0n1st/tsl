<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of quote
 *
 * @author Vladimir
 */
class Quote {
    public $quotes_id;
    public $description;
    public $author;
    public $date_created;
    
     public function __construct($value = '') {
        $this->quotes_id = 0;
    }
    
    public function is_valid()
    {
        if(strlen(trim($this->description)) > 0 and
           strlen(trim($this->author))      > 0 and
           strlen(trim($this->date_created))> 0
          ){
            return true;
          }
        return false;
    }
}

?>
