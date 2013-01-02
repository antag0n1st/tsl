<div class="container o" style="">

    <div class="left">
        <h3>Ве молиме регистрирајте се за да го погледнете видеото</h3>
        
        <?php echo form_open(''); ?>
                <fieldset>
                    <label>Име и презиме*</label><input type="text" name="name" value="<?php echo isset($name) ? $name : ''; ?>" />
                    <label>Телефон*</label><input type="text" name="phone" value="<?php echo isset($phone) ? $phone : ''; ?>" />
                    <label>E-mail*</label><input type="text" name="email" value="<?php echo isset($email) ? $email : ''; ?>" />
                    <label>Професија*</label><input type="text" name="profession" value="<?php echo isset($profession) ? $profession : ''; ?>" />
                    <label>Компанија*</label><input type="text" name="company" value="<?php echo isset($company) ? $company : ''; ?>" />

                    <label>Адреса*</label><textarea name="address"><?php echo isset($address) ? $address : ''; ?></textarea>
                    <label>Збирот на 2 и 2 е*:</label><input type="text" name="validation" value="" />
                    <input type="submit" name="signup" class="button round" value="Регистрирај се и погедни го видеото" />
                </fieldset>
            <?php echo form_close(); ?>
        <?php if(isset($errors)): ?>
        <span style="color: red;"><?php echo $errors; ?></span><br />
        <?php endif; ?>
    </div>
</div>