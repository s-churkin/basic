<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Ff_Values]].
 *
 * @see Ff_Values
 */
class FfValuesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Ff_Values[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Ff_Values|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}