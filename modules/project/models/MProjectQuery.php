<?php

namespace app\modules\project\models;

/**
 * This is the ActiveQuery class for [[MProject]].
 *
 * @see MProject
 */
class MProjectQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return MProject[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MProject|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}