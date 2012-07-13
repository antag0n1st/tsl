<div class="quotes">

    <h3>Quote of the day</h3>
    <?php if(isset($quote)) : ?>
    <p>
      <?php echo $quote->description; ?>
    </p>

    <div>
        <b><?php echo $quote->author; ?></b>
    </div>

    <?php endif; ?>
</div>
