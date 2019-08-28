<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\system\models\DsisSystemModul */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Setting Modul', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dsis-system-modul-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= 'Menu - '.' '. Html::encode($this->title) ?></h2>
        </div>
        
    </div>
    <div class='row'>
        <div class="col-sm-8">
            <?=             
                 Html::a('<i class="fa glyphicon glyphicon-print"></i> ' . '', 
                    ['pdf', 'id' => $model->id],
                    [
                        'class' => 'btn btn-default',
                        'target' => '_blank',
                        'data-toggle' => 'tooltip',
                        'title' => 'Will open the generated PDF file in a new window'
                    ]
                )?>
                <?= Html::a('<i class="fa glyphicon glyphicon-copy"></i>', ['save-as-new', 'id' => $model->id], ['class' => 'btn btn-info']) ?>            
                <?= Html::a('<i class="fa glyphicon glyphicon-edit"></i>', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('<i class="fa glyphicon glyphicon-trash"></i>', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ])
                ?>
        </div>
    </div>
    <hr>
    
    <div class="row">
        <div class="col-md-6">
            <?php
                if($providerDsisSystemMenu->totalCount){
                    $gridColumnDsisSystemMenu = [
                        ['class' => 'yii\grid\SerialColumn'],
                            ['attribute' => 'id', 'visible' => false],
                                        'name',
                            'route',
                            'icon',
                    ];
                    echo Gridview::widget([
                        'dataProvider' => $providerDsisSystemMenu,
                        'pjax' => true,
                        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-dsis-system-menu']],
                        'panel' => [
                            'type' => GridView::TYPE_DEFAULT,
                            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Sub-Menu'),
                        ],
                        'columns' => $gridColumnDsisSystemMenu
                    ]);
                }
                ?>
        </div>
        <div class="col-md-6">
            <?php
            if($providerDsisSystemUserMenu->totalCount){
                $gridColumnDsisSystemUserMenu = [
                    ['class' => 'yii\grid\SerialColumn'],
                        ['attribute' => 'id', 'visible' => false],
                                    [
                            'attribute' => 'user.name',
                            'label' => 'User'
                        ],
                ];
                echo Gridview::widget([
                    'dataProvider' => $providerDsisSystemUserMenu,
                    'pjax' => true,
                    'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-dsis-system-user-menu']],
                    'panel' => [
                        'type' => GridView::TYPE_DEFAULT,
                        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('List User'),
                    ],
                    'columns' => $gridColumnDsisSystemUserMenu
                ]);
            }
            ?>
        </div>
    </div>
</div>
