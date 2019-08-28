<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\it_helpdesk\models\DsisItHelpdesk */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="dsis-it-helpdesk-form">
    
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
    
    <div class="alert alert-info" role="alert">
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'user_id')->textInput(['maxlength' => true, 'placeholder' => 'Employee Name']) ?>
            </div>
            <div class="col-md-4">
            <?= $form->field($model, 'department')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\master\models\DsisMasterDepartment::find()->orderBy('id')->asArray()->all(), 'name', 'name'),
                'options' => ['placeholder' => 'Choose Company'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
            </div>
        </div>
        
    </div>

    <div class="form-group">
    <?php if(Yii::$app->controller->action->id != 'save-as-new'): ?>
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
    <?php endif; ?>
        <?= Html::a(Yii::t('app', 'Reset'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
