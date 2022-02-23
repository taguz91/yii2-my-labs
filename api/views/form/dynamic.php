<?php


/**
 * @var \yii\web\View $this
 * @var \api\models\form\DynamicForm $dynamicForm
 * @var array $sections
 */

use common\widgets\form\ActiveFormDynamic;
use yii\bootstrap4\Html;

?>

<?php $form = ActiveFormDynamic::begin() ?>

<?php foreach ($sections as $section) : ?>
    <div class="row">

        <div class="col-12">
            <h3 class="text-primary"><?= $section['title'] ?></h3>

            <?php if (!empty($section['subtitle'])) : ?>
                <h5 class="text-muted"><?= $section['subtitle'] ?></h5>
            <?php endif; ?>
        </div>

        <?php foreach ($section['fields'] as $attribute) : ?>
            <?= $form->field($dynamicForm, $attribute['code'])
                ->fieldCold($attribute['col'])->addPlaceholder($attribute['placeholder']) ?>
        <?php endforeach; ?>

    </div>

<?php endforeach; ?>



<?= Html::submitButton('Send', [
    'class' => 'btn btn-primary'
]) ?>

<?php ActiveFormDynamic::end() ?>