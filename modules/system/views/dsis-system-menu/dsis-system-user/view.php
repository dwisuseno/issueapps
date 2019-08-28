<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\system\models\DsisSystemUser */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dsis-system-user-view">

    <div class="row">
        <div class="col-sm-12">
            <h2><?= 'User'.': '. Html::encode($this->title) ?></h2>
        <p class="lead">
            <?php // Html::a('Save As New', ['save-as-new', 'id' => $model->id], ['class' => 'btn btn-info']) ?>            
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
                $gridColumn = [
                    ['attribute' => 'id', 'visible' => false],
                    [
                        'attribute' => 'role.name',
                        'label' => 'Role',
                    ],
                    [
                        'attribute' => 'department.name',
                        'label' => 'Department',
                    ],
                    'name',
                    'username',
                    'email',
                    'password',
                    'authKey',
                    'accessToken',
                    'status',
                ];
                echo DetailView::widget([
                    'model' => $model,
                    'attributes' => $gridColumn
                ]); 
            ?>
        </div>
        <div class="col-md-6">
            <?php
                if($providerDsisSystemUserMenu->totalCount){
                    $gridColumnDsisSystemUserMenu = [
                        ['class' => 'yii\grid\SerialColumn'],
                            ['attribute' => 'id', 'visible' => false],
                            [
                                'attribute' => 'modul.name',
                                'label' => 'Modul'
                            ],
                                ];
                    echo Gridview::widget([
                        'dataProvider' => $providerDsisSystemUserMenu,
                        'pjax' => true,
                        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-dsis-system-user-menu']],
                        // 'panel' => [
                        //     'type' => GridView::TYPE_PRIMARY,
                        //     'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Dsis System User Menu'),
                        // ],
                        'columns' => $gridColumnDsisSystemUserMenu
                    ]);
                }
                ?>
        </div>

    </div>
</div>
