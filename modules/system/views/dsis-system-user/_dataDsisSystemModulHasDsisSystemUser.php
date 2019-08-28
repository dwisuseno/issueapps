<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->dsisSystemModulHasDsisSystemUsers,
        'key' => function($model){
            return ['dsis_system_modul_id' => $model->dsis_system_modul_id, 'dsis_system_user_id' => $model->dsis_system_user_id];
        }
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        [
                'attribute' => 'dsisSystemModul.Id',
                'label' => 'Dsis System Modul'
            ],
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'dsis-system-modul-has-dsis-system-user'
        ],
    ];
    
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'containerOptions' => ['style' => 'overflow: auto'],
        'pjax' => true,
        'beforeHeader' => [
            [
                'options' => ['class' => 'skip-export']
            ]
        ],
        'export' => [
            'fontAwesome' => true
        ],
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'showPageSummary' => false,
        'persistResize' => false,
    ]);
