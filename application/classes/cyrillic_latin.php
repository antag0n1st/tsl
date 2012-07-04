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

    private static $cyrillic2latin = array(

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
        "Ѕ" => "Dz" ,
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
        "Ц" => "C" ,
        



    );

    public function __construct() {

    }



  public static function cyrillic2latin($str){

        
     
        foreach(self::$cyrillic2latin as $key => $value){

            
            $str = str_replace($key, $value, $str);

        }
        return $str;
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
    
    
}
?>
