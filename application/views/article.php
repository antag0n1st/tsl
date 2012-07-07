<div class="container o" style="margin-top: 10px;">

    <div class="left">
        <div class="img-container">
            <img alt="" src="<?php echo base_url().'public/uploaded/featured/'.$article->featured_image; ?>" />
        </div>
        <br />
            <h3><?php echo $article->title; ?></h3>
            <div class="content">
                <?php echo $article->content; ?>
            </div>
            
    </div>

    <div class="right">
        <?php $this->load->view('elements/sidebar'); ?>
    </div>


</div>
