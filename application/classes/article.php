<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Article
 *
 * @author Vladimir
 */
class Article {
    public $id;
    public $title;
    public $content;
    public $description;
    public $date_created;
    public $date_published;
    public $slug;
    public $featured_image;
    public $status;
    
    public function __construct($value = '') {
        $this->id = 0;
    }
    
}

?>
