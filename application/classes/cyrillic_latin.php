<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cyrillic2Latin
 *
 * @author Antagonist
 */
class CyrillicLatin {

    private static $macedonianFont2Cyrillic = array(
        "" => "" ,

    );

    private static $chars_map = array(

        "ѓ" => "gj" ,
        "ж" => "zh" ,
        "ѕ" => "dz" ,
        "љ" => "lj" ,
        "њ" => "nj" ,
         "ќ" => "kj" ,
        "ч" => "ch" ,
        "џ" => "dj" ,
        "ш" => "sh" ,
        "Ѓ" => "Gj" ,
        "Ж" => "Zh" ,
        "S" => "Dz" ,
        "Љ" => "Lj" ,
         "Њ" => "Nj" ,
        "Ќ" => "Kj" ,
        "Ч" => "Ch" ,
        "Џ" => "Dj" ,
        "Ш" => "Sh" ,

        "а" => "a" ,
        "б" => "b" ,
        "в" => "v" ,
        "г" => "g" ,
        "д" => "d" ,
        
        "е" => "e" ,
        
        "з" => "z" ,
        
        "и" => "i" ,
        "ј" => "j" ,
        "к" => "k" ,
        "л" => "l" ,
        
        "м" => "m" ,
        "н" => "n" ,
        
        "о" => "o" ,
        "п" => "p" ,
        "р" => "r" ,
        "с" => "s" ,
        "т" => "t" ,
       
        "у" => "u" ,
        "ф" => "f" ,
        "х" => "h" ,
        "ц" => "c" ,
        
        
        
        "А" => "A" ,
        "Б" => "B" ,
        "В" => "V" ,
        "Г" => "G" ,
        "Д" => "D" ,
        
        "Е" => "E" ,
        
        "З" => "Z" ,
        
        "И" => "I" ,
        "Ј" => "J" ,
        "К" => "K" ,
        "Л" => "L" ,
        
        "М" => "M" ,
        "Н" => "N" ,
       
        "О" => "O" ,
        "П" => "P" ,
        "Р" => "R" ,
        "С" => "S" ,
        "Т" => "T" ,
        
        "У" => "U" ,
        "Ф" => "F" ,
        "Х" => "H" ,
        "Ц" => "C" );

    public function __construct() {

    }



  public static function cyrillic2latin($str){

        
     
        foreach(self::$chars_map as $key => $value){

            
            $str = str_replace($key, $value, $str);

        }
        return $str;
    }

     public static  function latin2cyrillic($str){


        foreach(self::$chars_map as $key => $value){


            $str = str_replace($value,$key, $str);

        }
        return $str;
    }
    
    public static function sanitize($urlPart)
    {
        $urlPart = mb_strtolower($urlPart, 'UTF-8');

        $urlPart = str_replace(array("&quot;","!","#","~","@","$","%","^","&","*","(",")","_","+","=",
                          "{","}","|","\\","/",":",";","'","\"","<",">","?",
                          ",",".","`","’","–","È", "ä"), "", $urlPart);

        $urlPart = str_replace("-"," ",$urlPart);
        
        return $urlPart;
    }
    
    
    public static function seo_friendly($urlPart)
    {
        $urlPart = strip_tags($urlPart);
        $urlPart = str_replace("\\n", "", $urlPart);
        $urlPart = str_replace("\\r", "", $urlPart);
        

        $urlPart = self::cyrillic2latin($urlPart);


        $end = 70;
            
            while ($end < strlen($urlPart) and $end < 100 and $urlPart{$end} != " ")
            {
                $end = $end + 1;
            }
            if($end + 1 < strlen($urlPart))
                $end = $end + 1;
            $urlPart = substr($urlPart,0,strlen($urlPart) - 1 - (strlen($urlPart) - $end));

        

       

        $urlPart = strtolower($urlPart);

        $urlPart = str_replace(array("&quot;","!","#","~","@","$","%","^","&","*","(",")","_","+","=",
                          "{","}","|","\\","/",":",";","'","\"","<",">","?",
                          ",",".","`","’","–","È", "ä"), "", $urlPart);

        $urlPart = str_replace("-"," ",$urlPart);
        
        $parts = explode(" ", $urlPart);

        $resultParts = array();

        foreach($parts as $part)
        {
            if( strlen($part) > 0 )
            {
                $part =  preg_replace("/[^a-zA-Z0-9\s]/", "", $part);
                $part = str_replace("-","",$part);
                array_push($resultParts, $part);
            }
        }
        
        return implode("-",$resultParts);
    }
    
    
    
      /**
    * A substitution of str_split working with not only ASCII strings.
    * @param String $string
    * @return Array
    */
    protected static function mb_str_to_array($string){
       mb_internal_encoding("UTF-8"); // Important
       $chars = array();
       for ($i = 0; $i < mb_strlen($string); $i++ ) {
            $chars[] = mb_substr($string, $i, 1);
       }
       return $chars;
    }
    
    
       /**
    * Checks whether a string contains only characters specified in the gama.
    * @param String $string
    * @param String $gama
    * @return boolean
    */
    protected static function str_contains_only($string,$gama){
        $chars = self::mb_str_to_array($string);
        $gama = self::mb_str_to_array($gama);
        foreach($chars as $char) {
            if(in_array($char, $gama)==false)return false;
        }
        return true;
    }
    
    public static function is_cyrilic($str)
    {
        return !self::is_latin($str);
        
        
      /*  $lower_case = "абвгдѓежзѕијклљмнњопрстќуфхцџчш";
        $upper_case = strtoupper($lower_case);
        $numbers = "0123456789";
        $special = "!@#$%^&*()_-=+{}[]'.;:?"; // Define special chars
        $space  = " ";
        $allowed = $lower_case.$upper_case.$numbers.$special.$space;

        if (self::str_contains_only($str, $allowed) == true) {
            return true;
        }
        return false;*/
    }
    
    public static function is_latin($str)
    {
       if(strlen($str) == mb_strlen($str,'UTF-8'))
       {
           return true;
       }
       return false;
        
       /* $lower_case = "abcdefghijklmnopqrstuvwxyz";
        $upper_case = strtoupper($lower_case);
        $numbers = "0123456789";
        $dashes = "_-";
        $space  = " ";
        $allowed = $lower_case.$upper_case.$numbers.$dashes.$space;
        if (self::str_contains_only($str, $allowed) == true) {
            return true;
        }
        return false;*/
    }
    
    
    
}
?>
