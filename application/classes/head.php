<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * Description of meta
 *
 * @author ubuntu
 */
class Head {
    
    private static $instance = false;
    private $data          = array();
    public  $title         = 'TSL';
    public  $description   = 'TSL Description';
    public  $keywords      = 'TSL Keywords';
    private $meta_encoding = '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
    
    
    // fb attributes
    public $fb_title;
    public $fb_description;
    public $fb_page_url;
    public $fb_image_url;
    public $fb_site_name;
    public $fb_type;
    
    public function __construct() {
        
        $this->fb_title       = "fb title";
        $this->fb_description = "fb description";
        $this->fb_page_url = base_url();
        $this->fb_image_url   = base_url() . "images/logo.jpg";
        $this->fb_site_name   = "tsgroup.mk";
        $this->fb_type        = "article";
    }
    /**
     *
     * @return Head $instance
     */
    public static function instance(){
        if(!self::$instance){
            self::$instance = new Head();
        }
        return self::$instance;
    }
    
    public function add($data){
        $this->data[] = $data;
    }
    public function reset_data(){
        $this->data = array();
    }
    
    public function load_js($js_name , $version = '1.0'){
        $this->add('<script type="text/javascript" src="'.  base_url().'public/js/'.$js_name.'.js?version='.$version.'"></script> ');        
    }
    public function load_css($css_name, $version = '1.0'){
        $this->add('<link rel="stylesheet" href="'.base_url().'public/css/'.$css_name.'.css?version='.$version.'" type="text/css" /> ');        
    }
    public function add_thumbnail_image($image_url_){
      $this->add('<link rel="image_src" href="'.$image_url_.'" />');
    }
    public function add_fb_meta_tags(){        
        array_unshift($this->data,'<meta property="og:title" content="'.$this->fb_title.'" />'); 
        array_unshift($this->data,'<meta property="og:description" content="'.$this->fb_description.'" /> '); 
        array_unshift($this->data,'<meta property="og:url" content="'.$this->fb_page_url.'" />'); 
        array_unshift($this->data,'<meta property="og:image" content="'.$this->fb_image_url.'" /> '); 
        array_unshift($this->data,'<meta property="og:site_name" content="'.$this->fb_site_name.'" />'); 
        array_unshift($this->data,'<meta property="og:type" content="'.$this->fb_type.'" />');        
    }
    
    
    
    
    
    public function display(){     
        
        $this->add_fb_meta_tags();
        
        array_unshift($this->data, '<link rel="icon"  type="image/png"     href="'.base_url().'images/favicon.png" />');
        array_unshift($this->data, '<script type="text/javascript" > var base_url = "'.base_url().'"; </script>');
        array_unshift($this->data, '<meta name="keywords" content="'.$this->keywords.'" />');
        array_unshift($this->data, '<meta name="description" content="'.$this->description.'" /> ');
        array_unshift($this->data, '<meta name="title" content="'.$this->title.'" /> ');
        array_unshift($this->data, $this->meta_encoding);
        array_unshift($this->data, '<title>'. $this->title.'</title>');        

        echo "\t\t".implode("\n\t\t", $this->data)."\n";
        
        echo "\n"; // GOOGLE ANALYTICS CODE

    }
}
/* End of file Head.php */
?>