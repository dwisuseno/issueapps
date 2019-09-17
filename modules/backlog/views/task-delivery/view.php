<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use app\modules\datamaster\models\MSprint;
use app\modules\datamaster\models\MPlatform;
use app\modules\datamaster\models\MAplikasi;
use app\modules\datamaster\models\MPrioritas;
use app\modules\datamaster\models\MStatus;
use app\modules\datamaster\models\MModelMenu;
use app\modules\datamaster\models\MPic;
use kartik\form\ActiveForm;

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
          
            
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Detail &nbsp</h3>
              
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
            <div class="box-footer">
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
          <!-- /.box -->
        </div>
        <div class="col-md-6">
        <div class="box box-secondary">
              <div class="box-header with-border">
                    <h3 class="box-title">Add Comment or Sub Task</h3>
                  </div>
                  <?php $form = ActiveForm::begin([
                      'id' => 'comment-form',
                      'action' => Url::to(['add-comment', 'data' => $model->data_comment,'id' => $model->id ]),
                      'method' => 'post',
                      // 'id' => 'login-form-horizontal', 
                      // // 'type' => ActiveForm::TYPE_HORIZONTAL,
                      // 'formConfig' => ['labelSpan' => 4, 'deviceSize' => ActiveForm::SIZE_SMALL]
                  ]); ?>
                  <form role="form">
                    <div class="box-body">
                      <div class="form-group">
                        <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
                        <?= $form->field($model, 'data_comment', ['template' => '{input}'])->textarea(['rows' => 3]) ?>
                      </div>
                    </div>
                    <div class="box-footer">
                      <?php 
                          echo Html::submitButton('Submit', ['class' => 'btn btn-primary']);
                          ActiveForm::end();
                      ?>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
      <div class='col-md-12'>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">List Comment</h3>

        </div>
        <div class="box-body">
        <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Comment</th>
                  <th>User</th>
                  <th>Date</th>
                </tr>
                <?php
                  // echo "<pre>";
                  // var_dump($modelComment[0]->id);
                  // echo "</pre>";
                  // exit();
                  for($i=0;$i<sizeof($modelComment);$i++){
                ?>
                <tr>
                  <td><?= $modelComment[$i]->id ?></td>
                  <td><?= $modelComment[$i]->comment ?></td>
                  <td><?= $modelComment[$i]->created_by ?></td>
                  <td><?= $modelComment[$i]->created_at ?></td>
                </tr> 
                <?php } ?>
              </table>
        </div>
      </div>
    </div>
</div>
