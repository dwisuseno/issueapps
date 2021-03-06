<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\backlog\models\TaskDelivery */

$this->title = 'Update Task Delivery: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Task Delivery', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="task-delivery-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
