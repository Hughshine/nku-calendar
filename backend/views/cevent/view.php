<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CeventModel */

$this->title = $model->ev_title;
$this->params['breadcrumbs'][] = ['label' => '活动列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cevent-model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->ev_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->ev_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ev_id',
            'ev_start_time',
            'ev_title',
            'ev_adminid',
            'ev_place',
            'ev_number',
            'cev_tid',
            'ev_maxnumber',
            'ev_summary',
            'ev_content',
            'ev_label_img',
            'ev_end_time',
            'ev_created_at',
            'ev_updated_at',
            'ev_signup_endtime',
        ],
    ]) ?>

</div>
