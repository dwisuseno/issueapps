<div class="form-group" id="add-task-delivery">
<?php
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;

$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
    'pagination' => [
        'pageSize' => -1
    ]
]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'TaskDelivery',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'visible' => false],
        'id_modul' => ['type' => TabularForm::INPUT_TEXT],
        'id_sprint' => [
            'label' => 'M sprint',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\system\models\MSprint::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => 'Choose M sprint'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'id_aplikasi' => [
            'label' => 'M aplikasi',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\system\models\MAplikasi::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => 'Choose M aplikasi'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'id_platform' => [
            'label' => 'M platform',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\system\models\MPlatform::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => 'Choose M platform'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'id_model_menu' => [
            'label' => 'M model menu',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\system\models\MModelMenu::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => 'Choose M model menu'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'is_tested_by_vendor' => ['type' => TabularForm::INPUT_TEXT],
        'is_tested_by_owner' => ['type' => TabularForm::INPUT_TEXT],
        'id_status' => [
            'label' => 'M status',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\system\models\MStatus::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => 'Choose M status'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'id_prioritas' => [
            'label' => 'M prioritas',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\modules\system\models\MPrioritas::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => 'Choose M prioritas'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'issue' => ['type' => TabularForm::INPUT_TEXT],
        'estimated_day' => ['type' => TabularForm::INPUT_TEXT],
        'start_date' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Start Date',
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'end_date' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose End Date',
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'actual_finish_date' => ['type' => TabularForm::INPUT_TEXT],
        'deployment' => ['type' => TabularForm::INPUT_TEXT],
        'keterangan' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowTaskDelivery(' . $key . '); return false;', 'id' => 'task-delivery-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Task Delivery', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowTaskDelivery()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

