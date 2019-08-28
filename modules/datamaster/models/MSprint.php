<?php

namespace app\modules\datamaster\models;

use \app\modules\datamaster\models\base\MSprint as BaseMSprint;

/**
 * This is the model class for table "m_sprint".
 */
class MSprint extends BaseMSprint
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['kode'], 'integer'],
            [['name', 'keterangan', 'updated_at', 'created_at', 'deleted', 'created_by', 'updated_by'], 'string', 'max' => 255]
        ]);
    }
	
   
}
