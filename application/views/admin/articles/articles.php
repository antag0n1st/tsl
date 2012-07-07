<div class="container o">
    <h3>Сите статии</h3>

    <div class="article-grid-holder">    
<?php foreach($articles as $article): ?>
<div class="article-grid-row">
    <div class="article-grid-thumbnail">
        <a href="<?php echo base_url();?>admin/articles/edit_article/<?php echo $article->id; ?>">
            <img src="<?php echo base_url(); ?>public/uploaded/featured/thumbnails/<?php echo $article->featured_image; ?>" alt="" width="240" />
        </a>
    </div>
    <div class="article-grid-title">
        <a href="<?php echo base_url();?>admin/articles/edit_article/<?php echo $article->id; ?>">
            <?php echo $article->title; ?>
        </a>
    </div>
    <div class="article-grid-date">
        <?php echo date("d.m.Y H:i", strtotime($article->date_published) ); ?>
    </div>
    <div class="article-grid-status">
        <?php FieldHelper::status_field($article->status); ?>
    </div>
    <div class="article-grid-edit-links">
        <a href="<?php echo base_url();?>admin/articles/edit_article/<?php echo $article->id; ?>" title="Измени">
        <img src="<?php echo base_url()?>public/images/edit_pencil_24_24.png" alt="" /></a>&nbsp;|&nbsp;
        <a href="#" class="delete-link" title="Избриши" rel="<?php echo $article->id; ?>"><img src="<?php echo base_url()?>public/images/delete_red_24_24.png" alt=""  /></a>
    </div>
    <?php echo $article->id; ?>
    <div class="clear"></div>


</div>
<hr class="clear" />
<?php endforeach; ?>
    </div>
<?php echo $this->pagination->create_links(); ?>
</div>

<script type="text/javascript">
    $(".delete-link").click(function(){
        
        if(window.confirm('Дали сте сигурни дека сакате да избришете?'))
        {
            var articleId = $(this).attr('rel');
            window.location = "<?php echo base_url()?>admin/articles/delete_article/" + articleId;
        }
    });
</script>