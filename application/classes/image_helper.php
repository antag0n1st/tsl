<?php

class ImageHelper {

    private $ci;
    private $base_dir;
    
    
    public static function get_image_dir()
    {
        return 'public/uploaded/featured/thumbnails/';
    }
    
    public static function get_thumbnails_dir()
    {
        return self::get_image_dir() . 'thumbnails/';
    }
    
    
    function __construct($base_dir = 'public/uploaded/featured/') {
        $this->ci = & get_instance();
        $this->base_dir = $base_dir;
    }
    
    public function get_remote_image($image_url){        
        $image_parts = $this->get_image_parts($image_url);        
        $image_data = file_get_contents($image_url);
        $handle = fopen($this->base_dir.$image_parts['full_name'], 'w+');
        fwrite($handle, $image_data);
        fclose($handle);
        return $this->base_dir.$image_parts['full_name'];
    }
    
    public function get_image_parts($image_url){    
           $image_name = explode("/", $image_url);
           $image_name = end($image_name);
           $parts = explode('.', $image_name);           
           return array(
               'full_name' => $image_name              
               ,'extension' => end($parts)
               ,'name' => implode('.', $parts)
           );           
    }

    public function save_image($image_url, $title = '',$new_width = 200,$new_height = 126,$thumbnail_width = 79 ,$thumbnail_height = 50) {


        $image_parts = $this->get_image_parts($image_url);        
        
        $new_image_name = $title; 
        
        
        
       

        $image_name = explode("/", $image_url);
        $image_name = end($image_name);

        $saved_image = $this->get_remote_image($image_url);

        list($width, $height, $type, $attr) = getimagesize($saved_image);
        $aspekt_ratio = $new_width / $new_height;

        $config = array();
        $config['image_library'] = 'gd2';
        $config['source_image'] = $saved_image;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['new_image'] = $this->base_dir . $new_image_name;
        $config['thumb_marker'] = '';

        
        if ($width / $height < $aspekt_ratio) {
            $is_wide = 0;
            $config['width'] = $new_width;
            $config['height'] =  ( $height * $new_width ) / $width ;
        } else {
            $is_wide = 1;
            $config['height'] = $new_height;
            $config['width'] = ($width / $height) * $new_height;
        }

        $this->ci->load->library('image_lib');
        $this->ci->image_lib->initialize($config);
        $this->ci->image_lib->resize();
        
        
        
        
        
        $new_height = $thumbnail_height;
        $new_width  = $thumbnail_width;
        if ($width / $height < $aspekt_ratio) {
            $is_wide = 0;
            $config['width'] = $new_width;
            $config['height'] =  ( $height * $new_width ) / $width ;
        } else {
            $is_wide = 1;
            $config['height'] = $new_height;
            $config['width'] = ($width / $height) * $new_height;
        }
        $config['new_image'] = $this->base_dir .'thumbnails/'. $new_image_name;
        $this->ci->image_lib->initialize($config);
        $this->ci->image_lib->resize();

        //unlink($saved_image);
        
        return array(
            'new_image_name' => $new_image_name
            , 'is_wide' => $is_wide
        );
    }

    private function sutable_name($title) {

        $title = $this->clean_string($title,true);
        $title = explode('-', $title);
        return implode('-', array_slice($title, 0, 10));
    }

    private function clean_string($str, $cirilic = true) {

        if ($cirilic) {
            //$str = CyrillicLatin::cyrillic2latin($str);
        }
        //$str = str_replace('-', ' ', $str);
        $str = str_replace(array("\r\n", "\r", "\n", "\t", '-'), '_', $str);
        $str = preg_replace('/[^a-zA-Z0-9-\s]/', '_', $str);

        $str = trim($str);
        $str = strtolower($str);
        $str = preg_replace('!\s+!', ' ', $str);
        return str_replace(' ', '-', $str);
    }

}

?>
