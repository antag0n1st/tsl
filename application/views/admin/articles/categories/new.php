<div class="container o">
    <h3>Категорија</h3>
    <div>
        <?php echo form_open('admin/articles_categories/submit_category', array('id' => 'submit_categories_form')); ?>
        <input type="hidden" id="id" name="id" value="<?php FieldHelper::field($category->id, $category->id, 0); ?>" />
        <input type="hidden" id="slug" name="slug" value="<?php FieldHelper::field($category->id, $category->slug, ''); ?>" />
        <label>Име на категоријата</label>
        <input type="text" id="name" name="name" value="<?php FieldHelper::field($category->id, $category->name, ''); ?>" />
        <div class="separator"></div>
        <input class="round button" type="submit" name="submit" value="Зачувај" />
        </form>
    </div>
</div>