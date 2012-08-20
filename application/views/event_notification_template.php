Почитувани,<br />

Ве известуваме дека <strong><?php echo $name; ?></strong> се пријави за настанот <strong>„<?php echo $event->title; ?>“</strong>.<br />

За преглед на деталите за настанот кликнете на следниов линк:<br />

<a href="<?php echo base_url();?>admin/events/edit_event/<?php echo $event->calendar_events_id; ?>">
    <?php echo $event->title; ?>
</a>
   
   