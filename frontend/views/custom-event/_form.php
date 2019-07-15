<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CustomEvent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="custom-event-form" xmlns:clear="http://www.w3.org/1999/xhtml">

    <?php $form = ActiveForm::begin(); $colors = array(0=>'#6465A5', 1=>'#0294A5', 2=>'#F3E96B', 3=>'#F28A30',
        4=>'#F05837', 5=>'#00743F', 6=>'#93A806', 7=>'#F46A4E');?>

    <?= $form->field($model, 'ev_name')->textInput(['maxlength' => true]) ?>



    <?= $form->field($model, 'ev_color')->radioList([
            0=> '<div style="height:20px; width: 20px; float: left; margin-right:20px;background-color:'.$colors[0].';"></div>',
        1=> '<div style="height:20px; width: 20px;float: left;margin-right:20px;background-color:'.$colors[1].';"></div>',
        2=> '<div style="height:20px; width: 20px; float: left;margin-right:20px;background-color:'.$colors[2].';"></div>',
        3=> '<div style="height:20px; width: 20px;float: left;margin-right:20px;background-color:'.$colors[3].';"></div>',
        4=> '<div style="height:20px; width: 20px;float: left;margin-right:20px;background-color:'.$colors[4].';"></div>',
        5=> '<div style="height:20px; width: 20px;float: left;margin-right:20px; background-color:'.$colors[5].';"></div>',
        6=> '<div style="height:20px; width: 20px;float: left;margin-right:20px;background-color:'.$colors[6].';"></div>',
        7=> '<div style="height:20px; width: 20px; float: left;margin-right:20px;background-color:'.$colors[7].';"></div>',

    ],
        [
            'item' => function($index, $label, $name, $checked, $value){
                return '<input style="float:left;" type="radio" name="'.$name.'" value="'.$value.'"> '.$label.'&nbsp;';
            }
        ]) ?>
    <br/>
    <?= $form->field($model, 'ev_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ev_place')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
