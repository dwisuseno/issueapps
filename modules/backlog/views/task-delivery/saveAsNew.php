<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\backlog\models\TaskDelivery */

$this->title = 'Save As New Task Delivery: '. ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Task Delivery', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Save As New';
?>
<div class="task-delivery-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
