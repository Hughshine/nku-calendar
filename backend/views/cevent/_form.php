<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\CeventModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cevent-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'ev_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ev_place')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model,'cev_tid')->dropDownList($teacher)?>

    <?= $form->field($model, 'ev_maxnumber')->textInput() ?>

    <?= $form->field($model, 'ev_summary')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ev_content')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ev_start_time')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => ''],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]);
    ?>

    <?= $form->field($model, 'ev_end_time')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => ''],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]);
    ?>

    <?= $form->field($model, 'ev_signup_endtime')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => ''],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]);
    ?>

    <?= $form->field($model, 'ev_label_img')->widget('common\widgets\file_upload\FileUpload',[
        'config'=>[

        ]
    ]) ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
