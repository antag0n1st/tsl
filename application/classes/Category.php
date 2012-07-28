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
    public $description;
    public $slug;
    public $color;
    public $featured_image;
    public $logo;
    
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
