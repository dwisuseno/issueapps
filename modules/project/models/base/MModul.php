<?php

namespace app\modules\project\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "m_modul".
 *
 * @property integer $id
 * @property integer $id_project
 * @property integer $kode
 * @property string $name
 * @property string $keterangan
 * @property string $updated_at
 * @property string $created_at
 * @property string $deleted
 * @property string $created_by
 * @property string $updated_by
 *
 * @property \app\modules\project\models\MProject $project
 */
class MModul extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_project', 'kode'], 'integer'],
            [['name', 'keterangan', 'updated_at', 'created_at', 'deleted', 'created_by', 'updated_by'], 'string', 'max' => 255]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_modul';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_project' => 'Id Project',
            'kode' => 'Kode',
            'name' => 'Name',
            'keterangan' => 'Keterangan',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(\app\modules\project\models\MProject::className(), ['id' => 'id_project']);
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
     * @return \app\modules\project\models\MModulQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\project\models\MModulQuery(get_called_class());
    }
}
