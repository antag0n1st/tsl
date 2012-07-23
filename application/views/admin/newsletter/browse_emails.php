<div class="container">
    <h3></h3>
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>email</th>
                <th>status</th>
                <th style="width: 50px;">Измени</th>
                <th style="width: 50px;">Избриши</th>
                
            </tr>
        </thead>
        
        <tbody>
            <?php $br=0; foreach($emails as $email): ?>
            <tr <?php if($br++%2==0){ echo 'class="odd"'; } ?> >
                <td><?php echo $email->id; ?></td>
                <td><?php echo $email->email; ?></td>
                <td><?php echo $email->is_unsubscribed; ?></td>
                     <td><a href="<?php echo base_url().'admin/newsletter/edit_email/'.$email->id; ?>"><img alt="" title="Измени" src="<?php echo base_url().'images/edit-7.png' ?>" /></a></td>
                    <td><a onclick="return confirm_delete();" href="<?php echo base_url().'admin/newsletter/delete_email/'.$email->id; ?>"><img alt="" title="Избриши" src="<?php echo base_url().'images/edit-delete-icon.png' ?>" /></a></td>                    
              
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php echo $this->pagination->create_links(); ?>
</div>

<script type="text/javascript">
    function confirm_delete(){
        var r=confirm("Дали сте сигурни дека сакате да избришете?");
            if (r==true)
            {
                return true;
            }
            else
            {
                return false;
            }
    }
</script>