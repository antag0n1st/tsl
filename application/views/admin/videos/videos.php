<div class="container o">
    <h3>Сите Видеоклипови</h3>
    
    <?php foreach($videos as $video) : ?>
    <div class="article-grid-row" style="height:100px">
        <div class="article-grid-title" style="width:300px">
            <a href="<?php echo base_url();?>admin/videos/edit_video/<?php echo $video->id; ?>" title="Измени">
                <?php echo $video->title; ?>
            </a>
        </div>
        <div class="article-grid-title">
         <a href="<?php echo base_url(); ?>videos/<?php echo $video->id . '-' . $video->slug; ?>" target="_blank">
                <?php echo base_url(); ?>videos/<?php echo $video->id . '-' . $video->slug; ?>
            </a>
        </div>
        <div class="article-grid-title" style="width:130px">
            <a href="<?php echo base_url();?>admin/videos/edit_video/<?php echo $video->id; ?>" title="Измени">
                <img src="http://img.youtube.com/vi/<?php echo Video::get_preview_image_by_embed_code($video->embed_code); ?>/2.jpg" alt="<?php echo $video->title; ?>" />;
            </a>
        </div>
        
        <div class="article-grid-edit-links">
            <a href="<?php echo base_url();?>admin/videos/edit_video/<?php echo $video->id; ?>" title="Измени">
            <img src="<?php echo base_url()?>public/images/edit_pencil_24_24.png" alt="" /></a>&nbsp;|&nbsp;
            <a href="#" class="delete-link" title="Избриши" rel="<?php echo $video->id; ?>"><img src="<?php echo base_url()?>public/images/delete_red_24_24.png" alt=""  /></a>
        </div>
        
        
         <div class="clear"></div>
    </div>
    <hr class="clear" />
    <?php endforeach; ?>
</div>
<script type="text/javascript">
    $(".delete-link").click(function(){
        
        if(window.confirm('Дали сте сигурни дека сакате да избришете?'))
        {
            var videoId = $(this).attr('rel');
            window.location = "<?php echo base_url()?>admin/videos/delete_video/" + videoId;
        }
    });
</script>