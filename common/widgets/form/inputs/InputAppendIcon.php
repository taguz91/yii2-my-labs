<?php

namespace common\widgets\form\inputs;

use yii\helpers\Html;
use yii\widgets\InputWidget;

class InputAppendIcon extends InputWidget
{

    public $img;

    public function run()
    {
        return Html::tag('div', "{$this->getInput()}\n{$this->getAppend()}", [
            'class' => 'input-group not-right-border '
        ]);
    }

    private function getInput()
    {
        if ($this->hasModel()) {
            return Html::activeTextInput($this->model, $this->attribute, $this->options);
        }
        return Html::activeTextInput($this->name, $this->value, $this->options);
    }

    private function getAppend()
    {
        return Html::tag('div', Html::img($this->img, [
            'class' => 'img-right-icon img-icon'
        ]), [
            'class' => 'input-group-append input-right-style',
        ]);
    }
}
