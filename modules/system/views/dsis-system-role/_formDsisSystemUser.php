<div class="form-group" id="add-dsis-system-user">
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
    'formName' => 'DsisSystemUser',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'visible' => false],
        'name' => ['type' => TabularForm::INPUT_TEXT],
        'username' => ['type' => TabularForm::INPUT_TEXT],
        'password' => ['type' => TabularForm::INPUT_PASSWORD],
        'authKey' => ['type' => TabularForm::INPUT_TEXT],
        'accessToken' => ['type' => TabularForm::INPUT_TEXT],
        'status' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'items' => [ 'active' => 'Active', ' inactive' => ' inactive', ],
                    'options' => [
                        'columnOptions' => ['width' => '185px'],
                        'options' => ['placeholder' => 'Choose Status'],
                    ]
        ],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowDsisSystemUser(' . $key . '); return false;', 'id' => 'dsis-system-user-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . ' Add User', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowDsisSystemUser()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

