<?php

namespace app\modules\system\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "dsis_system_log_activity".
 *
 * @property integer $id
 * @property string $user
 * @property string $activity
 * @property string $details
 * @property string $time
 */
class DsisSystemLogActivity extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['time'], 'safe'],
            [['user'], 'string', 'max' => 100],
            [['activity'], 'string', 'max' => 255],
            [['details'], 'string', 'max' => 500]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dsis_system_log_activity';
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
            'user' => 'User',
            'activity' => 'Activity',
            'details' => 'Details',
            'time' => 'Time',
        ];
    }

    /**
     * @inheritdoc
     * @return \app\modules\system\models\DsisSystemLogActivityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\system\models\DsisSystemLogActivityQuery(get_called_class());
    }
}
