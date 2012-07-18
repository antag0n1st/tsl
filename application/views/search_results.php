<div class="container o" style="margin-top: 10px;">
    <div class="left">
        <h3><?php echo count($articles); ?> резултат<?php echo (count($articles) != 1 ? 'и' : ''); ?> од пребарувањето: <?php echo htmlspecialchars($search); ?></h3>
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
