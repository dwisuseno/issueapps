<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\system\models\DsisSystemMenu */

$this->title = 'Update Dsis System Menu: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Dsis System Menu', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dsis-system-menu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
