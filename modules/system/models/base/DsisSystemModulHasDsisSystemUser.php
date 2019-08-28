<?php

namespace app\modules\system\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "dsis_system_modul_has_dsis_system_user".
 *
 * @property integer $dsis_system_modul_id
 * @property integer $dsis_system_user_id
 *
 * @property \app\modules\system\models\DsisSystemModul $dsisSystemModul
 * @property \app\modules\system\models\DsisSystemUser $dsisSystemUser
 */
class DsisSystemModulHasDsisSystemUser extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dsis_system_modul_id', 'dsis_system_user_id'], 'required'],
            [['dsis_system_modul_id', 'dsis_system_user_id'], 'integer']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dsis_system_modul_has_dsis_system_user';
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
            'dsis_system_modul_id' => 'Dsis System Modul ID',
            'dsis_system_user_id' => 'Dsis System User ID',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDsisSystemModul()
    {
        return $this->hasOne(\app\modules\system\models\DsisSystemModul::className(), ['Id' => 'dsis_system_modul_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDsisSystemUser()
    {
        return $this->hasOne(\app\modules\system\models\DsisSystemUser::className(), ['id' => 'dsis_system_user_id']);
    }
    
/**
     * @inheritdoc
     * @return array mixed
     */ 
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return \app\modules\system\models\DsisSystemModulHasDsisSystemUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\system\models\DsisSystemModulHasDsisSystemUserQuery(get_called_class());
    }
}
