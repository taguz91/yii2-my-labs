<?php

namespace common\widgets\form;

use Yii;
use yii\base\Widget;

class BreadcrumbForm extends Widget
{

    const TYPE_LINEAL = 'lineal';
    const TYPE_CIRCLE = 'circle';

    /** @var int */
    public $currentStep;

    /** @var int */
    public $totalSteps;

    /** @var string */
    public $prefixText;

    public $type = self::TYPE_LINEAL;

    public function init()
    {
        parent::init();
        if ($this->type === self::TYPE_LINEAL) {
            $this->prefixText = Yii::t('app', 'Completado');
        }
    }

    public function run()
    {
        if ($this->type === self::TYPE_CIRCLE) {
            return $this->circle();
        }
        return $this->lineal();
    }

    private function circle()
    {
        $percent = round(($this->currentStep / $this->totalSteps) * 100);

        return $this->render('breadcrumbs/circle', [
            'message' => "{$this->prefixText}",
            'value'   => (180 * $percent) / 100,
            'percent' => "{$this->currentStep}/{$this->totalSteps}",
        ]);
    }

    private function lineal()
    {
        $percent = round(($this->currentStep / $this->totalSteps) * 100);
        return $this->render('breadcrumbs/line', [
            'value'   => $percent,
            'message' => "{$this->prefixText} {$percent}%",
            'uid' => uniqid('progress'),
        ]);
    }
}
