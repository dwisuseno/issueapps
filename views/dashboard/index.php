<?php



/* @var $this yii\web\View */

use app\assets\AppAsset;

use yii\helpers\Url;

AppAsset::register($this);



$this->title = 'Minetech Apps';

date_default_timezone_set('Asia/Bangkok');

// echo $timestamp = date('H:i:s');



?>





<section class="content">

	<!-- Info boxes -->

      <div class="row">

        <div class="col-md-3 col-sm-6 col-xs-12">

          <div class="info-box">

            <span class="info-box-icon bg-aqua"><i class="fa fa-list-alt"></i></span>



            <div class="info-box-content">

              <span class="info-box-text">All Task</span>

              <span class="info-box-number"><?= $totalAllIssue ?></span>

            </div>

            <!-- /.info-box-content -->

          </div>

          <!-- /.info-box -->

        </div>

        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">

          <div class="info-box">

            <span class="info-box-icon bg-red"><i class="fa fa-tasks"></i></span>



            <div class="info-box-content">

              <span class="info-box-text">High Task</span>

              <span class="info-box-number"><?= $totalHighIssue ?></span>

            </div>

            <!-- /.info-box-content -->

          </div>

          <!-- /.info-box -->

        </div>

        <!-- /.col -->



        <!-- fix for small devices only -->

        <div class="clearfix visible-sm-block"></div>



        <div class="col-md-3 col-sm-6 col-xs-12">

          <div class="info-box">

            <span class="info-box-icon bg-green"><i class="fa fa-check-square-o"></i></span>



            <div class="info-box-content">

              <span class="info-box-text">Done Task</span>

              <span class="info-box-number"><?= $totalDoneIssue ?></span>

            </div>

            <!-- /.info-box-content -->

          </div>

          <!-- /.info-box -->

        </div>

        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">

          <div class="info-box">

            <span class="info-box-icon bg-yellow"><i class="fa fa-retweet"></i></span>



            <div class="info-box-content">

              <span class="info-box-text">On Progress</span>

              <span class="info-box-number"><?= $totalSprint ?></span>

            </div>

            <!-- /.info-box-content -->

          </div>

          <!-- /.info-box -->

        </div>

        <!-- /.col -->

      </div>

      <!-- /.row -->

      <div class="row">

        <div class="col-md-12">

          <div class="box">

            <div class="box-header with-border">

              <h3 class="box-title">Task Monitoring</h3>



              <div class="box-tools pull-right">

                

              </div>

            </div>

            

            <!-- ./box-body -->

            <div class="box-footer">

              <div class="row">

                <div class="col-sm-4 col-xs-6">

                  <div class="description-block border-right">

                    <span class="description-percentage text-green"> <?php 
                    if(((int)$totalWebTask+(int)$totalMobileTask+(int)$totalRfidTask) == 0){
                      echo "0";
                    } else {
                      round((int)$totalWebTask/((int)$totalWebTask+(int)$totalMobileTask+(int)$totalRfidTask),2)*100;
                    }
                    ?> %</span>

                    <h5 class="description-header"><?php if((int)$totalWebTask!=0){ echo $totalWebTask;} else { echo "0";} ?></h5>

                    <span class="description-text">WEB TASK</span>

                  </div>

                  <!-- /.description-block -->

                </div>

                <!-- /.col -->

                <div class="col-sm-4 col-xs-6">

                  <div class="description-block border-right">

                    <span class="description-percentage text-yellow"> <?php 
                     if(((int)$totalWebTask+(int)$totalMobileTask+(int)$totalRfidTask) == 0){
                      echo "0";
                    } else {
                      round((int)$totalMobileTask/((int)$totalWebTask+(int)$totalMobileTask+(int)$totalRfidTask),2)*100;
                    }
                    
                    
                    ?> %</span>

                    <h5 class="description-header"><?= $totalMobileTask ?></h5>

                    <span class="description-text">MOBILE TASK</span>

                  </div>

                  <!-- /.description-block -->

                </div>

                <!-- /.col -->

                <div class="col-sm-4 col-xs-6">

                  <div class="description-block border-right">

                    <span class="description-percentage text-green"><?php
                     if(((int)$totalWebTask+(int)$totalMobileTask+(int)$totalRfidTask) == 0){
                      echo "0";
                    } else {
                      round((int)$totalRfidTask/((int)$totalWebTask+(int)$totalMobileTask+(int)$totalRfidTask),2)*100;
                    }
                     ?> %</span>

                    <h5 class="description-header"><?= $totalRfidTask ?></h5>

                    <span class="description-text">RFID TASK</span>

                  </div>

                  <!-- /.description-block -->

                </div>

                <!-- /.col -->

               

              </div>

              <!-- /.row -->

            </div>

            <!-- /.box-footer -->

          </div>

          <!-- /.box -->

        </div>

        <!-- /.col -->

      </div>

      <!-- /.row -->

      <div class="row">

        <div class="col-md-12">

          <!-- Widget: user widget style 1 -->

          <div class="box">

            <div class="box-header">

              <h3 class="box-title">Task On Developers</h3>

            </div>

            <!-- /.box-header -->

            <div class="box-body">

              <table id="example2" class="table table-bordered table-hover">

                <thead>

                <tr>

                  <th>Nama Developer</th>

                  <th>All Task</th>

                  <th>Back Log</th>

                  <th>On Progress</th>

                  <th>Need Confirm</th>

                  <th>Done</th>

                  <th>Percent</th>

                </tr1>

                </thead>

                <tbody>

            <?php

              for($i=0;$i<sizeof($DeveloperTask);$i++){ 

            ?>

                <tr>

                  <td><?= $DeveloperTask[$i]['NAME'] ?></td>

                  <td><?= $DeveloperTask[$i]['all_total_task'] ?></td>

                  <td><?= $DeveloperTask[$i]['back_log'] ?></td>

                  <td><?= $DeveloperTask[$i]['on_progress'] ?></td>

                  <td><?= $DeveloperTask[$i]['need_confirm'] ?></td>

                  <td><?= $DeveloperTask[$i]['done'] ?></td>

                  <td><?= number_format($DeveloperTask[$i]['done']/$DeveloperTask[$i]['all_total_task']*100,2)." %" ?></td>

                </tr>

            <?php } ?>

              </table>

            </div>

            <!-- /.box-body -->

          </div>

          <!-- /.box -->

        </div> 

          <!-- /.widget-user -->

      </div>

        

         <div class="row">

        <div class="col-md-12">

          <!-- Widget: user widget style 1 -->

          <div class="box">

            <div class="box-header">

              <h3 class="box-title">Tickets</h3>

            </div>

            <!-- /.box-header -->

            <div class="box-body">

              <iframe width="100%" height="500" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vSc21uupP2I3Z3-7Ddcc6e70wfFu8lDGbPpz5Xsi-s3-yxDXMWD6MCGXUwLpN08U-pZq7DIENVbbD3V/pubhtml?widget=true&amp;headers=false"></iframe>

            </div>

            <!-- /.box-body -->

          </div>

          <!-- /.box -->

        </div> 

          <!-- /.widget-user -->

      </div>

      </div>

      <!-- /.row -->

      

        

</section>

