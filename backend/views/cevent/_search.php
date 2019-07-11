<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CeventSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cevent-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ev_id') ?>

    <?= $form->field($model, 'ev_start_time') ?>

    <?= $form->field($model, 'ev_title') ?>

    <?= $form->field($model, 'ev_adminid') ?>

    <?= $form->field($model, 'ev_place') ?>

    <?php // echo $form->field($model, 'ev_number') ?>

    <?php // echo $form->field($model, 'cev_tid') ?>

    <?php // echo $form->field($model, 'ev_maxnumber') ?>

    <?php // echo $form->field($model, 'ev_summary') ?>

    <?php // echo $form->field($model, 'ev_content') ?>

    <?php // echo $form->field($model, 'ev_label_img') ?>

    <?php // echo $form->field($model, 'ev_end_time') ?>

    <?php // echo $form->field($model, 'ev_created_at') ?>

    <?php // echo $form->field($model, 'ev_updated_at') ?>

    <?php // echo $form->field($model, 'ev_signup_endtime') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
