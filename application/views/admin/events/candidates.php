<?php if (isset($candidates) and is_array($candidates) and count($candidates)): ?>    
    <div class="clear"></div>
    <div class="candidates" style="margin-top:20px">
        <h3>Пријавени кандидати</h3>
        <table >
             <thead>
                <tr>
                    <th style="width:120px">Име и презиме</th>
                    <th style="width:100px">Телефон</th>
                    <th style="width:190px">e-mail</th>
                    <th style="width:100px">Професија</th>
                    <th style="width:150px">Компанија</th>
                    <th style="width:200px">Коментар</th>
                    <th style="width:70px">Датум</th>
                    <th style="width:30px"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($candidates as $candidate): ?>
                <tr>
                    <td>
                         <?php echo $candidate->name; ?>
                    </td>
                    <td>
                        <?php echo $candidate->phone; ?>
                    </td>
                    <td>
                        <?php echo $candidate->email; ?>
                    </td>
                    <td>
                        <?php echo $candidate->profession; ?>
                    </td>
                    <td>
                        <?php echo $candidate->company; ?>
                    </td>
                    <td>
                        <?php echo (strlen($candidate->comment) > 1 ? $candidate->comment : '/'); ?>
                    </td>
                    <td>
                         <?php FieldHelper::date_no_time_field($candidate->date_created); ?>
                    </td>
                    <td >            
                        <div style="margin-top:10px">
                                <a href="#" class="delete-link" title="Избриши" rel="<?php echo $candidate->id; ?>">
                                    <img style="vertical-align:middle" src="<?php echo base_url() ?>public/images/delete_red_24_24.png" alt=""  />
                                </a>                                    
                            
                     </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
<script type="text/javascript">
    $(".delete-link").click(function(){
        
        if(window.confirm('Дали сте сигурни дека сакате да избришете?'))
        {
            var candidateId = $(this).attr('rel');
            window.location = "<?php echo base_url()?>admin/events/delete_candidate/" + candidateId;
        }
    });
</script>    
<?php endif; ?>