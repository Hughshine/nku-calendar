<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\InstitutionEvent */

$this->title = 'Create Institution Event';
$this->params['breadcrumbs'][] = ['label' => 'Institution Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="institution-event-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
