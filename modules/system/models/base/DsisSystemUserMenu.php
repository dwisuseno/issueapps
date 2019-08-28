<?php

namespace app\modules\system\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "dsis_system_user_menu".
 *
 * @property integer $id
 * @property integer $modul_id
 * @property integer $user_id
 *
 * @property \app\modules\system\models\DsisSystemUser $user
 * @property \app\modules\system\models\DsisSystemModul $modul
 */
class DsisSystemUserMenu extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['modul_id', 'user_id'], 'integer']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dsis_system_user_menu';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db');
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'modul_id' => 'Modul ID',
            'user_id' => 'User ID',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\app\modules\system\models\DsisSystemUser::className(), ['id' => 'user_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModul()
    {
        return $this->hasOne(\app\modules\system\models\DsisSystemModul::className(), ['id' => 'modul_id']);
    }
    
/**
     * @inheritdoc
     * @return array mixed
     */ 
    

    /**
     * @inheritdoc
     * @return \app\modules\system\models\DsisSystemUserMenuQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\system\models\DsisSystemUserMenuQuery(get_called_class());
    }
}
