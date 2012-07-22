<?php

class CalendarEvent {
    public $calendar_events_id;
    public $date_created;
    public $date_happen;
    public $calendar_link;
    public $event_categories_id;
    public $title;
    
    
     public function __construct($value = '') {
        $this->calendar_events_id = 0;
    }
    
    
    public function is_valid()
    {
        if(trim($this->date_happen)   != ""   and 
           trim($this->date_happen)   != ""   and
           trim($this->calendar_link) != ""   and
           is_numeric($this->event_categories_id))
        {
            return true;
        }
        return false;
    }
    
}

?>
