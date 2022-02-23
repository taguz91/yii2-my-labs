<?php

namespace api\controllers;

use api\actions\FormDynamicAction;
use yii\web\Controller;

class FormController extends Controller
{

    public function actions()
    {
        return [
            'dynamic' => [
                'class' => FormDynamicAction::class,
                'dataFile' => 'form_data',
                'json' => false,
            ]
        ];
    }
}
