<?php

namespace app\modules\system\models;

/**
 * This is the ActiveQuery class for [[MPlatform]].
 *
 * @see MPlatform
 */
class MPlatformQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return MPlatform[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MPlatform|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}