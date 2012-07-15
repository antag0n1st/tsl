<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of slide
 *
 * @author Vladimir
 */
class Slide {
    public $slides_id;
    public $title;
    public $description;
    public $link;
    public $image;
    public $date_created;
    public $order_index;
    
    public function __construct($value = '') {
        $this->slides_id = 0;
        $this->order_index = 0;
    }
    
    public function is_valid()
    {
        if(strlen(trim($this->title)) > 0       and
           strlen(trim($this->description))     and
 //          strlen(trim($this->link))            and   
           strlen(trim($this->image))           and
           strlen(trim($this->date_created))    and
           is_numeric($this->slides_id)         and
           is_numeric($this->order_index)
           ){
                return true;
           }
        return false;
    }
    
}

?>
