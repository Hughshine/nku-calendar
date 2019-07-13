<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Operation1Search */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="operation1-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ev_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'op1_time') ?>

    <?= $form->field($model, 'op1_status') ?>

    <?= $form->field($model, 'op1_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
