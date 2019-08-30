<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use app\modules\datamaster\models\MSprint;
use app\modules\datamaster\models\MPlatform;
use app\modules\datamaster\models\MAplikasi;
use app\modules\datamaster\models\MPrioritas;
use app\modules\datamaster\models\MStatus;
use app\modules\datamaster\models\MModelMenu;
use app\modules\datamaster\models\MPic;

/* @var $this yii\web\View */
/* @var $model app\modules\backlog\models\TaskDelivery */

$this->title = "TD - ".$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Task Delivery', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$sprint = MSprint::find()->where('id = '.$model->id_sprint)->one()->name;
$platform = MPlatform::find()->where('id = '.$model->id_platform)->one()->name;
$aplikasi = MAplikasi::find()->where('id = '.$model->id_aplikasi)->one()->name;
if($model->id_prioritas != NULL){
  $prioritas = MPrioritas::find()->where('id = '.$model->id_prioritas)->one()->name;
} else {
  $prioritas = "Belum Diisi";
}
//$prioritas = MPrioritas::find()->where('id = '.$model->id_prioritas)->one()->name;
$status = MStatus::find()->where('id = '.$model->id_status)->one()->name;
if($model->id_model_menu != NULL){
  $modulmenu = MModelMenu::find()->where('id = '.$model->id_model_menu)->one()->name;
} else {
  $modulmenu = "Belum Diisi";
}

if($model->id_pic != NULL){
  $pic = MPic::find()->where('id = '.$model->id_pic)->one()->name;
} else {
  $pic = "Belum Diisi";
}

?>
<div class="task-delivery-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= 'Task Delivery'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-4" style="margin-top: 15px">
          
            <?= Html::a('<i class="fa fa-edit"></i>', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('<i class="fa fa-trash"></i>', ['delete', 'id' => $model->id], [
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
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-text-width"></i>

              <h3 class="box-title">Detail Task Delivery</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <dl class="dl-horizontal">
                <dt>Sprint</dt>
                <dd><?= $sprint ?></dd>
                <dt>Aplikasi</dt>
                <dd><?= $aplikasi ?></dd>
                <dt>Platform</dt>
                <dd><?= $platform ?></dd>
                <dt>Menu</dt>
                <dd><?= $modulmenu ?></dd>
                <dt>Issue</dt>
                <dd><?= $model->issue ?></dd>
                <dt>Developer In Charge</dt>
                <dd><?= $pic ?></dd>
                <dt>Prioritas</dt>
                <dd><?= $prioritas ?></dd>
                <dt>Status</dt>
                <dd><?= $status ?></dd>
                <dt>Date Created</dt>
                <dd><?= $model->created_at ?></dd>
                <dt>Start Date</dt>
                <dd><?= $model->start_date ?></dd>
                <dt>End Date</dt>
                <dd><?= $model->end_date ?></dd>
              </dl>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
<?php 
    // $gridColumn = [
    //     ['attribute' => 'id', 'visible' => false],
    //     [
    //         'attribute' => 'sprint.name',
    //         'label' => 'Sprint Ke',
    //     ],
    //     [
    //         'attribute' => 'aplikasi.name',
    //         'label' => 'Aplikasi',
    //     ],
    //     [
    //         'attribute' => 'pic.name',
    //         'label' => 'Developer In Charge',
    //     ],
    //     [
    //         'attribute' => 'platform.name',
    //         'label' => 'Platform',
    //     ],
    //     [
    //         'attribute' => 'modelMenu.name',
    //         'label' => 'Modul / Menu',
    //     ],
    //     // [
    //     //     'attribute' => 'is_tested_by_vendor',
    //     //     'label' => 'Testing By Vendor',

    //     // ],
    //     // 'is_tested_by_owner',
    //     [
    //         'attribute' => 'status.name',
    //         'label' => 'Status',
    //     ],
    //     [
    //         'attribute' => 'prioritas.name',
    //         'label' => 'Prioritas',
    //         // 'format' => 'html',
    //         // // 'label' => 'Id Prioritas',
    //         // 'value' => function($model){
    //         //     if($model->prioritas->id == 1){
    //         //         return "<span class='label label-info'>".$model->prioritas->name."</span>";
    //         //     } else if($model->prioritas->id == 2){
    //         //         return "<span class='label label-warning'>".$model->prioritas->name."</span>";
    //         //     } else {
    //         //         return "<span class='label label-danger'>".$model->prioritas->name."</span>";
    //         //     }
    //         // },
    //     ],
    //     'issue',
    //     'estimated_day',
    //     'actual_finish_date',
    //     // [
    //     //     'attribute' => 'created_at',
    //     //     'format' => 'html',
    //     //     'label' => 'Estimated Finish',
    //     //     'value' => function($model){
    //     //         var_dump($model);
    //     //         exit();
    //     //         $hasil = date('d/m/Y', strtotime($model->created_at. ' + '.$model->estimated_day.' days'));

    //     //         return $hasil;
    //     //     },
    //     // ],
    //     'deployment',
    //     'keterangan',
    // ];
    // echo DetailView::widget([
    //     'model' => $model,
    //     'attributes' => $gridColumn
    // ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerComment->totalCount){
    $gridColumnComment = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        'comment',
            'keterangan',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerComment,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-comment']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Comment'),
        ],
        'columns' => $gridColumnComment
    ]);
}
?>
    </div>
</div>
