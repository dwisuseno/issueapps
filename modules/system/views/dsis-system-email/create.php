<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\system\models\DsisSystemEmail */

$this->title = 'Create New Email';
$this->params['breadcrumbs'][] = ['label' => 'System Email', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dsis-system-email-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
