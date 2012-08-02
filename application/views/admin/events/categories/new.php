<div class="container o">
    <h3>Нова категорија на настани</h3>
    
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
</div>