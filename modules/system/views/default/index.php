<?php

/* @var $this yii\web\View */
/* @var $searchModel app\modules\system\models\DsisSystemEmailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use miloschuman\highcharts\Highcharts;

$this->title = 'Server Information';

?>
<div class="system-default-index">

    <div>

      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#server" aria-controls="server" role="tab" data-toggle="tab">Server</a></li>
        <li role="presentation"><a href="#user" aria-controls="user" role="tab" data-toggle="tab">User Activity</a></li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tab-panel" class="tab-pane active" id="server">
          <br><br>

          <table class="table table-bordered">
            <tr>
              <td>No</td>
              <td>Name</td>
              <td>Status</td>
            </tr>
            <tr>
              <td>1</td>
              <td>Software</td>
              <td><?= $_SERVER['SERVER_SOFTWARE']; ?></td>
            </tr>
            <tr>
              <td>2</td>
              <td>Server Name</td>
              <td><?= $_SERVER['SERVER_NAME']; ?></td>
            </tr>
            <tr>
              <td>3</td>
              <td>Http host</td>
              <td><?= $_SERVER['HTTP_HOST']; ?></td>
            </tr>
            <tr>
              <td>5</td>
              <td>Http User Agent</td>
              <td><?= $_SERVER['HTTP_USER_AGENT'];?></td>
            </tr>
            <tr>
              <td>6</td>
              <td>Server Protocol</td>
              <td><?= $_SERVER['SERVER_PROTOCOL']; ?></td>
            </tr>
          </table>
        </div>
        <div role="tabpanel" class="tab-pane" id="user">
        <br><br>
        <div class="row">
          <div class="col-md-12">
              <?php 
                echo Highcharts::widget([
                   'scripts' => [
                      'modules/exporting',
                      'themes/grid-light',
                   ],       
                   'options' => [
                      'chart' => [
                            'type' => 'column'
                        ],
                      'title' => ['text' => 'User Access'],
                      'xAxis' => [
                         'categories' => $username,
                         'crosshair' => true,
                      ],
                      'yAxis' => [
                         'title' => ['text' => 'Total Access'],
                         
                      ],
                      'series' => [
                         ['name' => 'Total Access', 'data' => $usertotal,'dataLabels' => ['enabled' => true]],
                      ],
                      'scripts' => [
                           'highcharts-more',   // enables supplementary chart types (gauge, arearange, columnrange, etc.)
                           'modules/exporting', // adds Exporting button/menu to chart
                           'themes/grid'        // applies global 'grid' theme to all charts
                       ],
                       'legend' => [
                            'layout'=> 'vertical',
                            'align'=> 'left',
                            'x'=> 50,
                            'verticalAlign'=> 'top',
                            'y'=> 50,
                            'floating'=> true,
                            'backgroundColor'=> '#FFFFFF'
                        ],
                   ]
                ]); 
            ?>
          </div>
        </div>
          
          <br>
          <table class="table table-bordered">
              <tr>
                <td>Time</td>
                <td>Name</td>
                <td>Action</td>
                <td>Details</td>
              </tr>
              <?php for($i=0;$i<sizeof($model);$i++){ ?>
                <tr>
                  <td><?= $model[$i]->time ?></td>
                  <td><?= $model[$i]->user ?></td>
                  <td><?= $model[$i]->activity ?></td>
                  <td><?= $model[$i]->details ?></td>
                </tr>
              <?php } ?>
          </table>
        </div>
      </div>

    </div>
    
    
</div>
