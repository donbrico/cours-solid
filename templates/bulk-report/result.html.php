<div class="alert alert-light">
    <h1 class="alert-title">Voici votre rapport dans divers formats</h1>
</div>
<?php if (!empty($results)) : ?>
    <?php foreach ($results as $report) : ?>
        <?= $report ?>
        <hr />
    <?php endforeach ?>
<?php endif ?>
