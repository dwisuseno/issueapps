<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\system\models\DsisSystemRole */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'System Role', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dsis-system-role-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= 'System Role'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-4" style="margin-top: 15px">

            <?= Html::a('Save As New', ['save-as-new', 'id' => $model->id], ['class' => 'btn btn-info']) ?>            
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
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
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-dsis-system-user']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Dsis System User'),
        ],
        'columns' => $gridColumnDsisSystemUser
    ]);
}
?>
    </div>
</div>
