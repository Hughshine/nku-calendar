<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cevent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cevent-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ev_id')->textInput() ?>

    <?= $form->field($model, 'ev_time')->textInput() ?>

    <?= $form->field($model, 'ev_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ev_adminid')->textInput() ?>

    <?= $form->field($model, 'ev_place')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ev_number')->textInput() ?>

    <?= $form->field($model, 'cev_tid')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
