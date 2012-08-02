<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=exceldata.xls");
header('charset=utf-8');
header("Pragma: no-cache");
header("Expires: 0");
?>  
    <table border='1'>
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
                            <?php echo $row->email; ?>
                    </td>
                    <td>
                            <?php echo $row->newsletter_title; ?>
                    </td>
                    <td>
                            <?php echo $row->article_title; ?>
                    </td>
                    <td>
                        <?php echo FieldHelper::date_no_time_field($row->date_clicked); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
    </table>  