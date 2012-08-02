<?php if(!isset($element_id)) $element_id = 'content'; ?>


<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>public/js/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
    tinyMCE.init({
        mode : "exact",
        elements : "<?php echo $element_id; ?>",
        theme : "advanced",
        plugins : "advimage,advlink,contextmenu,table",
        theme_advanced_buttons1_add_before : "newdocument,separator",
        theme_advanced_buttons1_add : "fontselect,fontsizeselect",
        theme_advanced_buttons2_add : "separator,forecolor,backcolor,liststyle",
        theme_advanced_buttons2_add_before: "cut,copy,separator,",
        theme_advanced_buttons3_add_before : "",
        theme_advanced_buttons3_add : "table",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
    /*    valid_elements :    "-table[border=0|cellspacing|cellpadding|width|frame|rules|" +
                            "height|align|summary|bgcolor|background|bordercolor|style],-tr[rowspan|width|" +
                            "height|align|valign|bgcolor|background|bordercolor|style],tbody,thead,tfoot," +
                            "#td[colspan|rowspan|width|height|align|valign|bgcolor|background|bordercolor" +
                            "|scope|style],#th[colspan|rowspan|width|height|align|valign|scope|style],img[src|alt|title],strong,b,br",*/
        extended_valid_elements : "hr[class|width|size|noshade],img[src|alt|title],ifame[*]",
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