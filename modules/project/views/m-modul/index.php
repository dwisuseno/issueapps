<?php

/* @var $this yii\web\View */
/* @var $searchModel app\modules\project\models\MModulSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = 'Modul';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="mmodul-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Search', '#', ['class' => 'btn btn-info search-button']) ?>
        
    </p>
    <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => ' {delete}',
        ],
        ['attribute' => 'id', 'visible' => false],
        // 'kode',
        'name',
        [
            'attribute' => 'id_status',
            'format' => 'html',
            'value' => function($model){
                if($model->id_status == 0){
                    return "<span class='label label-primary'>AKTIF</span>";
                } else 
                    {
                        return "<span class='label label-danger'>Non AKTIF</span>";
                    }
            },
        ],
        [
            'attribute' => 'id_project',
            'label' => 'Project',
            'value' => function($model){
                return $model->project->name;
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => \yii\helpers\ArrayHelper::map(\app\modules\project\models\MProject::find()->asArray()->all(), 'id', 'name'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'M project', 'id' => 'grid-mmodul-search-id_project']
        ],
        // 'keterangan',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => ' {update}',
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => ' {deactivate}',
            'buttons' => [
                'deactivate' => function ($url,$model) {
                    if($model->id_status == 0){
                        return Html::a('<i class="fa fa-times"></i> Deactivate<br>', $url, ['title' => 'Deactivate', 'class' => 'btn btn-danger']);
                    } else 
                        {
                            return Html::a('<i class="fa fa-check"></i> Activate<br>', $url, ['title' => 'Activate', 'class' => 'btn btn-primary']);
                        }
                    
                },
            ],
        ],
    ]; 
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-mmodul']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
        'export' => false,
        // your toolbar can include the additional full export menu
        'toolbar' => [
            '{export}',
            ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumn,
                'target' => ExportMenu::TARGET_BLANK,
                'fontAwesome' => true,
                'dropdownOptions' => [
                    'label' => 'Full',
                    'class' => 'btn btn-default',
                    'itemsBefore' => [
                        '<li class="dropdown-header">Export All Data</li>',
                    ],
                ],
                'exportConfig' => [
                    ExportMenu::FORMAT_PDF => false
                ]
            ]) ,
        ],
    ]); ?>

</div>
