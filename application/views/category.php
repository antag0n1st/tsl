<div class="container o" style="margin-top: 10px;">
    <div class="left">
        <h3><?php echo $current_category->name; ?></h3>
        <div class="latest-news">
            <?php foreach ($articles as $article) : ?>
                <?php $data['article'] = $article; $this->load->view('elements/article_item_row', $data); ?>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="right">
        <?php $this->load->view('elements/sidebar'); ?>
    </div>
</div>
