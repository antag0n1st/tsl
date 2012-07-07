<div class="container o">
    <h3>Сите статии</h3>

    <div style="margin:20px 0px 0px 0px">    
<?php foreach($articles as $article): ?>
<div style="width:950px">
    <div style="float:left;width:240px;height:100px;overflow:hidden;">
        <a href="<?php echo base_url();?>admin/articles/edit_article/<?php echo $article->id; ?>">
            <img src="<?php echo base_url(); ?>public/uploaded/featured/thumbnails/<?php echo $article->featured_image; ?>" alt="" width="240" />
        </a>
    </div>
    <div style="padding:0 0 0 10px;float:left;width:350px;height:70px">
        <a href="<?php echo base_url();?>admin/articles/edit_article/<?php echo $article->id; ?>">
            <?php echo $article->title; ?>
        </a>
    </div>
    <div style="float:left;width:120px;height:70px">
        <?php echo date("d.m.Y H:i", strtotime($article->date_published) ); ?>
    </div>
    <div style="float:left;width:80px;height:70px">
        <?php FieldHelper::status_field($article->status); ?>
    </div>
    <div style="float:left;width:125px">
        <a href="<?php echo base_url();?>admin/articles/edit_article/<?php echo $article->id; ?>">Измени</a> | <a href="#">Избриши</a>
    </div>
    <?php echo $article->id; ?>
    <div class="clear"></div>


</div>
<hr class="clear" />
<?php endforeach; ?>
    </div>
<?php echo $this->pagination->create_links(); ?>
</div>