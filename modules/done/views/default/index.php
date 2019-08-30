<?php

/* @var $this yii\web\View */
/* @var $searchModel app\modules\backlog\models\TaskDeliverySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use fedemotta\datatables\DataTables;

$this->title = 'Done';
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
    // $searchModel = new ModelSearch();
    // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    ?>
    <?= DataTables::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            // [
            //     'attribute' => 'id_sprint',
            //     'label' => 'Id Sprint',
            //     'value' => function($model){
            //         return $model->sprint->id;
            //     },
            //     'filterType' => GridView::FILTER_SELECT2,
            //     'filter' => \yii\helpers\ArrayHelper::map(\app\modules\datamaster\models\MSprint::find()->asArray()->all(), 'id', 'name'),
            //     'filterWidgetOptions' => [
            //         'pluginOptions' => ['allowClear' => true],
            //     ],
            //     'filterInputOptions' => ['placeholder' => 'M sprint', 'id' => 'grid-task-delivery-search-id_sprint']
            // ],
            //columns
             'issue',
             'created_at',
            'estimated_day',
            'actual_finish_date',
            [
                    'attribute' => 'id_aplikasi',
                    'format' => 'html',
                    // 'label' => 'Id Aplikasi',
                    'value' => function($model){
                        return $model->aplikasi->name;
                    },
                ],
            // [
            //         'attribute' => 'id_pic',
            //         // 'label' => 'Id Pic',
            //         'value' => function($model){
            //             return $model->pic->name;
            //         },
            //     ],
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
                    'attribute' => 'id_prioritas',
                    'format' => 'html',
                    // 'label' => 'Id Prioritas',
                    'value' => function($model){
                        if($model->prioritas->id == 1){
                            return "<span class='label label-info'>".$model->prioritas->name."</span>";
                        } else if($model->prioritas->id == 2){
                            return "<span class='label label-warning'>".$model->prioritas->name."</span>";
                        } else {
                            return "<span class='label label-danger'>".$model->prioritas->name."</span>";
                        }
                    },
                ],
           
            'deployment',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => ' {view} ',
                'buttons' => [
                    'view' => function ($url) {
                        return Html::a('Detail', $url, ['title' => 'Detail']);
                    },
                    
                    // 'delete' => function ($url) {
                    //     return Html::a('Delete', $url, ['title' => 'Delete']);
                    // },
                ],
            ],
        ]
    ]);?>

    <?php 
    $gridColumn = [
        ['class' => 'kartik\grid\SerialColumn'],
        [
            'class' => 'kartik\grid\ExpandRowColumn',
            'width' => '50px',
            'value' => function ($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            'detail' => function ($model, $key, $index, $column) {
                return Yii::$app->controller->renderPartial('_expand', ['model' => $model]);
            },
            'headerOptions' => ['class' => 'kartik-sheet-style'],
            'expandOneOnly' => true
        ],
        ['attribute' => 'id', 'visible' => false],
        'issue',
        [
                'attribute' => 'id_sprint',
                // 'label' => 'Id Sprint',
                'value' => function($model){
                    return $model->sprint->name;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\modules\datamaster\models\MSprint::find()->asArray()->all(), 'id', 'name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'M sprint', 'id' => 'grid-task-delivery-search-id_sprint']
            ],
        [
                'attribute' => 'id_aplikasi',
                // 'label' => 'Id Aplikasi',
                'value' => function($model){
                    return $model->aplikasi->name;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\modules\datamaster\models\MAplikasi::find()->asArray()->all(), 'id', 'name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'M aplikasi', 'id' => 'grid-task-delivery-search-id_aplikasi']
            ],
        [
                'attribute' => 'id_pic',
                // 'label' => 'Id Pic',
                'value' => function($model){
                    return $model->pic->name;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\modules\datamaster\models\MPic::find()->asArray()->all(), 'id', 'name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'M pic', 'id' => 'grid-task-delivery-search-id_pic']
            ],
        [
                'attribute' => 'id_platform',
                // 'label' => 'Id Platform',
                'value' => function($model){
                    return $model->platform->name;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\modules\datamaster\models\MPlatform::find()->asArray()->all(), 'id', 'name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'M platform', 'id' => 'grid-task-delivery-search-id_platform']
            ],
        [
                'attribute' => 'id_model_menu',
                // 'label' => 'Id Model Menu',
                'value' => function($model){
                    return $model->modelMenu->name;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\modules\datamaster\models\MModelMenu::find()->asArray()->all(), 'id', 'name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'M model menu', 'id' => 'grid-task-delivery-search-id_model_menu']
            ],
        'is_tested_by_vendor',
        'is_tested_by_owner',
        [
                'attribute' => 'id_status',
                // 'label' => 'Id Status',
                'value' => function($model){
                    return $model->status->name;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\modules\datamaster\models\MStatus::find()->asArray()->all(), 'id', 'name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'M status', 'id' => 'grid-task-delivery-search-id_status']
            ],
        [
                'attribute' => 'id_prioritas',
                // 'label' => 'Id Prioritas',
                'value' => function($model){
                    return $model->prioritas->name;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\modules\datamaster\models\MPrioritas::find()->asArray()->all(), 'id', 'name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'M prioritas', 'id' => 'grid-task-delivery-search-id_prioritas']
            ],
        'estimated_day',
        'actual_finish_date',
        'deployment',
        'keterangan',
        // [
        //     'class' => '\kartik\widgets\ActionColumn',
        //     'template' => '{save-as-new} {view} {update} {delete}',
        //     'buttons' => [
        //         'save-as-new' => function ($url) {
        //             return Html::a('<span class="glyphicon glyphicon-copy"></span>', $url, ['title' => 'Save As New']);
        //         },
        //     ],
        // ],
    ]; 
    ?>
     <?php 
     // $dataProvider->pagination = array(
     //        'pagesize' => 10,
     //    );
    //  echo GridView::widget([
    //     'dataProvider' => $dataProvider,
    //     'filterModel' => $searchModel,
    //     'columns' => $gridColumn,

    //     'pjax' => true,
    //     'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-task-delivery']],
    //     'panel' => [
    //         'type' => GridView::TYPE_PRIMARY,
    //         'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
    //     ],
    //     // your toolbar can include the additional full export menu
        
    //     'toolbar' => [
    //         '{export}',
    //         ExportMenu::widget([
    //             'dataProvider' => $dataProvider,
    //             'columns' => $gridColumn,
    //             'target' => ExportMenu::TARGET_BLANK,
    //             'fontAwesome' => true,
    //             'dropdownOptions' => [
    //                 'label' => 'Full',
    //                 'class' => 'btn btn-default',
    //                 'itemsBefore' => [
    //                     '<li class="dropdown-header">Export All Data</li>',
    //                 ],
    //             ],
    //         ]) ,
    //     ],
    // ]); 
     ?>

</div>
