<script>
    $(function() {
        $( "#sortable" ).sortable({
            update: function(event, ui) {
                console.log($(this).sortable('toArray').toString());
                $.post(base_url+'admin/sidebar/update_position',{order:$(this).sortable('toArray').toString()},function(){
                    
                });
            }
    });
        
        $( "#sortable" ).disableSelection();
    });
</script>
<style type="text/css">
    #sortable tr:hover{ cursor: pointer; background-color: #777bd6; color: white !important;}
    #sortable tr:hover >td{ color: white !important;}
</style>
<div class="container o">
    <h3>Измена на Страничното мени</h3>
    <p>Со влечење на елементите од менито (<b>drag &amp; drop</b>) можете да ја измените нивната позиција. </p>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Наслов</th>
            <th style="width: 50px;">Измени</th>
            <th style="width: 50px;">Избриши</th>
        </tr>
     </thead>
    <tbody id="sortable" >
        <?php $br=0; foreach($sidebar_elements as $element): ?>
        <tr id="<?php echo $element->id; ?>" class="<?php echo ($br++%2==0) ? 'odd' : ''; ?>" >
            <td><?php echo $element->id; ?></td>
            <td><span></span><?php echo $element->name; ?></td>
            <td>
                <?php if($element->type == 'content'): ?>
                <a href="<?php echo base_url().'admin/sidebar/edit_element/'.$element->id; ?>">
                    <img alt="" title="Измени" src="<?php echo base_url().'images/edit-7.png' ?>" />
                </a>
                <?php else: ?>
                -
                <?php endif; ?>
            </td>
            <td>
                <?php if($element->is_deletable): ?>
                <a onclick="return confirm_delete();" href="<?php echo base_url().'admin/sidebar/delete_element/'.$element->id; ?>">
                    <img alt="" title="Избриши" src="<?php echo base_url().'images/edit-delete-icon.png' ?>" />
                </a>
                <?php else: ?>
                -
                <?php endif; ?>
            </td>
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