<?php

namespace api\models;

use common\models\User;
use common\yii\ModelRequest;
use Yii;

/**
 * @OA\Schema()
 * 
 */
class CreateUserRequest extends ModelRequest
{

    /** 
     * @var string 
     * @OA\Property(
     *      example="user987123"
     * )
     */
    public $username;

    /** 
     * @var string 
     * @OA\Property(
     *      example="email@example.com"
     * ) 
     */
    public $email;

    /** 
     * @var string 
     * @OA\Property(
     *      example="12345678"
     * ) 
     */
    public $password;

    /** @var User|null */
    private $_user;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
        ];
    }

    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->generateAccessToken();
        $saved = $user->save();

        $this->_user = $user;
        return $saved;
    }

    public function getUser(): ?User
    {
        return $this->_user;
    }
}
