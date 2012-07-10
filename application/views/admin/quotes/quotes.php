<div class="container o">
    <h3>
        Цитати
    </h3>
    <?php foreach ($quotes as $quote): ?>
        <div class="quote-grid-description">
            <a href="<?php echo base_url(); ?>admin/quotes/edit_quote/<?php echo $quote->quotes_id; ?>" title="Измени">
                <?php echo mb_strcut($quote->description, 0, 150); ?>
            </a>
        </div>
        <div class="quote-grid-author">
            <?php echo $quote->author; ?>
        </div>
        <div class="article-grid-edit-links">
            <a href="<?php echo base_url(); ?>admin/quotes/edit_quote/<?php echo $quote->quotes_id; ?>" title="Измени">
                <img src="<?php echo base_url() ?>public/images/edit_pencil_24_24.png" alt="" /></a>&nbsp;|&nbsp;
            <a href="#" class="delete-link" title="Избриши" rel="<?php echo $quote->quotes_id; ?>"><img src="<?php echo base_url() ?>public/images/delete_red_24_24.png" alt=""  /></a>
        </div>
        <?php echo $quote->quotes_id; ?>
        <div class="clear"></div>


        <hr />
    <?php endforeach; ?>
    <?php echo $this->pagination->create_links(); ?>
</div>

<script type="text/javascript">
    $(".delete-link").click(function(){
        
        if(window.confirm('Дали сте сигурни дека сакате да избришете?'))
        {
            var eventId = $(this).attr('rel');
            window.location = "<?php echo base_url()?>admin/quotes/delete_quote/" + eventId;
        }
    });
</script>