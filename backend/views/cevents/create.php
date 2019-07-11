<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use common\models\TeacherModel;
use kartik\datetime\DateTimePicker;
$this->title='创建';
$this->params['breadcrumbs'][]=['label'=>'文章','url'=>'cevent/index'];
$this->params['breadcrumbs'][]=$this->title;

?>
<div class="row">
    <div class="col-lg-9">
        <div class ="panel-title box-title">
            <span>创建活动</span>
        </div>
        <div class="panel-body">
            <?php $form=ActiveForm::begin()?>

            <?=$form->field($model,'ev_title')->textinput(['maxlength'=>true])?>

            <?=$form->field($model,'ev_content')->textinput(['maxlength'=>true])?>


            <?=$form->field($model,'ev_place')->textinput(['maxlength'=>true])?>

            <?=$form->field($model,'ev_maxnumber')->textinput(['maxlength'=>true])?>

            <?=$form->field($model,'cev_tid')->dropDownList($teacher)?>

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
                <?=Html::submitButton("发布",['class'=>'btn btn-success'])?>
            </div>

            <?php ActiveForm::end()?>
        </div>
    </div>
    <div class==col-lg-3></div>
    <div class ="panel-title box-title">
        <span>注意事项</span>
    </div>
    <div class="panel-body">
        <p>1.ffffffffffffffff</p>
    </div>
</div>
