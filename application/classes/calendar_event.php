<?php

class CalendarEvent {
    public $calendar_events_id;
    public $date_created;
    public $date_happen;
    public $calendar_link;
    public $event_categories_id;
    
     public function __construct($value = '') {
        $this->calendar_events_id = 0;
    }
    
    
}

?>
