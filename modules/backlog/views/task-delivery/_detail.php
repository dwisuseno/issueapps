<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\backlog\models\TaskDelivery */

?>
<div class="task-delivery-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->id) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
            'attribute' => 'sprint.id',
            'label' => 'Id Sprint',
        ],
        [
            'attribute' => 'aplikasi.id',
            'label' => 'Id Aplikasi',
        ],
        [
            'attribute' => 'pic.id',
            'label' => 'Id Pic',
        ],
        [
            'attribute' => 'platform.id',
            'label' => 'Id Platform',
        ],
        [
            'attribute' => 'modelMenu.id',
            'label' => 'Id Model Menu',
        ],
        'is_tested_by_vendor',
        'is_tested_by_owner',
        [
            'attribute' => 'status.id',
            'label' => 'Id Status',
        ],
        [
            'attribute' => 'prioritas.id',
            'label' => 'Id Prioritas',
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
</div>