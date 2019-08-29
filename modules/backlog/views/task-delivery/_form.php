<?php

use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\backlog\models\TaskDelivery */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Comment', 
        'relID' => 'comment', 
        'value' => \yii\helpers\Json::encode($model->comments),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="task-delivery-form">

    <?php $form = ActiveForm::begin([
        'id' => 'login-form-horizontal', 
        // 'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 4, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Please Check Your Input!</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-6">
                        <?= $form->field($model, 'id_aplikasi')->widget(\kartik\widgets\Select2::classname(), [
                            'data' => \yii\helpers\ArrayHelper::map(\app\modules\datamaster\models\MAplikasi::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
                            'options' => ['placeholder' => 'Choose Aplikasi'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]); ?>
                    </div>                  
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'id_platform')->widget(\kartik\widgets\Select2::classname(), [
                            'data' => \yii\helpers\ArrayHelper::map(\app\modules\datamaster\models\MPlatform::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
                            'options' => ['placeholder' => 'Choose Platform'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'id_model_menu')->widget(\kartik\widgets\Select2::classname(), [
                            'data' => \yii\helpers\ArrayHelper::map(\app\modules\datamaster\models\MModelMenu::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
                            'options' => ['placeholder' => 'Choose Menu'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'issue')->textarea(['rows' => 6]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'id_pic')->widget(\kartik\widgets\Select2::classname(), [
                            'data' => \yii\helpers\ArrayHelper::map(\app\modules\datamaster\models\MPic::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
                            'options' => ['placeholder' => 'Choose Developer'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]); ?>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'start_date')->widget(\kartik\datecontrol\DateControl::classname(), [
                            'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                            'saveFormat' => 'php:Y-m-d',
                            'ajaxConversion' => true,
                            'options' => [
                                'pluginOptions' => [
                                    'placeholder' => 'Choose Tanggal',
                                    'autoclose' => true
                                ]
                            ],
                        ]); ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'end_date')->widget(\kartik\datecontrol\DateControl::classname(), [
                            'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                            'saveFormat' => 'php:Y-m-d',
                            'ajaxConversion' => true,
                            'options' => [
                                'pluginOptions' => [
                                    'placeholder' => 'Choose Tanggal',
                                    'autoclose' => true
                                ]
                            ],
                        ]); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        if(Yii::$app->user->identity->role_id == 1 or Yii::$app->user->identity->role_id == 2){
                            echo $form->field($model, 'id_prioritas')->widget(\kartik\widgets\Select2::classname(), [
                                'data' => \yii\helpers\ArrayHelper::map(\app\modules\datamaster\models\MPrioritas::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
                                'options' => ['placeholder' => 'Choose Prioritas'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]); 
                         }

                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        $deployment_list = [
                            "Development" =>"Development", 
                            "Production" => "Production", 
                            ];
                         echo $form->field($model, 'deployment')->widget(\kartik\widgets\Select2::classname(), [
                            'data' => $deployment_list,
                            'options' => ['placeholder' => 'Choose Deployment'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]); ?>
                    </div>
                </div>
              </div>
          </div>
        </div>
    </div>

    

    <?php 
    // echo $form->field($model, 'id_sprint')->widget(\kartik\widgets\Select2::classname(), [
    //     'data' => \yii\helpers\ArrayHelper::map(\app\modules\datamaster\models\MSprint::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
    //     'options' => ['placeholder' => 'Choose M sprint'],
    //     'pluginOptions' => [
    //         'allowClear' => true
    //     ],
    // ]); 
    ?>

    

    <?php
    // $forms = [
    //     [
    //         'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Comment'),
    //         'content' => $this->render('_formComment', [
    //             'row' => \yii\helpers\ArrayHelper::toArray($model->comments),
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
    </div>

    <?php ActiveForm::end(); ?>

</div>
