<?php // Index view

use api\models\docs\Doc;
use yii\bootstrap4\Html;
use yii\helpers\Url;


/**
 * @var \yii\web\View $this
 */

/** @var Doc[] */
$docs = require_once(Yii::getAlias('@common/data/docs_data.php'));

$this->title = 'API | Docs';
?>

<div class="row">
    <div class="col-9 col-md-10">
        <h1 class="text-secondary">List of all avaliable documentations</h1>
    </div>
    <div class="col-3 col-md-2">
        <?= Html::beginForm(['/docs/logout'], 'post', ['class' => 'form-inline'])
            . Html::submitButton(
                'Logout',
                ['class' => 'btn btn-danger btn-block logout']
            )
            . Html::endForm() ?>
    </div>

    <div class="col-12">
        <p class="text-muted mb-0">Welcome: <?= Yii::$app->user->identity->username ?></p>
    </div>
</div>
<hr>

<div class="row">

    <?php foreach ($docs as $doc) : ?>
        <a href="<?= Url::to([$doc->url]) ?>" target="_blank" class="col-6 col-md-4" style="cursor: pointer; text-decoration: none;">
            <div class="border rounded mx-2 my-1 p-3" style="max-height: 165px; height: 165px;">

                <p class="font-weight-bold" style="font-size: 20px; overflow: hidden;">
                    <?= Html::encode($doc->name) ?>
                </p>

                <img class="rounded img-responsive" src="<?= $doc->image ?>" alt="Api image documentation">

            </div>
        </a>

    <?php endforeach; ?>

</div>