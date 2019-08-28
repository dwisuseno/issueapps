<?php

namespace app\modules\project\models;

/**
 * This is the ActiveQuery class for [[MModul]].
 *
 * @see MModul
 */
class MModulQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return MModul[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MModul|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}