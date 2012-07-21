
<div class="container o">

    <div class="left o">
        <h3>Додавање на Newsletter</h3>

        <?php echo form_open(base_url() . 'admin/newsletter/newsletter_save', array('id' => 'submit_newsletter')); ?>
        <fieldset>
            <label>Наслов:</label><input name="title" type="text" />
            <label>Порака:</label><textarea style="height: 300px;" name="content"></textarea>
            <div class="separator dashed"></div>
            <label>Изберете статија:</label>
            <div style="float: left;overflow: hidden; width: 450px; margin-bottom: 20px;">
                <ul class="checkbox-statii">
                    
                    <?php $br=0; foreach($articles as $article): ?>
                    <li>
                        <a href="#" target="_blank"><?php echo $article->title; ?></a>
                        <input <?php echo (++$br <= 4)? 'checked="checked"' : ''; ?> name="articles[]" type="checkbox" value="<?php echo $article->id; ?>" />
                    </li>
                    <?php endforeach; ?>
                    
                    

                </ul>
                <div>
                    <p>[painacija]</p> 
                </div>

            </div>
            <input type="submit" class="button round" value="Зачувај" />
        </fieldset>
        <?php echo form_close(); ?>

    </div>


</div>
<?php $this->load->view('admin/elements/tinymce'); ?>