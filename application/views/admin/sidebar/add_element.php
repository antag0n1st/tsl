<div class="container o">    
    <div class="left">
        <h3>Додади Елемент</h3>
        <?php echo form_open('admin/sidebar/save_element', array('id' => 'submit_gallery_form')); ?>
            <fieldset>
                <label>Наслов:</label><input name="title" type="text" />
            </fieldset>
                <label>Содржина:</label>
                <textarea name="content" style="height: 400px; width: 300px;"></textarea>
            <fieldset>
                <div class="separator"></div>
                <input class="button round" type="submit" value="Зачувај" />
            </fieldset>
        <?php form_close(); ?>
    </div>
</div>
<?php $this->load->view('admin/elements/tinymce'); ?>