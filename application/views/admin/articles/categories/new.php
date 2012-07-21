<div class="container o">
    <h3>Категорија</h3>
    <div class="left">
        <strong><?php if (isset($msg)) echo $msg; ?></strong>
        <div><!-- featured image begin -->
            <label for="featured_image">Главна слика:</label><span class="small">(препорачани димензии: 608 x 250)</span>
            <iframe name="iframe-post-form" id="iframe-post-form" style="width:0px;height:0px"></iframe>
            <div class="featured-image-preview-holder" style="<?php FieldHelper::field($category->id, "width:610px;height:235px", "width:0px;height:0px"); ?>;overflow:hidden;">
                <img src="<?php FieldHelper::field($category->id, base_url() . 'public/uploaded/featured/' . $category->featured_image, ""); ?>" id="featured_image_preview" alt="" width="610px" />
            </div>
            <?php
            echo form_open('admin/articles/upload_image', array('id' => 'upload_image_form',
                'enctype' => "multipart/form-data",
                'target' => "iframe-post-form"));
            ?>
            <input type="file" id="featured_image" name="featured_image" size="5" />
            <input class="button round" type="button" id="btn_featured_image"  name="btn" value="OK" />
            <div id="progress"></div>
            </form>
        </div><!-- featured image end -->
        <div class="separator"></div>
        
        <?php echo form_open('admin/articles_categories/submit_category', array('id' => 'submit_categories_form')); ?>
        <input type="hidden" id="id" name="id" value="<?php FieldHelper::field($category->id, $category->id, 0); ?>" />
        <input type="hidden" id="slug" name="slug" value="<?php FieldHelper::field($category->id, $category->slug, ''); ?>" />
        <input type="hidden" id="featured_image_hidden" name="featured_image_hidden" value="<?php FieldHelper::field($category->id, $category->featured_image, "default_featured_image.jpg"); ?>" />
        <label>Име на категоријата</label>
        <input type="text" id="name" name="name" value="<?php FieldHelper::field($category->id, $category->name, ''); ?>" />
        <div class="separator"></div>
        <input class="round button" type="submit" name="submit" value="Зачувај" />
        </form>
    </div>
</div>
<script src="<?php echo base_url() ?>public/js/jquery.iframe-post-form.js" type="text/javascript"></script>
<script type="text/javascript">
    // ajax file upload
        $("#btn_featured_image").click(function(){
            if( $('#featured_image').val() != '' )
                {
                    $("#upload_image_form").submit();
                }
                else
                {
                    alert('Мора да изберете фајл за прикачување ');
                }
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
                featured_img.attr('src','<?php echo base_url() . 'public/uploaded/featured/'; ?>' +
                    response.featured_image_name);
                featured_img.attr('width', '610px');
                            
                preview_holder.css('width','610px');
                preview_holder.css('height','235px');
                            
                $('#featured_image').val('');
                            
                $('#featured_image_hidden').val(response.featured_image_name);
                            
                $('#progress').html('');
            }
                
        });
        // end ajax file upload
</script>