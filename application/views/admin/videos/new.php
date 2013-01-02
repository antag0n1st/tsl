<div class="container o">
    <h3>Ново Видео</h3>
<div class="left">    
     <strong><?php if (isset($msg)) echo $msg; ?></strong>
     <?php echo form_open('admin/videos/submit_video', array('id' => 'submit_article_form')); ?>
     <label for="title" class="block">Наслов:</label>
     <input type="text" id="title" name="title" value="<?php htmlentities(FieldHelper::field($video->id, $video->title, "")); ?>" class="full" />
     <label for="description" class="block">Опис:</label>
     <textarea id="description" name="description" style="width: 610px; height: 250px"><?php htmlentities(FieldHelper::field($video->id, $video->description, "")); ?></textarea>
     <label for="embed_code" class="block">Код за вметнување на видеото (Embed Code)</label>
     <input type="text" id="embed_code" name="embed_code" value="<?php FieldHelper::field($video->id, htmlentities($video->embed_code, ENT_QUOTES, 'UTF-8'), ""); ?>" class="full" />
     <?php $data['element_id'] = 'description'; $this->load->view('admin/elements/tinymce', $data); ?>
<br />

     <input class="button round" type="submit" name="submit" value="Објави" />
     
     
     
<br />
<div class="separator"></div>



</div>

    <?php if ($video->id > 0) : ?>
        <div class="right">
            <label class="block">
                Линк до видеото:
            </label>
            <a href="<?php echo base_url(); ?>videos/<?php echo $video->id . '-' . $video->slug; ?>" target="_blank">
                <?php echo base_url(); ?>videos/<?php echo $video->id . '-' . $video->slug; ?>
            </a>
        </div>
    <?php endif; ?>

     <?php echo form_close(); ?>
    
    
<?php if(isset($viewers)): ?>
    <div class="clear"    ></div>
    <h3>Видеото го погледнале:</h3>
<table class="video-registrants">
    <thead>
        <tr>
            <th>
                Име и презиме
            </th>
            <th>
                E-mail
            </th>
            <th>
                Телефон
            </th>
            <th>
                Работна позиција
            </th>
            <th>
                Компанија
            </th>
            <th>
                Адреса
            </th>
        </tr>
    </thead>
    <tbody>
         <?php foreach($viewers as $viewer) :?>
        <tr>
            <td>
                <?php echo $viewer->name; ?>
            </td>
            <td>
                <?php echo $viewer->email; ?>
            </td>
            <td>
                <?php echo $viewer->phone; ?>
            </td>
            <td>
                <?php echo $viewer->profession; ?>
            </td>
            <td>
                <?php echo $viewer->company; ?>
            </td>
            <td>
                <?php echo $viewer->address; ?>
            </td>
        </tr>
         <?php endforeach; ?>
    </tbody>
</table>


<?php endif;?>    
</div>