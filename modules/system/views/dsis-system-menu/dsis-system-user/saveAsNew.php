<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\system\models\DsisSystemUser */

$this->title = 'Save As New Dsis System User: '. ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Dsis System User', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Save As New';
?>
<div class="dsis-system-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
