<div class="container o">
    <h3>Додавање на Фотографии</h3>
    <div class="left">
    <strong><?php if (isset($msg)) echo $msg; ?></strong>
    
    <?php echo form_open('admin/gallery/submit_photos', array('id' => 'submit_gallery_form')); ?>
        <fieldset>
            <input type="hidden" name="gallery_id" value="<?php echo $gallery_id; ?>" />
            <label>Слика:</label><input type="file" /> <input type="button" class="button round" value="Испрати" />
            <label>Опис:</label><textarea name="description"></textarea>
            <input type="submit" value="Зачувај" class="button round" />
        </fieldset>
    <?php echo form_close(); ?>
     
    </div>
</div>  