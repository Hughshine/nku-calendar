<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\StudentEventSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-event-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ev_id') ?>

    <?= $form->field($model, 'ev_time') ?>

    <?= $form->field($model, 'ev_name') ?>

    <?= $form->field($model, 'ev_userid') ?>

    <?= $form->field($model, 'ev_place') ?>

    <?php // echo $form->field($model, 'ev_superevent_id') ?>

    <?php // echo $form->field($model, 'ev_description') ?>

    <?php // echo $form->field($model, 'ev_color') ?>

    <?php // echo $form->field($model, 'ev_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
