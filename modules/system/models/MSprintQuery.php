<?php

namespace app\modules\system\models;

/**
 * This is the ActiveQuery class for [[MSprint]].
 *
 * @see MSprint
 */
class MSprintQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return MSprint[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MSprint|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}