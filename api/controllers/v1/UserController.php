<?php

namespace api\controllers\v1;

use api\models\CreateUserRequest;
use api\models\LoginRequest;
use common\models\User;
use common\yii\RestController;

class UserController extends RestController
{

    /**
     * List of all avaliable vers 
     */
    protected function verbs()
    {
        return [
            'create' => ['POST', 'HEAD'],
            'all'    => ['GET', 'HEAD'],
            'random' => ['GET', 'HEAD'],
            'login'  => ['POST', 'HEAD'],
        ];
    }

    /**
     * Auth needed for the following action
     */
    protected function auth()
    {
        return [
            'all',
        ];
    }

    /**
     * @OA\Get(
     *      path="/v1/user/random",
     *      summary="Create a random user",
     *      tags={"user"},
     *      @OA\Response(
     *          response=200,
     *          description="When the random user was created succesfully",
     *          @OA\JsonContent(
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="saved",
     *                      type="boolean"
     *                  )
     *              )
     *          )
     *      ),
     *      security={ {"ApiKeyAuth": {}} }
     * )
     */
    public function actionRandom()
    {
        $user = new User();
        $user->username = uniqid('user.');
        $user->email = uniqid() . '@example.com';
        $user->setPassword(uniqid('PASS'));
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->generateAccessToken();
        return [
            'saved' => $user->save()
        ];
    }

    /**
     * @OA\Post(
     *      path="/v1/user/create",
     *      summary="Create or register a new user",
     *      tags={"user"},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/CreateUserRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="When the user was created succesfully",
     *          @OA\JsonContent(ref="#/components/schemas/User")
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="When the submited data has errors",
     *          @OA\JsonContent(ref="#/components/schemas/InvalidCreateUser")
     *      )
     * )
     */
    public function actionCreate()
    {
        $request = (new CreateUserRequest())
            ->post();

        if ($request->signup()) {
            statusCode(201);
            return $request->getUser();
        }

        statusCode(400);
        return [
            'errors'  => $request->getErrors(),
            'summary' => $request->getErrorSummary(true),
        ];
    }

    /**
     * @OA\Post(
     *      path="/v1/user/login",
     *      summary="Login into application",
     *      tags={"user", "private"},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/LoginRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="When the username and password was correct",
     *          @OA\JsonContent(ref="#/components/schemas/User")
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Error login, invalid information",
     *          @OA\JsonContent(ref="#/components/schemas/InvalidLogin")
     *      )
     * )
     */
    public function actionLogin()
    {
        $request = (new LoginRequest())
            ->post();

        if ($request->login()) {
            return $request->getUser();
        }
        statusCode(400);
        return [
            'errors'  => $request->getErrors(),
            'summary' => $request->getErrorSummary(true),
        ];
    }

    /**
     * @OA\Get(
     *      path="/v1/user/all",
     *      summary="List all register user",
     *      tags={"user","private"},
     *      @OA\Response(
     *          response=200,
     *          description="All users",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="#/components/schemas/User")
     *          )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="When not authenticated",
     *          @OA\JsonContent(ref="#/components/schemas/ExceptionResponse")
     *      ),
     *      security={ {"ApiKeyAuth": {}} }
     * )
     */
    public function actionAll()
    {
        return User::findAll([
            'status' => 9
        ]);
    }
}
