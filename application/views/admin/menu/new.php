<link rel="stylesheet" href="<?php echo base_url(); ?>public/js/jquery-ui/css/smoothness/jquery-ui-1.8.14.custom.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-ui/development-bundle/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-ui/development-bundle/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-ui/development-bundle/ui/jquery.ui.mouse.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-ui/development-bundle/ui/jquery.ui.sortable.js"></script>
<div class="container o">
    <h3>Линк во менито</h3>
    <?php echo form_open('admin/menu/submit_menu_item', array('id' => 'submit_menu_form')); ?>
    <input type="hidden" id="menu_item_id" name="menu_item_id" value="<?php FieldHelper::field($menu_item->menu_items_id, $menu_item->menu_items_id, 0); ?>" />
    <input type="hidden" id="order_index" name="order_index" value="<?php FieldHelper::field($menu_item->menu_items_id, $menu_item->order_index, 0); ?>" />
    <input type="hidden" id="depth_level" name="depth_level" value="<?php FieldHelper::field($menu_item->menu_items_id, $menu_item->depth_level, 0); ?>" />
    <div>
        <strong><?php if (isset($msg)) echo $msg; ?></strong>
        <label class="block" for="text">Текст:</label>
        <input type="text" name="text" id="text" style="width:390px" value="<?php FieldHelper::field($menu_item->menu_items_id, $menu_item->text, ''); ?>" />
        <div class="separator"></div>
        <div>
            <div style="float:left;width:50%;">
                <label class="block" for="link">Линк:</label>
                <?php echo base_url(); ?><input type="text" name="link" id="link" value="<?php FieldHelper::field($menu_item->menu_items_id, $menu_item->link, ''); ?>" />
            </div>
            <div style="float:left;width:50%;">
                <label class="block" for="article">Изберете статија:</label>
                <div>
                    <select name="article" id="articles" style="width: 335px;" >
                        <option id="article_0" value="0">-- Одберете статија --</option>
                        <?php foreach($articles as $article): ?>
                        <option id="article_<?php echo $article->id?>" value="<?php echo $article->id ?>" rel="<?php echo $article->slug; ?>">
                            <?php echo $article->title; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                
                <label class="block" for="category">или категорија:</label>
                <div>
                    <select name="category" id="categories" style="width: 335px;" >
                        <option id="category_0" value="0">-- Одберете категорија --</option>
                        <?php foreach($categories as $category): ?>
                        <option id="category_<?php echo $category->id; ?>" value="<?php echo $category->id; ?>" rel="<?php echo $category->slug; ?>"><?php echo $category->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                    
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="separator" ></div>
        <label class="block" for="parent">Родител:</label>    
        <select name="parent" class="parent" style="width: 335px;" >
            <option id="parent_id_0" value="0">-- Нема Родител --</option>
            
            <?php MenuHelper::echo_dropdown($menu_items, $menu_item->parent_id);?>
        </select>
        <div class="clear"></div>
        <div class="separator"></div>
        <input type="submit" class="button round" id="submit" value="Зачувај" />
    </div>
    </form>
    
    <div style="margin-top:20px">
        <?php if(isset($menu_item->children) and is_array($menu_item->children) and count($menu_item->children) > 0) : ?>
        <h3>Подлинкови</h3>
        <div id="grid-sortable">
        <?php foreach($menu_item->children as $child) :?>
                
             <div id="<?php echo $child->menu_items_id; ?>" name="page_<?php echo $child->parent_id; ?>">


                <div class="menu-grid-text">
                    <?php echo str_repeat('&nbsp;&nbsp;&nbsp;', $child->depth_level); ?>
                    <a href="<?php echo base_url(); ?>admin/menu/edit_menu_item/<?php echo $child->menu_items_id; ?>" title="Измени">
                        <?php echo $child->text; ?>
                    </a>
                </div>
                <div class="menu-grid-link">
                    <a href="<?php echo base_url() . $child->link; ?>" target="_blank">
                        <?php echo base_url() . mb_substr($child->link, 0, 100); ?>
                    </a>
                </div>
                <div class="article-grid-edit-links">
                    <a href="<?php echo base_url(); ?>admin/menu/edit_menu_item/<?php echo $child->menu_items_id; ?>" title="Измени">
                        <img src="<?php echo base_url() ?>public/images/edit_pencil_24_24.png" alt="" /></a>
                    &nbsp;|&nbsp;
                    <?php if (count($child->children) == 0): ?>
                        <a href="#" class="delete-link" title="Избриши" rel="<?php echo $child->menu_items_id; ?>"><img src="<?php echo base_url() ?>public/images/delete_red_24_24.png" alt=""  /></a>
                    <?php else: ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php endif; ?>
                        &nbsp;|&nbsp;
                        <a href="">
                            <img src="<?php echo base_url() ?>public/images/drag_24_24.png" alt="" /></a>
                    
                </div>


                <?php echo $child->menu_items_id; ?>
                <div class="clear"></div>
                <div class="separator"></div>
                
                <?php if(isset($child->children) and 
                      is_array($child->children) and
                      count($child->children)    > 0): ?>
                <ul>    
                    <?php MenuHelper::echo_menu_admin($child->children);?>
                </ul>
                <div class="clear"></div>
                <div class="separator"></div>
                
                <?php endif; ?>
            </div>
        
        
        
        <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
    
</div>
<script type="text/javascript">
    $("#articles").change(function () {
          var id = 0;
          var slug = "";
          var base = "";
          $("#articles option:selected").each(function () {
                id    =  $(this).attr('value');
                slug += $(this).attr('rel');
                base  = 'articles';
              });
          if(id > 0)
              {
                  $("#link").val(base + '/' + id + '-' + slug);
              }          
        })
        .change();
    
    
    $("#categories").change(function () {
          var id = 0;
          var slug = "";
          var base = "";
          $("#categories option:selected").each(function () {
                id    =  $(this).attr('value');
                slug += $(this).attr('rel');
                base  = 'category';
              });
          if(id > 0)
              {
                  $("#link").val(base + '/' + id + '-' + slug);
              }
        })
        .change();
        
        
     $( "#grid-sortable" ).sortable({
            update: function(event, ui) {
                console.log($(this).sortable('toArray').toString());
                $.post('<?php echo base_url();?>admin/menu/update_menu_order',
                       {order:$(this).sortable('toArray').toString(), topLevelItems: 0},function(data){
                    //alert(data);
                });
            }
        });
       
      $(".delete-link").click(function(){
        
                if(window.confirm('Дали сте сигурни дека сакате да избришете?'))
                {
                    var eventId     = $(this).attr('rel');
                    var currentItem = '<?php echo $menu_item->menu_items_id; ?>';
                    window.location = "<?php echo base_url()?>admin/menu/delete_menu_item/" 
                                      + eventId + "/" + currentItem;
                }
             });
    
</script>