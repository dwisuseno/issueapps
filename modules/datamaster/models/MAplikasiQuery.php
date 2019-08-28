<?php

namespace app\modules\datamaster\models;

/**
 * This is the ActiveQuery class for [[MAplikasi]].
 *
 * @see MAplikasi
 */
class MAplikasiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return MAplikasi[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MAplikasi|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}