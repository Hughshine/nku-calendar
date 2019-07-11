<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\InstitutionEvent */

$this->title = '【学院活动】'.$model->ev_name.':';
$this->params['breadcrumbs'][] = ['label' => 'Institution Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="institution-event-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'ev_id',
            'ev_time',
            'ev_name',
            'ev_adminid',
            'ev_place',
//            'ev_number',
//            'cev_tid',
            'ev_maxnumber',
            'all_day',
        ],
    ]) ?>

</div>
