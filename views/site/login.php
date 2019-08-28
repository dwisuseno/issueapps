<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Mining Tech Apps';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="login-box">
        <div class="login-logo">
          
        </div><!-- /.login-logo -->
        <div class="login-logo">
          
        </div><!-- /.login-logo -->
        
        <div class="login-box-body" >
          <p class="login-box-msg">Tasklist Management - Mining Technology</p>
          <?php $form = ActiveForm::begin([
              'id' => 'login-form',
              //'layout' => 'horizontal',
              
          ]); ?>
            <div class="form-group has-feedback">
              <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'form-control', 'type' => 'text']) ?>
              
            </div>
            <div class="form-group has-feedback">
              <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control', 'type' => 'password']) ?>
              
            </div>
            <div class="row">
                  <div class="col-xs-8">
                    <div class="checkbox icheck">
                      <label>
                        
                      </label>
                    </div>
                  </div><!-- /.col -->
                  <div class="col-xs-4">
                      <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
                  </div><!-- /.col -->
                  <?php ActiveForm::end(); ?>
            </div>
        </div><!-- /.login-box-body -->
</div>