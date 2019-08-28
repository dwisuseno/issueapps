<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use miloschuman\highcharts\Highcharts;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\hse_nc\models\DsisHseNc */


$this->params['breadcrumbs'][] = ['label' => 'Timeline in Backlog', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<section class="content">

	<div class="row">
        <div class="col-md-12">
          <!-- Widget: user widget style 1 -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Google Sheet</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <iframe width="100%" height="500" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vSc21uupP2I3Z3-7Ddcc6e70wfFu8lDGbPpz5Xsi-s3-yxDXMWD6MCGXUwLpN08U-pZq7DIENVbbD3V/pubhtml?gid=1625295380&single=true"></iframe>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div> 
          <!-- /.widget-user -->
      </div>
        
      </div>

</section>