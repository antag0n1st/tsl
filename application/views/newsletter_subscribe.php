<?php $this->load->view('elements/slidebar'); ?>
<div class="container o" style="margin-top: 30px;">

    <div class="left">
     
            <h3>Пријавете се за newsletter</h3>
            <?php echo form_open(''); ?>
            <fieldset>
                
                <label>е-маил</label><input type="text" value="" name="email" />
                <input type="submit" value="Пријави се" class="button round" />
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
