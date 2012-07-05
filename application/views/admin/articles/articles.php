<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
Displays all articles<br />

<?php foreach($articles as $article): ?>
<?php echo $article->id; ?><br />
<?php echo $article->title; ?><br />
<?php echo $article->date_created; ?><br />
<hr />
<?php endforeach; ?>

<?php echo $this->pagination->create_links(); ?>
