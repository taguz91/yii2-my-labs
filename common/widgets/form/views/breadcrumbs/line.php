<?php

/**
 * @var int $value
 * @var string $message
 * @var string $uid
 */
?>

<div class="row justify-content-center mb-3">
    <div class="col-10">

        <p class="text-muted mb-0"><?= $message ?></p>

        <div class="progress">
            <div id="<?= $uid ?>" class="progress-bar" role="progressbar" aria-valuenow="<?= $value ?>" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        setTimeout(function() {
            document.querySelector('#<?= $uid ?>').style.width = "<?= $value ?>%";
        }, 500)
    });
</script>