<div class="container o">
    <h3>Сите статии</h3>

    <div style="margin:20px 0px 0px 0px">    
<?php foreach($articles as $article): ?>
<div style="width:950px">
    <div style="float:left;width:120px;height:70px;overflow:hidden;">
        <img src="<?php echo base_url(); ?>public/uploaded/featured/thumbnails/<?php echo $article->featured_image; ?>" alt="" />
    </div>
    <div style="padding:0 0 0 10px;float:left;width:280px;height:70px">
        <?php echo $article->title; ?>
    </div>
    <div style="float:left;width:250px;height:70px">
        <?php echo date("d.m.Y H:i", strtotime($article->date_created) ); ?>
    </div>
    <div style="float:left;width:125px">
        <a href="#">Измени</a> | <a href="#">Избриши</a>
    </div>
    <?php echo $article->id; ?>
    <div class="clear"></div>


</div>
<hr class="clear" />
<?php endforeach; ?>
    </div>
<?php echo $this->pagination->create_links(); ?>
</div>