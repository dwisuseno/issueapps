<?php

/* @var $this yii\web\View */
/* @var $searchModel app\modules\backlog\models\TaskDeliverySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use fedemotta\datatables\DataTables;
use app\modules\backlog\models\Comment;

$this->title = 'Need Check By Berau Coal';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
    $('.search-form').toggle(1000);
    return false;
});";
$this->registerJs($search);
?>
<div class="task-delivery-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fa fa-search"></i>', '#', ['class' => 'btn btn-info search-button']) ?>
    </p>
    <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>

     <?php 
    $gridColumn = [
        ['class' => 'kartik\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
        'id',
        [
                    'attribute' => 'issue',
                    'format' => 'html',
                    // 'label' => 'Id Aplikasi',
                    'value' => function($model){
                        $date=date_create($model->created_at);
                        $start_date = date_create($model->start_date);
                        $end_date = date_create($model->end_date);

                        $interval = $start_date->diff($end_date);

                        $jumlah_comment = Comment::find()->where('id_tasklist = '.$model->id.' and deleted = 0')->count();

                        return "<span class='label label-info'>".$model->aplikasi->name." - Sprint ".$model->id_sprint."</span><br>".$model->issue."<br><i><h5>Rencana Perbaikan: ".date_format($start_date,"d M Y")." s.d. ".date_format($end_date,"d M Y")." (".$interval->days." days)</h5></i><br><small>created at: ".date_format($date,"d M Y")." - ".$jumlah_comment." Comments </small>";
                    },
                ],
            'actual_finish_date',
            [
                    'attribute' => 'id_status',
                    // 'label' => 'Id Status',
                    'value' => function($model){
                        return $model->status->name;
                    },
                ],
            [
                    'attribute' => 'id_prioritas',
                    'format' => 'html',
                    // 'label' => 'Id Prioritas',
                    'value' => function($model){
                        if($model->prioritas != NULL){
                            if($model->prioritas->id == 1){
                                return "<span class='label label-info'>".$model->prioritas->name."</span>";
                            } else if($model->prioritas->id == 2){
                                return "<span class='label label-warning'>".$model->prioritas->name."</span>";
                            } else {
                                return "<span class='label label-danger'>".$model->prioritas->name."</span>";
                            }
                        } else 
                            {
                                return "Not Yet";
                            }
                    },
                ],
           
            // 'deployment',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => ' {view} {backtosprint} ',
                'buttons' => [
                    'view' => function ($url) {
                        return Html::a('Detail', $url, ['title' => 'Detail', 'class' => 'btn btn-default']);
                    },
                    'backtosprint' => function ($url) {
                        return Html::a('Back to Sprint', $url, ['title' => 'Back to Sprint', 'class' => 'btn btn-default']);
                    },
                
                   
                ],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '  {gotoclose}',
                'buttons' => [
                  
                    'gotoclose' => function ($url) {
                        if(Yii::$app->user->identity->role_id == 3){
                            return "Still Check";
                        } else {
                            return Html::a('<i class="fa fa-arrow-circle-right"></i> Move to Close', $url, ['title' => 'Move to Close', 'class' => 'btn btn-success']);
                        }
                        
                    },
                   
                ],
            ],
     
    ]; 
    $gridExport = [
        ['class' => 'kartik\grid\SerialColumn'],
        'id',
        'issue',
        [
                    'attribute' => 'start_date',
                    'format' => 'html',
                    'label' => 'Mulai Perbaikan',
                    'value' => function($model){
                        
                        return $model->start_date;
                    },
                ],
           [
                    'attribute' => 'end_date',
                    'format' => 'html',
                    'label' => 'Estimasi Selesai',
                    'value' => function($model){
                        
                        return $model->end_date;
                    },
                ],
            'actual_finish_date',
            [
                    'attribute' => 'id_aplikasi',
                    'format' => 'html',
                    // 'label' => 'Id Aplikasi',
                    'value' => function($model){
                        return $model->aplikasi->name;
                    },
                ],
            [
                    'attribute' => 'id_pic',
                    // 'label' => 'Id Pic',
                    'value' => function($model){
                        return $model->pic->name;
                    },
                ],
            [
                    'attribute' => 'id_platform',
                    // 'label' => 'Id Platform',
                    'value' => function($model){
                        return $model->platform->name;
                    },
                ],
            [
                    'attribute' => 'id_model_menu',
                    // 'label' => 'Id Model Menu',
                    'value' => function($model){
                        return $model->modelMenu->name;
                    },
                ],
            [
                    'attribute' => 'id_status',
                    // 'label' => 'Id Status',
                    'value' => function($model){
                        return $model->status->name;
                    },
                ],
                [
                    'attribute' => 'created_at',
                    'label' => 'Created At',
                ],
                'keterangan',
            [
                    'attribute' => 'id_prioritas',
                    'format' => 'html',
                    // 'label' => 'Id Prioritas',
                    'value' => function($model){
                        if($model->prioritas != NULL){
                            if($model->prioritas->id == 1){
                                return "<span class='label label-info'>".$model->prioritas->name."</span>";
                            } else if($model->prioritas->id == 2){
                                return "<span class='label label-warning'>".$model->prioritas->name."</span>";
                            } else {
                                return "<span class='label label-danger'>".$model->prioritas->name."</span>";
                            }
                        } else 
                            {
                                return "Not Yet";
                            }
                    },
                ],
           
            'deployment',
    ];
    ?>
     <?php 
      $dataProvider->pagination = array(
            'pagesize' => 10,
        );
     echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,

        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-task-delivery']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
        // your toolbar can include the additional full export menu
        
        'toolbar' => [
            // '{export}',
            ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridExport,
                'target' => ExportMenu::TARGET_BLANK,
                'fontAwesome' => true,
                'dropdownOptions' => [
                    'label' => 'Full',
                    'class' => 'btn btn-default',
                    'itemsBefore' => [
                        '<li class="dropdown-header">Export All Data</li>',
                    ],
                ],
            ]) ,
        ],
    ]); 
     ?>

</div>
