<?php

namespace api\models\form;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class DynamicForm extends Model
{

    /** @var array */
    public $fields = [];

    /** @var array */
    public $fieldsRules = [];

    /** @var array */
    private $rawAttributes = [];

    /** @var array */
    private $setAttributes = [];

    public function init()
    {
        foreach ($this->fields as $field) {
            $this->rawAttributes[] = $field['code'];
            $this->{$field['code']};
        }
        parent::init();
    }

    public function rules()
    {
        $rules = [
            [
                $this->rawAttributes, 'safe',
            ],
        ];

        if (!empty($this->fieldsRules['required'])) {
            $rules[] = [
                $this->fieldsRules['required'],
                'required',
                'message' => Yii::t('app', 'El campo es requerido'),
            ];
        }

        if (!empty($this->fieldsRules['number'])) {
            $rules[] = [
                $this->fieldsRules['number'],
                'number',
                'message' => Yii::t('app', 'Solo se permiten números.')
            ];
        }

        return $rules;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return ArrayHelper::map($this->fields, 'code', 'label');
    }


    /**
     * {@inheritdoc}
     */
    public function __set($name, $value)
    {
        if (in_array($name, $this->rawAttributes)) {
            $this->setAttributes[$name] = $value;
        } else {
            parent::__set($name, $value);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function __get($name)
    {
        if (in_array($name, $this->rawAttributes)) {
            return $this->setAttributes[$name] ?? null;
        } else {
            return parent::__get($name);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function formName()
    {
        return '';
    }
}
