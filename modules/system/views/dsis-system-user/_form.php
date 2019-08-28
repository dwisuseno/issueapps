<?php

use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\system\models\DsisSystemUser */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'DsisSystemUserMenu', 
        'relID' => 'dsis-system-user-menu', 
        'value' => \yii\helpers\Json::encode($model->dsisSystemUserMenus),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="dsis-system-user-form">

    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 2, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'role_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\system\models\DsisSystemRole::find()->orderBy('id')->where('id<>1')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Choose Dsis system role'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <div class="row">
        <div class="col-md-4"></div>
    </div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email']) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'placeholder' => 'Username']) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'placeholder' => 'Password']) ?>

    <?= $form->field($model, 'authKey')->textInput(['maxlength' => true, 'placeholder' => 'AuthKey','readOnly' => true]) ?>

    <?= $form->field($model, 'accessToken')->textInput(['maxlength' => true, 'placeholder' => 'AccessToken','readOnly' => true]) ?>

   
    <?php
    // $forms = [
    //     [
    //         'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('DsisSystemUserMenu'),
    //         'content' => $this->render('_formDsisSystemUserMenu', [
    //             'row' => \yii\helpers\ArrayHelper::toArray($model->dsisSystemUserMenus),
    //         ]),
    //     ],
    // ];
    // echo kartik\tabs\TabsX::widget([
    //     'items' => $forms,
    //     'position' => kartik\tabs\TabsX::POS_ABOVE,
    //     'encodeLabels' => false,
    //     'pluginOptions' => [
    //         'bordered' => true,
    //         'sideways' => true,
    //         'enableCache' => false,
    //     ],
    // ]);
    ?>
    <div class="form-group">
    <?php if(Yii::$app->controller->action->id != 'save-as-new'): ?>
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <?php endif; ?>
    <?php if(Yii::$app->controller->action->id != 'create'): ?>
        <?= Html::submitButton('Save As New', ['class' => 'btn btn-info', 'value' => '1', 'name' => '_asnew']) ?>
    <?php endif; ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
