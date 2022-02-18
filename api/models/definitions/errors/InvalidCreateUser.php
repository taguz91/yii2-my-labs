<?php

namespace api\models\definitions\errors;

/**
 * @OA\Schema(
 *      @OA\Property(
 *          property="errors",
 *          type="object",
 *          @OA\Property(
 *              property="username",
 *              description="List of the username errors",
 *              type="array",
 *              @OA\Items(type="string")
 *          ),
 *          @OA\Property(
 *              property="email",
 *              description="List of the email errors",
 *              type="array",
 *              @OA\Items(type="string")
 *          ),
 *          @OA\Property(
 *              property="password",
 *              description="List of the password errors",
 *              type="array",
 *              @OA\Items(type="string")
 *          )
 *      ),
 *      @OA\Property(
 *          property="summary",
 *          description="List of all errors",
 *          type="array",
 *          @OA\Items(type="string")
 *      )
 * )
 */
class InvalidCreateUser
{
}
