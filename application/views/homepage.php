<div class="container">
    <div class="flexslider">
        <ul class="slides">
            <li>
                <img src="<?php echo base_url() . 'images/slider/experta.jpg'; ?>" />
                <p class="flex-caption">Captions and cupcakes. Winning combination.</p>
            </li>
            <li>
                <a href="#"><img src="<?php echo base_url() . 'images/slider/inacup_pumpkin.jpg'; ?>" /></a>
                <p class="flex-caption">This image is wrapped in a link!</p>
            </li>
            <li>
                <img src="<?php echo base_url() . 'images/slider/inacup_donut.jpg'; ?>" />
            </li>
            <li>
                <img src="<?php echo base_url() . 'images/slider/inacup_vanilla.jpg'; ?>" />
            </li>
        </ul>
    </div>
</div>
<div class="container o" style="margin-top: 30px;">
    
    <div class="left">
        The content of the page
    </div>
    
    <div class="right">
        <?php $this->load->view('elements/sidebar'); ?>
    </div>
    
    
</div>
<script type="text/javascript">
    $(window).load(function() {
        $('.flexslider').flexslider();
    });
</script>
