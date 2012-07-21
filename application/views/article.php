<div class="container o" style="margin-top: 10px;">

    <div class="left">
        <?php if($article): ?>
        <div class="img-container">
            <img alt="" src="<?php echo base_url().'public/uploaded/featured/'.$article->featured_image; ?>" />
        </div>
        <br />
            <h3><?php echo $article->title; ?></h3>
            <div class="content">
                <?php echo $article->content; ?>
            </div>
            <?php
            $query = $_SERVER['QUERY_STRING'] ? '?'.$_SERVER['QUERY_STRING'] : '';
            $current_url = $this->config->site_url().$this->uri->uri_string(). $query;
            ?>
            <br />
            <a href="<?php echo base_url().'page/signup_for_training'; ?>">Контактирајте нè за дополнителни информации за изведба на обуката</a>
            <div class="separator"></div>
            <div class="social-buttons">
                <h3>Сподели ја оваа страница: </h3>
                <iframe src="//www.facebook.com/plugins/like.php?href=<?php echo urlencode($current_url); ?>&amp;send=false&amp;layout=button_count&amp;width=100&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=237839832902397" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe>
                
                <script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
                <script type="IN/Share" data-url="<?php echo $current_url; ?>" data-counter="right"></script>
                <span style="margin-right: 20px;"></span>
                <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                
            </div>
            
        <?php endif; ?>
    </div>
    

    <div class="right">
        <?php $this->load->view('elements/sidebar'); ?>
    </div>


</div>
