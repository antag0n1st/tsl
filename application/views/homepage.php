<?php $this->load->view('elements/slidebar'); ?>
<div class="container o" style="margin-top: 30px;">

    <div class="left">
     
            <h3>Најнови вести</h3>
            
            <?php foreach($latest_news as $news): ?>
           <div class="latest-news">
                <div class="thumb">
                    <a href="<?php echo base_url().'articles/'.$news->id . '-' . $news->slug; ?>">
                        <img src="<?php echo base_url().'public/uploaded/featured/thumbnails/'.$news->featured_image; ?>" alt="" width="120px" height="60px">
                        <span class="overlay"></span>
                    </a>
                </div> 

                <p class="date"><?php echo $news->d; ?> | </p>
                <h4 class="title"><a href="<?php echo base_url().'articles/'.$news->id . '-' . $news->slug; ?>"><?php echo $news->title; ?></a></h4>
                <p><?php echo $news->description; ?></p>
            </div>
            <?php endforeach; ?>
            <div class="separator"></div>
            <h3>Наши Клиенти</h3>
            
            <?php $this->load->view('elements/clients_rotarot'); ?>
            
            

    </div>

    <div class="right">
        <?php $this->load->view('elements/sidebar'); ?>
    </div>


</div>
