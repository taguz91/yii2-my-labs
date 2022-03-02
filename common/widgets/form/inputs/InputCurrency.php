<?php

namespace common\widgets\form\inputs;

use yii\helpers\Html;
use yii\widgets\InputWidget;

class InputCurrency extends InputWidget
{

    public function init()
    {
        parent::init();
        $this->options['data-type'] = 'currency';
    }

    public function run()
    {
        $inputs = Html::tag('div', "{$this->getHiddenInput()}\n{$this->getInput()}", [
            'class' => 'col-6 ',
        ]);

        return Html::tag('div', "{$this->getLabel()}\n{$inputs}", [
            'class' => 'row',
        ]);
    }

    private function getLabel()
    {
        /** @var \api\models\form\DynamicForm */
        $model = $this->model;

        if (!isset($model->fieldLabels[$this->getName()])) {
            $model->fieldLabels[$this->getName()] = $this->model->getAttributeLabel($this->attribute);
            $model->fieldLabels[$this->attribute] = '';
        }

        return Html::tag(
            'div',
            Html::label(
                $model->fieldLabels[$this->getName()],
                $this->getCurrencyId()
            ),
            [
                'class' => 'col-6 ',
            ]
        );
    }

    private function getInput()
    {
        $options = $this->options;
        $options['class'] = 'form-currency';

        if ($this->hasModel()) {
            $options['id'] = $this->getCurrencyId();
            $options['name'] = $this->getName();
            $options['data-target'] = Html::getInputId($this->model, $this->attribute);
            $options['pattern'] = '^\$\s\d{1,3}(,\d{3})*(\.\d+)?$';
            return Html::activeTextInput($this->model, $this->attribute, $options);
        }
        return Html::textInput($this->name, $this->value, $options);
    }

    private function getHiddenInput()
    {
        if ($this->hasModel()) {
            return Html::activeHiddenInput($this->model, $this->attribute, $this->options);
        }
        return Html::hiddenInput($this->name, $this->value, $this->options);
    }

    private function getName(): string
    {
        return 'currency' . ucfirst(Html::getInputName($this->model, $this->attribute));
    }

    private function getCurrencyId()
    {
        return 'currency-' . Html::getInputId($this->model, $this->attribute);
    }
}
