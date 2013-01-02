<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of video_viewer
 *
 * @author Vladimir
 */
class Video_viewer {
    public $id;
    public $name;
    public $date_created;
    public $email;
    public $profession;
    public $phone;
    public $company;
    public $address;
    public $video_id;
            
    public function __construct()
    {
        $this->id = 0;
        $this->name       = 
        $this->email      =
        $this->profession =
        $this->phone      =
        $this->company    =
        $this->address    = '';
        
        $this->date_created = TimeHelper::DateTimeAdjusted();
        $this->video_id   = 0;
    }
    
    public function is_valid()
    {
        if(strlen($this->name) > 0  and
           strlen($this->email) > 0  and
           strlen($this->profession) > 0  and
           strlen($this->phone) > 0  and
           strlen($this->company) > 0  and
           strlen($this->address) > 0)
           {
            return true;
           }
        return false;
    }
}

?>
