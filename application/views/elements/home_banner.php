<?php if (isset($home_banner) and $home_banner->is_active) : ?>
    <div class="separator"></div>
    <a href="<?php echo $home_banner->link; ?>" target="_blank"><img src="<?php echo base_url(); ?>public/uploaded/home_banner/<?php echo $home_banner->image; ?>" alt="<?php htmlentities($home_banner->title); ?>" /></a>
    <div class="separator"></div>
<?php endif; ?>