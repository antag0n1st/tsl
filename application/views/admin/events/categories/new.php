<div class="container o">
    <h3>Категорија на настани</h3>
    
    <div class="left">
        <strong><?php if (isset($msg)) echo $msg; ?></strong>
        <?php echo form_open('admin/events_categories/submit_event_category', array('id' => 'submit_event_category_form')); ?>
        <input type="hidden" id="id" name="id" value="<?php FieldHelper::field($event_category->id, $event_category->id, 0); ?>" />
        <label class="block">Име:</label>
        <input type="text" style="width:300px" id="name" name="name" value="<?php FieldHelper::field($event_category->id, $event_category->name, ''); ?>" />
        <div class="separator"></div>
        <label class="block">Боја (HEX код)</label>
        <input type="text" style="width:300px"  id="color" name="color" value="<?php FieldHelper::field($event_category->id, $event_category->color, '#000000'); ?>" />
        <?php if($event_category->id > 0) : ?>
        <div style="background-color:<?php echo $event_category->color; ?>;width:25px;height:25px;float:right;margin-top:3px">
        </div>
        <?php endif; ?>
        <div class="separator"></div>
        <label class="block">Име на бојата:</label>
        <input type="text" style="width:300px"  id="color_name" name="color_name" value="<?php FieldHelper::field($event_category->id, $event_category->color_name, 'crna'); ?>" />
        <div class="separator"></div>
        <input type="submit" class="button round" name="submit" value="Зачувај" />
        <?php echo form_close(); ?>
    </div>
    <div class="clear"    ></div>
        <?php if (isset($events) and count($events) > 0): ?>
        <h3>Настани во оваа категорија:</h3>
        <?php foreach ($events as $event): ?>
        <div class="article-grid-title" style="height:40px;width:490px">
            <a href="<?php echo base_url(); ?>admin/events/edit_event/<?php echo $event->calendar_events_id; ?>" title="Измени">
            <?php echo $event->title . ' (';
            FieldHelper::date_field($event->date_happen);
            echo ')'; ?>
            </a>
        </div>
         <div style="float:left;width:20px;padding:5px 0 0 0;">
                <?php echo $event->candidates_num; ?>
            </div>
            <div class="article-grid-edit-links">
                <a href="<?php echo base_url(); ?>admin/events/edit_event/<?php echo $event->calendar_events_id; ?>" title="Пријавени кандидати">
                    <img src="<?php echo base_url() ?>public/images/prijaveni_24_24.png" alt="" /></a> &nbsp;|&nbsp;
                <a href="<?php echo base_url(); ?>admin/events/edit_event/<?php echo $event->calendar_events_id; ?>" title="Измени">
                    <img src="<?php echo base_url() ?>public/images/edit_pencil_24_24.png" alt="" /></a>&nbsp;|&nbsp;
                <a href="#" class="delete-link" title="Избриши" rel="<?php echo $event->calendar_events_id . '/' . $event->event_categories_id; ?>"><img src="<?php echo base_url() ?>public/images/delete_red_24_24.png" alt=""  /></a>
            </div>
        <div class="clear"></div>
            <div class="separator"></div>
        <?php endforeach; ?>


    <?php endif; ?>
</div>


<script type="text/javascript">
    $(".delete-link").click(function(){
        
        if(window.confirm('Дали сте сигурни дека сакате да избришете?'))
        {
            var eventId = $(this).attr('rel');
            window.location = "<?php echo base_url()?>admin/events_categories/delete_event/" + eventId;
        }
    });
</script>
