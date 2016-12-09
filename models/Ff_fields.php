<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ff_fields".
 *
 * @property integer $id
 * @property integer $content_id
 * @property string $name
 * @property integer $not_null
 * @property string $type
 *
 * @property FfContent $content
 * @property FfValues[] $ffValues
 */
class Ff_fields extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ff_fields';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content_id', 'name', 'type'], 'required'],
            [['id', 'content_id', 'not_null'], 'integer'],
            [['type'], 'string'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content_id' => 'Content ID',
            'name' => 'Наименование',
            'not_null' => 'Обязательное',
            'type' => 'Тип',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     * Связанные данные
     * * https://github.com/yiisoft/yii2/blob/master/docs/guide-ru/db-active-record.md#%D0%A0%D0%B0%D0%B1%D0%BE%D1%82%D0%B0-%D1%81%D0%BE-%D1%81%D0%B2%D1%8F%D0%B7%D0%BD%D1%8B%D0%BC%D0%B8-%D0%B4%D0%B0%D0%BD%D0%BD%D1%8B%D0%BC%D0%B8-
     */
    public function getContent()
    {
        return $this->hasOne(Ff_Content::className(), ['id' => 'content_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFfValues()
    {
        return $this->hasMany(Ff_Values::className(), ['fields_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return FfFieldsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FfFieldsQuery(get_called_class());
    }
}
