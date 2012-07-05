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

}
?>
