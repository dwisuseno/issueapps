<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\system\models\MPic */

$this->title = 'Create Mpic';
$this->params['breadcrumbs'][] = ['label' => 'Mpic', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mpic-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
