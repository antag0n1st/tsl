<div class="container o">
    <h3>Додавање на Галерија</h3>
    <div class="left">
    <strong><?php if (isset($msg)) echo $msg; ?></strong>
    
    <?php echo form_open('admin/gallery/submit_gallery', array('id' => 'submit_gallery_form')); ?>
        <fieldset>
            <label>Опис:</label><textarea name="description"></textarea>
            <div class="separator"></div>
            <label class="block">Група:</label>
            <select name="group">
                <?php foreach($groups as $group): ?>
                <option value="<?php echo $group->id_gallery_group; ?>"><?php echo $group->name; ?></option>
                <?php endforeach; ?>
            </select>
            <div class="separator"></div>
            <input type="submit" value="Зачувај" class="button round" />
        </fieldset>
    <?php echo form_close(); ?>
     
    </div>
</div>  