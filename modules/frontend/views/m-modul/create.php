<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\project\models\MModul */

$this->title = 'Create Mmodul';
$this->params['breadcrumbs'][] = ['label' => 'Mmodul', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mmodul-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
