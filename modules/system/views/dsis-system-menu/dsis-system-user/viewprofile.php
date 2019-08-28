<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\system\models\DsisSystemUser */

$this->title = 'Change Data';
$this->params['breadcrumbs'][] = 'Profile';
?>
<div class="dsis-system-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <hr>

    <?= $this->render('_formprofile', [
        'model' => $model,
    ]) ?>

</div>
