<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\it_helpdesk\models\DsisItHelpdesk */

$this->title = 'Create New Ticket';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dsis-it-helpdesk-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php 
    if(Yii::$app->session->getFlash('signflagcreateticket') != null){ 
            if(Yii::$app->session->getFlash('signflagcreateticket')){ ?>
                <div class="alert alert-success alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Success!</strong> Data Successfully Submitted. You can close this tab.
                </div>
            <?php } else if(!Yii::$app->session->getFlash('signflagcreateticket')) { ?>
                <div class="alert alert-danger alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Failed!</strong> Please Check Your Data.
                </div>
            <?php } else if(Yii::$app->session->getFlash('signflagcreateticket') == null){ echo "";} ?>
    <?php } ?>

    <div class="alert alert-success" role="alert">

    <header><b>Helpdesk Online Form</b></header>
	  <p>
	  	Form ini digunakan untuk mendata semua permasalahan IT Helpdesk secara terpusat. Form ini diharapkan dapat membantu penyelesaian masalah IT Troubleshooting dan Helpdesk di PT Borneo Indobara.
	  </p>
	  <br>
	<header><b>Tata Cara Pengisian</b></header>
	  <ul>
	  <li>Isikan Nama Lengkap anda pada Kolom Employee Name.</li>
	  <li>Isikan NIK anda di Kolom NIK.</li>
	  <li>Harap menjelaskan masalah anda secara JELAS dan LENGKAP.</li>
	  </ul>
	<br>
    <!-- <header><b>Definisi Urgency Level</b></header>
	  <ul>
	  	<li><b>Low</b>: Untuk kendala yang DAPAT ditunda atau masih ADA alternatif lain.</li>
	  	<li><b>Medium</b>: Untuk kendala yang DAPAT ditunda namun TIDAK ADA alternatif lain.</li>
	  	<li><b>High</b>: Untuk kendala yang TIDAK DAPAT ditunda dan TIDAK ADA alternatif lain.</li>
	  </ul> -->
	</div>
    <?php if(Yii::$app->session->getFlash('signflagcreateticket') == null){ ?>
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    <?php } ?>
    

</div>