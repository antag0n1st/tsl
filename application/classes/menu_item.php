<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of menu_item
 *
 * @author Vladimir
 */
class MenuItem {
    public $menu_items_id;
    public $text;
    public $link;
    public $parent_id;
    public $date_created;
    public $order_index;
    public $depth_level; 
    public $children;
    public function __construct($value = '') {
        $this->menu_items_id =
        $this->order_index   =
        $this->depth_level   =
        $this->parent_id     =  0;
        $this->children      = array();
    }
    
    public function is_valid()
    {
        if( strlen(trim($this->text))         > 0 and
            strlen(trim($this->link))         > 0 and
            strlen(trim($this->date_created)) > 0 and
            is_numeric($this->menu_items_id)      and
            is_numeric($this->parent_id)          and
            is_numeric($this->order_index)                
          )
        {
            if($this->menu_items_id != 0)
            {
                if($this->menu_items_id != $this->parent_id)  // can't be my own grandpa ;)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            } 
            
            return true;
        }
        return false;
    }
}

?>
