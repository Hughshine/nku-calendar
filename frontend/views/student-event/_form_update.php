<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\StudentEvent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ev_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ev_place')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ev_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ev_color')->textInput() ?>

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
