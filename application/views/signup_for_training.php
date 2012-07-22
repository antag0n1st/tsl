<div class="container o" style="">

    <div class="left">
     
            <h3>Пријавување за обука</h3>
            <p>Доколку Ви се потребни дополнителни информации за обука или конференција, Ве молиме пополнете го и испратете го формуларот:</p>
            <br />
            
            <?php echo form_open(''); ?>
                <fieldset>
                    <label>Име и презиме</label><input type="text" name="name" value="<?php echo isset($name) ? $name : ''; ?>" />
                    <label>Телефон*</label><input type="text" name="phone" value="<?php echo isset($phone) ? $phone : ''; ?>" />
                    <label>E-mail*</label><input type="text" name="email" value="<?php echo isset($email) ? $email : ''; ?>" />
                    <label>Професија</label><input type="text" name="profession" value="<?php echo isset($profession) ? $profession : ''; ?>" />
                    <label>Компанија</label><input type="text" name="company" value="<?php echo isset($company) ? $company : ''; ?>" />
                    
                    <label>Отворена обука/конференција</label>
                    <select name="event">
                        <?php foreach($events as $event): ?>
                        <option <?php if(isset($event_id) and $event_id == $event->calendar_events_id){ echo ' selected="selected" ';} ?> value="<?php echo $event->calendar_events_id; ?>" >
                            <?php echo $event->title; ?> (<?php FieldHelper::date_field($event->date_happen); ?>)
                        </option>
                        <?php endforeach; ?>
                    </select>
                    
                    <label>Коментар</label><textarea name="comment"></textarea>
                    
                    <input type="submit" name="signup" class="button round" value="Испрати го формуларот" />
                </fieldset>
            <?php echo form_close(); ?>
            
            <br />
            
            <?php if(isset($errors)): ?>
            <?php foreach($errors as $key => $error): ?>
            <span style="color: red;"><?php echo $error; ?></span><br />
            <?php endforeach; ?>
            
            <?php elseif(isset($success)): ?>
            <img style="float: left; margin-right: 10px;" src="<?php echo base_url().'images/tick.png'; ?>" alt="">
            <h3>Успешно се пријавивте.</h3>
            <?php endif; ?>
                

    </div>

    <div class="right">
        <?php $this->load->view('elements/sidebar'); ?>
    </div>


</div>
