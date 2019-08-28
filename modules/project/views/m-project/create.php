<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\project\models\MProject */

$this->title = 'Create Mproject';
$this->params['breadcrumbs'][] = ['label' => 'Mproject', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mproject-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
