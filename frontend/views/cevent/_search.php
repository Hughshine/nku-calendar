<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CeventSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cevent-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ev_id') ?>

    <?= $form->field($model, 'ev_start_time') ?>

    <?= $form->field($model, 'ev_name') ?>

    <?= $form->field($model, 'ev_adminid') ?>

    <?= $form->field($model, 'ev_place') ?>

    <?php // echo $form->field($model, 'ev_number') ?>

    <?php // echo $form->field($model, 'cev_tid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
