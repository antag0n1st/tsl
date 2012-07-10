<div class="container o">
    <h3>Нов цитат</h3>
    <div class="left">
        <strong><?php if (isset($msg)) echo $msg; ?></strong>
        <?php echo form_open('admin/quotes/submit_quote', array('id' => 'submit_quote_form')); ?>
        <input type="hidden" name="quotes_id" value="<?php echo $quote->quotes_id; ?>" />
        <label class="block">Текст:</label><textarea name="description" style="width:555px"><?php FieldHelper::field($quote->quotes_id, $quote->description, ""); ?></textarea>
        <div class="separator"></div>
        <label class="block">Автор</label><input type="text" name="author" id="author" value="<?php FieldHelper::field($quote->quotes_id, $quote->author, ""); ?>"
                                                 style="width:555px" />
        <div class="separator"></div>
        <input class="round button" type="submit" name="submit" value="Зачувај" />
        </form>
    </div>

</div>
