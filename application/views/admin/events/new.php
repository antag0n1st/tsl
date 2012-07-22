<link rel="stylesheet" href="<?php echo base_url(); ?>public/js/jquery-ui/css/smoothness/jquery-ui-1.8.14.custom.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-ui/development-bundle/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-ui/development-bundle/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-ui/development-bundle/ui/jquery.ui.datepicker.js"></script>


<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/jquery.ui.timepicker.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.ui.timepicker.js"></script>

<div class="container o">
    <h3>Настан</h3>
    <div class="left">
    <strong><?php if (isset($msg)) echo $msg; ?></strong>
     <?php echo form_open('admin/events/submit_event', array('id' => 'submit_event_form')); ?>
        <input type="hidden" id="calendar_events_id" name="calendar_events_id" value="<?php FieldHelper::field($event->calendar_events_id, $event->calendar_events_id, 0); ?>" />
        <div class="separator"></div>
        <label for="title">Наслов:</label>
        <input type="text" name="title" id="title" value="<?php FieldHelper::field($event->calendar_events_id, $event->title, '')?>" style="width:370px" />
        <div class="separator"></div>
            <div>                   
                <label for="calendar">Додади во календар:</label>
                <input type="text" id="add_calendar" name="calendar" style="width: 130px; cursor: pointer;" />
                <input type="text" id="time_published" readonly="true" name="time_published" style="width: 130px; cursor: pointer;" />
            </div>
            <div class="separator"></div>
            <div> 
                <label for="calendar_category">Настан:</label>
                <select name="calendar_category" style="width: 235px;" >
                <?php foreach ($event_categories as $e_category): ?>
                                        <option value="<?php echo $e_category->id; ?>" 
                                                <?php echo $e_category->id == $event->event_categories_id ? 'selected="selected"' : ''; ?>
                                                ><?php echo $e_category->name; ?></option>
                <?php endforeach; ?>
                </select>
            </div>
            <div class="separator"></div>
            <div>
                <label for="calendar_link">Линк на календарот:</label>
                <input type="text" name="calendar_link" style="width: 287px;" value="<?php FieldHelper::field($event->calendar_events_id, $event->calendar_link, 'http://tsl.mk'); ?>"  />
            </div>
            <input class="button round" type="submit" name="submit" value="Објави" />
      </form>
    </div>
</div>    
<script type="text/javascript">
    $(document).ready(function() {
          $( "#add_calendar" ).datepicker({ dateFormat: 'dd.mm.yy',
            regional: 'mk'
          });
          $( "#add_calendar" ).datepicker('setDate', <?php FieldHelper::field($event->calendar_events_id, "new Date('$event->date_happen')", "new Date()"); ?> );
        
        $( "#time_published" ).timepicker({
            showPeriodLabels: false
        });
        
        var date =  <?php FieldHelper::field($event->calendar_events_id, "new Date('$event->date_happen')", "new Date()"); ?>;
        var timePublished = date.getHours() + ":" + (date.getMinutes()); 

        $( "#time_published" ).val(timePublished);
          
          
    });
</script>    