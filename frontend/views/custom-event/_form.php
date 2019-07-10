<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CustomEvent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="custom-event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ev_id')->textInput() ?>

    <?= $form->field($model, 'ev_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ev_userid')->textInput() ?>

    <?= $form->field($model, 'ev_color')->textInput() ?>

    <?= $form->field($model, 'ev_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ev_place')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
