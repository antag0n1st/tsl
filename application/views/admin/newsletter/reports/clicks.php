<div class="container o">
    <h3>Извештај: Кликови по newsletter</h3>
    <?php if(count($report) > 0) :?>
    <div class="float-right" style="margin: 0 0 10px 0">
        <a title="Експорт во Excel" href="<?php echo base_url()?>admin/newsletter/report/<?php echo $newsletter_id; ?>/1">
            <img src="<?php echo base_url();?>public/images/heo_excel.jpg" alt="" />
        </a>
        <a title="Експорт во CSV" href="<?php echo base_url()?>admin/newsletter/report/<?php echo $newsletter_id; ?>/2"><img src="<?php echo base_url();?>public/images/csv.png" alt="" /></a>
        
    </div>
    <div class="separator"></div>
    <div class="candidates">    
    <table>
             <thead>
                <tr>
                    <th style="width:240px">e-mail</th>
                    <th style="width:250px">Newsletter</th>
                    <th style="width:370px">Статија</th>
                    <th style="width:100px">Датум</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($report as $row): ?>
                <tr>
                    <td>
                        <a href="<?php echo base_url(); ?>admin/newsletter/edit_email/<?php echo $row->email_id;?>">
                            <?php echo $row->email; ?>
                        </a>
                    </td>
                    <td>
                        <a href="<?php echo base_url(); ?>newsletter/view/<?php echo $row->newsletter_id; ?>" target="_blank">
                            <?php echo $row->newsletter_title; ?>
                        </a>
                    </td>
                    <td>
                        <a href="<?php echo base_url(); ?>articles/<?php echo $row->article_id . '-' . $row->article_slug; ?>" target="_blank">
                            <?php echo $row->article_title; ?>
                        </a>
                    </td>
                    <td>
                        <?php echo FieldHelper::date_no_time_field($row->date_clicked); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
    </table>
    </div>    
    <?php else:  ?>
    Нема кликови за овој newsletter
    <?php endif; ?>
    
    
    
</div>