<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\project\models\MModul */

$this->title = 'Update Modul: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Modul', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mmodul-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
