
<div class="container o">

    <div class="left o">
        <h3>Додавање на Newsletter</h3>

        <?php echo form_open(base_url() . 'admin/newsletter/newsletter_save', array('id' => 'submit_newsletter')); ?>
        <fieldset>
            <label>Наслов:</label><input name="title" type="text" />
            <label>Порака:</label><textarea style="height: 300px;" name="content"></textarea>
            <div class="separator dashed"></div>
            <label>Изберете статија:</label>
            <div style="float: left;overflow-y: scroll; width: 585px; height:200px; margin-bottom: 20px;">
                <ul class="checkbox-statii">
                    
                    <?php $br=0; foreach($articles as $article): ?>
                    <li>
                        <input <?php echo (++$br <= 4)? 'checked="checked"' : ''; ?> name="articles[]" type="checkbox" value="<?php echo $article->id; ?>" />
                        <a href="<?php echo base_url()?>articles/<?php echo $article->id . '-' . $article->slug; ?>" target="_blank"><?php echo $article->title; ?></a>
                        
                    </li>
                    <?php endforeach; ?>
                    
                    

                </ul>
               
            </div>
            <div class="clear"></div>
            
        </fieldset>
        <input type="submit" class="button round" value="Зачувај" />
        <?php echo form_close(); ?>

    </div>


</div>
<?php $this->load->view('admin/elements/tinymce'); ?>