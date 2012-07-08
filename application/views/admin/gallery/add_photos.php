<div class="container o">
    
    
    <div class="left">
        
        <h3>Додавање на Фотографии</h3>
    <p>
        <strong><?php echo $group->name; ?></strong>
        <strong><?php echo '>> '.$gallery->description; ?></strong>
    </p>
    <br />
    <br />
    <strong><?php if (isset($msg)) echo $msg; ?></strong>
    
    <?php echo form_open('admin/gallery/submit_photos', array('id' => 'submit_gallery_form')); ?>
        <fieldset>
            <input type="hidden" name="id_gallery" value="<?php echo $id_gallery; ?>" />
            <label>Слика:</label><input type="file" /> <input type="button" class="button round" value="Испрати" />
            <label>Опис:</label><textarea name="description"></textarea>
            <input type="submit" value="Зачувај" class="button round" />
        </fieldset>
    <?php echo form_close(); ?>
     
    </div>
</div>  

<div class="container o">
    <div class="separator"></div>
    <h3>Слики</h3>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Слика</th>
                    <th>Опис</th>
                    <th style="width: 70px;">Избриши</th>                  
                </tr>
            </thead>
            <tbody>
                <?php $br=0; foreach($photos as $photo): ?>
                <tr class="<?php echo ($br++%2==0) ? 'odd' : ''; ?>">
                    <td><?php echo $photo->id_gallery_photos; ?></td>
                    <td><img alt="" src="<?php echo base_url().'public/uploaded/gallery/thumbnails/'. $photo->image; ?>" /></td>
                    <td><?php echo $photo->description; ?></td>
                    <th><a onclick="return confirm_delete();" href="<?php echo base_url().'admin/gallery/delete_photo/'.$gallery->id_gallery.'/'.$photo->id_gallery_photos; ?>"><img alt="" title="Избриши" src="<?php echo base_url().'images/edit-delete-icon.png' ?>" /></a></th>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>  
<script type="text/javascript">
    function confirm_delete(){
        var r=confirm("Дали сакате да ја избришете сликата ?");
            if (r==true)
            {
                return true;
            }
            else
            {
                return false;
            }
    }
</script>