<?php

namespace app\modules\system\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "dsis_system_menu".
 *
 * @property integer $id
 * @property integer $modul_id
 * @property string $name
 * @property string $route
 * @property string $icon
 * @property string $created_at
 * @property string $updated_at
 *
 * @property \app\modules\system\models\DsisSystemModul $modul
 */
class DsisSystemMenu extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['modul_id'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['route'], 'string', 'max' => 255],
            [['icon'], 'string', 'max' => 100],
            [['created_at', 'updated_at'], 'string', 'max' => 45]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dsis_system_menu';
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
            'name' => 'Name',
            'route' => 'Route',
            'icon' => 'Icon',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModul()
    {
        return $this->hasOne(\app\modules\project\models\MModul::className(), ['id' => 'modul_id']);
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
     * @return \app\modules\system\models\DsisSystemMenuQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\system\models\DsisSystemMenuQuery(get_called_class());
    }
}
