<div class="container o" style="margin-top: 10px;">
    <div class="left">
        <div class="img-container">
            <img alt="" src="<?php echo base_url().'public/uploaded/featured/'.$current_category->featured_image; ?>" />
        </div>
        <br />
        <h3><?php echo $current_category->name; ?></h3>
        <div class="latest-news">
            <?php foreach ($articles as $article) : ?>
                <?php $data['article'] = $article; $this->load->view('elements/article_item_row', $data); ?>
            <?php endforeach; ?>
        </div>
        <?php echo $this->pagination->create_links(); ?>
    </div>
    <div class="right">
        <?php $this->load->view('elements/sidebar'); ?>
    </div>
</div>
