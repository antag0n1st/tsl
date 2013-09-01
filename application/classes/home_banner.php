<?php

class HomeBanner {
    public $home_banner_id;
    public $title;
    public $link;
    public $image;
    public $date_created;
    public $is_active;
    
    public function is_valid()
    {
        return true;
    }
}