<div class="container o">
    <h3>Сите слајдови</h3>
    
    <div>
        <?php foreach($slides as $slide): ?>
        <div>
            <div class="slide-grid-thumbnail">
                    <a href="<?php echo base_url();?>admin/slides/edit_slide/<?php echo $slide->slides_id; ?>">
                        <img src="<?php echo base_url(); ?>public/uploaded/slider/<?php echo $slide->image; ?>" alt="" width="240" />
                    </a>
            </div>
            <div class="slide-grid-title">
                <a href="<?php echo base_url();?>admin/slides/edit_slide/<?php echo $slide->slides_id; ?>">
                    <?php echo $slide->title; ?>
                </a>
            </div>
            <div class="article-grid-edit-links">
            <a href="<?php echo base_url();?>admin/slides/edit_slide/<?php echo $slide->slides_id; ?>" title="Измени">
            <img src="<?php echo base_url()?>public/images/edit_pencil_24_24.png" alt="" /></a>&nbsp;|&nbsp;
            <a href="#" class="delete-link" title="Избриши" rel="<?php echo $slide->slides_id; ?>"><img src="<?php echo base_url()?>public/images/delete_red_24_24.png" alt=""  /></a>
            </div>
                
                
                <?php echo $slide->slides_id; ?>
            
            
            
            <div class="clear"></div>
            <hr />
        </div>
        <?php endforeach; ?>
    </div>
</div>
<script type="text/javascript">
    $(".delete-link").click(function(){
        
        if(window.confirm('Дали сте сигурни дека сакате да избришете?'))
        {
            var eventId = $(this).attr('rel');
            window.location = "<?php echo base_url()?>admin/slides/delete_slide/" + eventId;
        }
    });
</script>