<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\system\models\DsisSystemMenu */

$this->title = 'Save As New Dsis System Menu: '. ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Dsis System Menu', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Save As New';
?>
<div class="dsis-system-menu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
