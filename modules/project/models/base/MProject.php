<?php

namespace app\modules\project\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "m_project".
 *
 * @property integer $id
 * @property string $user
 * @property integer $kode
 * @property string $name
 * @property string $keterangan
 * @property string $updated_at
 * @property string $created_at
 * @property string $deleted
 * @property string $created_by
 * @property string $updated_by
 */
class MProject extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode'], 'integer'],
            [['user', 'name', 'keterangan', 'updated_at', 'created_at', 'deleted', 'created_by', 'updated_by'], 'string', 'max' => 255]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_project';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user' => 'User',
            'kode' => 'Kode',
            'name' => 'Name',
            'keterangan' => 'Keterangan',
        ];
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
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
                'value' => \Yii::$app->user->identity->name,
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return \app\modules\project\models\MProjectQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\project\models\MProjectQuery(get_called_class());
    }
}
