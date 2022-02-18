<?php

namespace api\controllers\v1;

use common\swagger\CleanTagsProcessor;
use common\swagger\PathsTagProcessor;
use common\yii\RestController;
use light\swagger\SwaggerAction;
use light\swagger\SwaggerApiAction;
use OpenApi\Processors\AugmentParameters;
use OpenApi\Processors\AugmentProperties;
use OpenApi\Processors\AugmentSchemas;
use OpenApi\Processors\CleanUnmerged;
use OpenApi\Processors\DocBlockDescriptions;
use OpenApi\Processors\ExpandInterfaces;
use OpenApi\Processors\ExpandTraits;
use OpenApi\Processors\InheritProperties;
use OpenApi\Processors\MergeIntoComponents;
use OpenApi\Processors\MergeIntoOpenApi;
use OpenApi\Processors\MergeJsonContent;
use OpenApi\Processors\MergeXmlContent;
use OpenApi\Processors\OperationId;
use Yii;
use yii\helpers\Url;

/**
 * @OA\Server(url="http://localhost:8080")
 * @OA\Info(
 *      title="App private api",
 *      version="1.0.0",
 *      description="Private API context using swagger with yii2",
 *      @OA\Contact(
 *          email="johnnygar98@hotmail.com"
 *      )
 * )
 * @OA\SecurityScheme(
 *      type="apiKey",
 *      description="Use login to auth",
 *      name="X-Api-Key",
 *      in="header",
 *      securityScheme="ApiKeyAuth"
 * )
 * @OA\Tag(
 *      name="user",
 *      description="User services"
 * )
 * @OA\Tag(
 *      name="private",
 *      description="Private context API"
 * )
 */
class AppController extends RestController
{

    protected function rules()
    {
        return [
            [
                'actions' => ['docs', 'api-doc'],
                'allow' => true,
                'roles' => ['@'],
            ],
        ];
    }

    public function actions()
    {
        return [
            // Private API documentation
            'docs' => [
                'class'   => SwaggerAction::class,
                'restUrl' => Url::to(['v1/app/api-doc'])
            ],
            'api-doc' => [
                'class' => SwaggerApiAction::class,
                'scanDir' => [
                    Yii::getAlias('@api/controllers'),
                    Yii::getAlias('@api/models'),
                ],
                'scanOptions' => [
                    'processors' => [
                        new DocBlockDescriptions(),
                        new MergeIntoOpenApi(),
                        new MergeIntoComponents(),
                        new ExpandInterfaces(),
                        new ExpandTraits(),
                        new AugmentSchemas(),
                        new AugmentProperties(),
                        new PathsTagProcessor(['private']),
                        new InheritProperties(),
                        new AugmentParameters(),
                        new MergeJsonContent(),
                        new MergeXmlContent(),
                        new OperationId(),
                        new CleanUnmerged(),
                        new CleanTagsProcessor(['user']),
                    ],
                    'validate' => false,
                    'exclude' => [
                        Yii::getAlias('@api/controllers/SiteController'),
                    ]
                ],
                'api_key' => 'token',
            ]
        ];
    }
}
