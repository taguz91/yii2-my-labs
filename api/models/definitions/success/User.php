<?php

namespace api\models\definitions\success;

/**
 * @OA\Schema(
 *      @OA\Property(
 *          property="id",
 *          type="integer",      
 *      ),
 *      @OA\Property(
 *          property="username",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="auth_key",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="password_hash",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="password_reset_token",
 *          type="string",
 *          nullable=true
 *      ),
 *      @OA\Property(
 *          property="email",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="status",
 *          type="integer",
 *          enum={0,9,10}
 *      ),
 *      @OA\Property(
 *          property="created_at",
 *          type="integer"
 *      ),
 *      @OA\Property(
 *          property="updated_at",
 *          type="integer"
 *      ),
 *      @OA\Property(
 *          property="verification_token",
 *          type="string"
 *      )
 * )
 */
class User
{

    // {
//     "id": 7,
//     "username": "tres",
//     "auth_key": "CzGkxamXCpRnQ2eJ5fFS-ERUHaX3noll",
//     "password_hash": "$2y$13$dp2Z81nR1HPpkmKJJqcn1OzPJodcSWawxdBHpvsE2jXnBlSuJBk6m",
//     "password_reset_token": null,
//     "email": "dosdos@email.com",
//     "status": 9,
//     "created_at": 1635562654,
//     "updated_at": 1635562654,
//     "verification_token": "tffG0NGKC7gJior9khJIQmqDP9pyuQaa_1635562654"
// }
}
