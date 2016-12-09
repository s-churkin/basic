<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Ff_fields]].
 *
 * @see Ff_fields
 */
class FfFieldsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Ff_fields[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Ff_fields|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}