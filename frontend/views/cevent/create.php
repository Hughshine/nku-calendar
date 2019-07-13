<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cevent */

$this->title = 'Create Cevent';
$this->params['breadcrumbs'][] = ['label' => 'Cevents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cevent-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
