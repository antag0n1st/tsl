<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Category
 *
 * @author Vladimir
 */
class Category {
    public $id;
    public $name;
    public $slug;
    public $color;
    
    public function is_valid()
    {
        if(is_numeric($this->id)         and
           strlen(trim($this->name)) > 0 and 
           strlen(trim($this->slug)) > 0 )
        {
            return true;
        }
        return false;
    }
    
    
}

?>
