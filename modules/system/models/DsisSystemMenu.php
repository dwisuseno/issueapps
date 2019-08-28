<?php

namespace app\modules\system\models;

use \app\modules\system\models\base\DsisSystemMenu as BaseDsisSystemMenu;

/**
 * This is the model class for table "dsis_system_menu".
 */
class DsisSystemMenu extends BaseDsisSystemMenu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['modul_id'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['route'], 'string', 'max' => 255],
            [['icon'], 'string', 'max' => 100],
            [['created_at', 'updated_at'], 'string', 'max' => 45]
        ]);
    }
	
}
