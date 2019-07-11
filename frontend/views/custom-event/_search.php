<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CustomEventSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="custom-event-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ev_id') ?>

    <?= $form->field($model, 'ev_name') ?>

    <?= $form->field($model, 'ev_userid') ?>

    <?= $form->field($model, 'ev_color') ?>

    <?= $form->field($model, 'ev_description') ?>

    <?php // echo $form->field($model, 'ev_place') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
