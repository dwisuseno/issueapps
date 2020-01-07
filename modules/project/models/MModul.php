<?php

namespace app\modules\project\models;

use \app\modules\project\models\base\MModul as BaseMModul;

/**
 * This is the model class for table "m_modul".
 */
class MModul extends BaseMModul
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_project','id_status', 'kode'], 'integer'],
            [['name', 'keterangan', 'updated_at', 'created_at', 'deleted', 'created_by', 'updated_by'], 'string', 'max' => 255]
        ]);
    }
	
}
