<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of client
 *
 * @author Vladimir
 */
class Client {
    public $clients_id;
    public $name;
    public $image;
    public $link;
    public $date_created;
    
     public function __construct($value = '') {
        $this->clients_id = 0;
    }
    
    public function is_valid()
    {
        if( strlen(trim($this->name))  > 0 and
            strlen(trim($this->image)) > 0 and
            strlen(trim($this->link))  > 0 and
            strlen(trim($this->date_created))  > 0)
            {
                return true;
            }
        return false;
    }
    
    
}

?>
