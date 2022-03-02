<?php

namespace common\widgets\form;

use yii\base\Widget;

class TermnsConditions extends Widget
{

    public function run()
    {
        return $this->render('termsConditions/scroll');
    }
}
