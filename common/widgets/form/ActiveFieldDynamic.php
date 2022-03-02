<?php

namespace common\widgets\form;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class ActiveFieldDynamic extends \yii\bootstrap4\ActiveField
{

    private $fieldCol = 12;

    public function render($content = null)
    {
        return Html::tag('div', parent::render($content), [
            'class' => "col-12 col-md-{$this->fieldCol}",
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function label($label = null, $options = [])
    {
        $modelLabel = $this->model->getAttributeLabel($this->attribute);

        if (empty($modelLabel)) {
            $this->labelOptions = [
                'class' => 'not-required-label label',
            ];
        }
        return parent::label($label, $options);
    }

    public function fieldCold(int $col)
    {
        $this->fieldCol = $col;
        return $this;
    }

    public function addPlaceholder(string $placeholder)
    {
        if (!empty($placeholder)) {
            $this->inputOptions['placeholder'] = $placeholder;
        }
        return $this;
    }

    public function useWidget(array $widget)
    {
        if (!empty($widget)) {
            $class = ArrayHelper::remove($widget, 'class');
            $this->widget($class, $widget);
        }
        return $this;
    }
}
