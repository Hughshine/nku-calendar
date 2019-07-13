<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Comment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'com_time')->textInput() ?>

    <?= $form->field($model, 'com_id')->textInput() ?>

    <?= $form->field($model, 'com_userid')->textInput() ?>

    <?= $form->field($model, 'com_content')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'com_eveid')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
