<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\system\models\DsisSystemModul */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dsis System Modul', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dsis-system-modul-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Dsis System Modul'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'name',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
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
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Dsis System Menu'),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnDsisSystemMenu
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerDsisSystemUserMenu->totalCount){
    $gridColumnDsisSystemUserMenu = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
                [
                'attribute' => 'user.id',
                'label' => 'User'
            ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerDsisSystemUserMenu,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Dsis System User Menu'),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnDsisSystemUserMenu
    ]);
}
?>
    </div>
</div>
