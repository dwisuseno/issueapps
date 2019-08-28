<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\system\models\DsisSystemUser */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Dsis System User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dsis-system-user-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Dsis System User'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
                'attribute' => 'role.name',
                'label' => 'Role'
            ],
        'name',
        'username',
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
    
    <div class="row">
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
