<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\system\models\DsisSystemUserMenu */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="dsis-system-user-menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
    
    <?= $form->field($model, 'user_id')->widget(\kartik\widgets\Select2::classname(), [
                            'data' => \yii\helpers\ArrayHelper::map(\app\modules\system\models\DsisSystemUser::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
                            'options' => ['placeholder' => 'Pilih User'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]); ?>

    <?= $form->field($model, 'modul_id')->widget(\kartik\widgets\Select2::classname(), [
                            'data' => \yii\helpers\ArrayHelper::map(\app\modules\project\models\MModul::find()->where("id_status = 0")->orderBy('id')->asArray()->all(), 'id', 'name'),
                            'options' => ['placeholder' => 'Pilih Modul'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]); ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
