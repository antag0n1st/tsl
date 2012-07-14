<?php

class FieldHelper{
    // checks if an $id is set, and if it is displays the $value_exists, 
    // otherwise displays $value_not_exists
    public static function field($id, $value_exists, $value_not_exists)
    {
        if(is_numeric($id) and $id != 0)
        {
            echo $value_exists;
        }
        else
        {
            echo $value_not_exists;
        }
    }
    
    public static function status_field($status){
        if($status == 1)
            echo "Објавен";
        else if ($status == 2){
            echo "Необјавен";
        }
        
    }
    
    public static function date_field($date)
    {
        echo date("d.m.Y H:i", strtotime($date) );
    }
    
    public static function date_no_time_field($date)
    {
        echo date("d.m.Y", strtotime($date) );
    }

}
?>
