<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CeventModel */

$this->title = '发布活动';
$this->params['breadcrumbs'][] = ['label' => '活动列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cevent-model-create">

    <?= $this->render('_form', [
        'model' => $model,'teacher'=>$teacher,
    ]) ?>

</div>
