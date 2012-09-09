<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of popup
 *
 * @author Vladimir
 */
class Popup {
    public $id;
    public $link;
    public $image_url;
    public $is_active;
    
    
    public function is_valid()
    {
        if( is_numeric($this->id)     and
            strlen(trim($this->link)) and
            ($this->is_active == 1     or
            $this->is_active == 0))
            {
                return true;
            }
        return false;
    }
    
}

?>
