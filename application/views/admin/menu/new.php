<div class="container o">
    <h3>Нов линк во менито (Ова не е довршено ќе го довршам наскоро)</h3>

    <div>
        <label class="block" for="text">Текст:</label>
        <input type="text" name="text" id="text" value="<?php FieldHelper::field($menu_item->menu_items_id, $menu_item->text, ''); ?>" />
        <div class="separator"></div>
        <div>
            <div style="float:left;width:50%;">
                <label class="block" for="link">Линк:</label>
                <input type="text" name="link" id="link" value="<?php FieldHelper::field($menu_item->menu_items_id, $menu_item->link, ''); ?>" />
            </div>
            <div style="float:left;width:50%;">
                <label class="block" for="category">или категорија:</label>
                

                <div>
                    <select name="category" style="width: 335px;" >
                        <option id="category_0" value="0">-- Одберете категорија --</option>
                        <?php foreach($categories as $category): ?>
                        <option id="category_<?php echo $category->id; ?>" value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                    
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="separator" ></div>
        <label class="block" for="parent">Родител:</label>
        <select name="parent" style="width: 335px;" >
            <?php foreach($menu_items as $menu_item) :?>
            
            <option id="parent_id_<?php echo $menu_item->menu_items_id; ?>" value="<?php echo $menu_item->menu_items_id;?>">
                <?php if($menu_item->parent_id > 0) :?>
                &nbsp;&nbsp;
                <?php endif; ?>
                <?php echo $menu_item->text; ?>
            </option>
            
            <?php endforeach; ?>
        </select>
        
        
    </div>

</div>