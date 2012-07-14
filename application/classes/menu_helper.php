<?php
class MenuHelper{
    
    public static function echo_menu($menu_array) {
    //go through each top level menu item
    foreach($menu_array as $menu) {
        echo "<li><a href='" . base_url() . $menu->link . "'>" . $menu->text . "</a>";
        //see if this menu has children
        if(array_key_exists('children', $menu) and count($menu->children) > 0) {
            echo '<ul>';
            //echo the child menu
            self::echo_menu($menu->children);
            echo '</ul>';
        }
        echo '</li>';
    }
}
    
}


?>