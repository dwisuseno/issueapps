<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\it_helpdesk\models\DsisItHelpdesk */

$this->title = 'Request New User';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dsis-it-helpdesk-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php 
    if(Yii::$app->session->getFlash('createuser_message') != null){ 
            if(Yii::$app->session->getFlash('createuser_message')){ ?>
                <div class="alert alert-success alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Success!</strong> Data Successfully Submitted. You can close this tab.
                </div>
            <?php } else if(!Yii::$app->session->getFlash('createuser_message')) { ?>
                <div class="alert alert-danger alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Failed!</strong> Please Check Your Data.
                </div>
            <?php } else if(Yii::$app->session->getFlash('createuser_message') == null){ echo "";} ?>
    <?php } ?>


    <?= $this->render('_formprinteruser', [
        'model' => $model,
    ]) ?>

</div>