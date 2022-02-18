<?php

namespace common\yii;

use Yii;
use yii\base\Model;
use yii\web\HttpException;

class ModelRequest extends Model
{

    /**
     * Load the data from post request
     * @return static
     */
    public function post(string $node = '')
    {
        $data = Yii::$app->request->post();
        $this->load($data, $node);
        return $this;
    }

    /**
     * Load the post request and validate the data
     * @return static
     */
    public function postValidOrEnd(string $node = '')
    {
        $this->post($node);
        if (!$this->validate()) {
            throw new HttpException(400, Yii::t('app', 'Invalid request, check your data submited and try again.'));
        }
        return $this;
    }
}
