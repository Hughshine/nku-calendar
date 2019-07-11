<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CeventModel */

$this->title = 'Create Cevent Model';
$this->params['breadcrumbs'][] = ['label' => 'Cevent Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cevent-model-create">

    <?= $this->render('_form', [
        'model' => $model,'teacher'=>$teacher,
    ]) ?>

</div>
