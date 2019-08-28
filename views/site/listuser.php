<?php

/* @var $this yii\web\View */
/* @var $searchModel app\modules\it_helpdesk\models\DsisItHelpdeskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = 'List User';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="dsis-it-helpdesk-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="alert alert-info" role="alert">
        <ul>
            <li>Cari User ID anda di list ini.</li>
            <li>Ketik nama anda pada kolom input di bawah. lalu tekan 'Enter'.</li>
            <li>Jika nama tidak ada, silahkan Tekan Tombol Request.</li>
            <li>Password secara default ialah '11111'. tanpa tanda petik.</li>
        </ul>
    </div>

    <?= Html::a('Request User', ['createuserprinter'], ['class' => 'btn btn-success']) ?>
    <br><br>
    <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
        'name',
        'user_id',
        [
            'attribute' => 'status',
            'content' => function($model){
                if($model->status == 'requested'){
                    return '<span class="label label-warning">Requested</span>';
                } else {
                    return '<span class="label label-success">Done</span>';
                }
            }
        ],
        [
            'attribute' => 'created_by',
            'label' => 'By',
        ]
        
    ]; 
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-dsis-it-helpdesk']],
        'panel' => [
            'type' => GridView::TYPE_DEFAULT,
            'heading' => '<span class="glyphicon glyphicon-user"></span>  ' . Html::encode($this->title),
        ],
        // your toolbar can include the additional full export menu
        
    ]); ?>

</div>
