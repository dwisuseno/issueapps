<?php

namespace app\modules\datamaster\models;

/**
 * This is the ActiveQuery class for [[MModelMenu]].
 *
 * @see MModelMenu
 */
class MModelMenuQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return MModelMenu[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MModelMenu|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}