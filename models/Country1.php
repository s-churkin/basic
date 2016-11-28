<?php
/*
Потомок класса Active Record
*/
namespace app\models;

class Country1 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }
}
?>