<div class="container o">    
    <div class="left">
        <h3>Измени Елемент</h3>
        <?php echo form_open('admin/sidebar/update_element', array('id' => 'submit_gallery_form')); ?>
            <fieldset>
                <label>Наслов:</label><input name="title" type="text" value="<?php echo $element->name; ?>" />
                <label>Содржина:</label><textarea name="content" style="height: 100px; width: 300px;"><?php echo $element->content; ?></textarea>
                <div class="separator"></div>
                <input type="hidden" name="id" value="<?php echo $element->id; ?>" />
                <input class="button round" type="submit" value="Зачувај" />
            </fieldset>
        <?php form_close(); ?>
    </div>
</div>