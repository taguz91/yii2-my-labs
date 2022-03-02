<?php

namespace common\widgets\form\inputs;

use yii\helpers\Html;
use yii\widgets\InputWidget;

class InputPrependIcon extends InputWidget
{

    public $img;

    public function run()
    {
        return Html::tag('div', "{$this->getPrepend()}\n{$this->getInput()}", [
            'class' => 'input-group not-left-border'
        ]);
    }

    private function getInput()
    {
        return $this->renderInputHtml('text');
    }

    private function getPrepend()
    {
        return Html::tag('div', Html::img($this->img, [
            'class' => 'img-left-icon img-icon'
        ]), [
            'class' => 'input-group-prepend input-left-style',
        ]);
    }
}
