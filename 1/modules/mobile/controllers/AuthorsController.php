<?php

namespace app\modules\mobile\controllers;

use yii\rest\ActiveController;

class AuthorsController extends ActiveController
{
    public function behaviors()
    {
        return [
            [
                'class' => \yii\filters\ContentNegotiator::className(),
                'only' => ['index', 'view'],
                'formats' => [
                    'application/json' => \yii\web\Response::FORMAT_JSON,
                ],
            ],
        ];
    }
    
    public $modelClass = 'app\models\Authors';

}
