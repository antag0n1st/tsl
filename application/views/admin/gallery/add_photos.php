<script src="<?php echo base_url() ?>public/js/jquery.iframe-post-form.js" type="text/javascript"></script>
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
    
     <div><!-- featured image begin -->
            <label for="featured_image">Слика:</label><span class="small">(препорачани димензии: 640 x 400)</span>
            <iframe name="iframe-post-form" id="iframe-post-form" style="width:0px;height:0px"></iframe>
            
            <?php
            echo form_open('admin/gallery/upload_image', array('id' => 'upload_image_form',
                'enctype' => "multipart/form-data",
                'target' => "iframe-post-form"));
            ?>
            <fieldset>
                <input type="file" id="featured_image" name="featured_image" size="5" />
                <input class="button round" type="button" id="btn_featured_image"  name="btn" value="Испрати" />
            </fieldset>
            <br />
            <div id="progress"></div>
            </form>
     </div><!-- featured image end -->
    
    
    
    
    <?php echo form_open('admin/gallery/submit_photos', array('id' => 'submit_gallery_form')); ?>
        <fieldset>
            <div class="separator"></div>
            <input type="hidden" name="id_gallery" value="<?php echo $id_gallery; ?>" />
            <input type="hidden" id="featured_image_hidden" name="featured_image_hidden" value="" />
            <label class="block">Опис:</label><br /><textarea name="description"></textarea>
            <div class="separator"></div>
            <input type="submit" value="Зачувај" class="button round" />
        </fieldset>
    <?php echo form_close(); ?>
     
    </div>
    <div class="right" style="margin-top:39px;">
        <div class="featured-image-preview-holder" style="<?php FieldHelper::field($gallery->id_gallery, "width:298px;height:200px", "width:0px;height:0px"); ?>;overflow:hidden;">
                <img src="" id="featured_image_preview" alt="" width="298px" />
        </div>
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
    $(document).ready(function() {
// ajax file upload
        $("#btn_featured_image").click(function(){
            $("#upload_image_form").submit();
        })
                     
        $("#upload_image_form").iframePostForm
        ({
            json : true,
            post : function ()
            {
                //alert("Post!");
                $('#progress').html('Uploading...');
            },
            complete: function (response)
            {
                // alert(response.featured_image_name);
                // show the preview of the image thumbnail
                var featured_img = $('#featured_image_preview');
                var preview_holder = $('.featured-image-preview-holder');
                featured_img.attr('src','<?php echo base_url() . 'public/uploaded/gallery/'; ?>' +
                    response.featured_image_name);
                featured_img.attr('width', '298px');
                            
                preview_holder.css('width','298px');
                preview_holder.css('height','200px');
                            
                $('#featured_image').val('');
                            
                $('#featured_image_hidden').val(response.featured_image_name);
                            
                $('#progress').html('');
            }
                
        });
        // end ajax file upload
                     
    });
</script>
