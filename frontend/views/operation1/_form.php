<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Operation1 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="operation1-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ev_id')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'op1_time')->textInput() ?>

    <?= $form->field($model, 'op1_status')->textInput() ?>

    <?= $form->field($model, 'op1_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
