<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\system\models\MAplikasi */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Maplikasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maplikasi-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Maplikasi'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'name',
        'keterangan',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerTaskDelivery->totalCount){
    $gridColumnTaskDelivery = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
            'id_modul',
            [
                'attribute' => 'sprint.id',
                'label' => 'Id Sprint'
            ],
                        [
                'attribute' => 'pic.id',
                'label' => 'Id Pic'
            ],
            [
                'attribute' => 'platform.id',
                'label' => 'Id Platform'
            ],
            [
                'attribute' => 'modelMenu.id',
                'label' => 'Id Model Menu'
            ],
            'is_tested_by_vendor',
            'is_tested_by_owner',
            [
                'attribute' => 'status.id',
                'label' => 'Id Status'
            ],
            [
                'attribute' => 'prioritas.id',
                'label' => 'Id Prioritas'
            ],
            'issue',
            'estimated_day',
            'start_date',
            'end_date',
            'actual_finish_date',
            'deployment',
            'keterangan',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerTaskDelivery,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-task-delivery']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Task Delivery'),
        ],
        'export' => false,
        'columns' => $gridColumnTaskDelivery
    ]);
}
?>
    </div>
</div>
