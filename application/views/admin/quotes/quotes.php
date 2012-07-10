<div class="container o">
    <h3>
        Цитати - ова не е довршено, ќе го довршам наскоро
    </h3>
    <?php foreach($quotes as $quote): ?>
    <?php echo $quote->description; ?><br />
    <?php echo $quote->author; ?>
    <hr />
    <?php endforeach; ?>
    <?php echo $this->pagination->create_links(); ?>
</div>
