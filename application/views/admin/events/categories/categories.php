<div class="container o">
    <h3>Сите категории на настани</h3>
    
    <?php foreach($event_categories as $event_category): ?>
    <div>
        <div class="float-left" style="width:400px;">
            <a href="<?php echo base_url(); ?>/admin/events_categories/edit_event_category/<?php echo $event_category->id; ?>">
                <?php echo $event_category->name; ?>
            </a>
        </div>
        <div class="float-left" style="width:30px;">
            <div style="background-color:<?php echo $event_category->color;?>;width:30px;height:30px">
            </div>
        </div>
        <div class="article-grid-title" style="width:240px">
            <?php echo $event_category->color_name; ?>
        </div>
         <div class="article-grid-edit-links">
                    <a href="<?php echo base_url(); ?>/admin/events_categories/edit_event_category/<?php echo $event_category->id; ?>">
                        <img src="<?php echo base_url() ?>public/images/edit_pencil_24_24.png" alt="" /></a>&nbsp;|&nbsp;
                        
                     <?php if($event_category->num_events == 0) : ?>   
                        <a href="#" class="delete-link" title="Избриши" rel="<?php echo $event_category->id; ?>"><img src="<?php echo base_url() ?>public/images/delete_red_24_24.png" alt=""  /></a>
                    <?php else: ?>
                        <div style="width:50px;float:right;margin-right:30px">
                            <p title="Број на настани во оваа категорија">
                                <?php echo $event_category->num_events; ?> 
                               <a href="<?php echo base_url(); ?>/admin/events_categories/edit_event_category/<?php echo $event_category->id; ?>">
                                    <img src="<?php echo base_url(); ?>/public/images/event_icon_24_24.png" align="middle" alt="" />
                                </a>
                            </p>
                            
                        </div>
                        
                        
                        
                        
                    <?php endif; ?>
         </div>
        
        
        <div class="clear" ></div>
        <div class="separator"></div>
    </div>
    <?php endforeach; ?>
    
</div>
<script type="text/javascript">
    $(".delete-link").click(function(){
        
        if(window.confirm('Дали сте сигурни дека сакате да избришете?'))
        {
            var eventId = $(this).attr('rel');
            window.location = "<?php echo base_url()?>admin/events_categories/delete_events_categories/" + eventId;
        }
    });
</script>
