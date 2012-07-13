<div class="container o">
    <h3>Нов линк во менито (Ова не е довршено ќе го довршам наскоро)</h3>
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
            <?php foreach($menu_items as $menu_item) :?>
            <option id="parent_id_<?php echo $menu_item->menu_items_id; ?>" value="<?php echo $menu_item->menu_items_id;?>">
                <?php if($menu_item->parent_id > 0) :?>
                <?php for($i = 0; $i < $menu_item->depth_level; $i++  ) :?>
                        &nbsp;&nbsp;
                <?php endfor; ?>
                <?php endif; ?>
                <?php echo $menu_item->text; ?>
            </option>
            
            <?php endforeach; ?>
        </select>
        <div class="clear"></div>
        <div class="separator"></div>
        <input type="submit" class="button round" id="submit" value="Зачувај" />
    </div>
    </form>
</div>
<script type="text/javascript">
    $("#articles").change(function () {
          var id = 0;
          var slug = "";
          var base = "";
          $("#articles option:selected").each(function () {
                id    =  $(this).attr('value');
                slug += $(this).attr('rel');
                base  = 'article';
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
        
        
    
</script>