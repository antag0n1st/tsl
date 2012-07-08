<div class="container o">
    <h3>Изберете Галерија</h3>
    <div>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Опис</th>
                    <th>Група</th>
                    <th style="width: 70px;">Додади</th>                  
                </tr>
            </thead>
            <tbody>
                <?php $br=0; foreach($galleries as $gallery): ?>
                <tr class="<?php echo ($br++%2==0) ? 'odd' : ''; ?>">
                    <td><?php echo $gallery->id_gallery; ?></td>
                    <td><?php echo $gallery->description; ?></td>
                    <td><?php echo $gallery->name; ?></td>
                    <th><a href="<?php echo base_url().'admin/gallery/add_photos/'.$gallery->id_gallery; ?>"><img alt="" title="Додади" src="<?php echo base_url().'images/add.png' ?>" /></a></th>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>  