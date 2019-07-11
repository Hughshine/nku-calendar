<?php
namespace backend\controllers\base;


use yii\web\Controller;

class BaseController extends Controller{
    public function beforeAction($action)
    {
        if(!parent::beforeAction($action))
        {
            return false;
        }
        return true;
    }
}