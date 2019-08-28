<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\system\models\DsisSystemUser */

$this->title = 'Change Data';
$this->params['breadcrumbs'][] = 'Profile';
?>
<div class="dsis-system-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <hr>
    <?php 
    if(Yii::$app->session->getFlash('saving_message') != null){ 
		    if(Yii::$app->session->getFlash('saving_message')){ ?>
		    	<div class="alert alert-success alert-dismissable">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>Success!</strong> Data Successfully Changed.
				</div>
		    <?php } else if(Yii::$app->session->getFlash('saving_message') == false) { ?>
		    	<div class="alert alert-danger alert-dismissable">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>Failed!</strong> Please Try Again.
				</div>
		    <?php } else if(Yii::$app->session->getFlash('saving_message') == null){ echo "";} ?>
    <?php } ?>
    <?= $this->render('_formprofile', [
        'model' => $model,
    ]) ?>

</div>
