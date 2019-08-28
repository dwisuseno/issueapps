<?php

namespace app\modules\datamaster\models;

/**
 * This is the ActiveQuery class for [[MPic]].
 *
 * @see MPic
 */
class MPicQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return MPic[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MPic|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}