<div class="main">
<h1>Нова статија</h1>
<strong><?php if(isset($msg)) echo $msg; ?></strong>

<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-ui/js/jquery-ui-1.8.14.custom.min.js" ></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>public/js/jquery-ui/css/smoothness/jquery-ui-1.8.14.custom.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-ui/development-bundle/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-ui/development-bundle/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-ui/development-bundle/ui/jquery.ui.datepicker.js"></script>


<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/jquery.ui.timepicker.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.ui.timepicker.js"></script>


<script src="<?php echo base_url()?>public/js/jquery.iframe-post-form.js" type="text/javascript"></script>


	<script language="javascript" type="text/javascript" src="../../public/js/tiny_mce/tiny_mce.js"></script>
	<script language="javascript" type="text/javascript">
		tinyMCE.init({
			mode : "exact",
			elements : "ajaxfilemanager",
			theme : "advanced",
			plugins : "advimage,advlink,media,contextmenu",
			theme_advanced_buttons1_add_before : "newdocument,separator",
			theme_advanced_buttons1_add : "fontselect,fontsizeselect",
			theme_advanced_buttons2_add : "separator,forecolor,backcolor,liststyle",
			theme_advanced_buttons2_add_before: "cut,copy,separator,",
			theme_advanced_buttons3_add_before : "",
			theme_advanced_buttons3_add : "media",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			extended_valid_elements : "hr[class|width|size|noshade]",
			file_browser_callback : "ajaxfilemanager",
			paste_use_dialog : false,
			theme_advanced_resizing : true,
			theme_advanced_resize_horizontal : true,
			apply_source_formatting : true,
			force_br_newlines : true,
			force_p_newlines : false,	
			relative_urls : true
		});

		function ajaxfilemanager(field_name, url, type, win) {
			var ajaxfilemanagerurl = "../../../../js/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php";
			var view = 'detail';
			switch (type) {
				case "image":
				view = 'thumbnail';
					break;
				case "media":
					break;
				case "flash": 
					break;
				case "file":
					break;
				default:
					return false;
			}
            tinyMCE.activeEditor.windowManager.open({
                url: "../../../../js/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php?view=" + view,
                width: 782,
                height: 440,
                inline : "yes",
                close_previous : "no"
            },{
                window : win,
                input : field_name
            });
            
/*            return false;			
			var fileBrowserWindow = new Array();
			fileBrowserWindow["file"] = ajaxfilemanagerurl;
			fileBrowserWindow["title"] = "Ajax File Manager";
			fileBrowserWindow["width"] = "782";
			fileBrowserWindow["height"] = "440";
			fileBrowserWindow["close_previous"] = "no";
			tinyMCE.openWindow(fileBrowserWindow, {
			  window : win,
			  input : field_name,
			  resizable : "yes",
			  inline : "yes",
			  editor_id : tinyMCE.getWindowArg("editor_id")
			});
			
			return false;*/
		}
	</script>
        <script type="text/javascript">
            $(document).ready(function() {
                
                $.datepicker.setDefaults( $.datepicker.regional[ "" ] );
		$( "#date_published" ).datepicker({ dateFormat: 'dd.mm.yy',
                                                    regional: 'mk'
                                       });
                $( "#date_published" ).datepicker('setDate', <?php FieldHelper::field($article->id,"new Date('$article->date_published')","new Date()"); ?> );
                
                $( "#time_published" ).timepicker({
                                showPeriodLabels: false
                });
                
                var date =  <?php FieldHelper::field($article->id,"new Date('$article->date_published')","new Date()"); ?>;
                var timePublished = date.getHours() + ":" + (date.getMinutes()); 
                   
                    
                                        ;
                $( "#time_published" ).val(timePublished);
                
                
		$( "#add_calendar" ).datepicker({ dateFormat: 'dd.mm.yy',
                                                    regional: 'mk'
                                       });
                
                
                
                
                
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
                            featured_img.attr('src','<?php echo base_url() . 'public/uploaded/featured/thumbnails/'; ?>' +
                                                                     response.featured_image_name);
                            featured_img.attr('width', '150px');
                            
                            preview_holder.css('width','150px');
                            preview_holder.css('height','150px');
                            
                            $('#featured_image').val('');
                            
                            $('#featured_image_hidden').val(response.featured_image_name);
                            
                             $('#progress').html('');
                        }
                
                });
                // end ajax file upload
                
                // autosave
                
                setInterval('autosaveArticle()',60000); // autosave every minute
                
                // end autosave
                
            });
            
            function autosaveArticle(){ 

                        $("#autosave_status").html('Autosaving...');
                        
                        var cat = $("input[name='category[]']:checked").map(function(i,n) {
                                return $(n).val();
                        }).get(); //get converts it to an array
                        
                                
                                
                                $.post('submit_article', 
                                       { 
                                         article_id     :  $('#article_id').val(),
                                         title          :  $('#article_title').val(),
                                         description    :  $('#article_description').val(),
                                         content        :  tinyMCE.activeEditor.getContent(),//$('#ajaxfilemanager').val(),
                                         date_published :  $('#date_published').val(),
                                         time_published :  $('#time_published').val(),
                                         status         :  2, // autosave!
                                         featured_image_hidden : $('#featured_image_hidden').val(),
                                         'category[]'       :  cat
                                       },
                                       function(data){
                                           //alert(data.id);
                                           $('#article_id').val(data.id);
                                           $("#autosave_status").html('');
                                       }, 
                                       "json");                    
                }
             
        </script>
        <div style="float:right;width:200px"><!-- featured image begin -->
        <label for="featured_image">Главна слика</label>
                <iframe name="iframe-post-form" id="iframe-post-form" style="width:0px;height:0px"></iframe>
                <div class="featured-image-preview-holder" style="<?php FieldHelper::field($article->id,"width:150px;height:150px","width:0px;height:0px"); ?>">
                    <img src="<?php FieldHelper::field($article->id,base_url() . 'public/uploaded/featured/thumbnails/' . $article->featured_image,""); ?>" id="featured_image_preview" alt="" width="150px" />
                </div>
                <?php echo form_open('admin/articles/upload_image', array('id' => 'upload_image_form',
                                                           'enctype'  => "multipart/form-data", 
                                                           'target'   => "iframe-post-form")); ?>
                <input type="file" id="featured_image" name="featured_image" size="5" />
                <input type="button" id="btn_featured_image" name="btn" value="OK" />
                <div id="progress"></div>
                </form>
       </div><!-- featured image end -->
        
         <?php  echo form_open('admin/articles/submit_article' , array('id' => 'submit_article_form')); ?>
       <input type="hidden" id="article_id" name="article_id" value="<?php echo $article->id; ?>" />
       <input type="hidden" id="status" name="status" value="1" />
        <div class="article-new-main-holder">
               
                <div class="article-title-holder">        
                    <input type="text" id="article_title" class="article-title" name="title" value="<?php FieldHelper::field($article->id,$article->title,"Наслов на статијата"); ?>" />
                </div>
                <div class="clear">
                    <textarea id="ajaxfilemanager" name="content" style="width: 600px; height: 450px">
                <p>
                    <?php FieldHelper::field($article->id,$article->content,"Објавете нова статија"); ?>
                </p>

                    </textarea>
                </div>

                <div class="article-title-holder">
                    <input type="text" id="article_description" class="article-title" name="description" value="<?php FieldHelper::field($article->id,$article->description,"Краток опис"); ?>" />
                </div>

            
                
                <input type="submit" name="submit" value="Објави" />
              
        </div>
        <div class="article-new-sidebar-holder border">
            <div class="article-new-sidebar-option">                   
                <input type="hidden" id="featured_image_hidden" name="featured_image_hidden" value="<?php FieldHelper::field($article->id,$article->featured_image,""); ?>" />
            </div>
            <div class="article-new-sidebar-option">                   
                <label for="date_published">Објави на:</label>
                <input type="text" id="date_published" name="date_published" size="9" />
                <input type="text" id="time_published" readonly="true" name="time_published" size="9" />
            </div>
            <div class="article-new-sidebar-option">                   
                <label for="category">Категориja</label>
                <div style="overflow-y: scroll;height:150px;width:180px;text-align: left;padding:0 0 0 10px">
                    <?php foreach($categories as $category): ?>
                    <input type="checkbox" <?php if(isset($saved_categories) and in_array($category->id, $saved_categories)){ echo 'checked="checked"';  } ?> id="checkbox_category" name="category[]" value="<?php echo $category->id; ?>" /> <?php echo $category->name; ?><br />
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="article-new-sidebar-option">                   
                <label for="calendar">Додади во календар</label>
                <input type="text" id="add_calendar" name="calendar" size="18" />
            </div>
            <div class="article-new-sidebar-option"> 
                <label for="calendar_category">Настан</label>
                <select name="calendar_category" style="width:150px">
                    <?php foreach($event_categories as $e_category): ?>
                    <option value="<?php echo $e_category->id; ?>"><?php echo $e_category->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="article-new-sidebar-option">
                <label for="calendar_link">Линк на календарот</label>
                <input type="text" name="calendar_link" />
            </div>
            
        </div>
                <span id="autosave_status"></span>
          </form>
        <div class="clear"></div>
</div>        
