<div class="container o">    
    <div class="left">
        <h3>Измени Елемент</h3>
        <?php echo form_open('admin/sidebar/update_element', array('id' => 'submit_gallery_form')); ?>
            <fieldset>
                <label>Наслов:</label><input name="title" type="text" value="<?php echo $element->name; ?>" />
                <label>Содржина:</label><textarea id="content" name="content" style="height: 400px; width: 300px;"><?php echo $element->content; ?></textarea>
                <div class="separator"></div>
                <input type="hidden" name="id" value="<?php echo $element->id; ?>" />
                <input class="button round" type="submit" value="Зачувај" />
            </fieldset>
        <?php form_close(); ?>
    </div>
</div>

<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>public/js/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
    tinyMCE.init({
        mode : "exact",
        elements : "content",
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
        relative_urls : false
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