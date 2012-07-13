<script src="<?php echo base_url() ?>public/js/jquery.iframe-post-form.js" type="text/javascript"></script>
<div class="container o">
    <h3>Нов клиент</h3>
    <div class="left">
    <strong><?php if (isset($msg)) echo $msg; ?></strong>    
    
    <div><!-- featured image begin -->
        <label for="featured_image">Слика за лого на клиентот:</label><span class="small">(препорачани димензии: 120 x 35)</span>
        <iframe name="iframe-post-form" id="iframe-post-form" style="width:0px;height:0px"></iframe>
        <div class="featured-image-preview-holder" style="<?php FieldHelper::field($client->clients_id, "width:120px;height:35px", "width:0px;height:0px"); ?>;overflow:hidden;">
            <img src="<?php FieldHelper::field($client->clients_id, base_url() . 'public/uploaded/clients/' . $client->image, ""); ?>" id="featured_image_preview" alt="" width="120px" />
        </div>
        <?php
        echo form_open('admin/clients/upload_image', array('id' => 'upload_image_form',
            'enctype' => "multipart/form-data",
            'target' => "iframe-post-form"));
        ?>
        <input type="file" id="featured_image" name="featured_image" size="5" />
        <input class="button round" type="button" id="btn_featured_image"  name="btn" value="OK" />
        <div id="progress"></div>
        </form>
    </div><!-- featured image end -->
     <?php echo form_open('admin/clients/submit_client', array('id' => 'submit_article_form')); ?>
    <input type="hidden" name="clients_id" id="clients_id" value="<?php echo $client->clients_id; ?>" />
    <input type="hidden" name="featured_image_hidden" id="featured_image_hidden" value="<?php FieldHelper::field($client->clients_id, $client->image, "");?>" />
    <div class="separator"></div>
    <label class="block" for="name">Име на клиентот:</label>
    <input type="text" name="name" id="name" value="<?php FieldHelper::field($client->clients_id,$client->name,""); ?>" />
    <div class="separator"></div>
    <label class="block" for="link">Линк:</label>
    <input type="text" name="link" id="link" value="<?php FieldHelper::field($client->clients_id,$client->link,"#"); ?>" />
    <div class="separator"></div>
    <input type="submit" name="submit" value="Зачувај" />
    </form>
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
                featured_img.attr('src','<?php echo base_url() . 'public/uploaded/clients/'; ?>' +
                    response.featured_image_name);
                featured_img.attr('width', '120px');
                            
                preview_holder.css('width','120px');
                preview_holder.css('height','35px');
                            
                $('#featured_image').val('');
                            
                $('#featured_image_hidden').val(response.featured_image_name);
                            
                $('#progress').html('');
            }
                
        });
        // end ajax file upload
});
</script>