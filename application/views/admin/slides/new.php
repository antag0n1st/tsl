<script src="<?php echo base_url() ?>public/js/jquery.iframe-post-form.js" type="text/javascript"></script>
<div class="container o">
    <h3>Нов Слајд</h3>
    <div class="left" style="width:960px">
     <strong><?php if (isset($msg)) echo $msg; ?></strong>
        <div><!-- featured image begin -->
            <label for="featured_image">Слика за слајдерот:</label><span class="small">(препорачани димензии: 960 x 300)</span>
            <iframe name="iframe-post-form" id="iframe-post-form" style="width:0px;height:0px"></iframe>
            <div class="featured-image-preview-holder" style="<?php FieldHelper::field($slide->slides_id, "width:960px;height:300px", "width:0px;height:0px"); ?>;overflow:hidden;">
                <img src="<?php FieldHelper::field($slide->slides_id, base_url() . 'public/uploaded/slider/' . $slide->image, ""); ?>" id="featured_image_preview" alt="" width="960px" />
            </div>
            <?php
            echo form_open('admin/slides/upload_image', array('id' => 'upload_image_form',
                'enctype' => "multipart/form-data",
                'target' => "iframe-post-form"));
            ?>
            <input type="file" id="featured_image" name="featured_image" size="5" />
            <input class="button round" type="button" id="btn_featured_image"  name="btn" value="OK" />
            <div id="progress"></div>
            </form>
        </div><!-- featured image end -->
     <?php echo form_open('admin/slides/submit_slide', array('id' => 'submit_article_form')); ?>
        <input type="hidden" id="slides_id" name="slides_id" value="<?php echo $slide->slides_id; ?>" />
        <input type="hidden" id="order_index" name="order_index" value="<?php FieldHelper::field($slide->slides_id,$slide->order_index,1); ?>" />
        
        <input type="hidden" id="featured_image_hidden" name="featured_image_hidden" value="<?php FieldHelper::field($slide->slides_id, $slide->image, ""); ?>" />
        <div class="separator"></div>
        <label for="title" class="block">Наслов:</label>
        <input type="text" id="title" name="title" value="<?php FieldHelper::field($slide->slides_id, $slide->title, ""); ?>" class="full" />
        <div class="separator"></div>
            
        <label for="description" class="block">Опис:</label>
        
        <input type="text" id="description" name="description" value="<?php FieldHelper::field($slide->slides_id, $slide->description, ""); ?>" class="full" />
        <div class="separator"></div>
        
        <label for="link" class="block">Линк:</label>
        <input type="text" id="link" name="link" value="<?php FieldHelper::field($slide->slides_id, $slide->link, ""); ?>" class="full" />
        <div class="separator"></div>
        
        <input class="button round" type="submit" name="submit" value="Објави" />
      </form>
    </div>
</div>
<?php $data['element_id'] = 'description'; $this->load->view('admin/elements/tinymce', $data); ?>
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
                featured_img.attr('src','<?php echo base_url() . 'public/uploaded/slider/'; ?>' +
                    response.featured_image_name);
                featured_img.attr('width', '960px');
                            
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