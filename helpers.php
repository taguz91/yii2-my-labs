<?php

// 
// This file manage the global functions 
// 

/**
 * Status http response
 */
function statusCode(int $status)
{
  Yii::$app->response->statusCode = $status;
}
