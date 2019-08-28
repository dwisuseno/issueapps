<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\system\models\DsisSystemUserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-dsis-system-user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'role_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\system\models\DsisSystemRole::find()->orderBy('id')->where('id<>1')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Choose Dsis system role'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'placeholder' => 'Username']) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'placeholder' => 'Password']) ?>

    <?php /* echo $form->field($model, 'authKey')->textInput(['maxlength' => true, 'placeholder' => 'AuthKey']) */ ?>

    <?php /* echo $form->field($model, 'accessToken')->textInput(['maxlength' => true, 'placeholder' => 'AccessToken']) */ ?>

    <?php /* echo $form->field($model, 'status')->dropDownList([ 'active' => 'Active', ' inactive' => ' inactive', ], ['prompt' => '']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
