<div class="container o">

    <div class="left o">
        <h3>Додавање на Newsletter</h3>

        <?php echo form_open(base_url() . 'admin/newsletter/newsletter_update', array('id' => 'submit_newsletter')); ?>
        <fieldset>
            <label>Наслов:</label><input name="title" type="text" value="<?php echo $newsletter->title; ?>" />
        </fieldset>
            <label>Порака:</label><textarea style="height: 50px;" name="content"><?php echo $newsletter->content; ?></textarea>
        <fieldset>
            <label>Статус</label>
            <select name="status">
                <option <?php echo ($newsletter->status == 0)? 'selected="selected"':''; ?>value="0">не е започнато</option>
                <option <?php echo ($newsletter->status == 1)? 'selected="selected"':''; ?> value="1">Се испраќа</option>
                <option <?php echo ($newsletter->status == 2)? 'selected="selected"':''; ?>value="2">На пауза</option>
                <option <?php echo ($newsletter->status == 3)? 'selected="selected"':''; ?>value="3">Завршено</option>
            </select>
            <div class="separator dashed"></div>
            <label>Изберете статија:</label>
            <div style="float: left;overflow-y: scroll; width: 585px; height:200px; margin-bottom: 20px;">
                <ul class="checkbox-statii">
                    
                    <?php $br=0; foreach($articles as $article): ?>
                    <li>
                        <input <?php echo (in_array($article->id, $selected_articles))? 'checked="checked"' : ''; ?> name="articles[]" type="checkbox" value="<?php echo $article->id; ?>" />
                        <a href="<?php echo base_url()?>articles/<?php echo $article->id . '-' . $article->slug; ?>" target="_blank"><?php echo $article->title; ?></a>
                    </li>
                    <?php endforeach; ?>

                </ul>

            </div>
            <input type="hidden" name="newsletter_id" value="<?php echo $newsletter->id; ?>" />
            
        </fieldset>
        <input type="submit" class="button round" value="Зачувај" />
        <?php echo form_close(); ?>

    </div>


</div>
<?php $this->load->view('admin/elements/tinymce'); ?>