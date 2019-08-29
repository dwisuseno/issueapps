<?php

namespace app\modules\system\models;

use \app\modules\system\models\base\MAplikasi as BaseMAplikasi;

/**
 * This is the model class for table "m_aplikasi".
 */
class MAplikasi extends BaseMAplikasi
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
