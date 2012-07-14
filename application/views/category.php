<div class="container o" style="margin-top: 10px;">
    <div class="left">
        <h3><?php echo $current_category->name; ?></h3>
        <div class="latest-news">
            <?php foreach ($articles as $article) : ?>
                <div class="latest-news">
                    <div class="thumb">
                        <a href="<?php echo base_url() . 'articles/' . $article->id . '-' . $article->slug; ?>">
                            <img src="<?php echo base_url() . 'public/uploaded/featured/thumbnails/' . $article->featured_image; ?>" alt="" width="120px" height="60px">
                            <span class="overlay"></span>
                        </a>
                    </div> 

                    <p class="date"><?php FieldHelper::date_no_time_field($article->date_published);  ?> | </p>
                    <h4 class="title"><a href="<?php echo base_url() . 'articles/' . $article->id . '-' . $article->slug; ?>"><?php echo $article->title; ?></a></h4>
                    <p><?php echo $article->description; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="right">
        <?php $this->load->view('elements/sidebar'); ?>
    </div>
</div>
