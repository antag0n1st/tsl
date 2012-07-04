<div class="container">
    <div class="flexslider">
        <ul class="slides">
            <li>
                <img src="<?php echo base_url() . 'images/slider/slider1.jpg'; ?>" />
                <p class="flex-caption">Captions and cupcakes. Winning combination.</p>
            </li>
            <li>
                <a href="#"><img src="<?php echo base_url() . 'images/slider/slider2.jpg'; ?>" /></a>
                <p class="flex-caption">This image is wrapped in a link!</p>
            </li>
            <li>
                <img src="<?php echo base_url() . 'images/slider/slider3.jpg'; ?>" />
                <p class="flex-caption">This image is wrapped in a link!</p>
            </li>
            <li>
                <img src="<?php echo base_url() . 'images/slider/slider4.jpg'; ?>" />
                <p class="flex-caption">This image is wrapped in a link!</p>
            </li>
        </ul>
    </div>
</div>

<script type="text/javascript">
    $(window).load(function() {
        $('.flexslider').flexslider();
    });
</script>