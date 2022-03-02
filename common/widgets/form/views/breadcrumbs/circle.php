<?php

/**
 * @var int $value
 * @var string $message
 * @var string $percent
 */

Yii::debug([
    'message' => $message,
    'value' => $value
], 'circle_view');
?>

<style>
    .mask.full,
    .circle .fill {
        animation: fill ease-in-out 1s;
        transform: rotate(<?= $value ?>deg);
    }

    @keyframes fill {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(<?= $value ?>deg);
        }
    }
</style>

<div class="row mb-3">
    <div class="col-10">
        <p class="text-primary mb-0 text-bolderless"><?= $message ?></p>
    </div>

    <div class="col-2">

        <div class="circle-wrap">
            <div class="circle">
                <div class="mask full">
                    <div class="fill"></div>
                </div>
                <div class="mask half">
                    <div class="fill"></div>
                </div>
                <div class="inside-circle"> <?= $percent ?> </div>
            </div>
        </div>

    </div>

</div>