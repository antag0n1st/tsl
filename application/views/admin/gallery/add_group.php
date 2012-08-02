<div class="container o">
    <h3>Додавање на Група</h3>
    <div class="left">
    <strong><?php if (isset($msg)) echo $msg; ?></strong>
    
    <?php echo form_open('admin/gallery/add_group', array('id' => 'submit_form')); ?>
        <fieldset>
            <label>Наслов:</label><input type="text" name="title" value="<?php echo isset($title) ? $title : ''; ?>" />
            <input type="hidden" value="<?php echo isset($id) ? $id : '';  ?>" name="id" />
            <div class="separator"></div>
            <input type="submit" value="Зачувај" class="button round" />
        </fieldset>
    <?php echo form_close(); ?>
     
    </div>
</div>  