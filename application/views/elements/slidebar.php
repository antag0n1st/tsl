<div class="container">
    <div class="flexslider">
        <ul class="slides">
            <li>
                <img src="<?php echo base_url() . 'images/slider/slider1.jpg'; ?>" />
           
                <div class="flex-caption">
                    <h2 style="">Добре дојдовте</h2>
                    

                    <p>      Можете да се надевате на успех, a можете и да 
                        се обучите за успех.</p>
                    
                    <p>
                        Triple S Learning - брзи, интезивни тренинг 
                    програми дизајнирани за Вашиот успех...</p>
                

                </div>
            </li>
            <li>
                <a href="#"><img src="<?php echo base_url() . 'images/slider/slider2.jpg'; ?>" /></a>
                <div class="flex-caption">This image is wrapped in a link!</div>
            </li>
            <li>
                <img src="<?php echo base_url() . 'images/slider/slider3.jpg'; ?>" />
                <div class="flex-caption">This image is wrapped in a link!</div>
            </li>
            <li>
                <img src="<?php echo base_url() . 'images/slider/slider4.jpg'; ?>" />
                <div class="flex-caption">This image is wrapped in a link!</div>
            </li>
        </ul>
    </div>
</div>

<script type="text/javascript">
    $(window).load(function() {
        $('.flexslider').flexslider();
    });
</script>