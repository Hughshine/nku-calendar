<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;
use yii\helpers\Url;

$this->title = '注册';
$this->params['breadcrumbs'][] = $this->title;

$events = array();
//Testing
$Event = new \yii2fullcalendar\models\Event();
$Event->id = 1;
$Event->title = 'Testing';
$Event->start = date('Y-m-d\Th:m:s\Z');
$events[] = $Event;

$Event = new \yii2fullcalendar\models\Event();
$Event->id = 2;
$Event->title = 'Testing';
$Event->start = date('Y-m-d\Th:m:s\Z',strtotime('tomorrow 6am'));
$events[] = $Event;
?>
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b><?= Html::encode($this->title) ?></b></a>
    </div>

    <div class="login-box-body">
        <!--        <div class="col-lg-5">-->
        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'email') ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <div class="form-group">
            <?= Html::submitButton('注册', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
        <!--        </div>-->
    </div>
</div>
