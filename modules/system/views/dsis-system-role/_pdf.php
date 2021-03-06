<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\system\models\DsisSystemRole */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dsis System Role', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dsis-system-role-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Dsis System Role'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'name',
        'description',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerDsisSystemUser->totalCount){
    $gridColumnDsisSystemUser = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
                'name',
        'username',
        'password',
        'authKey',
        'accessToken',
        'status',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerDsisSystemUser,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Dsis System User'),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnDsisSystemUser
    ]);
}
?>
    </div>
</div>
