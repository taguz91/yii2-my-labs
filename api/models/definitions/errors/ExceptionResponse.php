<?php

namespace api\models\definitions\errors;

/**
 * @OA\Schema(
 *      @OA\Property(
 *          property="name",
 *          type="string",
 *          example="Invalid"
 *      ),
 *      @OA\Property(
 *          property="message",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="code",
 *          type="integer"
 *      ),
 *      @OA\Property(
 *          property="status",
 *          type="integer"
 *      ),
 *      @OA\Property(
 *          property="type",
 *          type="string",
 *          example="\yii\http\HttpException"
 *      )
 * )
 */
class ExceptionResponse
{
}
