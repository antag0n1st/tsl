<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * Description of meta
 *
 * @author ubuntu
 */
class Head {
    
    private static $instance = false;
    private $data          = array();
    public  $title         = 'Bagatela.mk -   сите попусти на едно место';
    public  $description   = 'Bagatela -  пронајдете ги сите попусти во Македонија од едно место. Bagatela ги собира сите групни попусти. Bagatela е агрегатор на групни попусти:Групер,Колектива,Купуваме,Во Скопје,Грабни Попуст';
    public  $keywords      = 'Bagatela,Багатела,попуст,групен,агрегатор,Македонија,евтино,ефтино,50%,попусти,popusti,grupen,makedonija,evtino,agregator,grupni,Групер,Колектива,Купуваме,Во Скопје,Грабни Попуст,Gropuer,Kolektiva,Kupuvame,Vo Skopje,GrabniPopust';
    private $meta_encoding = '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
    
    public function __construct() {
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
    public function add_fb_meta_tags($title,$description,$page_url,$image_url,$site_name = '' , $type = ''){        
        array_unshift($this->data,'<meta property="og:title" content="'.$title.'" />'); 
        array_unshift($this->data,'<meta property="og:description" content="'.$description.'" /> '); 
        array_unshift($this->data,'<meta property="og:url" content="'.$page_url.'" />'); 
        array_unshift($this->data,'<meta property="og:image" content="'.$image_url.'" /> '); 
        array_unshift($this->data,'<meta property="og:site_name" content="'.$site_name.'" />'); 
        array_unshift($this->data,'<meta property="og:type" content="'.$type.'" />');        
    }
    
    
    
    
    
    public function display(){     
        
        $this->add_fb_meta_tags("Bagatela.mk - кога штедите пари, заштедете и време",
                                "Пронајдете ги сите попусти во Македонија. Агрегатор на попусти",
                                base_url(),
                                base_url() . "images/bagatela-mk-logo-2.jpg",
                                "Bagatela.mk",
                                "article"
                );
        
        array_unshift($this->data, '<link rel="icon"  type="image/png"     href="'.base_url().'images/favicon.png" />');
        array_unshift($this->data, '<script type="text/javascript" > var base_url = "'.base_url().'"; </script>');
        array_unshift($this->data, '<meta name="keywords" content="'.$this->keywords.'" />');
        array_unshift($this->data, '<meta name="description" content="'.$this->description.'" /> ');
        array_unshift($this->data, '<meta name="title" content="'.$this->title.'" /> ');
        array_unshift($this->data, $this->meta_encoding);
        array_unshift($this->data, '<title>'. $this->title.'</title>');        

        echo "\t\t".implode("\n\t\t", $this->data)."\n";
        
        echo "\n<script type=\"text/javascript\">
//<![CDATA[
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-22864825-1']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
//]]>
</script>";

    }
}
/* End of file Head.php */
?>