<link rel="stylesheet" href="<?php echo base_url(); ?>public/js/jquery-ui/css/smoothness/jquery-ui-1.8.14.custom.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-ui/development-bundle/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-ui/development-bundle/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-ui/development-bundle/ui/jquery.ui.mouse.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-ui/development-bundle/ui/jquery.ui.sortable.js"></script>
<div class="container o">
    <h3>Сите слајдови</h3>
    
    <div>
        <ul id="grid_sortable">

            
            <?php foreach ($slides as $slide): ?>
                <li id="page_<?php echo $slide->slides_id;?>" name="page_<?php echo $slide->slides_id;?>">
                    <div>
                        <div class="slide-grid-thumbnail">
                            <a href="<?php echo base_url(); ?>admin/slides/edit_slide/<?php echo $slide->slides_id; ?>">
                                <img src="<?php echo base_url(); ?>public/uploaded/slider/<?php echo $slide->image; ?>" alt="" width="240" />
                            </a>
                        </div>
                        <div class="slide-grid-title">
                            <a href="<?php echo base_url(); ?>admin/slides/edit_slide/<?php echo $slide->slides_id; ?>">
                                <?php echo $slide->title; ?>
                            </a>
                        </div>
                        <div class="article-grid-edit-links">
                            <a href="<?php echo base_url(); ?>admin/slides/edit_slide/<?php echo $slide->slides_id; ?>" title="Измени">
                                <img src="<?php echo base_url() ?>public/images/edit_pencil_24_24.png" alt="" /></a>&nbsp;|&nbsp;
                            <a href="#" class="delete-link" title="Избриши" rel="<?php echo $slide->slides_id; ?>"><img src="<?php echo base_url() ?>public/images/delete_red_24_24.png" alt=""  /></a>
                            &nbsp;|&nbsp;
                            <a href="">
                                <img src="<?php echo base_url() ?>public/images/drag_24_24.png" alt="" /></a>
                        </div>


                        <?php echo $slide->slides_id; ?>
                        
                        
                        
                        <div class="clear"></div>
                        <hr />
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<script type="text/javascript">
    
    $(document).ready(function(){
            
             $(".delete-link").click(function(){
        
                if(window.confirm('Дали сте сигурни дека сакате да избришете?'))
                {
                    var eventId = $(this).attr('rel');
                    window.location = "<?php echo base_url()?>admin/slides/delete_slide/" + eventId;
                }
             });
            
             $('#grid_sortable').sortable({
                update: function(event, ui) {
                    $.post("<?php echo base_url()?>admin/slides/update_slide_order/",
                            { pages: $('#grid_sortable').sortable('serialize') },
                            function(data){
                                       // alert(data);
                            },
                            "text"
                    );
                }
             });
            
    });
    
   
    
    
    
</script>