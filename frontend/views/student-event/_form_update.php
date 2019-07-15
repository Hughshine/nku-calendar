<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\StudentEvent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-event-form">

    <?php $form = ActiveForm::begin(); $colors = array(0=>'#6465A5', 1=>'#0294A5', 2=>'#F3E96B', 3=>'#F28A30',
        4=>'#F05837', 5=>'#00743F', 6=>'#93A806', 7=>'#F46A4E');?>

    <?= $form->field($model, 'ev_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ev_place')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ev_description')->textInput(['maxlength' => true]) ?>

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

    <?= $form->field($model, 'ev_time')->textInput()->widget(DateTimePicker::classname(),
        [
            'options' => ['placeholder' => ''],
            'pluginOptions' =>
                [
                    'autoclose' => true,
                    'todayHighlight' => true,
                    'startDate' =>date('Y-m-d'), //设置今天之前的日期不能选择
                ]
        ]); ?>

    <?= $form->field($model, 'ev_end')->textInput()->widget(DateTimePicker::classname(),
        [
            'options' => ['placeholder' => ''],
            'pluginOptions' =>
                [
                    'autoclose' => true,
                    'todayHighlight' => true,
                    'startDate' =>date('Y-m-d'), //设置今天之前的日期不能选择
                ]
        ]); ?>

    <div class="form-group">
        <?= Html::submitButton('更新', ['class' => 'btn btn-success']) ?>
        <?= Html::a('删除',['student-event/delete', 'id'=>$model->ev_id], ['id'=>'stu-event-delete', 'class'=>'btn btn-danger', 'title'=>"删除",'aria-label'=>"删除",'data-pjax'=>"0",'data-confirm'=>"您确定要删除此项吗？",'data-method'=>"post"]) ?>
    </div>
    <script>
        // $('#stu-event-delete').on('click', function (event) {
        //     $.post("index.php?r=student-event%2Fdelete&id="+$(this).attr('eventid'));
        // })
    </script>

    <?php ActiveForm::end(); ?>

</div>
