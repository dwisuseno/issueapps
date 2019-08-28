<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;

/* @var $this yii\web\View */
/* @var $model app\modules\it_helpdesk\models\DsisItHelpdesk */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="dsis-it-helpdesk-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php // $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
    
    <div class="alert alert-info" role="alert">
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'employee_name')->textInput(['maxlength' => true, 'placeholder' => 'Employee Name']) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'employee_number')->textInput(['maxlength' => true, 'placeholder' => 'Employee Number']) ?>
            </div>
            <div class="col-md-4">
                <?php 
                $type_list = [
                    "PC Desktop and Laptop" => "PC Desktop and Laptop",
                    "Access Point / Wifi" => "Access Point / Wifi",
                    "WAN" => "WAN",
                    "LAN" => "LAN",
                    "CCTV" => "CCTV",
                    "Telephony System PBX" => "Telephony System PBX",
                    "Radio and Repeater" => "Radio and Repeater",
                    "Weightbridge" => "Weightbridge",
                    "Others" => "Others"
                    ];
                echo $form->field($model, 'type')->widget(\kartik\widgets\Select2::classname(), [
                    'data' => $type_list,
                    'options' => ['placeholder' => 'Choose Type'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); ?>
            </div>
        </div>
        <div class="row">
            
            
            <div class="col-md-4">
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?= $form->field($model, 'description')->textarea(['rows' => '6']) ?>
            </div>
        </div>
        <div class="row">
            
            <div class="col-md-4">
                <?php
                    // if($model->path_evidence){
                    //     echo $form->field($model, 'file_foto')->fileInput();
                    //     echo Html::a("File Existing",$model->path_evidence,['data-pjax' => '0','target' => '_blank']);
                    // } else {
                    //     echo $form->field($model, 'file_foto')->fileInput();
                    // }
                      ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
