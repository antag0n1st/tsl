<div class="container o">
    <h3>Сите категории</h3>
    <div>
        <?php foreach ($categories as $category) : ?>
            <div class="article-grid-row">
                <div class="article-grid-thumbnail">
                    <a href="<?php echo base_url(); ?>admin/articles_categories/edit_category/<?php echo $category->id; ?>">
                        <img src="<?php echo base_url(); ?>public/uploaded/featured/thumbnails/<?php echo $category->featured_image; ?>" alt="" width="240" />
                    </a>
                </div>
                <div class="article-grid-title">
                    <a href="<?php echo base_url(); ?>admin/articles_categories/edit_category/<?php echo $category->id; ?>">
                        <?php echo $category->name; ?>
                    </a>
                </div>
                <div class="article-grid-edit-links">
                    <a href="<?php echo base_url(); ?>admin/articles_categories/edit_category/<?php echo $category->id; ?>" title="Измени">
                        <img src="<?php echo base_url() ?>public/images/edit_pencil_24_24.png" alt="" /></a>&nbsp;|&nbsp;
                    <a href="#" class="delete-link" title="Избриши" rel="<?php echo $category->id; ?>"><img src="<?php echo base_url() ?>public/images/delete_red_24_24.png" alt=""  /></a>
                </div>
                <?php echo $category->id; ?>
                <div class="clear"></div>
                <div class="separator"></div>
            </div>
        <?php endforeach; ?>
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>
<script type="text/javascript">
    $(".delete-link").click(function(){
        
        if(window.confirm('Дали сте сигурни дека сакате да избришете?'))
        {
            var categoryId = $(this).attr('rel');
            window.location = "<?php echo base_url()?>admin/articles_categories/delete_category/" + categoryId;
        }
    });
</script>