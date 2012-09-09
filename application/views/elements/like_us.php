<?php
if (isset($_COOKIE['number_of_pageviews2'])) {
    $number_of_page_views = $_COOKIE['number_of_pageviews2'];
    setcookie("number_of_pageviews2", ++$number_of_page_views, time() + (60 * 60 * 24), '/');
} else {
    
    setcookie("number_of_pageviews2", "0", time() + (60 * 60 * 24),'/');
    $number_of_page_views = 0;
}
?>

<div class="container">    
    <?php if ($number_of_page_views == 0): ?>
        <?php if(isset($popup) and $popup->is_active) : ?>
        <div id="like-us" class="great-white2" style="display: block;">
           
            
           
                    <div style="padding-top:150px">
                        <div id="close-popup" style="color:black;width:640px;margin:0 auto;text-align: right;padding-right:10px">
                            <a href="#">
                                    <img src="<?php echo base_url(); ?>public/images/close.png" alt="close" />
                            </a>
                        </div>
                                <div style="clear:both"></div>
                                
                                
                                <?php if(strlen($popup->link) > 3 ) : ?>
                                    <a href="<?php echo $popup->link ?>">
                                <?php endif; ?>
                                
                                <img src="<?php echo base_url(); ?>public/uploaded/popup/<?php echo $popup->image_url ?>" alt="popup" />
                                
                                 <?php if(strlen($popup->link) > 3 ) : ?>
                                    </a>
                                <?php endif; ?>
                    </div>
            
             
               
           
        </div>
    <?php endif; ?>
    <?php endif; ?>
</div>

<script>
        $(document).ready(function() {
            
            $('#close-popup').click(function(){
                $('#like-us').hide("slow");
            });
            
        });
</script>