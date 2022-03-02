<?php

namespace common\widgets\form;

use yii\helpers\ArrayHelper;

class ActiveFormDynamic extends \yii\bootstrap4\ActiveForm
{
    /**
     * @var string the default field class name when calling [[field()]] to create a new field.
     * @see fieldConfig
     */
    public $fieldClass = ActiveFieldDynamic::class;

    /**
     * {@inheritdoc}
     * @return ActiveFieldDynamic
     */
    public function field($model, $attribute, $options = [])
    {
        return parent::field($model, $attribute, $options);
    }

    public function renderWidget(array $widget)
    {
        if (!empty($widget)) {
            /** @var \yii\base\Widget */
            $class = ArrayHelper::remove($widget, 'class');
            return $class::widget($widget);
        }
        return '';
    }
}
