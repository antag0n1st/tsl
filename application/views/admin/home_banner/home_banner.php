<script src="<?php echo base_url() ?>public/js/jquery.iframe-post-form.js" type="text/javascript"></script>
<div class="container o">
    <h3>
        Почетен банер
    </h3>
    <div class="left">
        <strong><?php if (isset($msg)) echo $msg; ?></strong>
        
        <div><!-- featured image begin -->
            <label for="featured_image">Слика за:</label>
            <iframe name="iframe-post-form" id="iframe-post-form" style="width:0px;height:0px"></iframe>
            <div class="featured-image-preview-holder" style="<?php FieldHelper::field($home_banner->home_banner_id, "width:960px;height:300px", "width:0px;height:0px"); ?>;overflow:hidden;">
                <img src="<?php FieldHelper::field($home_banner->home_banner_id, base_url() . 'public/uploaded/home_banner/' . $home_banner->image, ""); ?>" id="featured_image_preview" alt="" />
            </div>
            <?php
            echo form_open('admin/home_banner/upload_image', array('id' => 'upload_image_form',
                'enctype' => "multipart/form-data",
                'target' => "iframe-post-form"));
            ?>
            <input type="file" id="featured_image" name="featured_image" size="5" />
            <input class="button round" type="button" id="btn_featured_image"  name="btn" value="OK" />
            <div id="progress"></div>
            </form>
        </div><!-- featured image end -->
        
        
        
        
        
        <?php echo form_open('admin/home_banner/submit_home_banner', array('id' => 'submit_home_banner_form')); ?>
        <input type="hidden" name="id" value="<?php echo $home_banner->home_banner_id; ?>" />
        <input type="hidden" id="featured_image_hidden" name="featured_image_hidden" value="<?php FieldHelper::field($home_banner->home_banner_id, $home_banner->image, ""); ?>" />
        <label class="block">Линк:</label>
        <input type="text" id="link" name="link" value="<?php FieldHelper::field($home_banner->home_banner_id, $home_banner->link, ""); ?>" style="width:100%" />
        <div class="separator"></div>
        <label class="block">Дали е активен</label>
        <select id="is_active" name="is_active">
            <option id="1" <?php if($home_banner->is_active) echo 'selected="selected"'; ?>   value="1">Да</option>
            <option id="2" <?php if(!$home_banner->is_active) echo 'selected="selected"'; ?>  value="0">Не</option>
        </select>
        <div class="separator"></div>
        <input class="button round" type="submit" name="submit" value="Зачувај" />
        <?php echo form_close(); ?>
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
                featured_img.attr('src','<?php echo base_url() . 'public/uploaded/home_banner/'; ?>' +
                    response.featured_image_name);
                //featured_img.attr('width', '960px');
                            
                preview_holder.css('width','960px');
                preview_holder.css('height','300px');
                            
                $('#featured_image').val('');
                            
                $('#featured_image_hidden').val(response.featured_image_name);
                            
                $('#progress').html('');
            }
                
        });
        // end ajax file upload
                     
    });
</script>