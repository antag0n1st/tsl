<div class="container o">
        <h3>Сите Писма</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Наслов</th>
                    <th>Статус</th>
                    <th style="width: 50px;">Прегледај</th>
                    <th style="width: 50px;">Извештај</th>
                    <th style="width: 50px;">Измени</th>
                    <th style="width: 50px;">Избриши</th>
                </tr>
            </thead>
            
            <tbody>
                <?php $br=0; foreach($newsletters as $newsletter): ?>
                <tr <?php echo ($br++%2==0)? 'class="odd"':''; ?> >
                    <td><?php echo $newsletter->id; ?></td>
                    <td><?php echo $newsletter->title; ?></td>
                    <td><?php 
                    /**
                    * status
                    *  0 - not started
                    *  1 - started
                    *  2 - paused
                    *  3 - finished
                    */
                    if($newsletter->status == 0){
                        echo 'не е започнато';
                    }
                    else if($newsletter->status == 1){
                        echo 'се испраќа ('.$newsletter->count.'/'.$total_emails.')';
                    }
                    else if($newsletter->status == 2){
                        echo 'паузирано';
                    }
                    else if($newsletter->status == 3){
                        echo 'испратено';
                    }
                    
                    ?></td>
                    <td><a target="_blank" href="<?php echo base_url().'newsletter/view/'.$newsletter->id; ?>"><img alt="" title="Прегледај" src="<?php echo base_url().'images/preview.png' ?>" /></a></td>
                    <td><a href="<?php echo base_url().'admin/newsletter/report/'.$newsletter->id; ?>"><img alt="" title="Извештај" src="<?php echo base_url().'images/reports_32_32.png' ?>" /></a></td>
                    <td><a href="<?php echo base_url().'admin/newsletter/edit_newsletter/'.$newsletter->id; ?>"><img alt="" title="Измени" src="<?php echo base_url().'images/edit-7.png' ?>" /></a></td>
                    <td><a onclick="return confirm_delete();" href="<?php echo base_url().'admin/newsletter/delete_newsletter/'.$newsletter->id; ?>"><img alt="" title="Избриши" src="<?php echo base_url().'images/edit-delete-icon.png' ?>" /></a></td>                    
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

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