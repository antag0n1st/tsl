<div class="container o">

    <div class="left">
        
            <h3>Галерии</h3>
            <p><?php echo $gallery->description; ?></p>
            <br />
            <a href="<?php echo base_url().'gallery'; ?>"><- Назад</a>
         <br />
         <br />
            <div class="gallery">
                <?php foreach($photos as $photo): ?>
                <div class="photo">
                    <a href="<?php echo base_url().'public/uploaded/gallery/'.$photo->image; ?>" rel="lightbox[group]" title="<?php echo $photo->description; ?>"><img style="width: 132px;" alt="" src="<?php echo base_url().'public/uploaded/gallery/thumbnails/'. $photo->image; ?>" /></a>
                   
                </div>
                <?php endforeach; ?>                
            </div>
           

    </div>

    <div class="right">
        <?php $this->load->view('elements/sidebar'); ?>
    </div>


</div>
