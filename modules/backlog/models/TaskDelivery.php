<?php

namespace app\modules\backlog\models;

use \app\modules\backlog\models\base\TaskDelivery as BaseTaskDelivery;

/**
 * This is the model class for table "task_delivery".
 */
class TaskDelivery extends BaseTaskDelivery
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_sprint', 'id_aplikasi', 'id_pic', 'id_platform', 'id_model_menu', 'is_tested_by_vendor', 'is_tested_by_owner', 'id_status', 'id_prioritas', 'estimated_day'], 'integer'],
            [['issue'], 'string', 'max' => 800],
            [['start_date', 'end_date'], 'date'],
            [['actual_finish_date', 'deployment', 'keterangan', 'updated_at', 'created_at', 'deleted', 'created_by', 'updated_by'], 'string', 'max' => 255],
            [['estimated_day'], 'number'],
             [['id_platform','issue'],'required'],

        ]);
    }
	
}
