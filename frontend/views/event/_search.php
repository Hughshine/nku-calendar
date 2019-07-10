<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EventSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ev_time') ?>

    <?= $form->field($model, 'ev_title') ?>

    <?= $form->field($model, 'ev_id') ?>

    <?= $form->field($model, 'ev_adminid') ?>

    <?= $form->field($model, 'ev_place') ?>

    <?php // echo $form->field($model, 'ev_maxnumber') ?>

    <?php // echo $form->field($model, 'ev_number') ?>

    <?php // echo $form->field($model, 'ev_content') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
