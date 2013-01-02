<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of video
 *
 * @author Vladimir
 */
class Video {
    public $id;
    public $title;
    public $description;
    public $embed_code;
    public $date_created;
    public $slug;
    public $views;
    
    public function __construct()
    {
        $this->id = 0;
        $this->title       =
        $this->description =
        $this->embed_code  = "";
        $this->date_created= TimeHelper::DateTimeAdjusted();
        $this->slug = '';
        $this->views = 0;
    }
    
    public function is_valid()
    {
        return strlen($this->description) > 0 or
               strlen($this->embed_code)  > 0;
    }
    
    // size can be 0,1,2,3
    public static function get_preview_image_by_embed_code($embed_code)
    {
            $subject =  $embed_code;
            $pattern = "!http://(?:www.)?youtube.com/embed/([^\"']+)!i";
            $result = preg_match($pattern, $subject, $subpattern); 
            return $subpattern[1];
    }
    
}

?>
