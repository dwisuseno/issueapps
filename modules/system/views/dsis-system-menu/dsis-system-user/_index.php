<?php 
use \yii\helpers\Html;
use yii\widgets\DetailView;
?>

<div class="row">
    <div class="col-sm-7">
        <h2><?= Html::a(Html::encode($model->id), ['view', 'id' => $model->id]) ?></h2>
    </div>
    <div class="col-sm-5" style="margin-top: 15px">
        <?= Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . 'Print PDF',
            ['pdf', 'id' => $model->id],
            [
                'class' => 'btn btn-danger',
                'target' => '_blank',
                'data-toggle' => 'tooltip',
                'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
            ]
        )?>
        <?= Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . 'Save As New',
            ['save-as-new', 'id' => $model->id], ['class' => 'btn btn-info'])?>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ])
        ?>
    </div>
    <?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
            'attribute' => 'role.id',
            'label' => 'Role',
        ],
        'name',
        'username',
        'password',
        //'authKey',
        //'accessToken',
        //'status',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
    ?>
</div>


