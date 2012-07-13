<?php foreach ($sidebar_elements as $element): ?>
    <div class="o" style="margin-bottom: 10px;">
        <?php if ($element->type == 'view'): ?>
            <?php $this->load->view($element->content); ?>
        <?php else: ?>
            <?php echo eval('?> '.$element->content.' ');  ?>
        <?php endif; ?>
    </div>
    <div class="separator"></div>
<?php endforeach; ?>