<?php

namespace app\modules\datamaster\models;

/**
 * This is the ActiveQuery class for [[MStatus]].
 *
 * @see MStatus
 */
class MStatusQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return MStatus[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MStatus|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}