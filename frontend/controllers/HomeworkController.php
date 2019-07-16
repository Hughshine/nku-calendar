<?php


namespace frontend\controllers;


use yii\web\Controller;

class HomeworkController extends Controller
{
    public function actionTeam()
    {
        return $this->render('team');
    }

    public function actionPerson()
    {
        return $this->render('person');
    }
}