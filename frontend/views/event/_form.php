<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ev_time')->textInput() ?>

    <?= $form->field($model, 'ev_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ev_id')->textInput() ?>

    <?= $form->field($model, 'ev_adminid')->textInput() ?>

    <?= $form->field($model, 'ev_place')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ev_maxnumber')->textInput() ?>

    <?= $form->field($model, 'ev_number')->textInput() ?>

    <?= $form->field($model, 'ev_content')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
