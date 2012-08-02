<div class="container o">
    <h3>Сите категории на настани</h3>
    
    <?php foreach($event_categories as $event_category): ?>
    <div>
        <div class="float-left" style="width:300px;">
            <a href="<?php echo base_url(); ?>/admin/events_categories/edit_event_category/<?php echo $event_category->id; ?>">
                <?php echo $event_category->name; ?>
            </a>
        </div>
        <div class="float-left" style="width:30px;">
            <div style="background-color:<?php echo $event_category->color;?>;width:30px;height:30px">
            </div>
        </div>
        <div class="article-grid-title">
            <?php echo $event_category->color_name; ?>
        </div>
         <div class="article-grid-edit-links">
                    <a href="<?php echo base_url(); ?>admin/articles_categories/edit_event_category/<?php echo $event_category->id; ?>" title="Измени">
                        <img src="<?php echo base_url() ?>public/images/edit_pencil_24_24.png" alt="" /></a>&nbsp;|&nbsp;
                        
                     <?php if($event_category->num_events == 0) : ?>   
                    <a href="#" class="delete-link" title="Избриши" rel="<?php echo $event_category->id; ?>"><img src="<?php echo base_url() ?>public/images/delete_red_24_24.png" alt=""  /></a>
                    <?php endif; ?>
         </div>
        
        
        <div class="clear" ></div>
        <div class="separator"></div>
    </div>
    <?php endforeach; ?>
    
</div>
