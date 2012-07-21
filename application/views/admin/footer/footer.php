<div class="container o">
    <h3>Footer</h3>
    <strong><?php if (isset($msg)) echo $msg; ?></strong>
    <div class="separator"></div>
     <?php echo form_open('admin/footer/edit_footer', array('id' => 'submit_footer_form')); ?>
    <div>
        <textarea name="content" id="content" style="height:450px;width:960px"><?php FieldHelper::field($page_footer->id, $page_footer->content, '')?></textarea>
    </div>    
    <div class="separator"></div>
    <input type="submit" class="round button" name="submit" value="Зачувај" />
    </form>
   
    
    
</div>
<?php $this->load->view('admin/elements/tinymce'); ?>