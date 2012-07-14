<link rel="stylesheet" href="<?php echo base_url(); ?>public/js/jquery-ui/css/smoothness/jquery-ui-1.8.14.custom.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-ui/development-bundle/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-ui/development-bundle/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-ui/development-bundle/ui/jquery.ui.mouse.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-ui/development-bundle/ui/jquery.ui.sortable.js"></script>
<div class="container o">
    <h3>Сите линкови</h3>

    <div id="grid-sortable">

        <?php foreach ($menu_items as $menu_item): ?>
            <div id="<?php echo $menu_item->menu_items_id; ?>" name="page_<?php echo $menu_item->parent_id; ?>">


                <div class="menu-grid-text">
                    <?php echo str_repeat('&nbsp;&nbsp;&nbsp;', $menu_item->depth_level); ?>
                    <a href="<?php echo base_url(); ?>admin/menu/edit_menu_item/<?php echo $menu_item->menu_items_id; ?>" title="Измени">
                        <?php echo $menu_item->text; ?>
                    </a>
                </div>
                <div class="menu-grid-link">
                    <a href="<?php echo base_url() . $menu_item->link; ?>" target="_blank">
                        <?php echo base_url() . mb_substr($menu_item->link, 0, 100); ?>
                    </a>
                </div>
                <div class="article-grid-edit-links">
                    <a href="<?php echo base_url(); ?>admin/menu/edit_menu_item/<?php echo $menu_item->menu_items_id; ?>" title="Измени">
                        <img src="<?php echo base_url() ?>public/images/edit_pencil_24_24.png" alt="" /></a>
                    &nbsp;|&nbsp;
                    <?php if (count($menu_item->children) == 0): ?>
                        <a href="#" class="delete-link" title="Избриши" rel="<?php echo $menu_item->menu_items_id; ?>"><img src="<?php echo base_url() ?>public/images/delete_red_24_24.png" alt=""  /></a>
                    <?php else: ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php endif; ?>
                        &nbsp;|&nbsp;
                        <a href="">
                            <img src="<?php echo base_url() ?>public/images/drag_24_24.png" alt="" /></a>
                    
                </div>


                <?php echo $menu_item->menu_items_id; ?>
                <div class="clear"></div>
                <div class="separator"></div>
                
                <?php if(isset($menu_item->children) and 
                      is_array($menu_item->children) and
                      count($menu_item->children)    > 0): ?>
                <ul>    
                    <?php MenuHelper::echo_menu_admin($menu_item->children);?>
                </ul>
                <div class="clear"></div>
                <div class="separator"></div>
                
                <?php endif; ?>
            </div>

        <?php endforeach; ?>
    </div>
</div>  



</div>

<script>
    $(function() {
        $( "#grid-sortable" ).sortable({
            update: function(event, ui) {
                console.log($(this).sortable('toArray').toString());
                $.post('<?php echo base_url();?>admin/menu/update_menu_order',
                       {order:$(this).sortable('toArray').toString()},function(data){
                    //alert(data);
                });
            }
        });
        
        
    });
</script>