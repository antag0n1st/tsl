<div class="container">
    <div class="left">
        
        <?php echo form_open(); ?>
        <fieldset>
            <label>Емаил</label><input type="text" name="email" value="<?php echo $email->email; ?>" />
            <label>Статус</label>
            <select name="status">
                <option <?php if($email->is_unsubscribed == 0){ echo 'selected="selected"'; } ?> value="0">Активен</option>
                <option <?php if($email->is_unsubscribed == 1){ echo 'selected="selected"'; } ?>value="1">Не Активен</option>
            </select>
            <input name="id" type="hidden" value="<?php echo $email->id; ?>" />
            <input type="submit" class="button round" value="Зачувај" />
        </fieldset>
        <?php echo form_close(); ?>
    </div>
    
    
</div>
