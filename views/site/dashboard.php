<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;
AppAsset::register($this);
$this->title = 'Dashboard - PT Borneo Indobara';
?>
<div class="site-about">
    <?php 
    if(Yii::$app->user->identity != null){ ?>
	<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard - PT Borneo Indobara<span class="pull-right text-muted small"><em><?= date('j F Y') ?></em></h1>

    </div>
    <!-- /.col-lg-12 -->
</div>

        <!-- /.row -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="glyphicon glyphicon-duplicate huge"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?= round($totalNcClosed/$totalNc*100) ?>%</div>
                                <div>NC Close of <?= $totalNc?></div>
                            </div>
                        </div>
                    </div>
                    <a href="<?= Url::home()?>hse_nc/dsis-hse-nc">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="glyphicon glyphicon-play-circle"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="glyphicon glyphicon-erase huge"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?= $totalInsiden ?></div>
                                <div>Total Insiden</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?= Url::home()?>hse_nc/dsis-hse-insiden">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="glyphicon glyphicon-play-circle"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="glyphicon glyphicon-wrench huge"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?= $totalCommissioning ?></div>
                                <div>Commissioning Unit</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?= Url::home()?>hse_spip/dsis-hse-spip-commissioning">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="glyphicon glyphicon-play-circle"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="glyphicon glyphicon-credit-card huge"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?= $totalIdcard ?></div>
                                <div>ID Card</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?= Url::home()?>hse_simper/dsis-hse-simper">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="glyphicon glyphicon-play-circle"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-5">
                <div class="panel panel-default">
                  <div class="panel-heading">Insiden Terbaru</div>
                  <div class="panel-body">
                    <div class="list-group">
                        <?php if($listInsiden != null){ ?>
                            <?php for($i=0;$i<sizeof($listInsiden);$i++){?>
                            <a href="<?= Url::home()?>hse_nc/dsis-hse-insiden/view?id=<?= $listInsiden[$i]->id ?>" class="list-group-item">
                                <?= $listInsiden[$i]->no_insiden ?>
                                <span class="pull-right text-muted small"><em><?= date('j F Y', strtotime($listInsiden[$i]->tanggal)) ?></em>
                                </span>
                            </a>
                            <?php }?>
                        <?php } else { ?>
                            <a href="<?= Url::home()?>site/login" class="list-group-item">Please Login</a>
                        <?php }?>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-md-5">
                
            </div>
        </div>
    <?php } else { ?>
    <div class="col-lg-4">
        <a href="<?= Url::home()?>site/login" class="list-group-item">Please Login</a>
    </div>
    <?php }?>
</div>
