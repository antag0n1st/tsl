<div class="container o">
    <h3>Сите Галерии</h3>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Опис</th>
                    <th>Група</th>
                    <th style="width: 70px;">Додади</th>
                    <th style="width: 70px;">Измени</th>
                    <th style="width: 70px;">Избриши</th>                    
                </tr>
            </thead>
            <tbody>
                <?php $br=0; foreach($galleries as $gallery): ?>
                <tr class="<?php echo ($br++%2==0) ? 'odd' : ''; ?>">
                    <td><?php echo $gallery->id_gallery; ?></td>
                    <td><?php echo $gallery->description; ?></td>
                    <td><?php echo $gallery->name; ?></td>
                    <td><a href="<?php echo base_url().'admin/gallery/add_photos/'.$gallery->id_gallery; ?>"><img alt="" title="Додади" src="<?php echo base_url().'images/add.png' ?>" /></a></td>
                    <td><a href="<?php echo base_url().'admin/gallery/edit_gallery/'.$gallery->id_gallery; ?>"><img alt="" title="Измени" src="<?php echo base_url().'images/edit-7.png' ?>" /></a></td>
                    <td><a onclick="return confirm_delete();" href="<?php echo base_url().'admin/gallery/delete_gallery/'.$gallery->id_gallery; ?>"><img alt="" title="Избриши" src="<?php echo base_url().'images/edit-delete-icon.png' ?>" /></a></td>
                    
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