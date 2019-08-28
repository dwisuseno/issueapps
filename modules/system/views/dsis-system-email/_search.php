<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\system\models\DsisSystemEmailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-dsis-system-email-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'subject')->textInput(['maxlength' => true, 'placeholder' => 'Subject']) ?>

    <?= $form->field($model, 'sender')->textInput(['maxlength' => true, 'placeholder' => 'Sender']) ?>

    <?= $form->field($model, 'receiver')->textInput(['maxlength' => true, 'placeholder' => 'Receiver']) ?>

    <?= $form->field($model, 'body')->textInput(['maxlength' => true, 'placeholder' => 'Body']) ?>

    <?php /* echo $form->field($model, 'status')->textInput(['maxlength' => true, 'placeholder' => 'Status']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
