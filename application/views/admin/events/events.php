<div class="container o">
    <h3>Сите настани</h3>
    
    <div>
        <?php foreach($events as $event): ?>
        <div>
            <div style="float:left;width:450px">
                <a href="<?php echo base_url();?>admin/events/edit_event/<?php echo $event->calendar_events_id; ?>" title="Измени">
                    <?php echo $event->title . ' ('; FieldHelper::date_field($event->date_happen); echo ')'; ?>
                </a>
            </div>
            <div style="float:left;width:350px">
                <?php echo $event->calendar_link; ?>
            </div>
            <div style="float:left;width:20px;padding:5px 0 0 0;">
                <?php echo $event->candidates_num; ?>
            </div>
            <div class="article-grid-edit-links">
            <a href="<?php echo base_url();?>admin/events/edit_event/<?php echo $event->calendar_events_id; ?>" title="Пријавени кандидати">
            <img src="<?php echo base_url()?>public/images/prijaveni_24_24.png" alt="" /></a> &nbsp;|&nbsp;
            <a href="<?php echo base_url();?>admin/events/edit_event/<?php echo $event->calendar_events_id; ?>" title="Измени">
            <img src="<?php echo base_url()?>public/images/edit_pencil_24_24.png" alt="" /></a>&nbsp;|&nbsp;
            <a href="#" class="delete-link" title="Избриши" rel="<?php echo $event->calendar_events_id; ?>"><img src="<?php echo base_url()?>public/images/delete_red_24_24.png" alt=""  /></a>
            </div>

            <?php // echo $event->calendar_events_id; ?><br />
            <div class="clear"></div>
            <hr />
        </div>
        
        <?php endforeach;?>
        
    </div>
    <?php echo $this->pagination->create_links(); ?>
</div>    

<script type="text/javascript">
    $(".delete-link").click(function(){
        
        if(window.confirm('Дали сте сигурни дека сакате да избришете?'))
        {
            var eventId = $(this).attr('rel');
            window.location = "<?php echo base_url()?>admin/events/delete_event/" + eventId;
        }
    });
</script>