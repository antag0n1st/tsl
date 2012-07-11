<div class="container o">
    <h3>Клиенти</h3>

    <div>
        <?php foreach ($clients as $client) : ?>
            <div style="margin:0 0 15px 0">
                <div class="clients-grid-logo">
                    <a href="<?php echo base_url() ?>admin/clients/edit_client/<?php echo $client->clients_id; ?>">
                        <img src="<?php echo base_url() ?>public/uploaded/clients/<?php echo $client->image; ?>" alt="" />
                    </a>
                </div>
                <div class="clients-grid-title">
                    <a href="<?php echo base_url() ?>admin/clients/edit_client/<?php echo $client->clients_id; ?>">
                        <?php echo $client->name; ?>
                    </a>
                </div>

                <div class="article-grid-edit-links">
                    <a href="<?php echo base_url(); ?>admin/clients/edit_client/<?php echo $client->clients_id; ?>" title="Измени">
                        <img src="<?php echo base_url() ?>public/images/edit_pencil_24_24.png" alt="" /></a>&nbsp;|&nbsp;
                    <a href="#" class="delete-link" title="Избриши" rel="<?php echo $client->clients_id; ?>"><img src="<?php echo base_url() ?>public/images/delete_red_24_24.png" alt=""  /></a>
                </div>

                <?php echo $client->clients_id; ?>

                <div class="clear separator"></div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php echo $this->pagination->create_links(); ?>
</div>
<script type="text/javascript">
    $(".delete-link").click(function(){
        
        if(window.confirm('Дали сте сигурни дека сакате да избришете?'))
        {
            var clientId = $(this).attr('rel');
            window.location = "<?php echo base_url()?>admin/clients/delete_client/" + clientId;
        }
    });
</script>