<?php $this->load->view('elements/slidebar'); ?>
<div class="container o" style="margin-top: 30px;">

    <div class="left">
     
            <h3>Најнови вести</h3>
            
            <?php foreach($latest_news as $news): ?>
           <div class="latest-news">
                <div class="thumb">
                    <a href="#">
                        <img src="<?php echo base_url().'public/uploaded/featured/thumbnails/'.$news->featured_image; ?>" alt="" width="120px" height="60px">
                        <span class="overlay"></span>
                    </a>
                </div> 

                <p class="date"><?php echo $news->date_published; ?> | </p>
                <h4 class="title"><a href="#"><?php echo $news->title; ?></a></h4>
                <p><?php echo $news->description; ?></p>
            </div>
            <?php endforeach; ?>
            
            <h3>Наша мисија</h3>
            <p>
                SEPTEMBER 4, 2012 | Neque porro quisquam est qui
Sed ut perspiciatis unde omnis iste nSed tempor lectus in risus. Nullam vestibulum, odio ac pulvinaratus error sit voluSed tempor lectus in risus. Nullam vestibulum, odio ac pulvinarptatem accusantium doloremque laudantium, totam rem...
 AUGUST 5, 2012 | Nam libero tempore, cum soluta nobis
Nam libero tempore, cum soluta nobis estSed tempor lectus in risus. Nullam vestibulum, odio ac pulvinar eligendi Sed tempor lectus in risus. Nullam vestibulum, odio ac pulvinaroptio cumque nihil impedit quo minus id quod maxime placeat...
 SEPTEMBER 4, 2012 | Neque porro quisquam est qui
Sed ut perspiciatis unde omnis iste nSed tempor lectus in risus. Nullam vestibulum, odio ac pulvinaratus error sit voluSed tempor lectus in risus. Nullam vestibulum, odio ac pulvinarptatem accusantium doloremque laudantium, totam rem..
            </p>

    </div>

    <div class="right">
        <?php $this->load->view('elements/sidebar'); ?>
    </div>


</div>
