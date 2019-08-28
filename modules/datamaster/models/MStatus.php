<?php

namespace app\modules\datamaster\models;

use \app\modules\datamaster\models\base\MStatus as BaseMStatus;

/**
 * This is the model class for table "m_status".
 */
class MStatus extends BaseMStatus
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['name', 'keterangan', 'updated_at', 'created_at', 'deleted', 'created_by', 'updated_by'], 'string', 'max' => 255]
        ]);
    }

    
	
}
