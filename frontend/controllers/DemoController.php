<?php


namespace frontend\controllers;


use yii\rest\Controller;

class DemoController extends Controller
{
    public function actionDemo()
    {
        return ['id' => 1];
    }
}