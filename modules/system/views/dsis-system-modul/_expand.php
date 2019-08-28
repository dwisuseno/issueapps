<?php
use yii\helpers\Html;
use kartik\tabs\TabsX;
use yii\helpers\Url;
$items = [
    // [
    //     'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('DsisSystemModul'),
    //     'content' => $this->render('_detail', [
    //         'model' => $model,
    //     ]),
    // ],
        [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Menu'),
        'content' => $this->render('_dataDsisSystemMenu', [
            'model' => $model,
            'row' => $model->dsisSystemMenus,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('User'),
        'content' => $this->render('_dataDsisSystemUserMenu', [
            'model' => $model,
            'row' => $model->dsisSystemUserMenus,
        ]),
    ],
    ];
echo TabsX::widget([
    'items' => $items,
    'position' => TabsX::POS_ABOVE,
    'encodeLabels' => false,
    'class' => 'tes',
    'pluginOptions' => [
        'bordered' => true,
        'sideways' => true,
        'enableCache' => false
    ],
]);
?>
