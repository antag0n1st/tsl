<div class="container o">
    <h3>Сите Групи</h3>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Група</th>
                    <th style="width: 70px;">Измени</th>
                    <th style="width: 70px;">Избриши</th>                    
                </tr>
            </thead>
            <tbody>
                <?php $br=0; foreach($groups as $group): ?>
                <tr class="<?php echo ($br++%2==0) ? 'odd' : ''; ?>">
                    <td><?php echo $group->id_gallery_group; ?></td>
                    <td><?php echo $group->name; ?></td>
                    <td><a href="<?php echo base_url().'admin/gallery/edit_group/'.$group->id_gallery_group; ?>"><img alt="" title="Измени" src="<?php echo base_url().'images/edit-7.png' ?>" /></a></td>
                    <td><a onclick="return confirm_delete();" href="<?php echo base_url().'admin/gallery/delete_group/'.$group->id_gallery_group; ?>"><img alt="" title="Избриши" src="<?php echo base_url().'images/edit-delete-icon.png' ?>" /></a></td>
                    
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
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