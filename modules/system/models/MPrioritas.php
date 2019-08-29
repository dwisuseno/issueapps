<?php

namespace app\modules\system\models;

use \app\modules\system\models\base\MPrioritas as BaseMPrioritas;

/**
 * This is the model class for table "m_prioritas".
 */
class MPrioritas extends BaseMPrioritas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['nilai'], 'integer'],
            [['name', 'keterangan', 'updated_at', 'created_at', 'deleted', 'created_by', 'updated_by'], 'string', 'max' => 255]
        ]);
    }
	
}
