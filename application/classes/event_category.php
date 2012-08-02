<?php

class EventCategory {
    public $id;
    public $name;
    public $color;
    public $slug;
    public $color_name;
    public $num_events;
    
    public function  __construct()
    {
        $this->id = 0;
        $this->color      = '#000000';
        $this->name       = '';
        $this->color_name = 'crna';
        $this->slug       = '';
        $this->num_events = 0;
    }


    public function is_valid()
    {
        if( is_numeric($this->id)   and
            strlen(trim($this->color)) == 7      and
            $this->color[0] == '#'               and
            ctype_xdigit(substr($this->color,1)) and // valid hex number
            strlen(trim($this->name)) > 0
          )
        {
            return true;
        }
        return false;
        
    }
}

