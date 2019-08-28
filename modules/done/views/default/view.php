<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\backlog\models\TaskDelivery */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Task Delivery', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-delivery-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= 'Task Delivery'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-4" style="margin-top: 15px">

            
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
            'attribute' => 'sprint.name',
            'label' => 'Sprint Ke',
        ],
        [
            'attribute' => 'aplikasi.name',
            'label' => 'Aplikasi',
        ],
        [
            'attribute' => 'pic.name',
            'label' => 'Developer In Charge',
        ],
        [
            'attribute' => 'platform.name',
            'label' => 'Platform',
        ],
        [
            'attribute' => 'modelMenu.name',
            'label' => 'Modul / Menu',
        ],
        [
            'attribute' => 'is_tested_by_vendor',
            'label' => 'Testing By Vendor',
            
        ],
        'is_tested_by_vendor',
        'is_tested_by_owner',
        [
            'attribute' => 'status.name',
            'label' => 'Status',
        ],
        [
            'attribute' => 'prioritas.name',
            'label' => 'Prioritas',
            // 'format' => 'html',
            // // 'label' => 'Id Prioritas',
            // 'value' => function($model){
            //     if($model->prioritas->id == 1){
            //         return "<span class='label label-info'>".$model->prioritas->name."</span>";
            //     } else if($model->prioritas->id == 2){
            //         return "<span class='label label-warning'>".$model->prioritas->name."</span>";
            //     } else {
            //         return "<span class='label label-danger'>".$model->prioritas->name."</span>";
            //     }
            // },
        ],
        'issue',
        'estimated_day',
        'actual_finish_date',
        'deployment',
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
if($providerComment->totalCount){
    $gridColumnComment = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        'comment',
            'keterangan',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerComment,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-comment']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Comment'),
        ],
        'columns' => $gridColumnComment
    ]);
}
?>
    </div>
</div>
