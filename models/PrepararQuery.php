<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Preparar]].
 *
 * @see Preparar
 */
class PrepararQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Preparar[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Preparar|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
