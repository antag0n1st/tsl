<?php

class MenuHelper {

    public static function echo_menu($menu_array) 
    {
        //go through each top level menu item
        foreach ($menu_array as $menu) {
            echo "<li><a href='" . base_url() . $menu->link . "'>" . $menu->text . "</a>";
            //see if this menu has children
            if (array_key_exists('children', $menu) and count($menu->children) > 0) {
                echo '<ul>';
                //echo the child menu
                self::echo_menu($menu->children);
                echo '</ul>';
            }
            echo '</li>';
        }
    }
    
    
    public static function echo_menu_admin($menu_array) 
    {
        //go through each top level menu item
        foreach ($menu_array as $menu) {
            
            echo "<li style='padding-top:10px'><div class=\"menu-grid-text\">" . str_repeat('&nbsp;&nbsp;&nbsp;',$menu->depth_level) . 
                    "<a href='" .  base_url() . 'admin/menu/edit_menu_item/' . $menu->menu_items_id . "'>"
                     . $menu->text . "</a></div>";
            echo "<div class=\"menu-grid-link\">" .
                 "<a href=\"" . base_url() . $menu->link . "\" target=\"_blank\">" .
                                base_url() . mb_substr($menu->link, 0, 100)   .
                  "</a></div>";
            
            echo '<div class="article-grid-edit-links">' .
                    '<a href="' . base_url() . 'admin/menu/edit_menu_item/' . $menu->menu_items_id . '" title="Измени">' .
                        '<img src="' . base_url() . 'public/images/edit_pencil_24_24.png" alt="" /></a>';
                    if(count($menu->children) == 0)
                    {
                        echo '&nbsp;|&nbsp;' .
                        '<a href="#" class="delete-link" title="Избриши" rel="' . $menu->menu_items_id . '">' . 
                        '<img src="'  .   base_url() . 'public/images/delete_red_24_24.png" alt=""  /></a>&nbsp;|&nbsp;';
                    }
                    if ($menu->depth_level == 0)
                    {
                        '<a href="">' .
                            '<img src="' . base_url() . 'public/images/drag_24_24.png" alt="" /></a>';
                    }
             echo '</div>';
            
            
            echo "<div class=\"clear\"></div>";
            //see if this menu has children
            if (array_key_exists('children', $menu) and count($menu->children) > 0) {
                echo '<ul>';
                //echo the child menu
                self::echo_menu_admin($menu->children);
                echo '</ul>';
            }
            echo '</li>';
        }
    }

}
?>