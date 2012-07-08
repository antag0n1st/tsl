<div class="container o">
    <h3>Измени Галерија</h3>
    <div class="left">
    <strong><?php if (isset($msg)) echo $msg; ?></strong>
    
    <?php echo form_open('admin/gallery/submit_gallery', array('id' => 'submit_gallery_form')); ?>
        <fieldset>
            <input type="hidden" name="id_gallery" value="<?php echo $gallery->id_gallery; ?>" />
            <label>Опис:</label><textarea name="description"><?php echo $gallery->description; ?></textarea>
            <label>Група:</label>
            <select name="group">
                <?php foreach($groups as $group): ?>
                <option <?php echo ($gallery->gallery_group_id ==$group->id_gallery_group ) ? 'selected=selected': ''; ?> value="<?php echo $group->id_gallery_group; ?>"><?php echo $group->name; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Зачувај" class="button round" />
        </fieldset>
    <?php echo form_close(); ?>
     
    </div>
</div>  