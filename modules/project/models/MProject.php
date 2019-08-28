<?php

namespace app\modules\project\models;

use \app\modules\project\models\base\MProject as BaseMProject;

/**
 * This is the model class for table "m_project".
 */
class MProject extends BaseMProject
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['kode'], 'integer'],
            [['user', 'name', 'keterangan', 'updated_at', 'created_at', 'deleted', 'created_by', 'updated_by'], 'string', 'max' => 255]
        ]);
    }
	
}
