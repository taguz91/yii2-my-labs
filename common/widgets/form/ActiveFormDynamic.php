<?php

namespace common\widgets\form;

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

}
