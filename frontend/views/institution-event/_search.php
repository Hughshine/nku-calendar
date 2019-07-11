<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\InstitutionEventSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="institution-event-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ev_id') ?>

    <?= $form->field($model, 'ev_time') ?>

    <?= $form->field($model, 'ev_name') ?>

    <?= $form->field($model, 'ev_adminid') ?>

    <?= $form->field($model, 'ev_place') ?>

    <?php // echo $form->field($model, 'ev_number') ?>

    <?php // echo $form->field($model, 'cev_tid') ?>

    <?php // echo $form->field($model, 'ev_maxnumber') ?>

    <?php // echo $form->field($model, 'all_day') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
