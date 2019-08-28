<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\system\models\DsisSystemMenu */

$this->title = 'Create Dsis System Menu';
$this->params['breadcrumbs'][] = ['label' => 'Dsis System Menu', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dsis-system-menu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
