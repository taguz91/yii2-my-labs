<?php

namespace api\controllers;

use common\yii\RestController;
use light\swagger\SwaggerAction;
use light\swagger\SwaggerApiAction;
use Yii;
use yii\helpers\Url;

/**
 * @OA\Server(url="http://localhost:8080")
 * @OA\Info(
 *      title="API - Template",
 *      version="1.0.0",
 *      description="A example usage swagger with yii2 framework",
 *      @OA\Contact(
 *          email="johnnygar98@hotmail.com"
 *      )
 * )
 * @OA\SecurityScheme(
 *      type="apiKey",
 *      description="Use /login to authenticated",
 *      name="X-Api-Key",
 *      in="header",
 *      securityScheme="ApiKeyAuth"
 * )
 * @OA\Tag(
 *      name="user", 
 *      description="User services"
 * )
 */
class SiteController extends RestController
{

    public function actions()
    {
        return [
            // Public API documentation
            'docs' => [
                'class'   => SwaggerAction::class,
                'restUrl' => Url::to(['site/api-doc'])
            ],
            'api-doc' => [
                'class' => SwaggerApiAction::class,
                'scanDir' => [
                    Yii::getAlias('@api/controllers'),
                    Yii::getAlias('@api/models'),
                ],
                'scanOptions' => [
                    'exclude' => [
                        Yii::getAlias('@api/controllers/v1/AppController'),
                    ]
                ],
                'api_key' => 'token',
            ],
        ];
    }

    protected function verbs()
    {
        return [
            'index' => ['GET']
        ];
    }

    public function actionIndex()
    {
        return [
            'version' => '1.0.0',
        ];
    }
}
