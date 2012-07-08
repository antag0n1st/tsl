<div class="container">
    <div class="flexslider">
        <ul class="slides">
            <?php foreach($slides as $slide): ?>
            <li>
                <img src="<?php echo base_url() . 'public/uploaded/slider/'.$slide->image; ?>" />
           
                <div class="flex-caption">
                    <h2 style=""><?php echo $slide->title; ?></h2>
                    <p>
                        <?php echo $slide->description; ?>
                    </p>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<script type="text/javascript">
    $(window).load(function() {
        $('.flexslider').flexslider();
    });
</script>