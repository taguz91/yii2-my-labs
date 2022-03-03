<?php


/**
 * @var \yii\web\View $this
 * @var \api\models\form\DynamicForm $dynamicForm
 * @var array $sections
 */

use common\widgets\form\ActiveFormDynamic;
use common\widgets\form\BreadcrumbForm;
use yii\bootstrap4\Html;

?>

<?php $form = ActiveFormDynamic::begin() ?>

<?= BreadcrumbForm::widget([
    'currentStep' => 4,
    'totalSteps'  => 8,
    'prefixText'  => 'Informacion personal 1/2',
    'type'        => BreadcrumbForm::TYPE_CIRCLE,
]) ?>

<?php foreach ($sections as $section) : ?>
    <div class="row">

        <div class="col-12">
            <h3 class="text-primary"><?= $section['title'] ?></h3>

            <?php if (!empty($section['subtitle'])) : ?>
                <h5 class="text-muted"><?= $section['subtitle'] ?></h5>
            <?php endif; ?>
        </div>

        <?php foreach ($section['fields'] as $attribute) : ?>

            <?php if ($attribute['isInput']) : ?>

                <?= $form->field($dynamicForm, $attribute['code'])
                    ->fieldCold($attribute['col'])
                    ->addPlaceholder($attribute['placeholder'])
                    ->useWidget($attribute['widget']) ?>

            <?php else : ?>
                <div class="col-12">
                    <?= $form->renderWidget($attribute['widget']) ?>
                </div>
            <?php endif; ?>

        <?php endforeach; ?>

    </div>

<?php endforeach; ?>

<?= Html::submitButton('Continue', [
    'class' => 'btn btn-primary mx-auto'
]) ?>

<?php ActiveFormDynamic::end() ?>